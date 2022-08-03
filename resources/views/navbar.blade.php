<!DOCTYPE html>
<head>

  {{-- <style>

.ui-state-active h4,
.ui-state-active h4:visited {
    color: #26004d ;
}

.ui-menu-item{
    height: 80px;
    border: 1px solid #ececf9;
}
.ui-widget-content .ui-state-active {
    background-color: white !important;
    border: none !important;
}
.list_item_container {
    width:740px;
    height: 80px;
    float: left;
    margin-left: 20px;
}
.ui-widget-content .ui-state-active .list_item_container {
    background-color: #f5f5f5;
}
    .image {
    width: 15%;
    float: left;
    padding: 10px;
}
.image img{
    width: 80px;
    height : 60px;
}
.label{
    width: 85%;
    float:right;
    white-space: nowrap;
    overflow: hidden;
    color: rgb(124,77,255);
    text-align: left;
}
input:focus{
    background-color: #f5f5f5;
} --}}

{{-- </style> --}}

</head>

<body>
  <section class="ftco-section">
    <div class="container">
        <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href='{{ route('explore')}}'><img style="margin-top: -21px;height: 50px;width: 134px;" src="{{ asset('art_logo.png')}}" width="125" height="81"/></a>
            <div class="social-media order-lg-last">
                <p class="mb-0 d-flex">

                  {{-- FOOTER --}}
                    {{-- <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                    <a href="https://www.instagram.com/artketcom/" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a> --}}

                    <a href="{{ route('user_search')}}" class="d-flex align-items-center justify-content-center"><span class="fa fa-user"><i class="sr-only">User Search</i></span><span class="fa fa-search"><i class="sr-only">User Search</i></span></a>
                    <a href="{{ route('chat')}}" class="d-flex align-items-center justify-content-center"><span class="fa fa-paper-plane"><i class="sr-only">Direct Message</i></span></a>
                    <a href="{{ route('logout')}}" class="d-flex align-items-center justify-content-center"><span class="fa fa-sign-out"><i class="sr-only">Log Out</i></span></a>
                </p>
        </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
          </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto mr-md-3">
                <li class="nav-item {{ 'explore' == request()->path() ? 'active' : '' }}"><a href='{{ route('explore')}}' class="nav-link">Explore</a></li>
                <li class="nav-item {{ 'top_list' == request()->path() ? 'active' : '' }}"><a href='{{ route('top_list')}}' class="nav-link">Top List</a></li>
                <li class="nav-item {{ 'contact' == request()->path() ? 'active' : '' }}"><a href='{{ route('contact')}}' class="nav-link">Contact</a></li>
                <li class="nav-item {{ 'profile/{id}' == request()->path() ? 'active' : '' }}"><a href='{{ route('profile',['id' => Crypt::encrypt(Session::get('current_user_id')) ])}}' class="nav-link">Profile</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

</section>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>

<script type="text/javascript">
  $(document).ready(function(){
      $("#search").keyup(function(){
          // source: "{{ url('demos/autocompleteajax') }}",
          //     focus: function( event, ui ) {
          //     //$( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box  
          //     return false;
          // },
          // select: function( event, ui ) {
          //     window.location.href = ui.item.url;
          // }

          $search=$( "#search" ).val();
          $.ajax({
                type: "get",
                url: "demos/autocompleteajax",
                data:$search,
                cache: false,
                success: function(data){
                    // $('#messages').html(data);
                    // scrollToBottomFunc();

                    var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image"><img src="' + item.image + '" ></div><div class="label"><h4><b>' + item.title + '</b></h4></div></div></a>';
          return $( "<li></li>" )
                  .data( "item.autocomplete", item )
                  .append(inner_html)
                  .appendTo( ul );
                }
            });
      })
  });
  </script> 
</body>


