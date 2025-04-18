<!doctype html>
<html lang="en">

<head>
	{{-- <meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}
	{{-- <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags --> --}}

	{{-- <!-- Title  --> --}}
	{{-- <title>Branislav Radovanovic - Full Stack Web Dev.</title> --}}

	{{-- <!-- Favicon  --> --}}
	{{-- <link rel="icon" href="assets/img/favicon.png"> --}}

	{{-- <!-- ***** All CSS Files ***** --> --}}

	{{-- <!-- Style css --> --}}
	{{-- <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}"> --}}

	{{-- <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}"> --}}
	
	<meta charset="UTF-8">
	
	<!-- Dynamic Meta Tags -->
	@yield('meta_tags')
	
	<!-- Fallback/default meta tags -->
	@hasSection('meta_tags')
	@else
		<title>Branislav Radovanovic - Full Stack Web Dev.</title>
		<meta name="description" content="Professional Full Stack Web Developer specializing in Laravel, PHP, and JavaScript.">
	@endif

	<!-- Required Meta Tags -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Dynamic Schema/OG Tags -->
	@yield('head_scripts')
	
	<!-- Favicon -->
	<link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
	
	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
	
</head>

<body class="odd">


	{{-- @include('fixed.preloader') --}}
	@include('fixed.magic-cursor')


	

	


	<div id="canvas-container">
	</div>




	
	{{-- <!-- ***** Main Area Start ***** --> --}}
	<div class="main">
		{{-- <!-- ***** Header Start ***** --> --}}
		{{-- @include('fixed.header') --}}
		{{-- @yield('header') --}}

		{{-- @section('header') --}}
			<x-header />
		{{-- @endsection --}}
		{{-- <!-- ***** Header End ***** --> --}}

		{{-- <!-- ***** Main Wrapper Start ***** --> --}}
		<div id="main-wrapper" class="main-wrapper">

			
			
			
			
			
			
			@yield('content');


			
			
	

			

			@include('fixed.footer')

			{{-- <!--====== Modal Search Area Start ======--> --}}
			<div id="search" class="modal fade p-0">
				<div class="modal-dialog dialog-animated">
					<div class="modal-content h-100">
						<div class="modal-header" data-bs-dismiss="modal">
							Search <i class="far fa-times-circle icon-close"></i>
						</div>
						<div class="modal-body">

							<form class="row search-form">
								<div class="col-12 align-self-center">
									<div class="row">
										<div class="col-12 pb-3">
											<h2 class="search-title mt-0 mb-3">What are you looking for?</h2>
											<p>Enter your query now and find precisely what you seek.</p>
										</div>
									</div>
									<div class="row">
										<div class="col-12 input-group mt-md-4">
											<input type="text" placeholder="Enter your keywords">
										</div>
									</div>
									<div class="row">
										<div class="col-12 input-group align-self-center">
											<button class="btn content-btn mt-4">Search</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>


		</div>
		{{-- <!-- ***** Main Wrapper End ***** --> --}}
	</div>
	{{-- <!-- ***** Main Area End ***** --> --}}
	@include('fixed.offcanvas-nav')




   

	{{-- <!-- ***** All jQuery Plugins ***** --> --}}

	{{-- <!-- jQuery(necessary for all JavaScript plugins) --> --}}

    <script src="{{ asset("assets/js/vendor/jquery.min.js") }}"></script>

	{{-- <!-- Bootstrap js --> --}}
	<script src="{{ asset("assets/js/vendor/popper.min.js") }}"></script>
	<script src="{{ asset("assets/js/vendor/bootstrap.min.js") }}"></script>

	{{-- <!-- Plugins js --> --}}
	<script src="{{ asset("assets/js/vendor/all.min.js") }}"></script>
	<script src="{{ asset("assets/js/vendor/gsap.min.js") }}"></script>
	<script src="{{ asset("assets/js/vendor/ScrollTrigger.min.js") }}"></script>
	<script src="{{ asset("assets/js/vendor/lenis.min.js") }}"></script>
	<script src="{{ asset("assets/js/vendor/SplitType.min.js") }}"></script>
	<script src="{{ asset("assets/js/vendor/shuffle.min.js") }}"></script>
	<script src="{{ asset("assets/js/vendor/gallery.min.js") }}"></script>
	<script src="{{ asset("assets/js/vendor/slider.min.js") }}"></script>

	{{-- <!-- Main js --> --}}
	{{-- <script src="{{ asset("assets/js/main.js") }}"></script> --}}
	@yield('scripts')
	<script type="module" src="{{ asset("assets/js/stars.js") }}"></script>


</body>

</html>