@extends('fontend.layouts.master')
@section('css')
	<link rel="stylesheet" type="text/css" href="/fontend/styles/bootstrap4/bootstrap.min.css">
	<link href="/fontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/fontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="/fontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="/fontend/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/product_styles.css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/product_responsive.css">
@endsection
@section('content')
	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						@foreach( $images as $image)
							<li data-image="/{{$image->path}}"><img src="/{{$image->path}}" alt=""></li>
						@endforeach
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected">
						@if(count($product->images) > 0)
		                	<div class="bestsellers_image"><img height="200px" width="200px" src="/{{$product->images[0]->path}}" alt=""></div>
		               @else
		                	<div><img height="150px" width="185px" src="/default.JPG" alt=""></div>
		               @endif</div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{ $product->category->name }}</div>
						<div class="product_name">{{ $product->name }}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text" style="word-break: break-all;"><p>{!! $product->content !!}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">
									<div>
										<span style="font-weight: bold">Lượt xem : <span style="color: #777">{{ $product->view_count }}</span></span>
									</div>
									<!-- Product Quantity -->
									{{-- <div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									< Product Color >
									<ul class="product_color">
										<li>
											<span>Color: </span>
											<div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
											<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

											<ul class="color_list">
												<li><div class="color_mark" style="background: #999999;"></div></li>
												<li><div class="color_mark" style="background: #b19c83;"></div></li>
												<li><div class="color_mark" style="background: #000000;"></div></li>
											</ul>
										</li>
									</ul> --}}

								</div>

								<div class="product_price">{{ number_format($product->origin_price) }} VNĐ </div>
								<div class="button_container">
									<a href="{{ route('fontend.cartadd', $product->id) }}" type="button" class="button cart_button">Add to Cart</a>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Recently Viewed</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							
							<!-- Recently Viewed Item -->
							@foreach($producttogether as $producttogethe)
								<a href="{{ route('fontend.product.product',$producttogethe->slug) }}">
									<div class="owl-item">
										<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
											@if(count($producttogethe->images) > 0)
			                                    <div class="bestsellers_image"><img height="150px" width="185px" src="/{{$producttogethe->images[0]->path}}" alt=""></div>
                                            @else
                                            	<div><img height="150px" width="185px" src="/default.JPG" alt=""></div>
                                            @endif
											<div class="viewed_content text-center">
												<div class="viewed_price">{{$producttogethe->origin_price}}</div>
												<div class="viewed_name"><a href="#">{{$producttogethe->name}}</a></div>
											</div>
											<ul class="item_marks">
												<li class="item_mark item_new">new</li>
											</ul>
										</div>
									</div>
								</a>
							@endforeach
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_2.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/fontend/images/brands_8.jpg" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="/fontend/images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script src="/fontend/js/jquery-3.3.1.min.js"></script>
	<script src="/fontend/styles/bootstrap4/popper.js"></script>
	<script src="/fontend/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="/fontend/plugins/greensock/TweenMax.min.js"></script>
	<script src="/fontend/plugins/greensock/TimelineMax.min.js"></script>
	<script src="/fontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="/fontend/plugins/greensock/animation.gsap.min.js"></script>
	<script src="/fontend/plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="/fontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="/fontend/plugins/easing/easing.js"></script>
	<script src="/fontend/js/product_custom.js"></script>
@endsection
