@extends('fontend.layouts.master')
@section('css')
	<link rel="stylesheet" type="text/css" href="/fontend/styles/bootstrap4/bootstrap.min.css">
	<link href="/fontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/fontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="/fontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="/fontend/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="/fontend/plugins/slick-1.8.0/slick.css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/responsive.css">
@endsection
@section('content')
	<div class="banner">
		<div class="banner_background" style="background-image:url(/fontend/images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img src="/fontend/images/banner_product.png" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">Kỷ nguyên mới của điện thoại</h1>
						<div class="banner_price"><span>20,500,000 đ</span>10,460,000 đ</div>
						<div class="banner_product_name">Apple Iphone 11</div>
						<div class="button banner_button"><a href="#">Mua ngay</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Characteristics -->

	<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="/fontend/images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Miễn phí vận chuyển</div>
							<div class="char_subtitle">Từ 3 triệu</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="/fontend/images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Miễn phí đổi trả</div>
							<div class="char_subtitle">Từ 1 triệu</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="/fontend/images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Thanh toán online</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="/fontend/images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Giảm giá trong tuần</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								
								<!-- Deals Item -->
								@foreach($products3 as $product3)
									<div class="owl-item deals_item">
										<a href="{{ route('fontend.product.product', $product3->slug) }}">
												@if(count($product3->images) > 0)
		                                            	<div class="deals_image"><img height="300px" width="185px" src="/{{$product3->images[0]->path}}" alt=""></div>
		                                            @else
		                                            	<div><img height="300px" width="185px" src="/default.JPG" alt=""></div>
		                                            @endif
											<div class="deals_content">
												<div class="deals_info_line d-flex flex-row justify-content-start">
													<div class="deals_item_category"><a href="#">{{ \Illuminate\Support\Str::limit($product3->name,15) }}</a></div>
													{{-- <div class="deals_item_price_a ml-auto">{{ number_format($product3->origin_price) }} VNĐ</div> --}}
												</div>
												<div class="deals_info_line d-flex flex-row justify-content-start">
													<div class="deals_item_name">Beoplay H7</div>
													<div class="deals_item_price ml-auto">{{ number_format($product3->origin_price) }} VNĐ</div>
												</div>
												<div class="available">
													<div class="available_line d-flex flex-row justify-content-start">
														<div class="available_title">Còn: <span>{{ $product3->quantity }}</span></div>
														<div class="sold_title ml-auto">Đã bán: <span>28</span></div>
													</div>
													<div class="available_bar"><span style="width:17%"></span></div>
												</div>
												<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
													<div class="deals_timer_title_container">
														<div class="deals_timer_title">Nhanh tay</div>
														<div class="deals_timer_subtitle">Ưu đãi kết thúc sau:</div>
													</div>
													<div class="deals_timer_content ml-auto">
														<div class="deals_timer_box clearfix" data-target-time="">
															<div class="deals_timer_unit">
																<div id="deals_timer1_hr" class="deals_timer_hr"></div>
																<span>Giờ</span>
															</div>
															<div class="deals_timer_unit">
																<div id="deals_timer1_min" class="deals_timer_min"></div>
																<span>Phút</span>
															</div>
															<div class="deals_timer_unit">
																<div id="deals_timer1_sec" class="deals_timer_sec"></div>
																<span>Giây</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</a>
									</div>
								@endforeach
							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Đặc sắc</li>
									<li>Giảm giá</li>
									<li>Bán chạy</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach($products as $product)
										<div class="featured_slider_item">
											<div class="border_active"></div>
											<a href="{{ route('fontend.product.product', $product->slug) }}">
												<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
													@if(count($product->images) > 0)
		                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/{{$product->images[0]->path}}" alt=""></div>
		                                            @else
		                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/default.JPG" alt=""></div>
		                                            @endif
													<div class="product_content">
														<div class="product_price discount">{{ number_format($product->origin_price) }} VNĐ</div>
														<div class="product_name"><div><a href="{{ route('fontend.product.product', $product->slug) }}">
															{{\Illuminate\Support\Str::limit($product->name,15)}}</a></div></div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>
															<button class="product_cart_button"><a style="color: white;" href="{{ route('fontend.cartadd', $product->id) }}">Add to Cart</a></button>
														</div>
													</div>
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													<ul class="product_marks">
														<li class="product_mark product_discount">-25%</li>
														<li class="product_mark product_new">new</li>
													</ul>
												</div>
											</a>
										</div>
									@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach($products4 as $product4)
										<div class="featured_slider_item">
											<a href="{{ route('fontend.product.product', $product4->slug) }}">
												<div class="border_active"></div>
												<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
													@if(count($product4->images) > 0)
		                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/{{$product4->images[0]->path}}" alt=""></div>
		                                            @else
		                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/default.JPG" alt=""></div>
		                                            @endif
													<div class="product_content">
														<div class="product_price discount">{{ number_format($product4->sale_price) }} VNĐ<span>{{ number_format($product4->origin_price) }} VNĐ</span></div>
														<div class="product_name"><div><a href="product.html">{{ $product4->name }}</a></div></div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>
															<button class="product_cart_button"><a style="color: white;" href="{{ route('fontend.cartadd', $product4->id) }}">Add to Cart</a></button>
														</div>
													</div>
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													<ul class="product_marks">
														<li class="product_mark product_discount">-25%</li>
														<li class="product_mark product_new">new</li>
													</ul>
												</div>
											</a>
										</div>
									@endforeach

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach($products5 as $product5)
										<div class="featured_slider_item">
											<a href="{{ route('fontend.product.product', $product5->slug) }}">
												<div class="border_active"></div>
												<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
													@if(count($product5->images) > 0)
		                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/{{$product5->images[0]->path}}" alt=""></div>
		                                            @else
		                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/default.JPG" alt=""></div>
		                                            @endif
													<div class="product_content">
														<div class="product_price discount">{{ number_format($product5->sale_price) }}</div>
														<div class="product_name"><div><a href="product.html">
															
															{{\Illuminate\Support\Str::limit($product5->name,15)}}
														</a></div></div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>
															<button class="product_cart_button"><a style="color: white;" href="{{ route('fontend.cartadd', $product5->id) }}">Add to Cart</a></button>
														</div>
													</div>
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													<ul class="product_marks">
														<li class="product_mark product_discount">-25%</li>
														<li class="product_mark product_new">new</li>
													</ul>
												</div>
											</a>
										</div>
									@endforeach

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->

	<div class="popular_categories">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Danh mục phổ biến</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
						<div class="popular_categories_link"><a href="#">Xem tất cả</a></div>
					</div>
				</div>
				
				<!-- Popular Categories Slider -->

				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">

							<!-- Popular Categories Item -->
							@foreach($categories as $category)
								<div class="owl-item">
									<div class="popular_category d-flex flex-column align-items-center justify-content-center">
										<div class="popular_category_image"><img src="/{{ $category->thumbnail }}" alt=""></div>
										<div class="popular_category_text">{{ $category->name }}</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url(/fontend/images/banner_2_background.jpg)"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->

			<div class="owl-carousel owl-theme banner_2_slider">

				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>
									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="/fontend/images/banner_2_product.png" alt=""></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>

				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>
									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="/fontend/images/banner_2_product.png" alt=""></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>

				<!-- Banner 2 Slider Item -->
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category">Laptops</div>
										<div class="banner_2_title">MacBook Air 13</div>
										<div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="#">Explore</a></div>
									</div>
									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="/fontend/images/banner_2_product.png" alt=""></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Hot New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Sản phẩm đình đám</div>
							<ul class="clearfix">
								<li class="active">Mới nhất</li>
								<li>máy tính</li>
								<li>Đồng hồ</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-9" style="z-index:1;">

								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										@foreach($products1 as $product1)
											<div class="arrivals_slider_item">
												<a href="{{ route('fontend.product.product', $product1->slug) }}">
													<div class="border_active"></div>
													<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
														@if(count($product1->images) > 0)
			                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/{{$product1->images[0]->path}}" alt=""></div>
			                                            @else
			                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/default.JPG" alt=""></div>
			                                            @endif
														<div class="product_content">
															<div class="product_price">{{ number_format($product1->origin_price) }} VNĐ</div>
															<div class="product_name"><div><a href="product.html">{{\Illuminate\Support\Str::limit($product1->name,15) }}</a></div></div>
															<div class="product_extras">
																<div class="product_color">
																	<input type="radio" checked name="product_color" style="background:#b19c83">
																	<input type="radio" name="product_color" style="background:#000000">
																	<input type="radio" name="product_color" style="background:#999999">
																</div>
																<button class="product_cart_button"><a style="color: white;" href="{{ route('fontend.cartadd', $product1->id) }}">Add to Cart</a></button>
															</div>
														</div>
														<div class="product_fav"><i class="fas fa-heart"></i></div>
														<ul class="product_marks">
															<li class="product_mark product_discount">-25%</li>
															<li class="product_mark product_new">new</li>
														</ul>
													</div>
												</a>
											</div>
										@endforeach
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>
								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">
										@foreach($productlaptop as $productlap)
										<a href="{{ route('fontend.product.product', $productlap->slug) }}">
											<!-- Slider Item -->
											<div class="arrivals_slider_item">
												<div class="border_active"></div>
												<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
													@if(count($productlap->images) > 0)
			                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/{{$productlap->images[0]->path}}" alt=""></div>
			                                            @else
			                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/default.JPG" alt=""></div>
			                                            @endif
													<div class="product_content">
														<div class="product_price">{{ number_format($productlap->origin_price) }} VNĐ</div>
														<div class="product_name"><div><a href="product.html">{{\Illuminate\Support\Str::limit($productlap->name,15) }}</a></div></div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>
															<button class="product_cart_button"><a style="color: white;" href="{{ route('fontend.cartadd', $productlap->id) }}">Add to Cart</a></button>
														</div>
													</div>
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													<ul class="product_marks">
														<li class="product_mark product_new">new</li>
													</ul>
												</div>
											</div>
										</a>
										@endforeach
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">
										@foreach($productwatchs as $productwatch)
										<!-- Slider Item -->
										<a href="{{ route('fontend.product.product', $productwatch->slug) }}">
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												@if(count($productwatch->images) > 0)
			                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/{{$productwatch->images[0]->path}}" alt=""></div>
			                                            @else
			                                            	<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="150px" width="185px" src="/default.JPG" alt=""></div>
			                                            @endif
												<div class="product_content">
													<div class="product_price">{{ number_format($productwatch->origin_price) }} VNĐ</div>
													<div class="product_name"><div><a href="product.html">{{\Illuminate\Support\Str::limit($productwatch->name,15) }}</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button"><a style="color: white;" href="{{ route('fontend.cartadd', $productwatch->id) }}">Add to Cart</a></button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
									</a>
										@endforeach
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

							</div>

							<div class="col-lg-3">
								<div class="arrivals_single clearfix">
									<a href="{{ route('fontend.product.product', $productshight->slug) }}">
										<div class="d-flex flex-column align-items-center justify-content-center">
											<div class="arrivals_single_image"><img src="/fontend/images/new_single.png" alt=""></div>
											<div class="arrivals_single_content">
												<div class="arrivals_single_category"><a href="#">{{$productshight->category->name}}</a></div>
												<div class="arrivals_single_name_container clearfix">
													<div class="arrivals_single_name"><a href="#">{{ \Illuminate\Support\Str::limit( $productshight->name) }}</a></div>
													<div class="arrivals_single_price text-right">{{ number_format($productshight->origin_price) }} VNĐ</div>
												</div>
												<div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div>
												<button class="arrivals_single_button"><a style="color: white;" href="{{ route('fontend.cartadd', $productshight->id) }}">Add to Cart</a></button>
											</div>
											<div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
											<ul class="arrivals_single_marks product_marks">
												<li class="arrivals_single_mark product_mark product_new">new</li>
											</ul>
										</div>
									</a>
								</div>
							</div>

						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Hot Best Sellers</div>
							<ul class="clearfix">
								<li class="active">Top 20</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<div class="bestsellers_panel panel active">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">

								<!-- Best Sellers Item -->
								@foreach($products2 as $product2)
									<div class="bestsellers_item discount">
										<a href="{{ route('fontend.product.product', $product2->slug) }}">
											<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
													@if(count($product2->images) > 0)
		                                            	<div class="bestsellers_image"><img height="150px" width="185px" src="/{{$product2->images[0]->path}}" alt=""></div>
		                                            @else
		                                            	<div><img height="150px" width="185px" src="/default.JPG" alt=""></div>
		                                            @endif
												<div class="bestsellers_content">
													<div class="bestsellers_category">{{\Illuminate\Support\Str::limit($product2->name,15) }}</div>
													<div class="bestsellers_name"><a href="{{ route('fontend.product.product', $product2->slug) }}">Xiaomi Redmi Note 4</a></div>
													<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
													<div class="bestsellers_price discount">{{ number_format($product2->origin_price) }} VNĐ</div>
												</div>
											</div>
										</a>
										<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
										<ul class="bestsellers_marks">
											<li class="bestsellers_mark bestsellers_discount">-25%</li>
											<li class="bestsellers_mark bestsellers_new">new</li>
										</ul>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Adverts -->

	<div class="adverts">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="/fontend/images/adv_1.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_subtitle">Trends 2018</div>
							<div class="advert_title_2"><a href="#">Sale -45%</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="/fontend/images/adv_2.png" alt=""></div></div>
					</div>
				</div>

				<div class="col-lg-4 advert_col">
					
					<!-- Advert Item -->

					<div class="advert d-flex flex-row align-items-center justify-content-start">
						<div class="advert_content">
							<div class="advert_title"><a href="#">Trends 2018</a></div>
							<div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
						</div>
						<div class="ml-auto"><div class="advert_image"><img src="/fontend/images/adv_3.png" alt=""></div></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Trends -->

	<div class="trends">
		<div class="trends_background" style="background-image:url(/fontend/images/trends_background.jpg)"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title">Trends 2018</h2>
						<div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>

				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->

						<div class="owl-carousel owl-theme trends_slider">

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="/fontend/images/trends_1.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="/fontend/images/trends_2.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Samsung Charm...</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="/fontend/images/trends_3.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">DJI Phantom 3...</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="/fontend/images/trends_1.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="/fontend/images/trends_2.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="/fontend/images/trends_3.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Reviews -->

	<div class="reviews">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="reviews_title_container">
						<h3 class="reviews_title">Latest Reviews</h3>
						<div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
					</div>

					<div class="reviews_slider_container">
						
						<!-- Reviews Slider -->
						<div class="owl-carousel owl-theme reviews_slider">
							
							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="/fontend/images/review_1.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Roberto Sanchez</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="/fontend/images/review_2.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="/fontend/images/review_3.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="/fontend/images/review_1.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Roberto Sanchez</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="/fontend/images/review_2.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="/fontend/images/review_3.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

						</div>
						<div class="reviews_dots"></div>
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
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="/fontend/images/view_1.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Beoplay H7</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="/fontend/images/view_2.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="/fontend/images/view_3.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225</div>
										<div class="viewed_name"><a href="#">Samsung J730F...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="/fontend/images/view_4.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="/fontend/images/view_5.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="/fontend/images/view_6.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$375</div>
										<div class="viewed_name"><a href="#">Speedlink...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>
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
	<script src="/fontend/plugins/slick-1.8.0/slick.js"></script>
	<script src="/fontend/plugins/easing/easing.js"></script>
	<script src="/fontend/js/custom.js"></script>	
@endsection