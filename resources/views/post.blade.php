
<!DOCTYPE HTML>
<html>
	<head>


		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


		<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

	</head>
	<body class="is-preload">

        @if ($role->label != '1')
            @include('navbar')
        @endif

        @include('partials.scripts')
        @include('partials.vote')
        @include('partials.spam_post')
        @include('partials.repost')
        @include('partials.delete_post')

    <section class="ftco-section">
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" style="height:max-content;" id="ftco-navbar">

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Main -->
				<div id="main">

                    <div class="col-md-12">
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                          <span><b> {{ session()->get('message') }} </b></span>
                        </div>
                        @endif
                      </div>
                      
                    <form action="" method="get">
						<!-- Post -->
                        <article class="post">

                            <header>
                                <div class="title">
                                    <h2><a href="#">{{ $post['title'] }} (VOTE: {{ round($vote,2) }}%)</a></h2>
                                    <p>{{ $post['description'] }}</p>
                                </div>

                                <div class="meta">
                                    @if($user['id'] == $current_user_id)
                                    <a
                                    data-toggle="modal"
                                    data-target="#deletePostModal"
                                    ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                      </svg></a>
                                      @endif
                                    <a
                                    data-toggle="modal"
                                    data-target="#spamPostModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                                        <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                      </svg></a>

                                    <time class="published" datetime="2015-11-01">  {{ $post['created_at']}}</time>
                                    <a href='{{ route('profile',['id' => Crypt::encrypt($user['id']) ])}}' class="author"><span class="name">{{ $user['username'] }}</span><img width="25%" src="../{{ $user->imgfile_path }}" alt="" /></a>
                                </div>
                            </header>

                            @if($post->type=='text' || $post->type=='image')
                                <a href="#" class="image featured"><img src="\{{ $post['image_path'] }}" alt="" /></a>
                            @elseif($post->type=='video')
                                    <video width="100%" style="height: 500px;
                                    margin-top: -70px;" controls>
                                        @foreach ($video_posts as $vp)
                                           @if ($vp->post_id==$post->id)
                                           <source src="../{{ $vp->video_target }}" type="video/mp4">
                                           @endif
                                       @endforeach 
                                   </video>
                            @else
                            <a href="#" class="image featured"><img src="\{{ $post['image_path'] }}" alt="" /></a>
                            <div style="background-color: rgb(41, 40, 40);padding:20px 20px;">
                                <audio style="width: 100%;"  controls>
                                    @foreach ($audio_posts as $ap)
                                        @if ($ap->post_id==$post->id)
                                            <source src="../{{ $ap->audio_target }}" type="audio/mpeg">
                                        @endif
                                    @endforeach 
                                </audio>
                            </div>
                            @endif
                                                            
                            @if($post['type']=='text')
                                    @foreach($text_post as $tp)
                                        {{-- <div>{!! Str::limit($tp['context'], 60) !!}</div>  --}}
                                        <div style="max-height: 98px; overflow:hidden;">
                                        {!! $tp['context'] !!}
                                         </div>
                                    @endforeach
                                    ...
                            @endif   
                            
                            <footer class="post_footer">
                                <ul class="actions">
                                    @if($post['type']=='text')
                                        <li><a onclick="location.href='{{ route('post_next', ['id' => Crypt::encrypt($post['id'])])}}'" class="button large">Continue Reading</a></li>
                                    @endif
                                </ul>
                                <ul class="actions">
                                    <li><a onclick="makeVisible('comments')" class="button medium">Show Comments</a></li>
                                </ul>
                                @if($is_voted==true)
                                    <ul class="actions disabled">
                                        <a class="button medium"
                                        style="cursor: pointer;background:rgb(194, 80, 80)"
                                        data-toggle="modal"
                                        data-target="#voteModal">{{ __('Vote') }}</a>
                                        <li></li>
                                    </ul>
                                @else
                                <ul class="actions">
                                    <a class="button medium"
                                    style="cursor: pointer;background:rgb(95, 158, 95)"
                                    data-toggle="modal"
                                    data-target="#voteModal">{{ __('Vote') }}</a>
                                    <li></li>
                                </ul>
                                @endif

                                <ul class="stats">
                                    <li><a href="#">{{ $post['type'] }}</a></li>
                                </ul>
                                <ul class="actions">
                                    <li id="repost"><a
                                        data-toggle="modal"
                                        data-target="#repostModal">                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                      </svg></a></li>
                                </ul>
                            </footer>
                        </article>
                    </form>


                <article  id="comments" style="visibility: hidden;padding-top:10px;" class="post">
                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- Fetch Comments -->
                                        <div class="card my-4">
                                            {{-- <h5 class="card-header">Comments <span class="badge badge-dark"></span></h5> --}}
                                            <div class="card-body">
                                                <form method="post" action="{{ route('make_comment', ['id' => $post['id']])}}" enctype="multipart/form-data">
                                                    @csrf
                                                <textarea placeholder="Add a new comment..." name="comment" class="form-control"></textarea>
                                                <input style="float: right;" type="submit" name="submit" class="btn btn-dark mt-2" />
                                                </form>
                                            </div>
                                            <hr/>
                                            <div class="card-body">
                                                @foreach($comments as $comment)
                                                <blockquote class="blockquote">
                                                    <div><a href='{{ route('profile',['id' => Crypt::encrypt($comment->users_id) ])}}'>
                                                        <div d-flex flex-row mb-2><img src="../{{ $comment->imgfile_path }}" width="40" heigth="40" style="border-radius:50px;margin-right:20px;float: left;">
                                                    <div style="font-weight:bold;" class="d-flex flex-row">
                                                        
                                                        <small>{{ $comment->username }}</small>

                                                     </div></div></a>
                                                    <p class="d-flex content">{{ $comment->content}}</p></div>
                                                    <footer class="blockquote-footer" style="float: right;">{{ $comment->created_at }}</footer>
                                                </blockquote>
                                                <hr/>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                        
                                </div>
							</article>

                        </div>
					</div>
                    
                </nav>
            </div>
            @include('sweetalert::alert')
        </section>



        <script>
            function makeVisible(id){
                var x = document.getElementById(id);
                
                if (x.style.visibility === 'hidden') {
                    x.style.visibility = 'visible';
                } else {
                    x.style.visibility = 'hidden';
                }

            }
        </script>
{{-- 
        <script>// For the thumbnail demo! :]

            var count = 1
            setTimeout(demo, 500)
            setTimeout(demo, 700)
            setTimeout(demo, 900)
            setTimeout(reset, 2000)
            
            setTimeout(demo, 2500)
            setTimeout(demo, 2750)
            setTimeout(demo, 3050)
            
            
            var mousein = false
            function demo() {
               if(mousein) return
               document.getElementById('demo' + count++)
                  .classList.toggle('hover')
               
            }
            
            function demo2() {
               if(mousein) return
               document.getElementById('demo2')
                  .classList.toggle('hover')
            }
            
            function reset() {
               count = 1
               var hovers = document.querySelectorAll('.hover')
               for(var i = 0; i < hovers.length; i++ ) {
                  hovers[i].classList.remove('hover')
               }
            }
            
            document.addEventListener('mouseover', function() {
               mousein = true
               reset()
            })</script> --}}

	</body>
</html>


