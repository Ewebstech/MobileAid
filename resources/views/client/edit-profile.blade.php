@extends('base')

@section('title', 'Dashboard')
<style>

  .fileUpload{
    z-index: 3;
    position: absolute;
    border-radius: 0;
  }

  .upload{
    top: 5px !important;
  }
</style>
@section('content')

<div class=" content-area">
        <div class="page-header">
            <h4 class="page-title">Edit Profile</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>

        </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-warning d-none d-lg-block" role="alert">
                        <button type="button" class="close text-white" aria-hidden="true"></button>
                    <i class="fa fa-lock"></i> All data storage, retrieval and transaction procedures are strictly confidential and HIPAA Compliant. 
                    </div>
                </div>
            </div>
        <div class="row ">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Profile</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="profile-form" enctype="multipart/form-data" >
                            <div class="row mb-2">
                                <div class="col-auto">
                                    <div class="fileUpload">
                                        <label for="imgUpload">
                                                <i style="text-align: center; margin-top: 38px; color: #fff; background: #000; padding: 5px; border-radius: 20px; margin-left: 20px; z-index: 0; position: absolute; opacity: 0.8" class="fa fa-camera "></i>
                                        </label>
                                        
                                        <input type="file" id="imgUpload" name="image_name" style="display: none;" />
                                    </div>
                                    <label for="">
                                        <img id="profile-image" class="avatar brround avatar-xl" src="{{$UserDetails['avatar']}}" alt="Avatar-img">
                                    </label>
                                </div>
                                <div class="col">
                                    <h3 class="mb-1 ">{{$UserDetails['firstname']}} {{$UserDetails['lastname']}}</h3>
                                    <p class="mb-4 label label-danger">{{$UserDetails['Role']}}</p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Email-Address</label>
                            <input class="form-control" name="email" value="{{$UserDetails['email']}}" required/>
                            </div>
                            <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                <input class="form-control" name="phonenumber" value="{{$UserDetails['phonenumber']}}"/>
                                </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" placeholder="**********" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <select class="form-control" name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <input type="hidden" name="role" value="{{$UserDetails['role']}}" />
                            <input type="hidden" name="view" value="1" />
                            <div id="profile-msg"></div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-danger btn-block" ><i class="fa fa-edit"></i> Update Login Information</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="card" id="user-form">
                    {{csrf_field()}}
                    <input type="hidden" name="view" value="1" />
                    <input type="hidden" name="email" value="{{$UserDetails['email']}}" />
                    <input type="hidden" name="phonenumber" value="{{$UserDetails['phonenumber']}}" />
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: 10px;">
                                    <h3 class="card-title"><i><b> *General Information</b></i></h3>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstname" value="{{$UserDetails['firstname']}}" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" value="{{$UserDetails['lastname']}}" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Contact Address</label>
                                    <input type="text" class="form-control" name="contact_address" value="{{array_get($UserDetails,'Kyc.contact_address')}}" placeholder="Contact Address" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city"  value="{{array_get($UserDetails, 'Kyc.city')}}" placeholder="City" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Postal Code</label>
                                    <input type="number" class="form-control" name="postal_code"  value="{{array_get($UserDetails,'Kyc.postal_code')}}" placeholder="ZIP Code">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="form-control custom-select" name="country">
                                            <option value="{{array_get($UserDetails,'Kyc.country')}}" selected>{{array_get($UserDetails,'Kyc.country')}}</option>
                                            <option data-code="US" value="United States">United States</option>
                                            <option data-code="GB" value="United Kingdom">United Kingdom</option>
                                            <option data-code="DE" value="Germany">Germany</option>
                                            <option data-code="CA" value="Canada">Canada</option>
                                            <option data-code="NG" value="Nigeria">Nigeria</option>
                                            <option disabled="disabled" value="---">---</option>
                                            <option data-code="AF" value="Afghanistan">Afghanistan</option>
                                            <option data-code="AX" value="Aland Islands">Åland Islands</option>
                                            <option data-code="AL" value="Albania">Albania</option>
                                            <option data-code="DZ" value="Algeria">Algeria</option>
                                            <option data-code="AD" value="Andorra">Andorra</option>
                                            <option data-code="AO" value="Angola">Angola</option>
                                            <option data-code="AI" value="Anguilla">Anguilla</option>
                                            <option data-code="AG" value="Antigua And Barbuda">Antigua &amp; Barbuda</option>
                                            <option data-code="AR" value="Argentina">Argentina</option>
                                            <option data-code="AM" value="Armenia">Armenia</option>
                                            <option data-code="AW" value="Aruba">Aruba</option>
                                            <option data-code="AU" value="Australia">Australia</option>
                                            <option data-code="AT" value="Austria">Austria</option>
                                            <option data-code="AZ" value="Azerbaijan">Azerbaijan</option>
                                            <option data-code="BS" value="Bahamas">Bahamas</option>
                                            <option data-code="BH" value="Bahrain">Bahrain</option>
                                            <option data-code="BD" value="Bangladesh">Bangladesh</option>
                                            <option data-code="BB" value="Barbados">Barbados</option>
                                            <option data-code="BY" value="Belarus">Belarus</option>
                                            <option data-code="BE" value="Belgium">Belgium</option>
                                            <option data-code="BZ" value="Belize">Belize</option>
                                            <option data-code="BJ" value="Benin">Benin</option>
                                            <option data-code="BM" value="Bermuda">Bermuda</option>
                                            <option data-code="BT" value="Bhutan">Bhutan</option>
                                            <option data-code="BO" value="Bolivia">Bolivia</option>
                                            <option data-code="BA" value="Bosnia And Herzegovina">Bosnia &amp; Herzegovina</option>
                                            <option data-code="BW" value="Botswana">Botswana</option>
                                            <option data-code="BV" value="Bouvet Island">Bouvet Island</option>
                                            <option data-code="BR" value="Brazil">Brazil</option>
                                            <option data-code="IO" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option data-code="VG" value="Virgin Islands, British">British Virgin Islands</option>
                                            <option data-code="BN" value="Brunei">Brunei</option>
                                            <option data-code="BG" value="Bulgaria">Bulgaria</option>
                                            <option data-code="BF" value="Burkina Faso">Burkina Faso</option>
                                            <option data-code="BI" value="Burundi">Burundi</option>
                                            <option data-code="KH" value="Cambodia">Cambodia</option>
                                            <option data-code="CM" value="Republic of Cameroon">Cameroon</option>
                                            <option data-code="CA" value="Canada">Canada</option>
                                            <option data-code="CV" value="Cape Verde">Cape Verde</option>
                                            <option data-code="KY" value="Cayman Islands">Cayman Islands</option>
                                            <option data-code="CF" value="Central African Republic">Central African Republic</option>
                                            <option data-code="TD" value="Chad">Chad</option>
                                            <option data-code="CL" value="Chile">Chile</option>
                                            <option data-code="CN" value="China">China</option>
                                            <option data-code="CX" value="Christmas Island">Christmas Island</option>
                                            <option data-code="CC" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option data-code="CO" value="Colombia">Colombia</option>
                                            <option data-code="KM" value="Comoros">Comoros</option>
                                            <option data-code="CG" value="Congo">Congo - Brazzaville</option>
                                            <option data-code="CD" value="Congo, The Democratic Republic Of The">Congo - Kinshasa</option>
                                            <option data-code="CK" value="Cook Islands">Cook Islands</option>
                                            <option data-code="CR" value="Costa Rica">Costa Rica</option>
                                            <option data-code="HR" value="Croatia">Croatia</option>
                                            <option data-code="CU" value="Cuba">Cuba</option>
                                            <option data-code="CW" value="Curaçao">Curaçao</option>
                                            <option data-code="CY" value="Cyprus">Cyprus</option>
                                            <option data-code="CZ" value="Czech Republic">Czech Republic</option>
                                            <option data-code="CI" value="Côte d'Ivoire">Côte d’Ivoire</option>
                                            <option data-code="DK" value="Denmark">Denmark</option>
                                            <option data-code="DJ" value="Djibouti">Djibouti</option>
                                            <option data-code="DM" value="Dominica">Dominica</option>
                                            <option data-code="DO" value="Dominican Republic">Dominican Republic</option>
                                            <option data-code="EC" value="Ecuador">Ecuador</option>
                                            <option data-code="EG" value="Egypt">Egypt</option>
                                            <option data-code="SV" value="El Salvador">El Salvador</option>
                                            <option data-code="GQ" value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option data-code="ER" value="Eritrea">Eritrea</option>
                                            <option data-code="EE" value="Estonia">Estonia</option>
                                            <option data-code="ET" value="Ethiopia">Ethiopia</option>
                                            <option data-code="FK" value="Falkland Islands (Malvinas)">Falkland Islands</option>
                                            <option data-code="FO" value="Faroe Islands">Faroe Islands</option>
                                            <option data-code="FJ" value="Fiji">Fiji</option>
                                            <option data-code="FI" value="Finland">Finland</option>
                                            <option data-code="FR" value="France">France</option>
                                            <option data-code="GF" value="French Guiana">French Guiana</option>
                                            <option data-code="PF" value="French Polynesia">French Polynesia</option>
                                            <option data-code="TF" value="French Southern Territories">French Southern Territories</option>
                                            <option data-code="GA" value="Gabon">Gabon</option>
                                            <option data-code="GM" value="Gambia">Gambia</option>
                                            <option data-code="GE" value="Georgia">Georgia</option>
                                            <option data-code="DE" value="Germany">Germany</option>
                                            <option data-code="GH" value="Ghana">Ghana</option>
                                            <option data-code="GI" value="Gibraltar">Gibraltar</option>
                                            <option data-code="GR" value="Greece">Greece</option>
                                            <option data-code="GL" value="Greenland">Greenland</option>
                                            <option data-code="GD" value="Grenada">Grenada</option>
                                            <option data-code="GP" value="Guadeloupe">Guadeloupe</option>
                                            <option data-code="GT" value="Guatemala">Guatemala</option>
                                            <option data-code="GG" value="Guernsey">Guernsey</option>
                                            <option data-code="GN" value="Guinea">Guinea</option>
                                            <option data-code="GW" value="Guinea Bissau">Guinea-Bissau</option>
                                            <option data-code="GY" value="Guyana">Guyana</option>
                                            <option data-code="HT" value="Haiti">Haiti</option>
                                            <option data-code="HM" value="Heard Island And Mcdonald Islands">Heard &amp; McDonald Islands</option>
                                            <option data-code="HN" value="Honduras">Honduras</option>
                                            <option data-code="HK" value="Hong Kong">Hong Kong SAR China</option>
                                            <option data-code="HU" value="Hungary">Hungary</option>
                                            <option data-code="IS" value="Iceland">Iceland</option>
                                            <option data-code="IN" value="India">India</option>
                                            <option data-code="ID" value="Indonesia">Indonesia</option>
                                            <option data-code="IR" value="Iran, Islamic Republic Of">Iran</option>
                                            <option data-code="IQ" value="Iraq">Iraq</option>
                                            <option data-code="IE" value="Ireland">Ireland</option>
                                            <option data-code="IM" value="Isle Of Man">Isle of Man</option>
                                            <option data-code="IL" value="Israel">Israel</option>
                                            <option data-code="IT" value="Italy">Italy</option>
                                            <option data-code="JM" value="Jamaica">Jamaica</option>
                                            <option data-code="JP" value="Japan">Japan</option>
                                            <option data-code="JE" value="Jersey">Jersey</option>
                                            <option data-code="JO" value="Jordan">Jordan</option>
                                            <option data-code="KZ" value="Kazakhstan">Kazakhstan</option>
                                            <option data-code="KE" value="Kenya">Kenya</option>
                                            <option data-code="KI" value="Kiribati">Kiribati</option>
                                            <option data-code="XK" value="Kosovo">Kosovo</option>
                                            <option data-code="KW" value="Kuwait">Kuwait</option>
                                            <option data-code="KG" value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option data-code="LA" value="Lao People's Democratic Republic">Laos</option>
                                            <option data-code="LV" value="Latvia">Latvia</option>
                                            <option data-code="LB" value="Lebanon">Lebanon</option>
                                            <option data-code="LS" value="Lesotho">Lesotho</option>
                                            <option data-code="LR" value="Liberia">Liberia</option>
                                            <option data-code="LY" value="Libyan Arab Jamahiriya">Libya</option>
                                            <option data-code="LI" value="Liechtenstein">Liechtenstein</option>
                                            <option data-code="LT" value="Lithuania">Lithuania</option>
                                            <option data-code="LU" value="Luxembourg">Luxembourg</option>
                                            <option data-code="MO" value="Macao">Macau SAR China</option>
                                            <option data-code="MK" value="Macedonia, Republic Of">Macedonia</option>
                                            <option data-code="MG" value="Madagascar">Madagascar</option>
                                            <option data-code="MW" value="Malawi">Malawi</option>
                                            <option data-code="MY" value="Malaysia">Malaysia</option>
                                            <option data-code="MV" value="Maldives">Maldives</option>
                                            <option data-code="ML" value="Mali">Mali</option>
                                            <option data-code="MT" value="Malta">Malta</option>
                                            <option data-code="MQ" value="Martinique">Martinique</option>
                                            <option data-code="MR" value="Mauritania">Mauritania</option>
                                            <option data-code="MU" value="Mauritius">Mauritius</option>
                                            <option data-code="YT" value="Mayotte">Mayotte</option>
                                            <option data-code="MX" value="Mexico">Mexico</option>
                                            <option data-code="MD" value="Moldova, Republic of">Moldova</option>
                                            <option data-code="MC" value="Monaco">Monaco</option>
                                            <option data-code="MN" value="Mongolia">Mongolia</option>
                                            <option data-code="ME" value="Montenegro">Montenegro</option>
                                            <option data-code="MS" value="Montserrat">Montserrat</option>
                                            <option data-code="MA" value="Morocco">Morocco</option>
                                            <option data-code="MZ" value="Mozambique">Mozambique</option>
                                            <option data-code="MM" value="Myanmar">Myanmar (Burma)</option>
                                            <option data-code="NA" value="Namibia">Namibia</option>
                                            <option data-code="NR" value="Nauru">Nauru</option>
                                            <option data-code="NP" value="Nepal">Nepal</option>
                                            <option data-code="NL" value="Netherlands">Netherlands</option>
                                            <option data-code="AN" value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option data-code="NC" value="New Caledonia">New Caledonia</option>
                                            <option data-code="NZ" value="New Zealand">New Zealand</option>
                                            <option data-code="NI" value="Nicaragua">Nicaragua</option>
                                            <option data-code="NE" value="Niger">Niger</option>
                                            <option data-code="NG" value="Nigeria">Nigeria</option>
                                            <option data-code="NU" value="Niue">Niue</option>
                                            <option data-code="NF" value="Norfolk Island">Norfolk Island</option>
                                            <option data-code="KP" value="Korea, Democratic People's Republic Of">North Korea</option>
                                            <option data-code="NO" value="Norway">Norway</option>
                                            <option data-code="OM" value="Oman">Oman</option>
                                            <option data-code="PK" value="Pakistan">Pakistan</option>
                                            <option data-code="PS" value="Palestinian Territory, Occupied">Palestinian Territories</option>
                                            <option data-code="PA" value="Panama">Panama</option>
                                            <option data-code="PG" value="Papua New Guinea">Papua New Guinea</option>
                                            <option data-code="PY" value="Paraguay">Paraguay</option>
                                            <option data-code="PE" value="Peru">Peru</option>
                                            <option data-code="PH" value="Philippines">Philippines</option>
                                            <option data-code="PN" value="Pitcairn">Pitcairn Islands</option>
                                            <option data-code="PL" value="Poland">Poland</option>
                                            <option data-code="PT" value="Portugal">Portugal</option>
                                            <option data-code="QA" value="Qatar">Qatar</option>
                                            <option data-code="RE" value="Reunion">Réunion</option>
                                            <option data-code="RO" value="Romania">Romania</option>
                                            <option data-code="RU" value="Russia">Russia</option>
                                            <option data-code="RW" value="Rwanda">Rwanda</option>
                                            <option data-code="SX" value="Sint Maarten">Saint Martin</option>
                                            <option data-code="WS" value="Samoa">Samoa</option>
                                            <option data-code="SM" value="San Marino">San Marino</option>
                                            <option data-code="ST" value="Sao Tome And Principe">São Tomé &amp; Príncipe</option>
                                            <option data-code="SA" value="Saudi Arabia">Saudi Arabia</option>
                                            <option data-code="SN" value="Senegal">Senegal</option>
                                            <option data-code="RS" value="Serbia">Serbia</option>
                                            <option data-code="SC" value="Seychelles">Seychelles</option>
                                            <option data-code="SL" value="Sierra Leone">Sierra Leone</option>
                                            <option data-code="SG" value="Singapore">Singapore</option>
                                            <option data-code="SK" value="Slovakia">Slovakia</option>
                                            <option data-code="SI" value="Slovenia">Slovenia</option>
                                            <option data-code="SB" value="Solomon Islands">Solomon Islands</option>
                                            <option data-code="SO" value="Somalia">Somalia</option>
                                            <option data-code="ZA" value="South Africa">South Africa</option>
                                            <option data-code="GS" value="South Georgia And The South Sandwich Islands">South Georgia &amp; South Sandwich Islands</option>
                                            <option data-code="KR" value="South Korea">South Korea</option>
                                            <option data-code="SS" value="South Sudan">South Sudan</option>
                                            <option data-code="ES" value="Spain">Spain</option>
                                            <option data-code="LK" value="Sri Lanka">Sri Lanka</option>
                                            <option data-code="BL" value="Saint Barthélemy">St. Barthélemy</option>
                                            <option data-code="SH" value="Saint Helena">St. Helena</option>
                                            <option data-code="KN" value="Saint Kitts And Nevis">St. Kitts &amp; Nevis</option>
                                            <option data-code="LC" value="Saint Lucia">St. Lucia</option>
                                            <option data-code="MF" value="Saint Martin">St. Martin</option>
                                            <option data-code="PM" value="Saint Pierre And Miquelon">St. Pierre &amp; Miquelon</option>
                                            <option data-code="VC" value="St. Vincent">St. Vincent &amp; Grenadines</option>
                                            <option data-code="SD" value="Sudan">Sudan</option>
                                            <option data-code="SR" value="Suriname">Suriname</option>
                                            <option data-code="SJ" value="Svalbard And Jan Mayen">Svalbard &amp; Jan Mayen</option>
                                            <option data-code="SZ" value="Swaziland">Swaziland</option>
                                            <option data-code="SE" value="Sweden">Sweden</option>
                                            <option data-code="CH" value="Switzerland">Switzerland</option>
                                            <option data-code="SY" value="Syria">Syria</option>
                                            <option data-code="TW" value="Taiwan">Taiwan</option>
                                            <option data-code="TJ" value="Tajikistan">Tajikistan</option>
                                            <option data-code="TZ" value="Tanzania, United Republic Of">Tanzania</option>
                                            <option data-code="TH" value="Thailand">Thailand</option>
                                            <option data-code="TL" value="Timor Leste">Timor-Leste</option>
                                            <option data-code="TG" value="Togo">Togo</option>
                                            <option data-code="TK" value="Tokelau">Tokelau</option>
                                            <option data-code="TO" value="Tonga">Tonga</option>
                                            <option data-code="TT" value="Trinidad and Tobago">Trinidad &amp; Tobago</option>
                                            <option data-code="TN" value="Tunisia">Tunisia</option>
                                            <option data-code="TR" value="Turkey">Turkey</option>
                                            <option data-code="TM" value="Turkmenistan">Turkmenistan</option>
                                            <option data-code="TC" value="Turks and Caicos Islands">Turks &amp; Caicos Islands</option>
                                            <option data-code="TV" value="Tuvalu">Tuvalu</option>
                                            <option data-code="UM" value="United States Minor Outlying Islands">U.S. Outlying Islands</option>
                                            <option data-code="UG" value="Uganda">Uganda</option>
                                            <option data-code="UA" value="Ukraine">Ukraine</option>
                                            <option data-code="AE" value="United Arab Emirates">United Arab Emirates</option>
                                            <option data-code="GB" value="United Kingdom">United Kingdom</option>
                                            <option data-code="US" value="United States">United States</option>
                                            <option data-code="UY" value="Uruguay">Uruguay</option>
                                            <option data-code="UZ" value="Uzbekistan">Uzbekistan</option>
                                            <option data-code="VU" value="Vanuatu">Vanuatu</option>
                                            <option data-code="VA" value="Holy See (Vatican City State)">Vatican City</option>
                                            <option data-code="VE" value="Venezuela">Venezuela</option>
                                            <option data-code="VN" value="Vietnam">Vietnam</option>
                                            <option data-code="WF" value="Wallis And Futuna">Wallis &amp; Futuna</option>
                                            <option data-code="EH" value="Western Sahara">Western Sahara</option>
                                            <option data-code="YE" value="Yemen">Yemen</option>
                                            <option data-code="ZM" value="Zambia">Zambia</option>
                                            <option data-code="ZW" value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="col-md-12" style="margin-bottom: 10px;">
                                    <h3 class="card-title"><i><b> * Medical Information</b></i></h3>
                            </div>
                           
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">Do you have any Medical Condition, Please Indicate if Any</label>
                                    <textarea rows="5" class="form-control" name="medical_condition_details" placeholder="Supply Detailed Information on your Medical Status">{{array_get($UserDetails,'Kyc.medical_condition_details')}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label">Are you presently undergoing any treatment?, If yes, please provide details.</label>
                                        <textarea rows="5" class="form-control" name="treatment_status" placeholder="Supply Detailed Information on your Current Treatment Status">{{array_get($UserDetails,'Kyc.treatment_status')}}</textarea>
                                    </div>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="form-label">Are you regsitered with an HMO?, If yes, please provide details.</label>
                                        <textarea rows="5" class="form-control" name="hmo_information" placeholder="Supply Detailed Information on your HMO">{{array_get($UserDetails,'Kyc.hmo_information')}}</textarea>
                                    </div>
                            </div>
                            <br><br>
                            <div class="col-md-12" style="margin-bottom: 10px; margin-top: 20px;">
                                    <h3 class="card-title"><i><b> *Nominate (2) Support Contacts</b></i></h3>
                            </div>
                           
                                <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Contact's Name</label>
                                            <input type="text" class="form-control" name="emergency_contact_name_1" value="{{array_get($UserDetails,'Kyc.emergency_contact_name_1')}}" placeholder="Enter First Choice Contact">
                                        </div>
                                </div>
                            
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="emergency_contact_num_1" value="{{array_get($UserDetails,'Kyc.emergency_contact_num_1')}}" placeholder="+234 00 000 0000">
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Contact's  Name</label>
                                            <input type="text" class="form-control" name="emergency_contact_name_2" value="{{array_get($UserDetails,'Kyc.emergency_contact_name_2')}}" placeholder="Enter First Choice Contact">
                                        </div>
                                </div>
                        
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="emergency_contact_num_2" value="{{array_get($UserDetails,'Kyc.emergency_contact_num_2')}}" placeholder="+234 00 000 0000">
                                    </div>
                                </div>
                            

                    </div>
                    <div id="user-msg"></div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> <b>Update Profile</b></button>
                    </div>
                </form>
            </div>
    
        </div>
    </div>

@endsection

@push('scripts')
<script>
    $("#user-form").submit(function (e) {
        e.preventDefault();
        submit_form('user-form', "{{ route('saveUser') }}", 'user-msg', true);
    });

     $("#profile-form").submit(function (e) {
        e.preventDefault();
        submit_form('profile-form', "{{ route('editProfile') }}", 'profile-msg', true);
    });

    
    $('#imgUpload').on('change', function(){
    inputImagePreview(this, 'profile-image');
    //AutoRefresh(400);
    toastr["success"]("You just changed your profile picture. Click Update Login Information to save to your profile");  
    });

</script>

@endpush