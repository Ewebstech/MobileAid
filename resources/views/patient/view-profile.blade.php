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
            <div class="card card-profile cover-image "  data-image-src="assets/images/photos/8.jpg">
                <div class="card-body text-center">
                    <img class="card-profile-img" src="assets/images/faces/male/25.jpg" alt="img">
                    <h3 class="mb-1 text-white">Rubin Carmody</h3>
                    <p class="mb-2 text-white">Web Designer</p>
                    <a class="btn btn-primary text-white btn-sm mt-2">
                        <span class="fa fa-twitter"></span> Follow
                    </a>
                    <a href="editprofile.html" class="btn btn-success btn-sm mt-2"><i class="fa fa-pencil" aria-hidden="true"></i> Edit profile</a>
                </div>
            </div>
            <div class="card p-5 ">
                <div class="card-title">
                    Contact &amp; Personal Info
                </div>
                <div class="media-list">
                    <div class="media mt-1 pb-2">
                        <div class="mediaicon">
                            <i class="fa fa-link" aria-hidden="true"></i>
                        </div>
                        <div class="card-body ml-5 p-1">
                            <h6 class="mediafont text-dark">Websites</h6><a class="d-block" href="#">http://Uplor .com</a> <a class="d-block" href="#">http://Uplor .net</a>
                        </div>
                        <!-- media-body -->
                    </div>
                    <!-- media -->

                    <!-- media -->
                    <div class="media mt-1 pb-2">
                        <div class="mediaicon">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        </div>
                        <div class="card-body p-1 ml-5">
                            <h6 class="mediafont text-dark">Email </h6><span class="d-block">rubin@info.com</span>
                        </div>
                        <!-- media-body -->
                    </div>
                    <!-- media -->
                    <div class="media mt-1">
                        <div class="mediaicon">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </div>
                        <div class="card-body p-1 ml-5">
                            <h6 class="mediafont text-dark">Twitter</h6><a class="d-block" href="#">@Uplor </a>
                        </div>
                        <!-- media-body -->
                    </div>
                    <!-- media -->
                </div>
                <!-- media-list -->
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My Story</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="body-section">
                        <h5 class="mediafont text-dark mb-1">About</h5>
                        <p class="text-muted">A brief description of you</p>
                    </div>
                    <div class="body-section">
                        <h4 class="mediafont text-dark mb-1">Introduction</h4>
                        <p class="text-muted">Put a little about yourself here so people know they've found the correct Kevin.</p>
                    </div>
                    <div class="body-section">
                        <h4 class="mediafont text-dark mb-1 ">Acheivements</h4>
                        <p class="text-muted">Examples: survived high school, have 3 kids, etc.</p>
                    </div>
                    <div class="body-section">
                        <a href="#" class="btn btn-purple btn-sm">Edit</a>
                    </div>
                </div>
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
                                            <td><strong>Full Name :</strong> Rubin Carmody</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Location :</strong> USA</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Languages :</strong> English, German, Spanish.</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Website :</strong>Uplor .com</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email :</strong> georgemestayer@Uplor .com</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone :</strong> +125 254 3562 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-5 profie-img">
                                <div class="col-md-12">
                                    <div class="media-heading">
                                    <h5><strong>Biography</strong></h5>
                                </div>
                                <p>
                                     Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus</p>
                                <p >because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter but because those who do not know how to pursue consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                                </div>
                                <img class="img-fluid rounded w-25 h-25 m-2" src="assets/images/photos/8.jpg" alt="banner image">
                                <img class="img-fluid rounded w-25 h-25 m-2" src="assets/images/photos/10.jpg" alt="banner image ">
                                <img class="img-fluid rounded w-25 h-25 m-2" src="assets/images/photos/11.jpg" alt="banner image ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card profile-info">
                <form>
                    <textarea class="form-control input-lg p-text-area  border-0" rows="2" placeholder="Whats in your mind today?"></textarea>
                </form>
                <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-info pull-right">Post</button>
                    <ul class="nav nav-pills">
                        <li><a href="#"><i class="fa fa-map-marker mr-3"></i></a></li>
                        <li><a href="#"><i class="fa fa-camera mr-3"></i></a></li>
                        <li><a href="#"><i class=" fa fa-film mr-3"></i></a></li>
                        <li><a href="#"><i class="fa fa-microphone"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="fb-user-thumb">
                            <img src="assets/images/faces/male/25.jpg" alt="" class="avatar brround avatar-md" >
                        </div>
                        <div class="ml-2">
                            <h5 class="mb-1 font-weight-semibold"><a href="#" class="#">Margarita Elina</a></h5>
                            <p>7 minutes ago near Alaska, USA</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <p class="fb-user-status">John is world famous professional photographer.  with forward thinking clients to create beautiful, honest and amazing things that bring positive results. John is world famous professional photographer.  with forward thinking clients to create beautiful, honest and amazing things that bring positive results.
                    </p>
                    <div class="fb-status-container fb-border">
                        <div class="fb-time-action">
                            <a href="#" title="Like this">Like</a>
                            <span>-</span>
                            <a href="#" title="Leave a comment">Comments</a>
                            <span>-</span>
                            <a href="#" title="Send this to friend or post it on your time line">Share</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Projects</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter border text-nowrap">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="store.html" class="text-inherit">Untrammelled prevents </a></td>
                                    <td>28 May 2018</td>
                                    <td><span class="status-icon bg-success"></span> Completed</td>
                                    <td>$56,908</td>

                                </tr>
                                <tr>
                                    <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                    <td>12 June 2018</td>
                                    <td><span class="status-icon bg-danger"></span> On going</td>
                                    <td>$45,087</td>

                                </tr>
                                <tr>
                                    <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                    <td>12 July 2018</td>
                                    <td><span class="status-icon bg-warning"></span> Pending</td>
                                    <td>$60,123</td>

                                </tr>
                                <tr>
                                    <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                    <td>14 June 2018</td>
                                    <td><span class="status-icon bg-warning"></span> Pending</td>
                                    <td>$70,435</td>

                                </tr>
                                <tr>
                                    <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                    <td>25 June 2018</td>
                                    <td><span class="status-icon bg-success"></span> Completed</td>
                                    <td>$15,987</td>

                                </tr>
                            </tbody>
                        </table>
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