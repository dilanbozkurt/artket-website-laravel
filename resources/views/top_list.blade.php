<!doctype html>
<html lang="en">
  <head>

  	<title>Top List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/top_list.css') }}">

	</head>
  <body style="background-color: #536044">
    @include('navbar')
    @include('partials.scripts')
  <section class="ftco-section">
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light text-center" id="ftco-navbar">
        <div class="row">
          <div class="search-container col-md-6">
            <input id="search" name="search" type="text" placeholder="Search..." class="search-input" autofocus />
            {{-- <input id="search" type="text" name="search" placeholder="Search..." class="search-input"> --}}
            {{-- <a href="#" class="search-btn">
                    <i class="fas fa-search"></i>
            </a> --}}
          </div>

          <div class="categories col-md-6">
            <div class="" style=" margin: auto;">
                <select id="js-select-type" class="category form-control js-select-design" name="category">
                      <option data-content="Choose the category" value="0" selected>Choose the category</option>
                      <option style="background-color:#5c361a;color:white" data-content="Text" value="1" >Text</option>
                      <option style="background-color:#872f26;color:white" data-content="Image" value="2" >Image</option>
                      <option style="background-color:#c4572e;color:white" data-content="Video" value="3" >Video</option>
                      <option style="background-color:#fd933a;color:white" data-content="Audio" value="4" >Audio</option>
              </select>
            </div>
          </div>
        </div>
		  </nav>
    </div>

	</section>

    <section class="ftco-section">
		<div class="container" id="top_list_body">
            @php($i=1)
            @foreach($ordered_posts as $post)
            @if($post->is_visible=='1')
                <div class="tab-content">
                    <div class="tab-pane fade show active" role="tabpanel">
                        <div class="accordion">
                            <div class="card content_pool_item_add content_pool_item">
                                    <div class="card-header">
                                            <div class="item" style="margin: 10px">
                                                <div class="item-order fixed">
                                                    <p>{{ $i++ }}</p>
                                                </div>

                                                <a href="{{ route('go_to_post', ['id' => Crypt::encrypt($post->id)])}}" noajax="1" class="btn_toplist_play_descriptor">
                                                <div class="item-img">
                                                    @if($post->type=='text')
                                                    <img style="border:solid #5c361a 4px" src="{{ $post->image_path }}" width="125" height="81"/>
                                                    @elseif($post->type=='image')
                                                    <img style="border:solid #872f26 4px" src="{{ $post->image_path }}" width="125" height="81"/>
                                                    @elseif($post->type=='video')
                                                    <img style="border:solid #c4572e 4px" src="{{ $post->image_path }}" width="125" height="81"/>
                                                    @else
                                                    <img style="border:solid #fd933a 4px" src="{{ $post->image_path }}" width="125" height="81"/>
                                                    @endif
                                                </div>

                                                <div class="item-link">
                                                  <strong>{{ $post->title }}</strong>
                                                  <a href='{{ route('profile',['id' => Crypt::encrypt($post->user_id) ])}}'> <span style="font-size:13px;">by {{  $post->first_name  }} {{ $post->last_name }}</span></a>
                                                  <div style="display: flex" class="postcard__bar"></div>
                                                  <h6><i>Vote: {{ round($post->average,2) }}</i></h6>
                                                </div>
                                                </a>

                                                <a href="{{ route('go_to_post', ['id' => Crypt::encrypt($post->id)])}}" noajax="1" class="btn_toplist_play_descriptor">
                                                <i class="fas fa-angle-double-right"></i>
                                              </a>
                                            </div>

                                    </div>

                                </div>

                </div>
        <!-- </div> -->

    </div>

		  <!-- </nav> -->
    </div>
    @endif
    @endforeach
        </div>

	</section>

    <script>
        window.console = window.console || function(t) {};
      </script>

        <script>
        if (document.location.search.match(/type=embed/gi)) {
          window.parent.postMessage("resize", "*");
        }
      </script>

      <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var cat_id =0;
        $('#js-select-type').on('change', function(e){
          cat_id = e.target.value;

          $.ajax({
                type: "get",
                url: "top_list/" + cat_id,
                data:"",
                cache: false,
                success: function(data){
                  $("#top_list_body").html(data);
                }
            })

        });

        $('#search').on('keyup',function(){
           var value=$(this).val();

           var data='';

           if(value==''){
              data='empty';
           }else{
             data=value;
           }

            $.ajax({
                type: "post",
                url: "top_list/",
                data:"value=" + data,
                cache: false,
                success: function(data){
                  $("#top_list_body").html(data);
                  // console.log(data);
                }
            })

        });

      </script>



</body>
</html>
