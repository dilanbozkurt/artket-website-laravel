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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sign_up.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >


    <title>SIGN IN</title>
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
              
              <a class="btn btn-light btn-xl js-scroll-trigger" href="{{ route('sign_up') }}">Sign Up</a>
          </div>
          <div class="col-md-9 register-right">
              <div class="tab-content" id="myTabContent">
  
                      <h3 class="register-heading">LOGIN</h3>
                      <div class="row register-form">
                          
                      <div class="col-md-12">
                          @if (session()->has('message'))
                          <div class="alert alert-danger alert-dismissible fade show">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <span><b> {{ session()->get('message') }} </b></span>
                          </div>
                          @endif
                      </div>
	                    <form action="{{ route('sign_in_to_explore')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                          <div class="col-md-12">

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
			                      </div>
                              <div class="form-group">
				                      <input type="password" class="form-control" placeholder="Password" name="password" id="myInput" required> 
                              <input type="checkbox" onclick="checkPassword()"><span> Show Password</span>
                              <br>
                              
                            </div>

                              
                            <span style="border: solid 1px;padding:5px;border-radius:5px;" class="psw">Forgot <a href="#">password?</a></span>
                          </div>
                          <button type="submit" name="submit" class="btnRegister" value="Login as an Artist" >Login</button>


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
  
    <script>
      function checkPassword() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>
  </body>
</html>