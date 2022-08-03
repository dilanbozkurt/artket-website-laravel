
<!doctype html>
<html lang="en">
  <head>

  	<title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	</head>
    <body style="background-color: #536044">
        @include('navbar')
        @include('partials.scripts')
    <section class="ftco-section">
		<div class="container">
            <div class="col-md-16">
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show">
                  <span><b> {{ session()->get('message') }} </b></span>
                </div>
                @endif
              </div>
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" style="height:max-content;" id="ftco-navbar">
                <div class="container contact-form">

                    <form action="{{ route('contact_message') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                                <h3>Drop Us a Message</h3>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" placeholder="Your Phone Number" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>

                </div>
                </nav>

</div>

</section>

</body>
</html>
