<!doctype html>
<html lang="en">
  <head>


  	<title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>


<body style="background-color: #536044">
    @if ($role_current->label != '1')
        @include('navbar')
    @endif
    @include('partials.spam_user')
<section class="ftco-section">
    <div class="container">
        <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" style="height:max-content;" id="ftco-navbar">
            <div  class="row" style="width: 100%;
            height: 100%;
            object-fit: cover;
            margin: 0px;">
                <div class="col-md-12 mx-auto">

                    <div class="col-md-16">
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                          <span><b> {{ session()->get('message') }} </b></span>
                        </div>
                        @endif
                      </div>

                    <div class="bg-white shadow rounded overflow-hidden">
                        <div class="px-4 pt-0 pb-4 cover">
                          <div class="media align-items-end profile-head">
                              
                              <div class="profile mr-3"><img src="../{{ $user['imgfile_path'] }}" alt="..." width="130" class="rounded mb-2 img-thumbnail">
                                @if($role_current->label == '1')
                                <div  class="btn btn-outline-dark btn-sm btn-block">{{ $role->name }}</div>
                                </div>
                                @else
                                @if($user['id'] == $current_user_id)
                                <a href='{{ route('update_profile')}}' id="follow_id" class="btn btn-outline-dark btn-sm btn-block">Update</a></div>
                                  @elseif ($is_follower == 1)
                                  <a href='{{ route('unfollow',['id' => $user['id']])}}' id="follow_id" class="btn btn-outline-dark btn-sm btn-block">Unfollow</a></div>
                                  @elseif($is_follower == 0)
                                  <a href='{{ route('follow',['id' => $user['id']])}}' id="follow_id" class="btn btn-outline-dark btn-sm btn-block">Follow</a></div>
                                  @endif
                                @endif

                                @if($role_current->label != '1')
                                <div class="btn btn-outline-dark btn-sm">
                                    <a
                                    data-toggle="modal"
                                    data-target="#spamModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                      </svg>
                                  </a>
                                </div>

                                <div style="margin-left: 10px;" class="btn btn-outline-dark btn-sm">
                                    <a href="{{ route('chat')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                          </svg>
                                  </a>
                        
                                </div>
                                @endif

                              <div class="media-body mb-5 text-white">
                                  <h4 class="mt-0 mb-0">{{ $user['first_name'] }} {{ $user['last_name'] }} </h4>
                                  <p class="small mb-4" style="color: black;"> <i class="fas fa-map-marker-alt mr-2"></i>{{ $user['username'] }}</p>
                              </div>
                          </div>
                        </div>
                        <!-- show post number -->
                        <div class="bg-light p-4 d-flex justify-content-end text-center">
                            <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#profile-timeline" class="active nav-link">
                                    <div class="nav-field">Timeline</div>
                                </a>
                                </li>
                                @if($role->label != '3')
                                    <li class="nav-item">
                                    <a href='{{ route('profile_post',['id' => Crypt::encrypt($user['id'])])}}'  class="nav-link">
                                        <div class="nav-field">Posts</div>
                                        <div class="nav-value">{{ $num_of_posts }}</div>
                                    </a>
                                    </li>
                                @endif
                                <!--show following and follower  -->
                                <li class="nav-item">
                                    <a href='{{ route('followers_list',['id' => Crypt::encrypt($user['id'])]) }}' class="nav-link">
                                        <div class="nav-field">Followers</div>
                                        <div class="nav-value">{{ $num_of_followers }}</div>
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="{{ route('followings_list',['id' => Crypt::encrypt($user['id'])]) }}" class="nav-link">
                                        <div class="nav-field">Following</div>
                                        <div class="nav-value">{{ $num_of_following }}</div>
                                    </a>
                                    </li>
                            </ul>
                        </div>
                        @if($user['id'] == $current_user_id)
                            {{-- @if($role->label != '3') --}}
                            @if($result == '1')
                            <div class="px-4 py-3">
                                <!-- <h5 class="mb-0">Create New Post</h5> -->
                                <div class="p-4 rounded shadow-sm bg-light">
                                    <div class="d-flex flex-row text-white" style="cursor: pointer;">
                                        <a class="p-4 text-center skill-block"
                                        href="{{ route('view_create_post',['type'=>'text']) }}" >
                                            <h6>Text</h6>
                                        </a>
                                        
                                        <a class="p-4 text-center skill-block"
                                        href="{{ route('view_create_post',['type'=>'image']) }}" >
                                            <h6>Image</h6>
                                        </a>

                                        <a class="p-4 text-center skill-block"
                                        href="{{ route('view_create_post',['type'=>'video']) }}" >
                                            <h6>Video</h6>
                                        </a>
                            
                                        <a class="p-4 text-center skill-block"
                                        href="{{ route('view_create_post',['type'=>'audio']) }}" >
                                            <h6>Audio</h6>
                                        </a>
                                    </div>
                                </div>
                        </div>
                            @endif
                        @endif

                        @if(!$repost_posts->isEmpty())

                        @if($role->label == '3')

                        <div class="py-4 px-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="mb-0">Reposts</h5>
                            </div>
                            <div class="row">
                            <div class="container">
                                <div class="row" style="width: 100%;
                                height: 100%;
                                object-fit: cover;
                                margin: 0px;">
                                   <div class="col-md-12">
                                      <div id="content" class="content content-full-width">
                                         <div class="profile-content">
                                            <!-- begin tab-content -->
                                            <div class="tab-content p-0">

                                            <div class="tab-pane fade  active show" id="profile-timeline">
                                                  <!-- begin timeline -->
                                                  
                                                  @include('partials.reposts')

                                                  <!-- end timeline -->
                                               </div>


                                               <!-- end #profile-post tab -->
                                            </div>
                                            <!-- end tab-content -->
                                         </div>
                                         <!-- end profile-content -->
                                      </div>
                                   </div>
                                </div>
                             </div>
                        </div>
                    </div>
                        @endif
                        @endif

                        @if(!$timeline_post->isEmpty())

                        <div class="py-4 px-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="mb-0">Timeline</h5>
                            </div>
                            <div class="row">
                            <div class="container">
                                <div class="row" style="width: 100%;
                                height: 100%;
                                object-fit: cover;
                                margin: 0px;">
                                   <div class="col-md-12">
                                      <div id="content" class="content content-full-width">
                                         <div class="profile-content">
                                            <!-- begin tab-content -->
                                            <div class="tab-content p-0">

                                            <div class="tab-pane fade  active show" id="profile-timeline">
                                                  <!-- begin timeline -->
                                                  
                                                  @include('partials.timeline')

                                                  <!-- end timeline -->
                                               </div>


                                               <!-- end #profile-post tab -->
                                            </div>
                                            <!-- end tab-content -->
                                         </div>
                                         <!-- end profile-content -->
                                      </div>
                                   </div>
                                </div>
                             </div>
                        </div>
                    </div>
                    @endif


                </div>
            </div>
  </div>
      </nav>

    </div>

    @include('sweetalert::alert')

</section>


<script src="{{ asset('js/timeline.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>