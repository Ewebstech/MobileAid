@extends('base')

@section('title', 'Message Inbox')

@section('content')
<div class=" content-area">
        <div class="page-header">
            <h4 class="page-title">Messages Inbox</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Messages Inbox</li>
            </ol>

        </div>
        <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-3">
                    <div class="card-body p-0 border">
                        <div class="list-group list-group-transparent mb-0 mail-inbox">
                            
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center active text-white">
                                <span class="icon mr-3"><i class="fe fe-inbox"></i></span>Inbox - Un-Read<span class="ml-auto badge badge-success">14</span>
                            </a>
            
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                <span class="icon mr-3"><i class="fe fe-alert-circle"></i></span>Archive <span class="ml-auto badge badge-danger">3</span>
                            </a>
                          
                        </div>
                    </div>

                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="">
                        <div class="card-body p-6 border">
                            <div class="inbox-body">
                                <div class="table-responsive">
                                    <table class="table table-inbox table-hover">
                                        <tbody>
                                            <tr class="unread">
                                                <td class="inbox-small-cells">
                                                    <input type="checkbox" checked class="mail-checkbox">
                                                </td>
                                                <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                                                <td class="view-message  dont-show">John Kribo</td>
                                                <td class="view-message "><strong>Commits pushed</strong> Consectetur adipisicing elit...</td>
                                                <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                                <td class="view-message  text-right">9:27 AM</td>
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