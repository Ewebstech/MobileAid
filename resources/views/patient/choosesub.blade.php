@extends('base')

@section('title', 'Patients Dashboard')

@section('content')
<div class=" content-area">
        <div class="page-header">
            <h4 class="page-title">Counters</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">UI Design</a></li>
                <li class="breadcrumb-item active" aria-current="page">Time Counter</li>
            </ol>

        </div>
        <div class="row row-cards">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Time Counting From 0
                        </div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <span id="timer-countup"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Time Counting From 60 to 20
                        </div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <span id="timer-countinbetween"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Time 1 minute counter
                        </div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <span id="timer-countercallback"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Time Counting days Limit
                        </div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <span id="timer-outputpattern"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Count Downs
                        </div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="count-down" class="row center-block text-dark mt-0">
                            <div class="clock-presenter days_dash col-sm-3">
                                <div class="digit"></div>
                                <div class="digit"></div>
                                <div class="digit"></div>
                                <p class="note dash_title text-muted">Days</p>

                            </div>
                            <div class="clock-presenter hours_dash col-sm-3">
                                <div class="digit"></div>
                                <div class="digit"></div>
                                <p class="note dash_title text-muted">Hours</p>
                            </div>
                            <div class="clock-presenter minutes_dash col-sm-3">
                                <div class="digit"></div>
                                <div class="digit"></div>
                                <p class="note dash_title text-muted">Minutes</p>
                            </div>
                            <div class="clock-presenter seconds_dash col-sm-3">
                                <div class="digit"></div>
                                <div class="digit"></div>
                                <p class="note dash_title text-muted">Seconds</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Numbers counter
                        </div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5>Employess</h5>
                        <h2 class="counter">2569</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Numbers counter
                        </div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5>Profit</h5>
                        <h2 class="counter"> 2,56989.32</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Numbers counter
                        </div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5>Errors</h5>
                        <h2 class="counter">0.8998</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection