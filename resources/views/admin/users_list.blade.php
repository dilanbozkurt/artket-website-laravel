
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
                <div class="card">
                  <div class="card-header">

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
                    
                    @if($label == '1')
                    <h4 class="card-title"> Admins</h4>
                    @endif
                    @if($label == '2')
                    <h4 class="card-title"> Artists</h4>
                    @endif
                    @if($label == '3')
                    <h4 class="card-title"> Endustry Professionals</h4>
                    @endif


                  </div>
                  <div class="card-body">
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                      <th>Profile Image</th>
                      <th>
                        Username
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        First Name
                      </th>
                      <th>
                        Last Name
                      </th>
                      <th>
                        Gender
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>
                      <div class="col-md-2 col-2">
                      <div class="avatar" style="width:100px;height:100px;border-radius:0px;">
                          <img src="../{{ $user->imgfile_path }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                      </div>
                      </div>
                  </td>
                  <td>
                  {{ $user->username }}
                  </td>
                  <td>
                      {{ $user->email }}
                  </td>
                  <td>
                      {{ $user->first_name }}
                  </td>
                  <td>
                      {{ $user->last_name }}
                  </td>
                  <td>
                    @if($user->gender == 1)
                      Female
                    @endif
                    @if($user->gender == 2)
                    Male
                  @endif
                  </td>
                  <td class="text-right">
                    @if ($label != '1')
                      <a href='{{ route('profile',['id' => Crypt::encrypt($user->id)])}}' class="btn btn-success" >View User</a>
                    @endif
                    <a class="btn btn-primary" href="{{ route('view_update_page', ['id' => $user->id,'label'=>$label])}}">Update</a>
                    <a class="btn btn-secondary" href="{{ route('delete_user', ['id' => $user->id])}}">Delete</a>
                  </td>

                  </tr>
              @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Profile Image</th>
                    <th>
                      Username
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      First Name
                    </th>
                    <th>
                      Last Name
                    </th>
                    <th>
                      Gender
                    </th>
                    <th class="text-right">
                      Action
                    </th>
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
