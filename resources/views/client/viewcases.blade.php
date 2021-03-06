@extends('base')

@section('title', 'My Cases')

@section('content')
	<div class=" content-area overflow-hidden">
        <div class="page-header">
            <h4 class="page-title">Cases History</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Cases</li>
            </ol>

        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">My Cases History</div>
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
                                        <th>Case ID</th>
                                        <th>Case Status</th>
                                        <th>Package</th>
                                        <th>Assigned Doctor</th>
                                        <th>Date Opened</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @define $i = 1

                                    @foreach ($Cases as $data )
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{strtoupper($data['case_id'])}}</td>
                                        <td> <?php if($data['case_status'] == "closed") { echo "<span class='label label-danger' style='font-weight: bolder; color: #fff;'><i class='fa fa-lock'></i> CLOSED</span>"; } else { echo "<span class='label label-info' style='font-weight: bolder; color: #fff; font-weight: bolder;'> <i class='fa fa-unlock'></i> OPENED</span>"; } ?></td>
                                        <td>{{$data['client_package']}}</td>
                                        <td>{{ $data['doc_name'] }}</td>
                                        <td>{{$data['Time']}}</td>
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