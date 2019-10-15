<!DOCTYPE html>
<html lang="en">
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/fontend/styles/bootstrap4/bootstrap.min.css">
<link href="/fontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/fontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/fontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="/fontend/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="/fontend/plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="/fontend/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="/fontend/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="/fontend/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="/fontend/styles/cart_responsive.css">
<link rel="stylesheet" type="text/css" href="/fontend/styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="/fontend/styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="/fontend/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="/fontend/styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="/fontend/styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="/fontend/styles/shop_responsive.css">
<link rel="stylesheet" type="text/css" href="/fontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
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

<script src="/fontend/js/jquery-3.3.1.min.js"></script>
<script src="/fontend/styles/bootstrap4/popper.js"></script>
<script src="/fontend/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/fontend/plugins/greensock/TweenMax.min.js"></script>
<script src="/fontend/plugins/greensock/TimelineMax.min.js"></script>
<script src="/fontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="/fontend/plugins/greensock/animation.gsap.min.js"></script>
<script src="/fontend/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="/fontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/fontend/plugins/slick-1.8.0/slick.js"></script>
<script src="/fontend/plugins/easing/easing.js"></script>
<script src="/fontend/js/custom.js"></script>
<script src="/fontend/js/cart_custom.js"></script>
<script src="/fontend/js/product_custom.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="/fontend/js/contact_custom.js"></script>
<script src="/fontend/plugins/parallax-js-master/parallax.min.js"></script>
<script src="/fontend/js/shop_custom.js"></script>
<script src="/fontend/plugins/Isotope/isotope.pkgd.min.js"></script>
</body>

</html>