
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.sidebar')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    
</head>

<body class="">
          <div class="content">
            <div class="row">
              <div class="col-md-12">

                <div class="col-md-12">
                    @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show">
                      <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                      </button>
                      <span><b> {{ session()->get('message') }} </b></span>
                    </div>
                    @endif
                  </div>

                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Contact Messages</h4>
                  </div>
                  <div class="card-body">
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Sending Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contact_messages as $cm )
                    <tr>
                        <td>
                            {{ $cm->username }}
                        </td>
                    
                        <td>{{ $cm->name }}</td>
                        <td>{{ $cm->email }}</td>
                        <td>{{ $cm->phone }}</td>
                        <td>{{ $cm->message }}</td>
                        <td>{{ $cm->created_at }}</td>
                        <td>
                            <a href="{{ route('view_message', ['id' => $cm->id])}}" class="btn btn-success" >View Message</a>
                            <a href="{{ route('delete_message', ['id' => $cm->id])}}" class="btn btn-danger" >Delete Message</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Sending Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
  </div>

</div>
</div>



@include('sweetalert::alert')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

</body>

</html>