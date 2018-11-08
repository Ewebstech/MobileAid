@include('emails.layout.mailheader')   
<tr>
<td style='color: #fff; font-weight: bolder; background-color: #7c8385;' colspan='3' align='center'> {{$Subject}}</td>
</tr>
<tr>
<td style='color: #000; background-color: #fff;' colspan='3' align='left'>
    <p>
   Hello {{$Name}},
    </p>
    <p>Welcome to <b>Mobile Medical Aid.</b></p>
    <p>MA is a medical call-in service that is designed to provide quick medical assistance in any health
related situation to reduce or prevent worsening conditions or resulting in death. In situations where
people do not know what to do they can call for medical advice or assistance.</p>
    <p>For your rememberance, here are your login details:
        <table>
            <tr>
                <td>Your Username</td><td>{{$Username}}</td>
            </tr>
            <tr>
                <td>Your Password</td><td>*********</td>
            </tr>
        </table>
    </p>
    <p>You can log in by clicking <a href="#">Here</a>. Please do have nice day.</p>
</td>
</tr>
@include('emails.layout.mailfooter')   