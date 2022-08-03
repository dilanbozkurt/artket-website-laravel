
<!doctype html>
<html lang="en">

<head>
    @include('admin.sidebar')
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


  </head>



    <body>

      <div class="content">        
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
              <span><b> Post is updated! </b></span>
            </div>
          </div>
          <form action="{{ route('update_post', ['id' => $post->id])}}" method="POST" enctype="multipart/form-data">
            @csrf

          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Update Post</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 px-1">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" placeholder="Title..." name="title" value="{{ $post->title }}">
                    </div>
                  </div>
                  <div class="col-md-12 pl-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                      <textarea class="form-control" placeholder="Description..." cols="40" rows="5" name='description'>{{ $post->description }}</textarea>
                    </div>
                  </div>

                  <div class="col-md-12 user-profile card card-user text-center">
                    <div class="card-block text-center text-white">
                        <img style="width: 50%" id="file-ip-1-preview" src="../{{ $post->image_path }}" alt="Post-Image">
                        <br>
                        <br>
                      <h6 class="f-w-600">Change picture</h6>
                      <input type="file" class="form-control" name="post_image" onchange="showPreview(event);">

                    </div>
                  </div>

                  @if($post->type=='text')
                  <div class="col-md-12 bg-c-lite-green user-profile card card-user">
                    <div class="text-center text-white">
                      <h6 class="f-w-600">Change Text Context</h6>
                      @foreach($text_post as $tp)
                      <p><textarea id="summernote" name="context">{{ $tp->context }}</textarea></p>
                        @endforeach
                    </div>
                  </div>
                  @endif

                  @if($post->type=='video')
                  <div class="col-md-12 user-profile card card-user">
                    <div class="text-center text-white">
                      <video width="100%" height="100%"  id="video-file-ip-1-preview" controls>
                                @foreach ($video_post as $vp)
                                    @if ($vp->post_id==$post->id)
                                    <source src="../{{ $vp->video_target }}" type="video/mp4">
                                    @endif
                                @endforeach 
                        </video>

                        <br>
                        <br>

                        <input type="file" class="form-control" name="videoToUpload" id="videoToUpload" onchange="showVideoPreview(event);">
                    </div>
                  </div>
                  @endif

                  @if($post->type=='audio')
                  <div class="col-md-12 bg-c-lite-green user-profile card card-user">
                    <div class="text-center text-white">
                        <audio style="width: 70%;" id="audio-file-ip-1-preview"  controls>
                            @foreach ($audio_post as $ap)
                                @if ($ap->post_id==$post->id)
                                    <source src="../{{ $ap->audio_target }}" type="audio/mpeg">
                                @endif
                            @endforeach 
                        </audio>

                        <br>
                        <br>

                        <h6 class="f-w-600">Change Audio File</h6>
                        <input type="file" class="form-control" name="audioToUpload" id="audioToUpload" onchange="showAudioPreview(event);">
                    </div>
                  </div>
                  @endif

                </div>

                <br>
                <br>
    
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <input type="submit" class="btn btn-primary btn-round" name='update' value='Update'>
                  </div>
                </div>
    
              </div>
            </div>
          </div>

        </form>

        </div>       
      </div>

      <script>
        $('#summernote').summernote({
          placeholder: 'POST CONTEXT',
          tabsize: 2,
          height: 500
        });
    
    
    </script>

      <script type="text/javascript">
        function showPreview(event){
        if(event.target.files.length > 0){
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
        }
      }

      function showVideoPreview(event){
        if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var video_preview = document.getElementById("video-file-ip-1-preview");
      video_preview.src = src;
            }
        }

        function showAudioPreview(event){
        if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var audio_preview = document.getElementById("audio-file-ip-1-preview");
      audio_preview.src = src;
            }
        }
      </script>
      
      <!--   Core JS Files   -->
      </body>

      </html>


    

    