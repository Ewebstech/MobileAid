@extends('base')

@section('title', 'Clients')

@section('content')
	<div class=" content-area overflow-hidden">
        <div class="page-header">
            <h4 class="page-title">Clients Database</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clients</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Registered Clients Details</div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="hover table-bordered" style="font-size: 11px; text-align: center;" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>####</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Gender</th>
                                        <th>2MA Package</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @define $i = 1

                                    @foreach ($Patient as $patientdata )
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><img src="{{$patientdata['avatar']}}" style="height: 50px; width: 50px;"  alt="..." class="img-circle profile_img img-responsive"  /></td>
                                        <td>{{$patientdata['firstname']}} {{$patientdata['lastname']}}</td>
                                        <td>{{isset($patientdata['email']) ? $patientdata['email'] : "" }}</td>
                                        <td>{{$patientdata['phonenumber']}}</td>
                                        <td>{{$patientdata['gender']}}</td>
                                        <td>{{ isset($patientdata['package']) ? $patientdata['package'] : "--:--" }}</td>
                                    <td><a target="_blank" href="{{route('requestProfile')}}?user={{$patientdata['email']}}&type=patient"><i class="fa fa-eye"></i></a> | <a target="_blank" href="{{route('requestProfileEdit')}}?user={{$patientdata['email']}}&type=patient"><i class="fa fa-edit"></i></a> | <a href="#" data-url="{{route('trashIt')}}?table=users&cid={{$patientdata['ClientId']}}" data-fieldid="delete{{$i}}" class="deleteItem"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    @define $i++
                                    @endforeach
                                    
                                   
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    // $("#user-form").click(function (e) {
    //     e.preventDefault();
    //     submit_form('user-form', "{{ route('saveUser') }}", 'user-msg', true);
    // });

</script>

