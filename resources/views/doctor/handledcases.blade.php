@extends('base')

@section('title', 'Closed Cases')

@section('content')
	<div class=" content-area overflow-hidden">
        <div class="page-header">
            <h4 class="page-title">Handled Cases</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Closed Cases</li>
            </ol>

        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Handled Cases Overview</div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="hover table-bordered" style="font-size: 11px; text-align: center;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Case ID</th>
                                        <th>Client's Details</th>
                                        <th>Case Status</th>
                                        <th>Package</th>
                                        <th>Assigned Doctor</th>
                                        <th>Date Opened</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @define $i = 1
                                    @foreach ($Cases as $data)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{strtoupper($data['case_id'])}}</td>
                                        <td>{{$data['client_name']}}<br><br><span class='label label-primary' style='font-size: 11px;'><i class='fa fa-phone'></i> {{$data['client_phonenumber']}}</span></td>
                                        <td> <?php if($data['report'] == null) { echo "<span class='label label-danger' style='font-weight: bolder; color: #fff;'><i class='fa fa-lock'></i> NO SAVED REPORT </span>"; } elseif(!is_null($data['report'])) { echo "<span class='label label-success' style='font-weight: bolder; color: #fff; font-weight: bolder;'> <i class='fa fa-save'></i> REPORT SAVED</span>"; } else { echo "<span class='label label-info' style='font-weight: bolder; color: #fff; font-weight: bolder;'> <i class='fa fa-unlock'></i> OPEN</span>"; } ?></td>
                                        <td>{{$data['client_package']}}</td>
                                        <td>{{ $data['doc_name'] }}</td>
                                        <td>{{$data['Time']}}</td>
                                        <td><button type="button" class="btn btn-green btn-sm" data-toggle="modal" data-name="{{$data['client_name']}}" data-target="#caseReports" data-case-id="{{$data['case_id']}}" data-report="{{$data['report']}}" data-client-name="{{$data['client_name']}}"><i class="fa fa-edit"></i> Case Report</button></td>
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
@include('includes.modals')
@push('scripts')

<script>
$('#caseReports').on('show.bs.modal', function(e) {
    var caseId = $(e.relatedTarget).data('case-id');
    var clientName = $(e.relatedTarget).data('client-name');
    var report = $(e.relatedTarget).data('report');
    $(e.currentTarget).find('input[name="caseId"]').val(caseId);
    $(e.currentTarget).find('input[name="Name"]').val(clientName);
    
    CKEDITOR.instances['textreport'].setData(report)

    $(".modal-header #clientName").html(clientName);
});
</script>

@endpush