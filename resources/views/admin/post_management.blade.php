@include('admin.sidebar')

<div class="content">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-align-left-2 text-warning"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Texts</p>
                  <p class="card-title">{{ $text_count }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
<a href="{{ route('list_posts', ['type' => 'text'])}}" class="btn btn-primary d-flex align-items-center justify-content-center">List Text Posts</a>
<a href="{{ route('create_post', ['type' => 'text'])}}" class="btn stats d-flex align-items-center justify-content-center">Create New</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-image text-success"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Images</p>
                  <p class="card-title">{{ $image_count }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">

<a href="{{ route('list_posts', ['type' => 'image'])}}" class="btn btn-primary d-flex align-items-center justify-content-center">List Image Posts</span></a>
<a href="{{ route('create_post', ['type' => 'image'])}}" class="btn stats d-flex align-items-center justify-content-center">Create New</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-button-play text-danger"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Videos</p>
                  <p class="card-title">{{ $video_count }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">

            <a href="{{ route('list_posts', ['type' => 'video'])}}" class="btn btn-primary d-flex align-items-center justify-content-center">List Video Posts</a>
            <a href="{{ route('create_post', ['type' => 'video'])}}" class="btn stats d-flex align-items-center justify-content-center">Create New</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-note-03 text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Audios</p>
                  <p class="card-title">{{ $audio_count }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
            <a href="{{ route('list_posts', ['type' => 'audio'])}}" class="btn btn-primary d-flex align-items-center justify-content-center">List Audio Posts</a>
            <a href="{{ route('create_post', ['type' => 'audio'])}}" class="btn stats d-flex align-items-center justify-content-center">Create New</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    