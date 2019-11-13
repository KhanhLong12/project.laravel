<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">OneTech</a></div>
						</div>
						<div class="footer_title">Liên hệ 24/7</div>
						<div class="footer_phone">068 005 3570</div>
						<div class="footer_contact_text">
							<p>17 Trần Đại Nghĩa, Hà Nội</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Tìm nhanh</div>
						<ul class="footer_list">
							@foreach($categories as $category)
								<li><a href="#">{{ $category->name }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Phụ kiện</a></li>
							<li><a href="#">Máy ảnh</a></li>
							<li><a href="#">Phần cứng</a></li>
							<li><a href="#">Máy tính và Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">CSKH</div>
						<ul class="footer_list">
							<li><a href="#">Tài khoản</a></li>
							<li><a href="#">Theo dõi đơn</a></li>
							<li><a href="#">Dịch vụ khách hàng</a></li>
							<li><a href="#">Đổi trả</a></li>
							<li><a href="#">Hỏi đáp</a></li>
							<li><a href="#">Hỗ trợ sản phẩm</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>