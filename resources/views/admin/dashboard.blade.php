@extends('base')

@section('title', 'Dashboard')

@section('content')
<div class=" content-area overflow-hidden">
        <div class="page-header">
            <h4 class="page-title">Admin Dashboard</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin Panel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>

        </div>

        <div class="row row-cards">
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Patients</h5>
                        <h2 class="count">{{$PatientNum}}</h2>
                        <p><a href="{{route('viewPatients')}}"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Doctors</h5>
                        <h2 class="count">{{$DoctorNum}}</h2>
                        <p><a href="{{route('viewDoctors')}}"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Active Cases </h5>
                        <h2 class="count">0</h2>
                        <p><a href="#"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Messages</h5>
                        <h2 class="count">{{$MsgCount}}</h2>
                        <p><a href="#"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cards">
            <div class="col-sm-12 col-lg-12 col-xl-4">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class=" wx">
                                        <h1 class="">23</h1>
                                        <p class="text-muted mb-0 lead">Total Registrations Today</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class=" wx">
                                    <h1 class="">&#8358;9,454</h1>
                                    <p class="text-muted mb-0 lead">Transactions Today</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
            <div class="col-sm-12 col-lg-12 col-xl-8">
                    <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Doctors Status</h3>
                                <div class="card-options">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="">
                                    <div class="table_style table-responsive">
                                        <table class="table table-hover table-bordered  border mb-0">
                                            <thead>
                                                <tr>
                                                    <td class="border-top-0">#</td>
                                                    <th class="border-top-0">Name</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Cases Completed</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Dr. Adetobi Ridwan</td>
                                                    <td><span class="label label-success" style="color: #000; font-size: bold;">ONLINE</span></td>
                                                    <td><span class="text-green"><i class="fa fa-arrow-up text-green"></i></span> 14</td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Dr. Adetobi Ridwan</td>
                                                    <td><span class="label label-success" style="color: #000; font-size: bold;">OFFLINE</span></td>
                                                    <td><span class="text-green"><i class="fa fa-arrow-down text-red"></i></span> 4</td> <tr>
                                                   
                                                   
                                                </tr>
                                                <tr>
                                                        <td>3</td>
                                                        <td>Dr. Adetobi Ridwan</td>
                                                        <td><span class="label label-success" style="color: #000; font-size: bold;">OFFLINE</span></td>
                                                        <td><span class="text-green"><i class="fa fa-arrow-down text-red"></i></span> 4</td> <tr>
                                                </tr>
                                       
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
            
            </div>
        </div>
    </div>
@endsection
