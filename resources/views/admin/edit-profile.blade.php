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
                                            <p class="mb-4 label label-danger">{{$UserDetails['role']}}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label">Email-Address</label>
                                    <input class="form-control" name="email" value="{{$UserDetails['email']}}" required/>
                                    </div>
                                    <div class="form-group">
                                            <label class="form-label">Phone Number</label>
                                        <input class="form-control" name="phonenumber" value="{{$UserDetails['phonenumber']}}" readonly/>
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