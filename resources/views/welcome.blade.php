<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>myproject</title>
    
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


<!-- Stylesheets -->
<link rel="stylesheet" href="{{asset('css')}}/bootstrap.min.css"/>
<link rel="stylesheet" href="{{asset('css')}}/font-awesome.min.css"/>
<link rel="stylesheet" href="{{asset('css')}}/flaticon.css"/>
<link rel="stylesheet" href="{{asset('css')}}/slicknav.min.css"/>
<link rel="stylesheet" href="{{asset('css')}}/jquery-ui.min.css"/>
<link rel="stylesheet" href="{{asset('css')}}/owl.carousel.min.css"/>
<link rel="stylesheet" href="{{asset('css')}}/animate.css"/>
<link rel="stylesheet" href="{{asset('css')}}/style.css"/>
  
   </head>
  <body>
    <div id="app"></div>    
    <script src="{{asset('js/app.js')}}"></script>
    
	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('js')}}/jquery-3.2.1.min.js"></script>
	<script src="{{asset('js')}}/bootstrap.min.js"></script>
	<script src="{{asset('js')}}/jquery.slicknav.min.js"></script>
	<script src="{{asset('js')}}/owl.carousel.min.js"></script>
	<script src="{{asset('js')}}/jquery.nicescroll.min.js"></script>
	<script src="{{asset('js')}}/jquery.zoom.min.js"></script>
	<script src="{{asset('js')}}/jquery-ui.min.js"></script>
	<script src="{{asset('js')}}/main.js"></script>
  </body>
</html>