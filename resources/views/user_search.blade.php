<!doctype html>
<html lang="en">
  <head>

  	<title>User Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_search.css') }}">
	</head>
  <body style="background-color: #536044">
    @include('navbar')
    @include('partials.scripts')
  <section class="ftco-section">
      <div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light text-center" id="ftco-navbar">

                <div class="container d-flex justify-content-center mt-50 mb-50">
            
                    <div class="row">
                        
                        <div class="col-md-12">
          
                            <div class="form">
                              <i class="fa fa-search"></i>
                              <input type="text" id="user_search" name="user_search" class="form-control form-input" placeholder="Search user...">
                            </div>
                            
                          </div>
 
                       <div class="col-md-12" style="margin-top: 30px;" id="user_search_body">
               
                    </div>                      
                    </div>
                </div>
		  </nav>

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


        $('#user_search').on('keyup',function(){
           var value=$(this).val();

           var data='';

           if(value==''){
              data='empty';
           }else{
             data=value;
           }

            $.ajax({
                type: "post",
                url: "user_search/",
                data:"value=" + data,
                cache: false,
                success: function(data){
                  $("#user_search_body").html(data);
                  // console.log(data);
                }
            })

        });

      </script> 


</body>
</html>
