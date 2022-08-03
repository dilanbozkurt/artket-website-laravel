
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
          <div id="user_spams_div" class="content">
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
                  <div style="display:table" class="card-header">
                    <h4 class="card-title"> Spam Reports</h4>
                  </div>
                  <button class="show_button" onclick="show_post_spams()">User/Post Spams</button>
                  <div  class="card-body">   
                    <h5 class="card-title">User Spams</h5>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>Delete</th>
                              <th>Reporter</th>
                              <th>Reportee</th>
                              <th>Reason</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($user_spams as $user_spam )
                          <tr>
                              <td><a href="{{ route('delete_user_spam', ['id' => $user_spam->id])}}" class="btn btn-danger" >Delete Report</a></td>
                              <td>{{ $user_spam->reporter }}</td>
                              <td>{{ $user_spam->reportee }}</td>
                              <td>{{ $user_spam->reason }}</td>
                              <td>
                                  <a href='{{ route('profile',['id' => Crypt::encrypt($user_spam->reportee)])}}' class="btn btn-success" >View User</a>
                                  {{-- DEĞİŞECEK --}}
                                  <a class="btn btn-danger" href="{{ route('delete_user', ['id' => $user_spam->reportee])}}">Delete Reportee</a>
                                
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Delete</th>
                          <th>Reporter</th>
                          <th>Reportee</th>
                          <th>Reason</th>
                          <th>Action</th>
                        </tr>
                    </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            
            </div>
            </div>
{{-- ---------------------POST SPAMS------------------------------------------------- --}}
<div id ="post_spams_div" style="display:none" class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div style="display:table" class="card-header">
          <h4 class="card-title"> Spam Reports</h4>
        </div>
        <button class="show_button" onclick="show_post_spams()">User/Post Spams</button>

        <div  class="card-body">
          <h5 class="card-title">Post Spams</h5>
          <table id="example_post" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr> 
            <th>Delete</th>
            <th>Reporter</th>
            <th>Post</th>
            <th>Reason</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($post_spams as $post_spam )
        <tr>
            <td><a href="{{ route('delete_post_spam', ['id' => $post_spam->id])}}" class="btn btn-danger" >Delete Report </a></td>
            <td>{{ $post_spam->reporter }}</td>
            <td>{{ $post_spam->reportee }}</td>
            <td>{{ $post_spam->reason }}</td>
            <td>
                <a href="{{ route('go_to_post', ['id' => Crypt::encrypt($post_spam->reportee)])}}" class="btn btn-success" >View Post</a>
                 {{-- DEĞİŞECEK --}}
                 <a class="btn btn-danger" href="{{ route('delete_post', ['id' => $post_spam->reportee])}}">Delete Post</a>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>Delete</th>
            <th>Reporter</th>
            <th>Post</th>
            <th>Reason</th>
            <th>Action</th>
          </tr>
      </tfoot>
        </table>
        </div>
      </div>
    </div>
  </div>
  </div>
{{-- -------------------------------------------------------------------------------------- --}}



@include('sweetalert::alert')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<style>
.show_button{
  width: fit-content;
  margin-left: 15px;
  background-color: rgb(59, 59, 59);
    color: white;
    border-radius: 5px;
    border: none;
    padding: 10px;
}
</style>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );


$(document).ready(function() {
    $('#example_post').DataTable();
} );

function show_post_spams() {
  var user_spams_div = document.getElementById("user_spams_div");
  var post_spams_div = document.getElementById("post_spams_div");

  if (user_spams_div.style.display === "none") {
    user_spams_div.style.display = "block";
    post_spams_div.style.display="none";
  }else {
    user_spams_div.style.display = "none";
    post_spams_div.style.display="block";
  }
}


</script>

</body>

</html>