@extends('base')

@section('title', 'Choose Subscriptions')

@section('content')
<div class="content-area text-center">
        <div class="page-header" style="margin-bottom: -10px;">
            <h4 class="page-title">2MA Subscription Packages</h4>
         
        </div>
            
            <div class="col-md-12 col-md-offset-3 text-center" style="font-weight: bold;" id="packagesuccess"></div>
        
            <div class="row row-cards ">
                @foreach ($Packages as $package)
                <div class="col-md-3 col-xs-6" >
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    @if( $package['Title'] == "Silver")
                                    <span style="text-align: center; padding: 4px; font-weight: bold; margin-bottom: 10px;"><img src="/images/santa.png" style='max-height: 40px;'/></span><br>
                                    @endif
                                   
                                    <span style="text-align: center; padding: 4px; font-weight: bold; margin-bottom: 10px;">{{$package['Title']}} Package</span><br>
                                <span style="text-align: center; padding: 4px; font-weight: bold; margin-bottom: 10px;">
                                    <?php if($package['Title'] == "Silver") { echo"(<span style='text-decoration: line-through;'>&#8358; 2,000</span>) (&#8358; $package[Price]) "; } else { 
                                        ?>(&#8358; {{ number_format($package['Price']) }}) 
                                    <?php } ?></span><br>
                                    <img src="images/{{ strtolower($package['Title']) }}package.png" style="max-height: 80px; margin-top: 10px;" />
                                </div>
                                <div style="margin-top: 15px;" class="text-center">
                                    <form id="{{$package['Title']}}Form">
                                   
                                    <input type="hidden" name="package" value="{{strtolower($package['Title'])}}" />
                                    <input type="hidden" name="client_id" value="{{$ClientId}}" />
                                    <input type="hidden" name="view" value="1" />
                                    </form>
                                    <button type="submit" id="{{$package['Title']}}" class="btn btn-pill btn-green selectpackage" data-formname="{{$package['Title']}}Form" data-package="{{$package['Title']}}" data-clientid="{{$ClientId}}" style="font-weight: bold;" {{ ($package['Title'] != 'Silver') ? 'disabl' : '' }}><i class="fa fa-check-square"></i> SELECT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        
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
                   //setTimeout("location.href = '/renewal?s';",6000);

                }
            });
			});
</script>
@endpush