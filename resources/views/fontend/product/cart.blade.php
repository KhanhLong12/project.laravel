@extends('fontend.layouts.master')
@section('css')
	<link rel="stylesheet" type="text/css" href="/fontend/styles/bootstrap4/bootstrap.min.css">
	<link href="/fontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/cart_styles.css">
	<link rel="stylesheet" type="text/css" href="/fontend/styles/cart_responsive.css">
@endsection
@section('content')
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						@if(session()->has('success'))
		                    <div class="alert alert-success" role="alert">
		                        {{ session()->get('success') }}
		                    </div> 
		                @endif
						<div class="cart_title">Thông tin giỏ hàng</div>
							@if(Gloudemans\Shoppingcart\Facades\Cart::total() == 0)
								<h3 style="color: #999999;">Chưa có sản phẩm nào trong giỏ</h3>
								<a href="{{ route('fontend.index') }}" class="btn btn-outline-warning"">Tiếp tục mua hàng</a>
							@else
									<div class="cart_items">
										<ul class="cart_list">
											@foreach($item as $item1)
												<li class="cart_item clearfix">
														@if( count($item1->options) >0)
															<div class="cart_item_image"><img src="/{{$item1->options->image}}" alt=""></div>
														@endif
														<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between row">
															<div class="cart_item_name cart_info_col">
																<div class="cart_item_title">Tên sản phẩm</div>
																<div class="cart_item_text">{{ $item1->name }}</div>
															</div>
															<div class="cart_item_color cart_info_col">
																<div class="cart_item_title">Màu</div>
																<div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
															</div>
															<div class="cart_item_quantity cart_info_col">
																<div class="cart_item_title">Số lượng</div>
																<div class="cart_item_text" style="width: 120px">
																	<a href="" style="font-size: 25px;">-</a>
																	<input style="width: 20%; border: none;text-align: center;" type="" name="quantity" value="{{ $item1->qty }}">
																	<a style="font-size: 25px;" href="{{ route('fontend.updatecart', $item1->id) }}">+</a>
																</div>
															</div>
															<div class="cart_item_price cart_info_col">
																<div class="cart_item_title">Giá</div>
																<div class="cart_item_text">{{ number_format($item1->price) }} VNĐ</div>
															</div>
															<div class="cart_item_total cart_info_col">
																<div class="cart_item_title">Tổng</div>
																<div class="cart_item_text">{{number_format($item1->price * $item1->qty)}} VNĐ</div>
															</div>
														</div>
													</li>
											@endforeach
										</ul>
									</div>
						<!-- Order Total -->
							<div class="order_total">
								<div class="order_total_content text-md-right">
									<div class="order_total_title">Tổng tiền</div>
									<div class="order_total_amount">{{ Gloudemans\Shoppingcart\Facades\Cart::total() }} VNĐ</div>
								</div>
							</div>
							<div class="cart_buttons">
								<button style="background: none !important;cursor: pointer;color: red;" class="button btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter-1">Xóa giỏ hàng</button>
								<div class="modal fade" id="exampleModalCenter-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle" style="display: inline-block;">Thông báo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                             <h4>Bạn chắc chắn muốn xóa?</h4>
                                                          </div>
                                                          <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<form style="display: inline-block;" action="{{ route('fontend.deletecart') }}" method="post" accept-charset="utf-8">
									                                @csrf
									                                {{method_field('delete')}}
									                                <button type="submit" class="btn btn-danger">Xóa giỏ hàng</button>
									                            </form>
									                        </div>
                                                    </div>
                                                 </div>
                                            </div>
								<a href="{{ route('fontend.order') }}" class="button cart_button_checkout">Xác nhận giỏ hàng</a>
							</div>
						@endif
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
	<script src="/fontend/plugins/easing/easing.js"></script>
	<script src="/fontend/js/cart_custom.js"></script>
@endsection