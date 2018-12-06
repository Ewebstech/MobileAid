@extends('base')

@section('title', 'Dashboard')

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
                        <h3 class="card-title">My Profile <span class="label label-success" style="color: #000; font-size: bold;">{{ $UserDetails['clientid'] }}</span></h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-2">
                                <div class="col-auto">
                                    <img class="avatar brround avatar-xl" src="{{$UserDetails['avatar']}}" alt="Avatar-img">
                                </div>
                                <div class="col">
                                    <h3 class="mb-1 ">{{$UserDetails['firstname']}} {{$UserDetails['lastname']}}</h3>
                                    <p class="mb-4 label label-danger">{{$UserDetails['Role']}}</p>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="form-label">Email-Address</label>
                            <input class="form-control" value="{{$UserDetails['email']}}" disabled/>
                            </div>
                            <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                <input class="form-control" value="{{$UserDetails['phonenumber']}}" disabled/>
                                </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" value="password" disabled/>
                            </div>
                        
                            <div class="form-footer">
                                <button class="btn btn-primary btn-block" disabled>Update Login Information</button>
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
                        <h3 class="card-title">Edit Profile </h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                      
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

@section('scripts')
<script>
    $("#user-form").submit(function (e) {
        e.preventDefault();
        submit_form('user-form', "{{ route('saveUser') }}", 'user-msg', true);
    });
</script>

@endsection