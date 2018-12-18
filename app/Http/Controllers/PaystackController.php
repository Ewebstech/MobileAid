<?php
namespace App\Http\Controllers;

use App\Model\Users;
use App\Model\Transactions;
use App\Model\Subscriptions;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HelperController;
use App\Helpers\HttpStatusCodes;

class PaystackController extends Controller
{
    /**
     * Issue Secret Key from your Paystack Dashboard
     * @var string
     */
    protected $secretKey;

    protected $helper;

    public function __construct()
    {   
        if(!isset($_SESSION)) session_start();
        //$this->middleware('redirectauth');
        $this->helper = new HelperController;
    }
  
    public function genTranxRef()
    {
        return $this->getHashedToken(25);
    }

    private static function getPool($type = 'alnum')
    {
        switch ($type) {
            case 'alnum':
                $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'alpha':
                $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'hexdec':
                $pool = '0123456789abcdef';
                break;
            case 'numeric':
                $pool = '0123456789';
                break;
            case 'nozero':
                $pool = '123456789';
                break;
            case 'distinct':
                $pool = '2345679ACDEFHJKLMNPRSTUVWXYZ';
                break;
            default:
                $pool = (string)$type;
                break;
        }
        return $pool;
    }
    /**
     * Generate a random secure crypt figure
     * @param  integer $min
     * @param  integer $max
     * @return integer
     */
    public static function secureCrypt($min, $max)
    {
        $range = $max - $min;
        if ($range < 0) {
            return $min; // not so random...
        }
        $log = log($range, 2);
        $bytes = (int)($log / 8) + 1; // length in bytes
        $bits = (int)$log + 1; // length in bits
        $filter = (int)(1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }
    /**
     * Finally, generate a hashed token
     * @param  integer $length
     * @return string
     */
    public static function getHashedToken($length = 25)
    {
        $token = "";
        $max = strlen(static::getPool());
        for ($i = 0; $i < $length; $i++) {
            $token .= static::getPool()[static::secureCrypt(0, $max)];
        }
        return $token;
    }

    public function redirectToProvider(Request $request)
    {
        $params = $request->all();
       
        if(isset($_SESSION['UserDetails'])){
            $UserDetails = $_SESSION['UserDetails'];
        } else {
            $UserDetails['email'] = $params['email'];
        }
        
        $package_type = $params['package'];
        if($package_type == "Silver"){
            $charge = 0.015 * $params['amount'];
        } else {
            $charge = 0;
        }
        if(!isset($params['metadata'])){
            $params['metadata'] = null;
        }
        

        try {
            $totalAmount = ($params['amount'] * 100) + ((int) $charge * 100);
        } catch (\ErrorException $e) {
            Log::error($e->getMessage());
            return back()->with('trn_error', 'You can only subscribe with a price attached.');
        }
        $initializePayment = 'https://api.paystack.co/transaction/initialize';
        $authBearer = 'Bearer ' . $this->setKey();
        //dd($initializePayment);
        try {
            $response = Curl::to($initializePayment)
                ->withData([
                    'reference' => $this->genTranxRef(),
                    'amount' => intval($totalAmount),
                    'email' =>  $UserDetails['email'],
                    'metadata' => $params['metadata'],
                ])
                ->withHeader('Authorization: Bearer ' . $this->SetKey())
                ->asJson()
                ->post();
            $response = json_decode(json_encode($response));
            
            $authorizationUrl = $response->data->authorization_url;
            $params['url'] = $authorizationUrl;

            if(isset($params['view'])){
                return redirect()->away($authorizationUrl);
            } else {
                $msg = "Payment Initiated Successfully";
                $data = $params;
                return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
            }

        } catch (\ErrorException $e) {
            Log::error($e->getMessage());
            return back()->with('trn_error', 'Unable to connect to service provider, please try again later.');
        }
        
        
        
    }

    public function handleGatewayCallback(Request $request)
    {
        $transactionRef = request()->query('trxref');
        $verifyPayment = 'https://api.paystack.co/transaction/verify/' . $transactionRef;
        $response = Curl::to($verifyPayment)
            ->withHeader('Authorization: Bearer ' . $this->SetKey())
            ->get();
        dd($response);
        $response = json_decode($response);
        if ($response->status === true) {
            // Save Transaaction Details
            $params = (array) $response->data;
            $params['custom_fields'] = (array) $response->data->metadata->custom_fields[0];
            $params['package'] = $params['custom_fields']['package'];
            $params['client_id'] = $params['custom_fields']['client_id'];
            $params['customer'] = (array) $params['customer'];
            $params['authorization'] = (array) $params['authorization'];
            $params['log'] = (array) $params['log'];
            $params['email'] = $params['customer']['email'];
            $Resource = new Transactions;
            $saveTrans = $Resource->addTransaction($params);
            if(is_bool($saveTrans)){
                // Credit Customers
                $usersSubData = $this->helper->getUserSubscriptionData($params['email']);
                $subparams = $this->jsonToArray($usersSubData['content']);
                // Current Call Number                                                                                        
                $remaining_calls = $this->helper->getCalls();
                $callable = $this->helper->getpackageDetails($subparams['package'])['LocalMaxCalls'];
                $new_calls = (int) $remaining_calls + (int) $callable;
                $subparams['calls'] = $new_calls;
                $subparams['status'] = 'Active';
                
                $subQuery = new Subscriptions();
                $subDetails = $subQuery->updateSubscription($subparams);
                
                if($subDetails){
                     // Update Users Table with Subscription Details
                    $userQuery = new Users;
                    $userUpdate = $userQuery->updateUserContent($subparams);   
                }
                if(isset($params['view'])){
                    return redirect()->route('getRenewable')->with('success', 'Your Subscription Renewal for '.$params['package'].' Package was Successful.');
                } else {
                    $msg = "Payment Successful";
                    $data = $params;
                    return $this->jsonoutput($msg, $data, HttpStatusCodes::OK);
                }
                
            } else {
            
                return redirect()->route('getRenewable')->with('info', $saveTrans);
            }            
            
        } else {
            //dd($response);
            return redirect()->route('getRenewable')->with('failed', 'Transaction Failed, Please try again later.');
        }
    }
    public function setKey()
    {
        $key = config('paystack.paystack_secret_key');
        return $key;
    }
}