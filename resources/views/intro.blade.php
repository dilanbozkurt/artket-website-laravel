<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.scripts')
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ArtKet</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="https://tasarim.phpturkiye.net/assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://tasarim.phpturkiye.net/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/intro.css') }}">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">ARTKET</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About Us</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Members</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">ARTKET</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">Where artists & endustry meet</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('sign_up') }}">Let's Start</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">The Best Way Into The Industry.</h2>
                        <hr class="divider light my-4" />
                        
                        <p class="text-white-50 mb-4">Artket is a platform for artists to showcase their art for industry members and get their work evaluated by professionals.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">MEMBERS</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-6 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Industry Professional</h3>
                            <p class="text-muted mb-0">Discover art and artist, get recommendations.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Artists</h3>
                            <p class="text-muted mb-0">Upload your art, connect with other artists and industry professionals.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="images/1.jpg">
                            <img class="img-fluid" src="images/1.jpg" alt="" />
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="images/2.jpg">
                            <img class="img-fluid" src="images/2.jpg" alt="" />
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="images/3.jpg">
                            <img class="img-fluid"src="images/3.jpg" alt="" />
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="images/4.jpg">
                            <img class="img-fluid" src="images/4.jpg" alt="" />
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="images/5.jpg">
                            <img class="img-fluid"src="images/5.jpg" alt="" />
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="images/6.jpg">
                            <img class="img-fluid" src="images/6.jpg" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to action-->
        
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Industry professionals are approved by our team personally. In most cases you will receive a notification about your application within a few weeks, if not sooner. But if you do not hear back from us in that time, feel free to contact us at <strong>support@artket.com.</strong></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+1 (555) 123-4567</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:contact@yourwebsite.com">contact@artket.com</a>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2022 - ArtKet</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="https://tasarim.phpturkiye.net/js/scripts.js"></script>
    </body>
</html>