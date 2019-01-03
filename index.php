<?php
	include("lib_db.php");
	session_start();
	//Login section
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}
	//End login section
?>
<!DOCTYPE html>
<html lang="vn">

<head>
	<title>Mỹ Phẩm Và Spa Thẩm Mỹ Thiên Nhiên</title>
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Gleam Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta Tags -->
	<!-- Style-sheets -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/lightbox.css">
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<!--// Style-sheets -->
	<!--web-fonts-->
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!--//web-fonts-->
</head>

<body>
	<!-- banner -->
	<div class="top-bar_sub container-fluid p-3">
		<div class="row">
			<div class="col-sm-4 top-mid">
				<p class="paragraph-agileinfo">
					<i class="fas fa-map-marker-alt"></i> 175 Đường Tây Sơn - Đống Đa</p>
				<p class="paragraph-agileinfo">
				<i class="fas fa-phone"></i> 0904543820</p>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-4 log-icons text-right">
			<form class="form-inline mt-2 mt-md-0 mb-2" style="margin-left: 137px;">
            	<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            	<button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
          	</form>
				<ul class="social_list1">
					<li class="text-center mr-3">
						<a href="" class="">
							<i class="far fa-heart"></i>
						</a>
					</li>

					<li class="text-center mr-3">
						<a href="" class="" style="position: relative;">
							<i class="fas fa-shopping-cart"></i>
						</a>
						<span style="position: absolute;left: 254px;top: 43px;display: block;padding: 0px 6px; background-color: red; font-size: 12px; border-radius: 50px 50px 50px 50px; color: #fff;">0</span>
					</li>
					<li class="text-center">
						<a href="https://www.facebook.com/profile.php?id=100004730736938&ref=bookmarks" class="facebook1">
							<i class="fab fa-facebook-f"></i>
						</a>
					</li>
					<li class="text-center mx-sm-3 mx-2">
						<a href="https://mail.google.com/mail/u/0/#inbox" class="gmail1">
							<i class="fab fa-google-plus"></i>
						</a>
					</li>
					<li class="text-center">
						<a href="https://www.instagram.com/" class="instagram1">
							<i class="fab fa-instagram "></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="banner" id="home">
		<!-- header -->
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header">
				<h1 class="logo" >
					<a class="navbar-brand" href="./index.php">
						<i class="fab fa-viadeo"></i>Comestic and Spa</a>
				</h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
						
						<li class="nav-item">
							<a class="nav-link scroll" href="#about">Thông Tin</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="./sanpham.php?id=1">Sản Phẩm</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Comestic Handmade
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item text-center scroll" href="#services">Chăm sóc Da</a>
								<a class="dropdown-item text-center scroll" href="#pricing">Chăm sóc Body</a>
							</div>
						</li>

						<li class="nav-item">
							<a class="nav-link scroll" href="#contact">Phản Hồi</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php
								if(isset($_SESSION['username'])){
									echo $_SESSION['username'];
								}
								else { ?>
									Login
								<?php }
							?></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
								<?php
									if(isset($_SESSION['username'])){ ?>
										<a class="dropdown-item text-center" href="#">Profile</a>
										<a class="dropdown-item text-center" href="index.php?logout='1'">Logout</a>
									<?php }
									else { ?>
										<a class="dropdown-item text-center" href="./register.php">Đăng Ký</a>
										<a class="dropdown-item text-center" href="./login.php">Đăng Nhập</a>
									<?php }
								?>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- //header -->
		<!-- banner-text -->
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner text-right">
				<div class="carousel-item b1 active">
					<div class="container banner-w3layouts-info"></div>
				</div>
				<div class="carousel-item b2">
					<div class="container banner-w3layouts-info"></div>
				</div>
				<div class="carousel-item b3">
					<div class="container banner-w3layouts-info"></div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	<!-- //banner -->
	<!--about-->
	<section class="banner-w3-agileits-btm-right py-5" id="about">
		<div class="container py-xl-5 py-sm-3">
			<h5 class="main-w3l-title mb-sm-4 mb-3">Về chúng tôi</h5>
			<div class="row">
				<div class="col-lg-6 about-left">
					<h3 class="subheading-wthree mb-md-4 mb-3">Giải pháp sức khỏe tự nhiên hiệu quả</h3>
					<p class="paragraph-agileinfo">Bạn có thể sử dụng những sản phẩm làm hoàn toàn từ tự nhiên như son làm bằng cánh hoa hồng, toner vỏ quýt,hay nước hoa hồng giúp se khít lỗ chân lông, và kết hợp với những liệu trình spa thường xuyên để có làn da sáng hồng rạng rỡ nhất</p>


					<!-- Clients -->
					<div class="slider mt-md-4 mt3 mb-3">
						<h3 class="subheading-wthree mb-md-4 mb-3">Feedback của các khách hàng</h3>
						<div class="flexslider">
							<ul class="slides">
								<li>
									<div class="client-grids">
										<img src="images/giang.jpg" class="img-fluid" alt="Responsive image">
										<h4 class="mt-3 mb-1">Hương Giang</h4>
										<p class="paragraph-agileinfo">Spa có rất nhiều sản phẩm thân thiện và không gây kích ứng da khi sử dụng, rất thích toner vỏ quýt ở đây,sẽ quay lại</p>
									</div>
								</li>
								<li>
									<div class="client-grids">
										<img src="images/mai.jpg" class="img-fluid" alt="Responsive image">
										<h4 class="mt-3 mb-1">Hương Mai</h4>
										<p class="paragraph-agileinfo">Nhân viên phục vụ rất nhiệt tình và thân thiện, spa rất sang trọng. Sẽ quay lại</p>
									</div>
								</li>
								<li>
									<div class="client-grids">
										<img src="images/hien.jpg" class="img-fluid" alt="Responsive image">
										<h4 class="mt-3 mb-1">Phạm Hiền</h4>
										<p class="paragraph-agileinfo">Nước hoa hồng rất thơm, cảm thấy thay đổi rõ rệt, cảm ơn spa</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--// Clients -->
				<div class="col-lg-6 mt-lg-0 mt-5">
					<div class="ab1 mr-auto"></div>
					<div class="ab2 my-4 ml-auto"></div>
					<div class="ab3 mr-auto"></div>
				</div>
			</div>
		</div>
	</section>
	<!--//about-->
	<!--services-->
	<section class="services-section py-5" id="services">
		<div class="container pt-xl-5 pt-sm-3">
			<h5 class="main-w3l-title mb-sm-4 mb-3">Comestics</h5>
			<div class="srategy-text mb-5">
				<p class="paragraph-agileinfo">Những sản phẩm được tạo ra từ những thành phần thiên nhiên như: lô hội, phúc bồn tử, hoa hồng, hoa cúc,....đem lại cho bạn sự trẻ trung, giúp bạn tự tin hơn trong cuộc sống.
				</p>
			</div>
		</div>
		<div class="container-fluid pb-xl-5 pb-sm-3">
			<div class="services-main row d-lg-flex justify-content-around">
				<div class="col-xl-3 col-md-6 col-12 service-grids-agileits-w3layouts">
					<div class="services-w3-agile-info p-4">
						<div class="bb1 mb-3">
							<img src="images/kem dao.jpg" class="img-fluid mb-3" alt="Responsive image">
						</div>
						<h3 class="subheading-wthree mb-md-4 mb-3">Kem hoa đào</h3>
						<p class="paragraph-agileinfo text-white">Kem hoa đào với chiết xuất 100% hoàn toàn tự nhiên từ hoa đào giúp cho làn da mờ thâm,trị mụn ẩn, dưỡng mịn, trắng da, thấm vào da cà không gây nhờn rít</p>
						<h6 class="mt-2">
							<span class="mr-2">VNĐ</span>160.000</h6>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12 service-grids-agileits-w3layouts mt-md-0 mt-4">
					<div class="services-w3-agile-info p-4">
						<div class="bb2 mb-3">
							<img src="images/srm nghệ.jpg" class="img-fluid mb-3" alt="Responsive image">
						</div>
						<h3 class="subheading-wthree mb-md-4 mb-3">Sữa rửa mặt nghệ</h3>
						<p class="paragraph-agileinfo text-white">Sữa rửa mặt nghệ dành cho những bạn có làn da nhiều mụn bọc, mụn bị sưng tấy, nhiều bã nhờn,.., giúp các bạn lấy hết bụn bẩn và trị mụn</p>
						<h6 class="mt-2">
							<span class="mr-2">VNĐ</span>100.000</h6>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12 service-grids-agileits-w3layouts mt-xl-0 mt-4">
					<div class="services-w3-agile-info p-4">
						<div class="bb3 mb-3">
							<img src="images/matnaduong.jpg" class="img-fluid mb-3" alt="Responsive image">
						</div>
						<h3 class="subheading-wthree mb-md-4 mb-3">Mặt nạ dưỡng</h3>
						<p class="paragraph-agileinfo text-white">Mặt nạ dưỡng chiết xuất từ bùn non,nha đam, sữa non,cà chua, yến mạch và đậu đỏ,..thẩm thấu nhanh, giúp lấy đi các bụi bẩn và cung cấp độ ẩm cho da của bạn.</p>
						<h6 class="mt-2">
							<span class="mr-2">VNĐ</span>150.000</h6>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12 service-grids-agileits-w3layouts mt-xl-0 mt-4">
					<div class="services-w3-agile-info p-4">
						<div class="bb4 mb-3">
							<img src="images/serum.jpg" class="img-fluid mb-3" alt="Responsive image">
						</div>
						<h3 class="subheading-wthree mb-md-4 mb-3">Serum hạt nho</h3>
						<p class="paragraph-agileinfo text-white">Serum hạt nho có nhiều chất chống oxy hóa hơn vitamin A và E,giảm thiểu tối đa sự lão hóa da,trị mụn tự nhiên và giúp da bạn xe khít lỗ chân lông nhẹ nhàng .</p>
						<h6 class="mt-2">
							<span class="mr-2">VNĐ</span>250.000</h6>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--//services-->

	<!-- Team -->
	<section class="team-section py-5" id="team">
		<div class="container py-xl-5 py-sm-3">
			<h5 class="main-w3l-title mb-sm-4 mb-3">Về đội ngũ của chúng tôi</h5>
			<div class="row">
				<div class="col-lg-6 team-left">
					<div class="row">
						<p class="paragraph-agileinfo">Để có được sự phản hồi tích cực từ phía khách hàng,spa của chúng tôi có rất nhiều những cố vấn tư vấn về các cách làm đẹp tự nhiên, những bác sĩ chuyên da liễu, và những nguồn sản phẩm 100% tự nhiên có kiểm định sản phẩm</p>
						<div class="col-sm-6 col-11 mx-auto grid_info_w3ls mt-4">
							<img src="images/c1.jpg" class="img-fluid" alt="Responsive image">
							<div class="team_info p-3">
								<h5 class="text-white">Carl Palmer</h5>
								<span class="mt-1 mb-2">Director</span>
								<ul class="social_list1">
									<li>
										<a href="#" class="facebook1 text-center">
											<i class="fab fa-facebook-f"></i>

										</a>
									</li>
									<li>
										<a href="#" class="gmail2 text-center">
											<i class="fab fa-google-plus"></i>

										</a>
									</li>
									<li>
										<a href="#" class="instagram text-center">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 col-11 mx-auto grid_info_w3ls mt-4">
							<div class="team_info p-3">
								<h5 class="text-white">Andrew Hughes</h5>
								<span class="mt-1 mb-2">CEO</span>
								<ul class="social_list1">
									<li>
										<a href="#" class="facebook1 text-center">
											<i class="fab fa-facebook-f"></i>

										</a>
									</li>
									<li>
										<a href="#" class="gmail2 text-center">
											<i class="fab fa-google-plus"></i>

										</a>
									</li>
									<li>
										<a href="#" class="instagram text-center">
											<i class="fab fa-instagram
											.0"></i>
										</a>
									</li>
								</ul>
							</div>
							<img src="images/c2.jpg" class="img-fluid" alt="Responsive image">
						</div>
					</div>
				</div>
				<div class="col-lg-6 team-right">
					<div class="row">
						<p class="paragraph-agileinfo order-lg-2 mt-lg-3 mt-4">Đây là đội ngũ - những người đã sáng lập ra Comestic- Spa thẩm mỹ thiên nhiên,những người đã tạo nên một thương hiệu mang chất riêng cho chính mình.</p>
						<div class="col-sm-6 col-11 mx-auto grid_info_w3ls mt-lg-0 mt-4">
							<img src="images/c4.jpg" class="img-fluid" alt="Responsive image">
							<div class="team_info p-3">
								<h5 class="text-white">Mariah Cambel</h5>
								<span class="mt-1 mb-2">Project Manager</span>
								<ul class="social_list1">
									<li>
										<a href="#" class="facebook1 text-center">
											<i class="fab fa-facebook-f"></i>

										</a>
									</li>
									<li>
										<a href="#" class="gmail2 text-center">
											<i class="fab fa-google-plus"></i>

										</a>
									</li>
									<li>
										<a href="#" class="instagram3 text-center">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6 col-11 mx-auto grid_info_w3ls mt-lg-0 mt-4">
							<div class="team_info p-3">
								<h5 class="text-white">Roger Cooper</h5>
								<span class="mt-1 mb-2">HR Manager</span>
								<ul class="social_list1">
									<li>
										<a href="#" class="facebook1 text-center">
											<i class="fab fa-facebook-f"></i>

										</a>
									</li>
									<li>
										<a href="#" class="gmail2 text-center">
											<i class="fab fa-google-plus"></i>

										</a>
									</li>
									<li>
										<a href="#" class="instagram3 text-center">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
								</ul>
							</div>
							<img src="images/c3.jpg" class="img-fluid" alt="Responsive image">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--// Team -->

	<!--subscribe-->
	<section class="subscribe-section py-5">
		<div class="container py-xl-5 py-sm-3">
			<div class="subscribe-bg p-sm-4 p-3">
				<h5 class="main-w3l-title mb-sm-4 mb-3 text-white">
					<span>30% OFF</span> for All Massages</h5>
				<p class="paragraph-agileinfo text-white mb-3">Đăng ký để nhận cập nhật và các thông tin khuyến mại của chúng tôi</p>
				<form action="#" method="post" class="d-sm-flex">
					<div class="form-group">
						<input type="email" class="form-control" placeholder="name@gmail.com" required="">
					</div>
					<button type="submit" class="btn btn-primary">Subscribe</button>
				</form>
			</div>
		</div>
	</section>
	<!--//subscribe-->
	<!-- pricing -->
	<section class="pricing-section py-5" id="pricing">
		<div class="container py-xl-5 py-sm-3">
			<h5 class="main-w3l-title mb-sm-4 mb-3">Chăm sóc Body</h5>
			<div class="card-deck text-center">
				<div class="card box-shadow col-lg-4">
					<div class="card-header">
						<h4 class="py-md-4 py-3">Basic</h4>
					</div>
					<div class="card-body">
						<h5 class="card-title pricing-w3-agileits-title">
							<span class="align-top">VNĐ</span>1.500.000
							<small class="text-muted">/tháng</small>
						</h5>
						<ul class="list-unstyled mt-3 mb-4">
							<li class="py-2 border-bottom">Thư giãn cơ thể</li>
							<li class="py-2 border-bottom">Tắm xông hơi</li>
							<li class="py-2 border-bottom">Thư giãn cơ mặt</li>
						</ul>
						<a href="#contact" class="btn btn-block btn-outline-primary scroll py-2">Phản Hồi</a>
					</div>
				</div>
				<div class="card box-shadow col-lg-4 my-lg-0 my-3">
					<div class="card-header">
						<h4 class="py-md-4 py-3">Professional</h4>
					</div>
					<div class="card-body">
						<h5 class="card-title pricing-w3-agileits-title">
							<span class="align-top">VNĐ</span>3.000.000
							<small class="text-muted">/tháng</small>
						</h5>
						<ul class="list-unstyled mt-3 mb-4">
							<li class="py-2 border-bottom">Thư giãn cơ thể</li>
							<li class="py-2 border-bottom">Tắm xông hơi</li>
							<li class="py-2 border-bottom">Massage 50 phút</li>
						</ul>
						<a href="#contact" class="btn btn-block btn-outline-primary scroll py-2">Phản Hồi</a>
					</div>
				</div>
				<div class="card box-shadow col-lg-4">
					<div class="card-header">
						<h4 class="py-md-4 py-3">Exclusive</h4>
					</div>
					<div class="card-body">
						<h5 class="card-title pricing-w3-agileits-title">
							<span class="align-top">VNĐ</span>4.500.000
							<small class="text-muted">/tháng</small>
						</h5>
						<ul class="list-unstyled mt-3 mb-4">
							<li class="py-2 border-bottom">Massage thư giãn</li>
							<li class="py-2 border-bottom">Chăm sóc da mặt chuyên sâu</li>
							<li class="py-2 border-bottom">Chăm sóc da chân và da tay</li>
						</ul>
						<a href="#contact" class="btn btn-block btn-outline-primary scroll py-2">Phản Hồi</a>
					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- contact -->
	<section class="contact-section py-5" id="contact">
		<div class="container py-xl-5 py-sm-3">
			<h5 class="main-w3l-title mb-sm-4 mb-3">Phản Hồi Của Khách Hàng</h5>
			<div class="row">
				<div class="col-lg-8 wthree_contact_left">
					<h3 class="subheading-wthree mb-md-4 mb-3">Điền Thông Tin Email </h3>
					<form action="#" method="post">
						<div class="form-row">
							<div class="form-group col-md-6">
								<input type="text" class="form-control" placeholder="Name" required="">
							</div>
							<div class="form-group col-md-6">
								<input type="text" class="form-control" placeholder="Phone" required="">
							</div>
							<div class="form-group col-md-6">
								<input type="email" class="form-control" placeholder="Email" required="">
							</div>
							<div class="form-group col-md-6">
								<input type="text" class="form-control" placeholder="Subject" required="">
							</div>
						</div>
						<div class="form-group">
							<textarea id="textarea" placeholder="Message..." required=""></textarea>
						</div>
						<button type="submit" class="btn btn-primary py-sm-3 py-2 px-5">Gửi</button>
					</form>
				</div>
				<div class="col-lg-4 wthree_contact_right mt-lg-0 mt-sm-5 mt-4">
					<h3 class="subheading-wthree mb-md-4 mb-3">Thông Tin Cửa Hàng</h3>
					<address>
						<p class="paragraph-agileinfo mb-md-4 mb-3">
							<i class="fas fa-map-marker-alt mr-3"></i>175 Đường Tây Sơn- Đống Đa- Hà Nội</p>

						<p class="paragraph-agileinfo mb-md-4 mb-3">
							<i class="fas fa-phone mr-3"></i> 0904543820</p>

						<p class="paragraph-agileinfo mb-md-4 mb-3">
							<i class="fas fa-fax mr-3"></i> 0373772879</p>

						<p class="paragraph-agileinfo">
							<i class="far fa-envelope mr-3"></i>
							<a href="https://mail.google.com/mail/u/0/#inbox">Gmail</a>
						</p>
					</address>
				</div>
			</div>
		</div>
	</section>

	<!-- contact -->

	<!-- Footer -->
	<footer class="footer-section">
		<div class="container">
			<div class="footer-right py-5">
				<div class="row">
					<div class="col-lg-6 col-md-6 footer-grids">
						<h2>Về chúng tôi</h2>
						<p class="paragraph-agileinfo">Chúng tôi luôn mong sẽ mang đến cho bạn những sản phẩm trang điểm từ thiên nhiên tốt nhất và những buổi spa thư giãn nhất để đem lại sự thoải mái và thư giãn đến cho quý khách</p>
					</div>
					<div class="col-lg-3 footer-grids mt-lg-0 mt-4">
						<h3>Liên kết hữu ích</h3>
						<ul class="w3agile_footer_grid_list">
							<li>
								<a href="index.html">Home</a>
							</li>
							<li>
								<a href="#about" class="scroll">Thông Tin</a>
							</li>
							<li>
								<a href="#gallery" class="scroll">Sản phẩm</a>
							</li>
							<li>
								<a href="#services" class="scroll">Comestic Handmade</a>
							</li>
							<li>
								<a href="#contact" class="scroll">Phản Hồi</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-3 footer-grids mt-lg-0 mt-4">
						<h3>Theo dõi chúng tôi</h3>
						<ul class="social_list1">
							<li class="text-center">
								<a href="https://www.facebook.com/profile.php?id=100004730736938&ref=bookmarks" class="facebook1">
									<i class="fab fa-facebook-f"></i>

								</a>
							</li>
							<li class="text-center mx-sm-3 mx-2">
								<a href="#" class="gmail1">
									<i class="fab fa-google-plus"></i>

								</a>
							</li>
							<li class="text-center">
								<a href="#" class="instagram1">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- //Footer -->
	<!-- copyright -->
	<div class="copyright-w3layouts">
		<div class="container">
			<p class="py-xl-4 py-3">© 2018 Gleam . All Rights Reserved | Design by Pham Hien
			</p>
		</div>
	</div>
	<!-- //copyright -->
	<!-- Required common Js -->
	<script src='js/jquery-2.2.3.min.js'></script>
	<!-- //Required common Js -->
	<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script>
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>

	<!-- //flexSlider -->

	<!--light-box-files -->
	<script src="js/lightbox-plus-jquery.min.js">
	</script>
	<!--//light-box-files -->


	<!-- start-smoth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- here stars scrolling icon -->
	<script>
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- Js for bootstrap working-->
	<script src="js/bootstrap.min.js"></script>
	<!-- //Js for bootstrap working -->
</body>

</html>