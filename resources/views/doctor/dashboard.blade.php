@extends('base')

@section('title', 'Dashboard')

@section('content')
    <div class="content-area overflow-hidden">

        <div class="page-header" style="margin-bottom: -10px;">
            <h4 class="page-title">Doctor's Dashboard</h4>
        </div>
        @if ($EditProfile == "set")
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
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-body iconfont text-center">
                                <h5 class="text-muted">Open Cases </h5>
                                <h2 class="count">{{$OpenCasesNum}}</h2>
                                <p><a href="{{route('openCases')}}"><i class="fa fa-location-arrow"></i> Click To View</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class=" wx">
                                    <h1 class="">&#8358;0.00</h1>
                                    <p class="text-muted mb-0 lead"><span class="text-red"><i class="fa fa-smile-o text-green"></i></span> Total Earned</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-lg-12 col-xl-8">
                <div class="card">
                 
                    <div class="card-body">
                        <div class="chart-container">
                            <div class="p-3">
                                <canvas id="myGPie" width="400" height="170" class=""></canvas>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
<script>
var ctx = document.getElementById("myGPie").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Silver","Gold","Titanium","Diamond"],
        datasets: [{
            label: "Subscription Plans",
            data: {{$SubChart}},
            backgroundColor: [
                'rgb(192,192,192)',
                'rgb(212,175,55)',
                '#6a696f',
                'rgb(185, 242, 255)',
            ],
            borderColor: [
               
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@endpush