
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
                    @if($type=='text')
                      <h4 class="card-title"> Texts</h4>
                    @elseif($type=='image')
                      <h4 class="card-title"> Images</h4>
                    @elseif($type=='video')
                      <h4 class="card-title"> Videos</h4>
                    @else
                      <h4 class="card-title"> Audios</h4>
                    @endif

                  </div>
                  <div class="card-body">
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                      <th>
                        Image
                      </th>
                      <th>
                        Title
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        Vote
                      </th>
                      <th>
                        Date Created
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </tr>
                </thead>
                <tbody>
                  @php($i=0)
                  @foreach($posts as $post)
                <tr>
                  <td>
                    <div class="col-md-2 col-2">
                      <div class="avatar" style="width:100px;height:100px;border-radius:0px;">
                          <img src="../{{ $post->image_path }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                      </div>
                    </div>

                  </td>

                  <td>
                  {{ $post->title }}
                  </td>
                  <td>
                  {{ $post->description }}
                  </td>
                  <td>
                    {{ $votes[$i]}}
                  </td>

                  <td>
                  {{ $post->created_at }}
                  </td>
                  <td class="text-right">

                  <a class="btn btn-info" href="{{ route('update_post', ['id' => $post->id])}}">Update</a>
                  <a class="btn btn-danger" href="{{ route('delete_post', ['id' => $post->id])}}">Delete</a>
                  <a class="btn btn-success" href="{{ route('go_to_post', ['id' => Crypt::encrypt($post->id)])}}">View</a>
                  </td>
                  @php($i++)
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>
                      Title
                    </th>
                    <th>
                      Description
                    </th>
                    <th>
                      Vote
                    </th>
                    <th>
                      Image Path
                    </th>
                    <th>
                      Date Created
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


{{-- 
@include('admin.sidebar')

<body class="">
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    @if($type=='text')
                      <h4 class="card-title"> Texts</h4>
                    @elseif($type=='image')
                      <h4 class="card-title"> Images</h4>
                    @elseif($type=='video')
                      <h4 class="card-title"> Videos</h4>
                    @else
                      <h4 class="card-title"> Audios</h4>
                    @endif
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            Title
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Vote
                          </th>
                          <th>
                            Image Path
                          </th>
                          <th>
                            Date Created
                          </th>
                          <th class="text-right">
                            Action
                          </th>
                        </thead>
                        <tbody>
                          @php($i=0)
                            @foreach($posts as $post)
                          <tr>
                            <td>
                            {{ $post->title }}
                            </td>
                            <td>
                            {{ $post->description }}
                            </td>
                            <td>
                              {{ $votes[$i]}}
                            </td>
    
                            <td>
                            {{ $post->image_path }}
                            </td>
                            <td>
                            {{ $post->created_at }}
                            </td>
                            <td class="text-right">

                            <a class="btn btn-info" href="{{ route('update_post', ['id' => $post->id])}}">Update</a>
                            <a class="btn btn-danger" href="{{ route('delete_post', ['id' => $post->id])}}">Delete</a>
                            <a class="btn btn-success" href="{{ route('go_to_post', ['id' => Crypt::encrypt($post->id)])}}">View</a>
                            </td>
                            @php($i++)
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
    
                  </div>
                </div>
              </div>
    
        </div>
      </div>

    </body> --}}