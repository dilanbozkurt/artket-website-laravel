<!doctype html>
<html lang="en">
  <head>

    @include('partials.scripts')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sign_up.css') }}" >

    <title>SIGN UP</title>
  </head>
  <body style="background-color: #536044;">
    

    <div class="container register">
      <div class="row">
          <div class="col-md-3 register-left">
            <br><br><br><br>
            <img style="margin-top: -21px;height: 57px;width: 134px; border-radius: 100px;" src="{{ asset('art_logo.png')}}" width="125" height="81"/>
              {{-- <h3 style="color: #C77951;">Welcome</h3> --}}

                <h6>The Best Artist.</h6>
                <h6>The Best Way Into The Industry.</h6>
                <br>
              
              <a class="btn btn-light btn-xl js-scroll-trigger" href="{{ route('sign_in') }}">Login</a>
          </div>
          <div class="col-md-9 register-right">
              <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Artist</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Industry</a>
                  </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <h3 class="register-heading">Apply as a Artist</h3>
                      <div class="row register-form">
                          
	                    <form action="{{ route('sign_up_post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                          <div class="col-md-12">

                          <div class="form-group">
                                Profile Image: 
                                <br><input class="form-control" class="input" type="file" name="profile_image">
			                </div>
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="Email" name="email" required>
			                </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Username" name="username" required>
			                </div>
                              <div class="form-group">
                                <input class="form-control" type="text" placeholder="First Name" name="first_name" required>
                              </div>
                              <div class="form-group">
                                <input class="form-control" type="text" placeholder="Last Name" name="last_name" required>
                              </div>
                              <div class="form-group">
				                <input class="form-control" type="password" placeholder="Password" name="password" required>
                            </div>
                              <div class="form-group">
                                  <div class="maxl">
                                      <label class="radio inline">
                                        <input  type="radio" name="gender" value="1" checked required>
                                          <span> Female </span> 
                                      </label>
                                      <label class="radio inline"> 
                                          <input type="radio" name="gender" value="2" required>
                                          <span>Male </span> 
                                      </label>
                                  </div>
                                  <input required type="checkbox"><span class="psw"> I agree to the <a href="#">Terms & Conditions</a> and <span class="psw"><a href="#">Privacy and Policy.</a></span></span>
                              </div>
                          </div>
                          <button type="submit" name="submit" class="btnRegister" value="Register Artist" >Register</button>

                      </form>
                      </div>

                  </div>
                    
                  <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <h3  class="register-heading">Apply as a Industry Professional</h3>
                      <div class="row register-form">
                      <form action="{{ route('sign_up_post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="col-md-12">
                            <div class="form-group">
                              Profile Image: 
                              <br><input class="form-control" class="input" type="file" name="profile_image" >
                    </div>
                          <div class="form-group">
                              <input class="form-control" type="email" placeholder="Email" name="email" required>
                    </div>
                          <div class="form-group">
                              <input class="form-control" type="text" placeholder="Username" name="username" required>
                    </div>
                            <div class="form-group">
                              <input class="form-control" type="text" placeholder="First Name" name="first_name" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" type="text" placeholder="Last Name" name="last_name" required>
                            </div>
                            <div class="form-group">
                      <input class="form-control" type="password" placeholder="Password" name="password" required>
                          </div>
                            <div class="form-group">
                                <div class="maxl">
                                    <label class="radio inline">
                                      <input  type="radio" name="gender" value="1" checked required>
                                        <span> Female </span> 
                                    </label>
                                    <label class="radio inline"> 
                                        <input type="radio" name="gender" value="2" required>
                                        <span>Male </span> 
                                    </label>
                                </div>
                                <input required type="checkbox"><span class="psw"> I agree to the <a href="#">Terms & Conditions</a> and <span class="psw"><a href="#">Privacy and Policy.</a></span></span>
                            </div>
                        </div>
                          <button type="submit" name="submit" class="btnRegister" value="Register Professional" >Register</button>


                      </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>


      </div>	


</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>