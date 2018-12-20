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
                        <h5 class="text-muted">Clients</h5>
                        <h2 class="count">{{isset($PatientNum) ? $PatientNum : 0 }}</h2>
                        <p><a href="{{route('viewPatients')}}"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Doctors</h5>
                        <h2 class="count">{{isset($DoctorNum) ? $DoctorNum : 0 }}</h2>
                        <p><a href="{{route('viewDoctors')}}"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Open Cases </h5>
                        <h2 class="count">{{$OpenCasesNum}}</h2>
                        <p><a href="{{route('openCases')}}"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Closed Cases </h5>
                        <h2 class="count">{{$ClosedCasesNum}}</h2>
                        <p><a href="{{route('closedCases')}}"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Messages</h5>
                        <h2 class="count">{{isset($MsgCount) ? $MsgCount : 0}}</h2>
                        <p><a href="{{route('inbox')}}"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Today Sign-Ups</h5>
                        <h2 class="count">{{isset($regToday) ? $regToday : 0}}</h2>
                        <p><a href="{{route('inbox')}}"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Silver Subscribers</h5>
                        <h2 class="count">{{isset($SilverNum) ? $SilverNum : 0}}</h2>
                        <p><a href="{{route('viewSubscribers')}}?var=Silver"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Gold Subscribers</h5>
                        <h2 class="count">{{isset($GoldNum) ? $GoldNum : 0}}</h2>
                        <p><a href="{{route('viewSubscribers')}}?var=Gold"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Titanium Subscribers</h5>
                        <h2 class="count">{{isset($TitaniumNum) ? $TitaniumNum : 0}}</h2>
                        <p><a href="{{route('viewSubscribers')}}?var=Titanium"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Diamond Subscribers</h5>
                        <h2 class="count">{{isset($DiamondNum) ? $DiamondNum : 0}}</h2>
                        <p><a href="{{route('viewSubscribers')}}?var=Diamond"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Active Subscribers</h5>
                        <h2 class="count">{{isset($ActiveUsers) ? $ActiveUsers : 0}}</h2>
                        <p><a href="{{route('viewActiveUsers')}}"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">In-Active Subscribers</h5>
                        <h2 class="count">{{isset($InActiveUsers) ? $InActiveUsers : 0}}</h2>
                        <p><a href="{{route('viewInActiveUsers')}}"><i class="fa fa-location-arrow"></i> Click To View</a></p>
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
