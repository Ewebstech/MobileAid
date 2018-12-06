@extends('base')

@section('title', 'Dashboard')

@section('content')

<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Profile</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>

    </div>

    <div class="row">
        <div class="col-md-12">

        </div>
        <div class="col-lg-5 col-xl-4">
            <div class="card card-profile cover-image "  data-image-src="assets/images/photos/gradient1.jpg">
                <div class="card-body text-center">
                    <img class="card-profile-img" style="height: 70px; width: 70px;" src="{{$UserDetails['avatar']}}" alt="img">
                    <h3 class="mb-1 text-white">{{$UserDetails['firstname']}} {{$UserDetails['lastname']}}</h3>
                    <p class="mb-2 text-white">Client ID: {{$UserDetails['ClientId']}}</p>
                    
                    <a href="/edit-user" class="btn btn-info btn-sm mt-2" style="font-weight: bold;"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>
                </div>
            </div>
            <div class="card p-5 ">
                <div class="card-title">
                   Login Information
                </div>
                <div class="media-list">
            

                    <!-- media -->
                    <div class="media mt-1 pb-2">
                        <div class="mediaicon">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <div class="card-body p-1 ml-5">
                            <h6 class="mediafont text-dark">Email </h6><span class="d-block">{{$UserDetails['email']}}</span>
                        </div>
                        <!-- media-body -->
                    </div>
                    <!-- media -->
                    <div class="media mt-1">
                        <div class="mediaicon">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </div>
                        <div class="card-body p-1 ml-5">
                            <h6 class="mediafont text-dark">Password</h6><span class="d-block">************</span>
                        </div>
                        <!-- media-body -->
                    </div>
                    <!-- media -->
                </div>
                <!-- media-list -->
            </div>
       
        </div>
        <div class="col-lg-7 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div id="profile-log-switch">
                        <div class="fade show active " >
                            <div class="table-responsive border ">
                                <table class="table row table-borderless w-100 m-0 ">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Full Name :</strong> {{$UserDetails['firstname']}} {{$UserDetails['lastname']}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>City :</strong> {{ isset($UserDetails['Kyc']['city']) ? $UserDetails['Kyc']['city'] : "--:--"}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Country :</strong> {{ isset($UserDetails['Kyc']['country']) ? $UserDetails['Kyc']['country'] : "--:--"}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Phone :</strong> {{$UserDetails['phonenumber']}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong> Postal Code:</strong> {{ isset($UserDetails['Kyc']['postal_code']) ? $UserDetails['Kyc']['postal_code'] : "--:--"}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email Address :</strong> {{$UserDetails['email']}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                     
                        </div>
                    </div>
                </div>
            </div>
   
     
      
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    $("#user-form").submit(function (e) {
        e.preventDefault();
        submit_form('user-form', "{{ route('saveUser') }}", 'user-msg', true);
    });
</script>

@endsection