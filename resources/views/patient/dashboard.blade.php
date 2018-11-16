@extends('base')

@section('title', 'Dashboard')

@section('content')
    <div class="content-area overflow-hidden">

        <div class="page-header">
            <h4 class="page-title">Dashboard 0444</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard 04</li>
            </ol>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-warning d-none d-lg-block" role="alert">
                    <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Hello!</strong> Uplor Please Update the Account settings or Add New Account Details.
                    <a href="editprofile.html" class="btn btn-white btn-sm float-right mr-2">Edit Profile</a>
                </div>
            </div>
        </div>

        <div class="row row-cards">
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Performed Operations</h5>
                        <h2 class="count">67</h2>
                        <p><span class="text-green"><i class="fa fa-arrow-up text-green"> </i>23% increase</span> in operations</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Progressive Impacts</h5>
                        <h2 class="count">11</h2>
                        <p><span class="text-red"><i class="fa fa-arrow-down text-red"></i> 4 lead less</span> than last weak</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Market Progress</h5>
                        <h2 class="count">93</h2>
                        <p><span class="text-green"><i class="fa fa-arrow-up text-green"></i> 3.25% less</span> than 1 yrs ago</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-body iconfont text-center">
                        <h5 class="text-muted">Active Hotpoints</h5>
                        <h2 class="count">78</h2>
                        <p><span class="text-red"><i class="fa fa-arrow-down text-red"></i> 4 new points</span> than 1hr ago</p>
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
                                    <h1 class="">$9,454</h1>
                                    <p class="text-muted mb-0 lead"><span class="text-green"><i class="fa fa-arrow-circle-o-up text-green"></i> 11%</span> Total Income</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class=" wx">
                                    <h1 class="">$379</h1>
                                    <p class="text-muted mb-0 lead"><span class="text-red"><i class="fa fa-arrow-circle-o-down text-red"></i> 3%</span> Total Expense</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-lg-12 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Unique Visitors</h3>
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

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Visit Countries</h3>
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
                                            <th class="border-top-0">Country</th>
                                            <th class="border-top-0">Visits</th>
                                            <th class="border-top-0">Imports</th>
                                            <th class="border-top-0">Exports</th>
                                            <th class="border-top-0">profit</th>
                                            <th class="border-top-0">Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Canada</td>
                                            <td>1234</td>
                                            <td><span class="text-red"><i class="fa fa-arrow-down text-red"></i> 25,623</span></td>
                                            <td><span class="text-green"><i class="fa fa-arrow-up text-green"></i> 53,623</span></td>
                                            <td>83%</td>
                                            <td class="align-content-center justify-content-center">
                                                <div class="progress h-2">
                                                    <div class="progress-bar bg-success w-65" role="progressbar" ></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Australia</td>
                                            <td>2674</td>
                                            <td><span class="text-red"><i class="fa fa-arrow-down text-red"></i> 75,325</span></td>
                                            <td><span class="text-green"><i class="fa fa-arrow-up text-green"></i> 45,625</span></td>
                                            <td>30%</td>
                                            <td>
                                                <div class="progress h-2">
                                                    <div class="progress-bar bg-primary w-30" role="progressbar" ></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Brazil</td>
                                            <td>2135</td>
                                            <td><span class="text-red"><i class="fa fa-arrow-down text-red"></i> 65,325</span></td>
                                            <td><span class="text-green"><i class="fa fa-arrow-up text-green"></i> 13,623</span></td>
                                            <td>23%</td>
                                            <td>
                                                <div class="progress h-2">
                                                    <div class="progress-bar bg-pink w-25" role="progressbar"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Mexico</td>
                                            <td>3896</td>
                                            <td><span class="text-red"><i class="fa fa-arrow-down text-red"></i> 50,623</span></td>
                                            <td><span class="text-green"><i class="fa fa-arrow-up text-green"></i> 153,623</span></td>
                                            <td>90%</td>
                                            <td>
                                                <div class="progress h-2">
                                                    <div class="progress-bar bg-warning w-90" role="progressbar" ></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>New Zealand</td>
                                            <td>4865</td>
                                            <td><span class="text-red"><i class="fa fa-arrow-down text-red"></i>  32,235</span></td>
                                            <td><span class="text-green"><i class="fa fa-arrow-up text-green"></i>  36,253</span></td>
                                            <td>50%</td>
                                            <td>
                                                <div class="progress h-2">
                                                    <div class="progress-bar bg-danger w-50" role="progressbar"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Russia</td>
                                            <td>1124</td>
                                            <td><span class="text-red"><i class="fa fa-arrow-down text-red"></i> 32,412</span></td>
                                            <td><span class="text-green"><i class="fa fa-arrow-up text-green"></i>  60,323</span></td>
                                            <td>63%</td>
                                            <td>
                                                <div class="progress h-2">
                                                    <div class="progress-bar bg-purple w-65" role="progressbar" ></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>South Africa</td>
                                            <td>2145</td>
                                            <td><span class="text-red"><i class="fa fa-arrow-down text-red"></i>  152,623</span></td>
                                            <td><span class="text-green"><i class="fa fa-arrow-up text-green"></i>  33,325</span></td>
                                            <td>13%</td>
                                            <td>
                                                <div class="progress h-2">
                                                    <div class="progress-bar bg-info w-25" role="progressbar" ></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>USA</td>
                                            <td>2345</td>
                                            <td><span class="text-red"><i class="fa fa-arrow-down text-red"></i> 32,458</span></td>
                                            <td><span class="text-green"><i class="fa fa-arrow-up text-green"></i>  40,256</span></td>
                                            <td>55%</td>
                                            <td>
                                                <div class="progress h-2">
                                                    <div class="progress-bar bg-pink w-55" role="progressbar"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="m-b0">
                                            <td>9</td>
                                            <td>UK</td>
                                            <td>2121</td>
                                            <td><span class="text-red"><i class="fa fa-arrow-down text-red"></i>  15,253</span></td>
                                            <td><span class="text-green"><i class="fa fa-arrow-up text-green"></i>  13,662</span></td>
                                            <td>83%</td>
                                            <td>
                                                <div class="progress h-2">
                                                    <div class="progress-bar bg-primary w-80" role="progressbar"></div>
                                                </div>
                                            </td>
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
@endsection