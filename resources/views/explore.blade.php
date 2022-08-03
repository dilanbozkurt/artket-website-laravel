<!doctype html>
<html lang="en">
  <head>


  	<title>Explore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="post.css">-->
	<!-- <link rel="stylesheet" href="explore.css">  -->


  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

	</head>
  <body style="background-color: #536044">
    @include('navbar')
    @include('partials.scripts')
    <section class="ftco-section">
      <div class="container">
        <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light text-center" id="ftco-navbar">

            {{-- <div class="categories">    --}}
               
              {{-- <div class="row">
                <div class="col">col</div>
                <div class="col">col</div>
                <div class="col">col</div>
                <div class="col">col</div>
              </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         <div class="" style="max-width: 250px; margin: auto;"> --}}
                  <select id="js-select-type" class="category form-control js-select-design" name="category">
                        <option data-content="Choose the category" value="0" selected>Choose the category</option>
                        <option style="background-color:#5c361a;color:white" data-content="Text" value="1" >Text</option>
                        <option style="background-color:#872f26;color:white" data-content="Image" value="2" >Image</option>
                        <option style="background-color:#c4572e;color:white" data-content="Video" value="3" >Video</option>
                        <option style="background-color:#fd933a;color:white" data-content="Audio" value="4" >Audio</option>
                </select>
            {{-- </div> --}}
  
  
        </nav>
          </div>
  
    </section>

    <section class="ftco-section">
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" style="height:max-content;" id="ftco-navbar">
        
      <div class="container-fluid" id="explore-container">
    	<div class="row">
      <div class="card-columns">
        @foreach($posts as $post)
        @if($post->type=='text')
        <div class="card card-pin" style="padding: 8px;background-color:#5c361a">
        @elseif($post->type=='image')
        <div class="card card-pin" style="padding: 8px;background-color:#872f26">
        @elseif($post->type=='video')
        <div class="card card-pin" style="padding: 8px;background-color:#c4572e">
        @else
        <div class="card card-pin" style="padding: 8px;background-color:#fd933a">
        @endif
          <img class="card-img" src="{{ $post->image_path }}" alt="Card image">
          <div class="overlay">
            <h2 class="card-title title">{{ $post->title }}</h2>
            <div class="more">
              <a href="{{ route('go_to_post', ['id' => Crypt::encrypt($post->id)])}}">
                <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
            </div>
            @if (is_null($post->average))
              <div class="text-center">
                <h1 style="font-size: 64px" class="card-title title">0%</h1>
              </div>
            @else
              <div class="text-center">
                <h1 style="font-size: 64px" class="card-title title">{{ round($post->average,2)}}%</h1>
              </div>
            @endif
          </div>
        </div>
      @endforeach
            </div>
    	</div>
    </div>
		  </nav>

        </div>

        @include('sweetalert::alert')

	</section>



  <script>
          var cat_id =0;
        $('#js-select-type').on('change', function(e){
          cat_id = e.target.value;

          $.ajax({
                type: "get",
                url: "explore/" + cat_id,
                data:"",
                cache: false,
                success: function(data){
                  $("#explore-container").html(data);
                }
            })

        });
  </script>


</body>
</html>
