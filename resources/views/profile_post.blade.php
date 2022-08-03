<!-- POST GALLERY -->

<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('css/profile_post.css') }}">
	</head>
	<body>

		<!-- Header -->
			<header id="header" style="	background-image: url('../red-green-background.jpg'); ">
				<div class="inner">
					<a href="#" class="image avatar"><img src="upload\images\arkhe-sanat-akademisi-resim-is-ogretmenligi-01.jpg" alt="" /></a>
					<h1><strong>{{ $user->first_name }} {{ $user->last_name }}</strong><br />
					<span>@</span>{{ $user->username }}<br />
					you can go to the profile <a href='{{ route('profile',['id' => Crypt::encrypt($user->id )])}}'>here</a>.</h1>
				</div>
			</header>

		<!-- Main -->
			<div id="main">
					<section id="two">
						<h2>Posts</h2>
						@if (empty($posts))
              			<p>You have no post!</p>
            			@else
            			<div class="row">
              			@foreach ($posts as $post)
							<article class="col-6 col-12-xsmall work-item">
								<a href="{{ route('go_to_post', ['id' => Crypt::encrypt($post['id'])])}}" class="image fit thumb"><img src="../{{ $post->image_path }}" alt="" /></a>
								@if($post->type == 'image')
								<div style="display: flex"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
									<path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
									<path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
								  </svg><p style="margin-left: 5px">Image Post</p>
								</div>
								@elseif($post->type == 'text')
								<div style="display: flex"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
									<path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
									<path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
								  </svg><p style="margin-left: 5px">Text Post</p>
								</div>
								@elseif($post->type == 'video')
								<div style="display: flex"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-play" viewBox="0 0 16 16">
									<path d="M6 10.117V5.883a.5.5 0 0 1 .757-.429l3.528 2.117a.5.5 0 0 1 0 .858l-3.528 2.117a.5.5 0 0 1-.757-.43z"/>
									<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
								  </svg><p style="margin-left: 5px">Video Post</p>
								</div>
								@else
								<div style="display: flex"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-music" viewBox="0 0 16 16">
									<path d="M11 6.64a1 1 0 0 0-1.243-.97l-1 .25A1 1 0 0 0 8 6.89v4.306A2.572 2.572 0 0 0 7 11c-.5 0-.974.134-1.338.377-.36.24-.662.628-.662 1.123s.301.883.662 1.123c.364.243.839.377 1.338.377.5 0 .974-.134 1.338-.377.36-.24.662-.628.662-1.123V8.89l2-.5V6.64z"/>
									<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
								  </svg><p style="margin-left: 5px">Audio Post</p>
								</div>
								@endif
								<h3 style="margin-top: 10px">{{ $post->title }}</h3>
								<p>{{ $post->description }} </p>
							</article>
						
							@endforeach
						</div>
					  @endif
					</section>


			</div>

	</body>
</html>



<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/browser.min.js') }}"></script>
<script src="{{ asset('js/breakpoints.min.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script src="{{ asset('js/post_main.js') }}"></script>