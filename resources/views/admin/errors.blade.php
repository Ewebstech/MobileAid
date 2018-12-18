<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">

    <title>Error Log</title>
  </head>
  <body style="padding: 30px;">
    <div class="table-responsive">
        <table class="table table-bordered" id="example">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Error Code</th>
                <th scope="col">Error Message</th>
                <th scope="col">Error Line</th>
                <th scope="col">User IP</th>
                <th scope="col">Request Type</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
                @define $i = 1;
                @foreach ($Errors as $error)
                @define $error = $error['error'];
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$error['error_code']}}</td>
                    <td>{{$error['error_message']}}</td>
                    <td>{{$error['error_line']}}</td>
                    <td>{{$error['ip_address']}}</td>
                    <td>{{$error['request_type']}}</td>
                    <td>{{$error['date']}}</td>
                </tr>
                @define $i = $i + 1;
                @endforeach
            </tbody>
        </table>
    </div>

    <script src=" https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
  </body>
</html>
