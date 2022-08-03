
<!doctype html>
<html lang="en">
    @include('admin.sidebar')
  <link rel="stylesheet" href="{{ asset('admin/css/index.css') }}">
<body>



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
      <h4 class="card-title">Top List</h4>
    </div>
    <div class="card-body">
      <ul class="list-unstyled team-members">
        @foreach($ordered_posts as $post)
        @if($post->is_visible=='1')
        <hr>
        <li>
          <div class="row">
            <div class="col-md-2 col-2">
              <div class="avatar" style="width:100px;height:100px;border-radius:0px;">
                <img src="{{ $post->image_path }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
              </div>
            </div>
            <div class="col-ms-7 col-7">
              {{ $post->title }} 
              <br />
              <span class="text-info"><small> {{ $post->description }}</small></span>
              <br />
              <br>
              <span class="text-success"><small style="font-size: 120%;">Vote: {{ $post->value }}</small></span>
            </div>
            <div class="col-md-3 col-3 text-right">
                <a href="{{ route('delete', ['id' => $post->id])}}"><btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="nc-icon nc-simple-remove"></i></btn></a>
                <a href="{{ route('go_to_post', ['id' => Crypt::encrypt($post->id)])}}"><btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="nc-icon nc-minimal-right"></i></btn></a>
            </div>
          </div>
        </li>
        <hr>
        @endif
        @endforeach
      </ul>
    </div>
  </div>
    </div>
    </div>
</div>

</body>

</html>
