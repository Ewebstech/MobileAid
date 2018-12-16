@extends('base')

@section('title', 'My Transactions')

@section('content')
	<div class=" content-area overflow-hidden">
        <div class="page-header">
            <h4 class="page-title">Transaction History</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
            </ol>

        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">My Transaction History</div>
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
                                        <th>Trans Ref.</th>
                                        <th>Status</th>
                                        <th>Package</th>
                                        <th>Amount</th>
                                        <th>Trans. Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @define $i = 1

                                    @foreach ($Trans as $data )
                                    <tr>
                                        <td>{{$i}}</td>
                                        
                                        <td>{{$data['transref']}}</td>
                                        <td> <?php if($data['status'] == "success") { echo "<span class='label label-success' style='font-weight: bolder; color: #000;'>$data[status]</span>"; } else { echo "<span class='label label-danger'>$data[status]</span>"; } ?></td>
                                        <td>{{$data['package']}}</td>
                                        <td>{{$data['currency']}} {{ number_format($data['amount']) }}</td>
                                        <td>{{$data['created_at']}}</td>
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