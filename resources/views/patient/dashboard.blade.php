@extends('base')

@section('title', 'Dashboard')

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
            <div class="col-sm-12 col-lg-12 col-xl-4">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class=" wx">
                                    <h1 class="">&#8358;0.00</h1>
                                    <p class="text-muted mb-0 lead"><span class="text-green"><i class="fa fa-arrow-circle-o-up text-green"></i></span> Calling Balance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class=" wx">
                                    <h1 class="">&#8358;0.00</h1>
                                    <p class="text-muted mb-0 lead"><span class="text-red"><i class="fa fa-arrow-circle-o-down text-red"></i></span> Total Used-up</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-lg-12 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Medical Aid Stats</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <div id="echart2" class="chart-tasks dropshadow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection