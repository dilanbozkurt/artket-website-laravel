
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
                    <h4 class="card-title"> Comments</h4>
                  </div>
                  <div class="card-body">
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>Post Title</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment )
                    <tr>
                        <td>
                            <div class="col-md-2 col-2">
                            <div class="avatar" style="width:100px;height:100px;border-radius:0px;">
                                <img src="{{ $comment->imgfile_path }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                            </div>
                            </div>
                            <div class="col-md-12 col-9">
                                <a href="{{ route('profile',['id' => Crypt::encrypt($comment->users_id) ])}}"><span>@</span><i>{{ $comment->username }}</a></i>
                            </div>
                        </td>
                    
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->title }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td>
                            <a href="{{ route('go_to_post', ['id' => Crypt::encrypt($comment->posts_id)])}}" class="btn btn-success" >View Post</a>
                            <a href="{{ route('delete_comment', ['id' => $comment->id])}}" class="btn btn-danger" >Delete Comment</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>Post Title</th>
                        <th>Action</th>
                        <th>Submitted On</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
  </div>

</div>
</div>



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