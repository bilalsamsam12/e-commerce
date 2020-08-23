<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:57:00 GMT -->
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin login</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('backand/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('backand/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('backand/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	


	<!-- start: Favicon -->
	<link rel="shortcut icon" href="{{URL::to('backand/img/favicon.ico')}}">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url("{{URL::to('backand/img/bg-login.jpg')}}") !important; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
					</div>
					<p class="alert-danger">
						<?php 
						$message=Session::get('message');
							if($message){
								echo $message;
								Session::put('message',null);
							}
							
							?>

					</p>
				<center>	<h2>Login to your account</h2></center>
				<form class="form-horizontal" action="{{url('admin-dashboard')}}" method="post">
					{{ csrf_field()}}
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="admin_email" type="text" value="bilalsamsam12@gmail.com" placeholder="Email adress"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="admin_password" id="password" type="password" value="123456" placeholder="type password"/>
							</div>
							<div class="clearfix"></div>
							
							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3>Forgot Password?</h3>
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	
	<!-- start: JavaScript-->

    <script src="{{asset('backand/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('backand/js/jquery-migrate-1.0.0.min.js')}}"></script>
    <script src="{{asset('backand/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
    <script src="{{asset('backand/js/modernizr.js')}}"></script>
    <script src="{{asset('backand/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backand/js/jquery.cookie.js')}}"></script>
    <script src="{{asset('backand/js/excanvas.js')}}"></script>
    <script src="{{asset('backand/js/jquery.uniform.min.js')}}"></script>
     <script src="{{asset('backand/js/custom.js')}}"></script>
	<!-- end: JavaScript-->
	
</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:57:01 GMT -->
</html>
