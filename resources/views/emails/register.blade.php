@include('emails.layout.mailheader')   
<tr>
<td style='color: #fff; font-weight: bolder; background-color: #00A4EF !important;' colspan='3' align='center'> {{$Subject}}</td>
</tr>
<tr>
<td style='color: #000; background-color: #fff;' colspan='3' align='left'>
    <p>
   Hello {{$Name}},
    </p>
    <p>Welcome to <b>Mobile Medical Aid.</b> We are happy to have you signed-up as our <b>client</b> on our health support platform.</p>
    <p>Your health needs are important to us, so please select your health package <a href="http://www.mobilemedicalaid.com/login">here</a> for your full medical service.</p>

    <p>You can now easily reach our qualified doctors from the convenience and comfort of your home, office or
            on the go. So you do not have to spend hours in cramped waiting room, which is a big advantage when you
            need urgent medical attention.</p>
    <p>Please find below your login details to be kept securely:
        <table>
            <tr>
                <td>Your Username</td><td>{{$Username}}</td>
            </tr>
            <tr>
                <td>Your Password</td><td>{{$Password}}</td>
            </tr>
        </table>
    </p>
    <p>Please kindly note that you can also login by using your registered <b>Phone Number - {{$PhoneNumber}}</b> You can try by clicking <a href="http://mobilemedicalaid.com">Here</a></p>
    <p>Thank you and have a happy healthy day.</p>
    <p> 
        <b>  
            Client Support<br>
            <u>clientsupport@mobilemedicalaid.com</u>
        </b> 
    </p>
</td>
</tr>
@include('emails.layout.mailfooter')