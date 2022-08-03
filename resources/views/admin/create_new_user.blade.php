@include('admin.sidebar')


  <style>

    .bg-c-lite-green {
        background: linear-gradient(to right, #ee5a6f, #f29263)
    }
    
    .user-profile {
        padding: 20px 0
    }
    
    .card-block {
        padding: 1.25rem
    }
    
    .m-b-25 {
        margin-bottom: 25px
    }
    
    .img-radius {
        border-radius: 5px;
    
    }
    .f-w-600 {
        font-weight: 600
    }

    form{
      display: flex;
      width: 100%;
    }
    </style>

    <body>

      <div class="content">        
        <div class="row">
          <div class="col-md-12">
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
              <span><b> {{ session()->get('message') }} </b></span>
            </div>
            @endif
            @if (session()->has('fail_message'))
            <div class="alert alert-danger alert-dismissible fade show">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
              <span><b> {{ session()->get('fail_message') }} </b></span>
            </div>
          </div>
          @endif
          </div>
          <form action="{{ route('create_user', ['label' => $label])}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="col-md-4 bg-c-lite-green user-profile card card-user">
            <div class="card-block text-center text-white">
              <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>  
              <h6 class="f-w-600">Choose a profile picture</h6>
              <input type="file" class="form-control" name="profile_image">
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Create New User</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-5 pr-1">
                    <div class="form-group">
                      <label>Role</label>
                      @if ($label == '1') 
                      <input type="text" class="form-control" disabled="" value="Admin">
                      @endif
                      @if ($label == '2') 
                      <input type="text" class="form-control" disabled="" value="Artist">
                      @endif
                      @if ($label == '3') 
                      <input type="text" class="form-control" disabled="" value="Endustry Professional">
                      @endif
                    </div>
                  </div>
                  <div class="col-md-3 px-1">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" placeholder="Username..." name="username">
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" placeholder="Email..." name='email'>
                    </div>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" placeholder="First Name..." name="first_name">
                    </div>
                   </div>
                  <div class="col-md-6 pl-1">
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" placeholder="Last Name..." name="last_name">
                    </div>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" placeholder="Password..." name='password'>
                    </div>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <label class="radio inline">
                      <input type="radio" name="gender" value="1" checked required>
                        <span> Female </span> 
                    </label>
                    <label class="radio inline"> 
                        <input type="radio" name="gender" value="2" required>
                        <span>Male </span> 
                    </label>
                    </div>
                  </div>
                </div>
    
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <input type="submit" class="btn btn-primary btn-round" name='create' value='Create'>
                  </div>
                </div>
    
                
              </div>
            </div>
          </div>
        </form>
        </div>       
      </div>
      <!--   Core JS Files   -->

      </body>
    