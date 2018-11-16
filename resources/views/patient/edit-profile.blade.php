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
                        <form>
                            <div class="row mb-2">
                                <div class="col-auto">
                                    <img class="avatar brround avatar-xl" src="assets/images/faces/male/25.jpg" alt="Avatar-img">
                                </div>
                                <div class="col">
                                    <h3 class="mb-1 ">Rubin Carmody</h3>
                                    <p class="mb-4 ">Administrator</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control" rows="5">On the other hand, we denounce with righteous indignation</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email-Address</label>
                                <input class="form-control" placeholder="your-email@domain.com"/>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" value="password"/>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Website</label>
                                <input class="form-control" placeholder="http://Uplor .com"/>
                            </div>
                            <div class="form-footer">
                                <button class="btn btn-primary btn-block">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control"  placeholder="Company" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" placeholder="Username" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" placeholder="Company">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" placeholder="Home Address" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" placeholder="City" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Postal Code</label>
                                    <input type="number" class="form-control" placeholder="ZIP Code">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="form-control custom-select">
                                        <option value="0">--Select--</option>
                                        <option value="1">Germany</option>
                                        <option value="2">Canada</option>
                                        <option value="3">Usa</option>
                                        <option value="4">Aus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">About Me</label>
                                    <textarea rows="5" class="form-control" placeholder="Enter About your description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add  projects And Upload</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td><a href="store.html" class="text-inherit">Untrammelled prevents </a></td>
                                    <td>28 May 2018</td>
                                    <td><span class="status-icon bg-success"></span> Completed</td>
                                    <td>$56,908</td>
                                    <td class="text-right">
                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fa fa-link"></i> Update</a>

                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                    <td>12 June 2018</td>
                                    <td><span class="status-icon bg-danger"></span> On going</td>
                                    <td>$45,087</td>
                                    <td class="text-right">
                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fa fa-link"></i> Update</a>

                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                    <td>12 July 2018</td>
                                    <td><span class="status-icon bg-warning"></span> Pending</td>
                                    <td>$60,123</td>
                                    <td class="text-right">
                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fa fa-link"></i> Update</a>

                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                    <td>14 June 2018</td>
                                    <td><span class="status-icon bg-warning"></span> Pending</td>
                                    <td>$70,435</td>
                                    <td class="text-right">
                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fa fa-link"></i> Update</a>

                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>
                                    <td>25 June 2018</td>
                                    <td><span class="status-icon bg-success"></span> Completed</td>
                                    <td>$15,987</td>
                                    <td class="text-right">
                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fa fa-link"></i> Update</a>

                                        <a class="icon" href="javascript:void(0)"></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection