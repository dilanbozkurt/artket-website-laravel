
<!doctype html>
<html lang="en">
    @include('admin.sidebar')
  <link rel="stylesheet" href="{{ asset('admin/css/index.css') }}">

<body>

<div class="content">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-circle-10 text-warning"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Total User</p>
                  <p class="card-title">{{ $user_count }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>

          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-palette text-success"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Total post</p>
                  <p class="card-title">{{ $post_count }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>

          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-mobile text-danger"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Contact Messages</p>
                  <p class="card-title">{{ $contact_count }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-book-bookmark text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Spam Messages</p>
                  <p class="card-title">{{ $spam_count }}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card ">
          <div class="card-header ">
            <h5 class="card-title">Post Types Statistics</h5>
          </div>
          <div class="card-body ">
            <canvas id="chartEmail"></canvas>
          </div>
          <div class="card-footer ">
            <div class="legend">
              <i class="fa fa-circle" style="color: #5c361a"></i> Text Post
              <i class="fa fa-circle" style="color: #872f26"></i> Image Post
              <i class="fa fa-circle" style="color: #c4572e"></i> Video Post
              <i class="fa fa-circle" style="color: #fd933a"></i> Audio Post
            </div>
            <hr>
            <div class="stats">
              <i class="fa fa-calendar"></i> Number of created post types
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-title">User Type Enrollment</h5>
          </div>
          <div class="card-body">
            <canvas id="speedChart" width="400" height="100"></canvas>
          </div>
          <div class="card-footer">
            <div class="chart-legend">
              <i class="fa fa-circle" style="color: green"></i> Artist
              <i class="fa fa-circle" style="color: #5c361a"></i> Endustry Professional
            </div>
            <hr />
            <div class="card-stats">
              <i class="fa fa-check"></i> Data information certified
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    var text_c = {!! json_encode($text_count) !!};
    var image_c = {!! json_encode($image_count) !!};
    var video_c = {!! json_encode($video_count) !!};
    var audio_c = {!! json_encode($audio_count) !!};
  </script>


</body>

</html>