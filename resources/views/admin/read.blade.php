@extends('base')

@section('title', 'Message Inbox')

@section('content')
<div class=" content-area">
        <div class="page-header">
            <h4 class="page-title">Read Support Message From - {{$Messages['name']}}</h4>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Message Subject: {{$Messages['subject']}}</div>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- content -->
                        <div class="content vscroll" style="max-height:300px">
                            <p>{{$Messages['message']}}</p>
                            <hr>
                            <p><b>My Contact Details:</b> <br> 
                            My Phone Number: {{$Messages['phonenumber']}}<br>
                            My Email Address: {{$Messages['email']}}
                            </p>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    // $("#user-form").click(function (e) {
    //     e.preventDefault();
    //     submit_form('user-form', "{{ route('saveUser') }}", 'user-msg', true);
    // });

</script>

@endsection