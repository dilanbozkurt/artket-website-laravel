<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/profile_post.css') }}">
	</head>
	<body>

		<!-- Header -->
			<header id="header" style="	background-image: url('../red-green-background.jpg'); ">
				<div class="inner">
					<a href="#" class="image avatar"><img src="upload\images\arkhe-sanat-akademisi-resim-is-ogretmenligi-01.jpg" alt="" /></a>
					<h1><strong>{{ $user->first_name }} {{ $user->last_name }}</strong><br />
					{{ $user->first_name }}<br />
					you can go to the profile <a href='{{ route('profile',['id' => Crypt::encrypt($user->id) ])}}'>here</a>.</h1>
				</div>
			</header>

		<!-- Main -->
			<div id="main">
					<section id="two">
						<h2>Followings</h2>
						@if (empty($followings))
							<p>You aren't following anyone!</p>
						@else
						<div class="row">
							@foreach ($followings as $following)
							<article class="col-3 col-12-xsmall work-item">
								<a href='{{ route('profile',['id' => Crypt::encrypt($following->id) ])}}' class="image fit thumb"><img src="../{{ $following->imgfile_path }}" alt="" /></a>
								<div style="display: flex;">
									{{-- ROLE GÖRE İKON EKLE --}}
									{{-- <i class="fa fa-paint-brush" aria-hidden="true"></i> --}}
									<h3> {{ $following->username }}</h3>
								</div>
								<p>{{ $following->first_name }} {{ $following->last_name }} </p> 

								<p>{{ $role->name }}</p>

								@if($visiter_followings_list->contains($following->id))
									<a href='{{ route('unfollow',['id' => $following->id])}}' class="btn btn-outline-dark btn-sm btn-block">Unfollow</a>
								@elseif($following->id == $current_user_id)
									<a href='{{ route('profile',['id' => Crypt::encrypt($current_user_id) ])}}'>Go to profile</a>
								@else
									<a href='{{ route('follow',['id' => $following->id])}}' class="btn btn-outline-dark btn-sm btn-block">Follow</a>
								
								@endif
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