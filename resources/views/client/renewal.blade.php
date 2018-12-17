@extends('base')

@section('title', 'Renew Subscription')

@section('content')
<div class="content-area">
        <div class="page-header" style="margin-bottom: -10px;">
            <h4 class="page-title">Subscription Renewal / Payments</h4>
         
        </div>
            @if(Session::has('trn_error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert"> x </button>
                    <strong> {!! session('trn_error') !!}</strong>
                </div>
            @endif
            
            @if(Session::has('trn_failed'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">  x  </button>
                    <strong> {!! session('trn_success') !!}</strong>
                </div>
            @endif
            
            @if(Session::has('trn_success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">  x  </button>
                    <strong>{!! session('trn_success') !!} </strong>
                </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success col-md-6">
                    <button type="button" class="close" data-dismiss="alert">  X  </button>
                    <strong> {!! session('success') !!}</strong>
                </div>
            @endif
            

            @if (session('info'))
            <div class="alert alert-info col-md-6" >
                    <button type="button" class="close" data-dismiss="alert">  X  </button>
                    <strong> {!! session('info') !!}</strong>
                </div>
            @endif

            @if (session('failed'))
            <div class="alert alert-danger col-md-6">
                    <button type="button" class="close" data-dismiss="alert">  X  </button>
                    <strong> {!! session('failed') !!}</strong>
                </div>
            @endif
        
            <div class="row row-cards ">
                    <div class="col-md-3 col-xs-6" >
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <span style="text-align: center; padding: 4px; font-weight: bold; margin-bottom: 10px;">{{$package['Title']}} Package</span><br>
                                        <span style="text-align: center; padding: 4px; font-weight: bold; margin-bottom: 10px;">(&#8358; {{ number_format($package['Price'])}}) 
                                        @if( $package['Title'] == "Silver")
                                        <br> <span style='color:blueviolet; font-size: 12px;'> 
                                        + &#8358; {{ 0.015 * $package['Price']}} Transaction Charge</span>
                                        @endif
                                        </span><br> 
                                        <img src="images/{{ strtolower($package['Title']) }}package.png" style="max-height: 80px; margin-top: 10px;" />
                                    </div>
                                    <div style="margin-top: 15px;" class="text-center">
                                        <form id="{{$package['Title']}}Form">
                                       
                                        <input type="hidden" name="package" value="{{strtolower($package['Title'])}}" />
                                        <input type="hidden" name="client_id" value="{{$ClientId}}" />
                                        <input type="hidden" name="view" value="1" />
                                        </form>

                                        <form action="{{ url('/makepayment') }}" method="post" role="form">
                                            {{ csrf_field() }}
                                            <?php
                                                $metadata = [
                                                    'custom_fields' => [
                                                        [
                                                            'package' => $package['Title'],
                                                            'client_id' => $ClientId
                                                        ], 
                                                     ]
                                                ];
                                        
                                            ?> 
                                            <input type="hidden" name="package" value="{{ $package['Title'] }}" >
                                            <input type="hidden" name="view" value="1" />
                                            <input type="hidden" name="amount" value="{{ $package['Price'] }}" > 
                                             <input type="hidden" name="metadata" value="{{ json_encode($metadata) }}" > 
                                            <input type="image" src="images/paynow.jpg" style="max-height: 40px;">
                            
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

               
        </center>
     
    </div>
@endsection
@push('scripts')
<script>
	        // Delete Closest Item
			$(".selectpackage").click(function(){
            var package = $(this).data('package');
            var clientid = $(this).data('clientid');
            
            
            swal({
                title: 'Confirm Action',
                text: "You will be subscribed on the " + package + " package",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#30b04f',
                cancelButtonColor: '#707070',
                confirmButtonText: 'Yes, Select'
                }).then((result) => {
                if (result.value) {
                    var id = clientid;
                    var url = "{{route('selectPackage')}}";
                    var formname = $(this).data('formname');
                    //.preventDefault();
                    submit_form_no_reload(formname, url, 'packagesuccess', true);
                }
            });
			});
</script>
@endpush