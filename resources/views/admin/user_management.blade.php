
<!doctype html>
<html lang="en">
    @include('admin.sidebar')
  <link rel="stylesheet" href="{{ asset('admin/css/index.css') }}">
<body>

      <!-- End Navbar -->
      <div class="content">
        <div class="row">

        <div class="col-md-4">
        <form method="post">
          <div class="card card-stats">
                <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-diamond text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Admins</p>
                      <p class="card-title">{{ $admin_count }} <p>
                    </div>
                  </div>
                </div>
              </div>
                <div class="card-footer ">
                  <hr>
                  <a href="{{ route('list_users', ['label' => '1'])}}" class="btn btn-primary d-flex align-items-center justify-content-center">List Admins</a>
                <a href="{{ route('get_create_form', ['label' => '1'])}}" class="btn d-flex align-items-center justify-content-center"><span class="fa fa-plus"><i class="sr-only">Create</i></span></a>
                </div>  
            </div>
            </form>
          </div>

          <div class="col-md-4">
        <form action="" method="post">
        <div class="card card-stats">
                <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-palette text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Artists</p>
                      <p class="card-title">{{ $artist_count }}<p>
                    </div>
                  </div>
                </div>
              </div>
                <div class="card-footer ">
                  <hr>

                  <a href="{{ route('list_users', ['label' => '2'])}}" class="btn btn-primary d-flex align-items-center justify-content-center">List Artists</a>
                  <a href="{{ route('get_create_form', ['label' => '2'])}}" class="btn d-flex align-items-center justify-content-center"><span class="fa fa-plus"><i class="sr-only">Create</i></span></a>
              </div>
            </div>
            </form>
          </div>

          
          <div class="col-md-4">
        <form action="" method="post">
          <div class="card card-stats">
                <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-briefcase-24 text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Endustry Professionals</p>
                      <p class="card-title">{{ $prof_count }}<p>
                    </div>
                  </div>
                </div>
              </div>
                <div class="card-footer ">
                  <hr>
                  <a href="{{ route('list_users', ['label' => '3'])}}" class="btn btn-primary d-flex align-items-center justify-content-center">List Professionals</a>
                <a href="{{ route('get_create_form', ['label' => '3'])}}" class="btn d-flex align-items-center justify-content-center"><span class="fa fa-plus"><i class="sr-only">Create</i></span></a>
              </div> 
                   
            </div>
            </form>
          </div>

        </div>
      </div>
  
</body>

</html>
