@extends('base')

@section('title', 'Patients Dashboard')

@section('content')
    <div class="content-area overflow-hidden">

        <div class="page-header" style="margin-bottom: -10px;">
            <h4 class="page-title">Patient's Dashboard</h4>
        </div>
        @if ($EditProfile != "set")
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-warning d-none d-lg-block" role="alert">
                        <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">×</button>
                    Hi <strong>{{$sessiondata['firstname']}}</strong>, you have only completed 30% of your profile.
                        <a href="/edit-user" class="btn btn-white btn-sm float-right mr-2">Complete My Profile Now</a>
                    </div>
                </div>
            </div>
        @endif

        <div class="row row-cards">
            <div class="col-sm-12 col-lg-12 col-xl-5">
                <div class="row">
                    <div class="col-sm-6 col-lg-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class=" wx">
                                    <h3 class="">{{$PatientsDashboard['Calls']}}</h3>
                                    <p class="text-muted mb-0 lead"><span class="text-green"><i class="fa fa-phone-square text-green"></i></span> Call Balance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-lg-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class=" wx">
                                    <h3 class="">{{$PatientsDashboard['Package']}}</h3>
                                    <p class="text-muted mb-0 lead"><span class="text-blue"><i class="fa fa-cube"></i></span> 2MA Package </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class=" wx">
                                    <h3 class="">{{$PatientsDashboard['UserId']}}</h3>
                                    <p class="text-muted mb-0 lead"><span class="text-purple"><i class="fa fa-user text-red"></i></span> User ID</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class=" wx">
                                    <h3 class="">{{$PatientsDashboard['OpenCases']}}</h3>
                                    <p class="text-muted mb-0 lead"><span class="text-yellow"><i class="fa fa-folder-open"></i></span> Open Cases</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class=" wx">
                                    @if ($EditProfile != "set")
                                        <h3 class="">30%</h3>
                                        <p class="text-muted mb-0 lead"><span class="text-red"><i class="fa fa-list text-red"></i></span> KYC Data </p>
                                    @else
                                        <h3 class="">90% +</h3>
                                        <p class="text-muted mb-0 lead"><span class="text-green"><i class="fa fa-list text-green"></i></span> KYC Data </p>
                                    @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class=" wx">
                                    <h3 class="">{{$PatientsDashboard['ClosedCases']}}</h3>
                                    <p class="text-muted mb-0 lead"><span class="text-red"><i class="fa fa-folder text-red"></i></span> Closed Cases</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-lg-12 col-xl-7">
                <div class="card">
                    
                    <div class="card-body">
                        <div class="chart-container">
                            <img src="site/slideshow/p1.jpg" class="img-responsive" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection