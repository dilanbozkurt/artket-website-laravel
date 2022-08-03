@include('admin.sidebar')

<style>
.toggle {
  align-items: center;
  border-radius: 100px;
  display: flex;
  font-weight: 700;
  margin-bottom: 16px;
}
.toggle:last-of-type {
  margin: 0;
}

.toggle__input {
  clip: rect(0 0 0 0);
  clip-path: inset(50%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}
.toggle__input:not([disabled]):active + .toggle-track, .toggle__input:not([disabled]):focus + .toggle-track {
  border: 1px solid transparent;
  box-shadow: 0px 0px 0px 2px #121943;
}
.toggle__input:disabled + .toggle-track {
  cursor: not-allowed;
  opacity: 0.7;
}

.toggle-track {
  background: #e5efe9;
  border: 1px solid #5a72b5;
  border-radius: 100px;
  cursor: pointer;
  display: flex;
  height: 30px;
  margin-right: 12px;
  position: relative;
  width: 60px;
  margin-left: 10px;
}

.toggle-indicator {
  align-items: center;
  background: #121943;
  border-radius: 24px;
  bottom: 2px;
  display: flex;
  height: 24px;
  justify-content: center;
  left: 2px;
  outline: solid 2px transparent;
  position: absolute;
  transition: 0.25s;
  width: 24px;
}

.checkMark {
  fill: #fff;
  height: 20px;
  width: 20px;
  opacity: 0;
  transition: opacity 0.25s ease-in-out;
}

.toggle__input:checked + .toggle-track .toggle-indicator {
  background: #121943;
  transform: translateX(30px);
}
.toggle__input:checked + .toggle-track .toggle-indicator .checkMark {
  opacity: 1;
  transition: opacity 0.25s ease-in-out;
}

@media screen and (-ms-high-contrast: active) {
  .toggle-track {
    border-radius: 0;
  }
}
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
          </div>
          <form action="{{ route('update_user', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
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
                <h5 class="card-title">Update User</h5>
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
                      <input type="text" class="form-control" placeholder="Username..." name="username" value="{{ $user->username }}">
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" placeholder="Email..." name='email' value="{{ $user->email }}">
                    </div>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" placeholder="First Name..." name="first_name" value="{{ $user->first_name }}">
                    </div>
                   </div>
                  <div class="col-md-6 pl-1">
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" placeholder="Last Name..." name="last_name" value="{{ $user->last_name }}">
                    </div>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" class="form-control" placeholder="Password..." name='password' value="{{ $user->password }}">
                    </div>
                  </div>
                </div>
    
    
                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <input type="submit" class="btn btn-primary btn-round" name='update' value='Update'>
                  </div>
                </div>
    
              </div>
            </div>
          </div>
        </form>

        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">Update Permissions</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    @php($i=1)
                    @if($label=='1')
                    @foreach ($admin_permissions as $adp)
                    
                    <label style="border-right: solid 5px;padding-right:5px;" class="toggle" for="{{ $adp->id }}">
                      @if($active_permission_list->contains($adp->id))
                      <input type="checkbox" class="toggle__input" id="{{ $adp->id }}" checked/>
                      @else
                        <input type="checkbox" class="toggle__input" id="{{ $adp->id }}"/>
                      @endif
                        <span class="toggle-track">
                            <span class="toggle-indicator">
                                <!-- 	This check mark is optional	 -->
                                <span class="checkMark">
                                    <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                        <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                    </svg>
                                </span>
                            </span>
                        </span>
                        {{ $adp->name }}
                    </label> 
         
                    @endforeach
                    @elseif($label=='2')
                    @foreach ($artist_permissions as $arp)
                    <label class="toggle" for="{{ $arp->id }}">
                      @if($active_permission_list->contains($arp->id))
                      <input type="checkbox" class="toggle__input" id="{{ $arp->id }}" checked/>
                      @else
                        <input type="checkbox" class="toggle__input" id="{{ $arp->id }}"/>
                      @endif
                        <span class="toggle-track">
                            <span class="toggle-indicator">
                                <!-- 	This check mark is optional	 -->
                                <span class="checkMark">
                                    <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                        <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                    </svg>
                                </span>
                            </span>
                        </span>
                        {{ $arp->name }}
                    </label>             
                    @endforeach
                    @else
                    @foreach ($prof_permissions as $pp)

                    <label class="toggle" for="{{ $pp->id }}">
                      @if($active_permission_list->contains($pp->id))
                      <input type="checkbox" class="toggle__input" id="{{ $pp->id }}" checked/>
                      @else
                        <input type="checkbox" class="toggle__input" id="{{ $pp->id }}"/>
                      @endif
                        <span class="toggle-track">
                            <span class="toggle-indicator">
                                <!-- 	This check mark is optional	 -->
                                <span class="checkMark">
                                    <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                        <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                    </svg>
                                </span>
                            </span>
                        </span>
                        {{ $pp->name }}
                    </label>
           
                    @endforeach
                    @endif
                  </div>
                </div>
              </div>
        </div>

        </div>       
      </div>
      <!--   Core JS Files   -->
      </body>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
          var per_id='';
          var role_id='';
          var value='';
          $(document).ready(function(){

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
      
              $('.toggle__input').change(function(){

                per_id = $(this).attr('id');
                role_id={{ $role[0]['id'] }};

                // var datastr = "role_id=" + role_id + "&per_id=" + per_id;
                if(per_id != "" && role_id != ""){

                  $.ajax({
                      type: "get",
                      url: "/update_permission/"+ role_id + '/' + per_id + '/' + $(this).attr('checked'),
                      data: "",
                      cache: false,
                      success: function(data){
                        location.reload(true);
                        $(this).attr('checked', false);
                      },
                    error: function (jqXHR, status, err) {
                    }
                      
                  });

                  console.log($(this).attr('checked'));
                }

              });
      
          });

        </script>
    