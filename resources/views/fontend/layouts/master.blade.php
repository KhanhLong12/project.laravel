<!DOCTYPE html>
<html lang="en">
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('css')
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	@include('fontend.includes.header')
	
	<!-- Banner -->
	@yield('content')
	<!-- Footer -->

	@include('fontend.includes.footer')

	<!-- Copyright -->
	@include('fontend.includes.copyright')
</div>
 @yield('js')
</body>

</html>