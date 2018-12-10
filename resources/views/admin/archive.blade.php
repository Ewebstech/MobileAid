@extends('base')

@section('title', 'Message Inbox')

@section('content')
<div class=" content-area">
        <div class="page-header">
            <h4 class="page-title">Archive Inbox</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Archive Inbox</li>
            </ol>

        </div>
        <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-3">
                    <div class="card-body p-0 border">
                        <div class="list-group list-group-transparent mb-0 mail-inbox">
                            
                            <a href="{{route('inbox')}}" class="list-group-item list-group-item-action d-flex align-items-center active text-white">
                                <span class="icon mr-3"><i class="fe fe-inbox"></i></span>Inbox - UnRead <span class="ml-auto badge badge-success">{{isset($UnreadMsgCount) ? $UnreadMsgCount : 0}}</span>
                            </a>
            
                            <a href="{{route('archive')}}" class="list-group-item list-group-item-action d-flex align-items-center">
                                <span class="icon mr-3"><i class="fe fe-alert-circle"></i></span>Archive <span class="ml-auto badge badge-danger">{{isset($ReadMsgCount) ? $ReadMsgCount : 0}}</span>
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
                                            @define $i = 1
                                            @foreach ($ContactMessages as $msg)
                                            <tr class="unread">
                                                    <td class="inbox-small-cells">
                                                        {{$i}}.
                                                    </td>
                                                    <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                                                    <td class="view-message  dont-show">{{$msg['name']}}</td>
                                                    <td class="view-message"><strong>{{$msg['subject']}}</strong></td>
                                                    <td class="view-message inbox-small-cells "><i class="fa fa-clock"></i> {{$msg['sendTime']}}</td>
                                                    <td><a href="{{route('read')}}?id={{$msg['id']}}">Read Message</a></td>
                                                </tr>
                                            @define $i = $i + 1
                                            @endforeach
                                            
                                          
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