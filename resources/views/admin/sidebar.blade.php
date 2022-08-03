
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- CSS Files -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
  
    <link href="{{ asset('admin/assets/demo/demo.css') }}" rel="stylesheet" />

    <style>
      small{
        font-size: 100%;
      }
    </style>
  </head>
  
  <div class="wrapper ">
      <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
          <a href="https://www.creative-tim.com" class="simple-text logo-mini">
  
          </a>
          <a href="https://www.creative-tim.com" class="simple-text logo-normal">
            <img style="margin-top: -21px;height: 57px;width: 134px;" src="{{ asset('../art_logo.png') }}" width="125" height="81"/>
  
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li {{ 'dashboard' == request()->path() ? 'active' : '' }}>
              <a href='{{ route('dashboard')}}'>
                <i class="nc-icon nc-bank"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li {{ 'user_management' == request()->path() ? 'active' : '' }}>
              <a href='{{ route('user_management')}}'>
                <i class="nc-icon nc-circle-10"></i>
                <p>User Management</p>
              </a>
            </li>
            <li {{ 'post_management' == request()->path() ? 'active' : '' }}>
              <a href='{{ route('post_management')}}'>
                <i class="nc-icon nc-album-2"></i>
                <p>Post Management</p>
              </a>
            </li>
            <li {{ 'permission_management' == request()->path() ? 'active' : '' }}>
              <a href='{{ route('permission_management')}}'>
                <i class="nc-icon nc-check-2"></i>
                <p>Permission Management</p>
              </a>
            </li>
            <li {{ 'role_management' == request()->path() ? 'active' : '' }}>
              <a href='{{ route('role_management')}}'>
                <i class="nc-icon nc-badge"></i>
                <p>Role Management</p>
              </a>
            </li>
            {{-- <li {{ 'tag_management' == request()->path() ? 'active' : '' }}>
              <a href='{{ route('tag_management')}}'>
                <i class="nc-icon nc-tag-content"></i>
                <p>Tag Management</p>
              </a>
            </li> --}}
            <li {{ 'top_list_management' == request()->path() ? 'active' : '' }}>
              <a href='{{ route('top_list_management')}}'>
                <i class="nc-icon nc-bullet-list-67"></i>
                <p>Top List Management</p>
              </a>
            </li>
            <li {{ 'comment_management' == request()->path() ? 'active' : '' }}>
              <a href='{{ route('comment_management')}}'>
                <i class="nc-icon nc-caps-small"></i>
                <p>Comment Management</p>
              </a>
            </li>
            <li {{ 'contact_management' == request()->path() ? 'active' : '' }}>
              <a href='{{ route('contact_management')}}'>
                <i class="nc-icon nc-email-85"></i>
                <p>Contact Management</p>
              </a>
            </li>
            <li {{ 'spam_management' == request()->path() ? 'active' : '' }}>
              <a href='{{ route('spam_management')}}'>
                <i class="nc-icon nc-alert-circle-i"></i>
                <p>Spam Management</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <!-- <a class="navbar-brand" href="javascript:;">Title</a> -->
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <ul class="navbar-nav">
                <li class="nav-item btn-rotate dropdown">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>
                      <span class="d-lg-none d-md-block">Some Actions</span>
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('admin_logout')}}">Log Out</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
  

        <!--   Core JS Files   -->
  <script src={{ asset('admin/assets/js/core/jquery.min.js') }}></script>
  <script src={{ asset('admin/assets/js/core/popper.min.js') }}></script>
  <script src={{ asset('admin/assets/js/core/bootstrap.min.js') }}></script>
  <script src={{ asset('admin/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src={{ asset('admin/assets/js/plugins/chartjs.min.js') }}></script>
  <!--  Notifications Plugin    -->
  <script src={{ asset('admin/assets/js/plugins/bootstrap-notify.js') }}></script>
  <script src={{ asset('admin/assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript') }}></script>
  <script src={{ asset('admin/assets/demo/demo.js') }}></script>
  <!-- Sharrre libray -->


  <script>
    $(document).ready(function() {

      $sidebar = $('.sidebar');
      $sidebar_img_container = $sidebar.find('.sidebar-background');

      $full_page = $('.full-page');

      $sidebar_responsive = $('body > .navbar-collapse');
      sidebar_mini_active = false;

      window_width = $(window).width();

      fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

      if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
          if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
              $('.fixed-plugin .dropdown').addClass('show');
          }
      
      }

      $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
          if (event.stopPropagation) {
            event.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
        }
      });

      $('.fixed-plugin .active-color span').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-active-color', new_color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('data-active-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-active-color', new_color);
        }
      });

      $('.fixed-plugin .background-color span').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-color', new_color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('filter-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-color', new_color);
        }
      });

      $('.fixed-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');


        var new_image = $(this).find("img").attr('src');

        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          $sidebar_img_container.fadeOut('fast', function() {
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $sidebar_img_container.fadeIn('fast');
          });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $full_page_background.fadeOut('fast', function() {
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            $full_page_background.fadeIn('fast');
          });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
          var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
      });

      $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function() {
        $full_page_background = $('.full-page-background');

        $input = $(this);

        if ($input.is(':checked')) {
          if ($sidebar_img_container.length != 0) {
            $sidebar_img_container.fadeIn('fast');
            $sidebar.attr('data-image', '#');
          }

          if ($full_page_background.length != 0) {
            $full_page_background.fadeIn('fast');
            $full_page.attr('data-image', '#');
          }

          background_image = true;
        } else {
          if ($sidebar_img_container.length != 0) {
            $sidebar.removeAttr('data-image');
            $sidebar_img_container.fadeOut('fast');
          }

          if ($full_page_background.length != 0) {
            $full_page.removeAttr('data-image', '#');
            $full_page_background.fadeOut('fast');
          }

          background_image = false;
        }
      });


      $('.switch-mini input').on("switchChange.bootstrapSwitch", function() {
        $body = $('body');

        $input = $(this);

        if (paperDashboard.misc.sidebar_mini_active == true) {
          $('body').removeClass('sidebar-mini');
          paperDashboard.misc.sidebar_mini_active = false;
        } else {
          $('body').addClass('sidebar-mini');
          paperDashboard.misc.sidebar_mini_active = true;
        }

        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function() {
          window.dispatchEvent(new Event('resize'));
        }, 180);

        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function() {
          clearInterval(simulateWindowResize);
        }, 1000);

      });

    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>