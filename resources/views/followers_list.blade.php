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
					<a href="#" class="image avatar"><img img src="../{{ $user['imgfile_path'] }}" alt="" /></a>
          <h1><strong>{{ $user->first_name }} {{ $user->last_name }}</strong><br />
			{{ $user->username }}<br />
					you can go to the profile <a href='{{ route('profile',['id' => Crypt::encrypt($user->id )])}}'>here</a>.</h1>
				</div>
			</header>

		<!-- Main -->
			<div id="main">
				<section id="two">
					<h2>Followers</h2>
            @if (empty($followers))
              <p>You have no followers</p>
            @else
            <div class="row">
              @foreach ($followers as $follower)
                <article class="col-3 col-12-xsmall work-item">
					<a href='{{ route('profile',['id' => Crypt::encrypt($follower->id) ])}}' class="image fit thumb"><img src="../{{ $follower->imgfile_path }}" alt="" /></a>
					<h3>{{ $follower->username}}</h3>
                  <p>{{ $follower->first_name }} {{ $follower->last_name }} </p> 

				  <p>{{ $role->name }}</p>
									
								@if($visiter_followings_list->contains($follower->id))
									<a href='{{ route('unfollow',['id' => $follower->id])}}' class="btn btn-outline-dark btn-sm btn-block">Unfollow</a>
								@elseif($follower->id == $current_user_id)
									<a href='{{ route('profile',['id' => Crypt::encrypt($current_user_id) ])}}'>Go to profile</a>
								@else
									<a href='{{ route('follow',['id' => $follower->id])}}' class="btn btn-outline-dark btn-sm btn-block">Follow</a>
								
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