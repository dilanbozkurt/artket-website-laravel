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
	<body class="single is-preload">
		@include('navbar')
        @include('partials.vote')
		@include('partials.scripts')
		<section class="ftco-section">
			<div class="container">
				<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" style="height:max-content;" id="ftco-navbar">
	
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a href="#">{{ $post['title'] }}</a></h2>
										<p>{{ $post['description'] }}</p>
									</div>
									<div class="meta">
										<time class="published" datetime="2015-11-01">{{ $post['created_at'] }}</time>
										<a href='{{ route('profile',['id' => $user['id'] ])}}' class="author"><span class="name">{{ $user['username'] }}</span><img src="../{{ $user['imgfile_path'] }}" alt="" /></a>
									</div>
								</header>
								<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
								@foreach($text_post as $tp)
                                {!! $tp['context'] !!}
                            	@endforeach
								<footer class="post_footer">
									<ul class="actions">
										<li><a onclick="location.href='{{ route('go_to_post', ['id' => Crypt::encrypt($post->id)])}}'" class="button large">Return the post</a></li>
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
                                        <li><a href="#">Text</a></li>
                                    </ul>
                                </footer>
							</article>
							</form>

							<article  id="comments" style="visibility: hidden;padding-top:10px;" class="post">

								{{-- YORUM YAPAN USERLARI BUL POST İDLER EŞLEŞİYOR COMMENTS TABLOSUYLA
										USER TABLOSUNDAN DA YORUMU YAPAN KİŞİNİN BİLGİLERİNİ GETİR --}}

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
</section>


	</body>
</html>


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
