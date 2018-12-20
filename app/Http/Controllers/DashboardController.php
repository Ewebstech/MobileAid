<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\HelperController;
session_start();
class DashboardController extends Controller
{
    protected $helper;
    public function __construct()
    {
       $this->middleware('redirectauth');
       $this->helper = new HelperController;
    }
    public function index(Request $request){
       $UserDetails = $_SESSION['UserDetails'];
       $data['sessiondata'] = $UserDetails;
       $role = strtolower($UserDetails['role']);
        
       $userContent = $this->jsonToArray($UserDetails['content']);
       // Check if user has updated their profiles
       if(isset($userContent['Kyc'])){
           $data['EditProfile'] = "set";
           
       } else {
        $data['EditProfile'] = "";
      
       }
       $data['MsgCount'] = $this->getContactMessageCount();
       $data['PatientNum'] = $this->getPatientsNum();
       $data['DoctorNum'] = $this->getDoctorsNum();
       $data['regToday'] = $this->registrationsToday();
       $data['OpenCasesNum'] = count($this->helper->getAllOpenCases());
       $data['ClosedCasesNum'] = count($this->helper->getAllClosedCases());
       $data['SilverNum'] = $this->getUsersBySubscriptionCount('Silver');
       $data['GoldNum'] = $this->getUsersBySubscriptionCount('Gold');
       $data['DiamondNum'] = $this->getUsersBySubscriptionCount('Diamond');
       $data['TitaniumNum'] = $this->getUsersBySubscriptionCount('Titanium');
       $data['ActiveUsers'] = $this->getActiveUsersNum();
       $data['InActiveUsers'] = $this->getInActiveUsersNum();

       // Chart Data
       $SubscriptionData = [$data['SilverNum'], $data['GoldNum'], $data['TitaniumNum'], $data['DiamondNum']];
       $data['SubChart'] = json_encode($SubscriptionData);

      // dd($data['regToday']);
       $data['PatientsDashboard'] = $this->getPatientsDashboardData();
  
       $URI= '/'.$role.'/dashboard';
       return view($URI)->with($data);
    }

    private function getActiveUsersNum(){
        $data = $this->helper->getUsersByStatus('Active');
        if(!empty($data)){
            $count = count($data);
            return ($count) ? $count : 0;
        } else {
            return 0;
        }
    }

    private function getInActiveUsersNum(){
        $data = $this->helper->getUsersByStatus('InActive');
        if(!empty($data)){
            $count = count($data);
            return ($count) ? $count : 0;
        } else {
            return 0;
        }
    }

    private function getPatientsNum(){
        $data =  $this->helper->getAllUsersByRole("client");
        if(!empty($data)){
            $count = count($data);
            return ($count) ? $count : 0;
        }
    }
    private function getPatientsDashboardData(){
        $UserDetails = $_SESSION['UserDetails'];
        $data['sessiondata'] = $UserDetails;
        $role = $UserDetails['role'];
        $userId = $UserDetails['client_id'];
        $detailById = $this->helper->getUserDetailsById($userId);
        $userContent = $detailById;
        $Sdata["Package"] = (isset($userContent['package'])) ? $userContent['package'] : "None" ;
        $Sdata['Calls'] = (isset($userContent['calls'])) ? $userContent['calls'] : "0";
        $Sdata['Status'] = (isset($userContent['Status'])) ? $userContent['Status'] : "InActive";
        $Sdata['UserId'] = (isset($userContent['client_id'])) ? $userContent['client_id'] : $UserDetails['client_id'];
        //dd($this->helper->getOpenCasesByClientId($userId));
        $openCases = count($this->helper->getOpenCasesByClientId($userId));
        $closedCases = count($this->helper->getClosedcasesByClientId($userId));
        $Sdata['OpenCases'] = (isset($openCases)) ? $openCases : 0;
        $Sdata['ClosedCases'] = (isset($closedCases)) ? $closedCases : 0;
        
        return $Sdata;
    }

    private function getUsersBySubscriptionCount($package){
        $data = $this->helper->getUsersBySubscription($package);
        if(!empty($data)){
            $count = count($data);
            return ($count) ? $count : 0;
        } else {
            return 0;
        }
    }   

    private function getDoctorsNum(){
        $data =  $this->helper->getAllUsersByRole("doctor");
        if(!empty($data)){
            $count = count($data);
            return ($count) ? $count : 0;
        } else {
            return 0;
        }
    }
    private function getContactMessageCount(){
        $data = $this->helper->getUnreadContactMessages();
        if($data){
            //$data = $data->toArray();
            $count = count($data);
            return ($count) ? $count : 0;
        }
    }
    private function registrationsToday(){
        $data = $this->helper->getTodayRegs();
        if($data){
            //$data = $data->toArray();
            $count = count($data);
            return ($count) ? $count : 0;
        }
       // dd($data);
    }
    
}