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
   
   $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;

   if(isset($_REQUEST['search'])) {
      $text_find = $_REQUEST['search'];
      $sql = "select * from product_child where name like '%{$_REQUEST['search']}%'";
      $result_search = exec_select($sql);    
   }

   $sql_product_selected = "select name from product where id={$id}";
   $result_product_selected = select_one($sql_product_selected);

   $sql_product = "select * from product";
   $result_product = select_list($sql_product);


   $sql_product_child = "select * from product_child where pid={$id}";
   $result_product_child = select_list($sql_product_child);
?>
<!DOCTYPE html>
<html lang="vn">

<head>
	<title>Result search for <?=$text_find?></title>
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="js/jquery-1.11.1.min.js"></script><script type="text/javascript" src="http://hocwebgiare.com/blog-detail/Bootstrap/post189/js/jquery-1.11.1.min.js?r=1"></script>

	<script type="text/javascript">
      $(document).ready(function() {    
         $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});    
         $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');
         $('#products .item').addClass('grid-group-item');
      });
   });</script>

	<!--// Style-sheets -->
	<!--web-fonts-->
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!--//web-fonts-->
</head>
<body>
   <!-- banner -->
   <div class="top-bar_sub container-fluid mt-4" >
      <div class="row">
         <div class="col-sm-4 top-mid">
            <p class="paragraph-agileinfo">
               <i class="fas fa-map-marker-alt"></i> 175 Đường Tây Sơn - Đống Đa</p>
            <p class="paragraph-agileinfo">
            <i class="fas fa-phone"></i> 0904543820</p>
         </div>
         <div class="col-sm-4"></div>
         <div class="col-sm-4 log-icons text-right">
            <ul class="social_list1 mr-5">
               <li class="text-center mr-3">
                  <a href="" class="">
                     <i class="far fa-heart"></i>
                  </a>
               </li>

               <li class="text-center mr-3">
                  <a href="" class="" style="position: relative;">
                     <i class="fas fa-shopping-cart"></i>
                  </a>
                  <span style="position: absolute;left: 260px;top: 42px;display: block;padding: 0px 6px; background-color: red; font-size: 12px; border-radius: 50px 50px 50px 50px; color: #fff;">0</span>
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

   <!-- header -->
   <header>
   	<nav class="navbar navbar-expand-lg navbar-light bg-light top-header">
   		<h1 class="logo" style="margin-top: 5px;margin-bottom: 25px;">
   			<a class="navbar-brand" href="index.php">
   				<i class="fab fa-viadeo"></i>Comestic and Spa</a>
   		</h1>
   		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
   		    aria-expanded="false" aria-label="Toggle navigation">
   			<span class="navbar-toggler-icon"></span>
   		</button>

   		<div class="collapse navbar-collapse" id="navbarSupportedContent">
   				<ul class="navbar-nav ml-auto">

               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Chăm sóc da
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <?php foreach ($result_product as $value) {
                        if ($value['cid'] != 1) {
                           continue;
                        }
                     ?>
                        <a class="dropdown-item text-center" href="../web/sanpham.php?id=<?=$value['id']?>" ><?=$value['name']?></a>
                     <?php } ?>
                  </div>
               </li>


   				<li class="nav-item dropdown">
   					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   					  Chăm sóc toàn thân
   					</a>
   					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <?php foreach ($result_product as $value) {
                        if ($value['cid'] != 2) {
                           continue;
                        }
                     ?>
                        <a class="dropdown-item text-center" href="../web/sanpham.php?id=<?=$value['id']?>"><?=$value['name']?></a>
                     <?php } ?>
                  </div>
   				</li>


               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Chăm sóc tóc
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <?php foreach ($result_product as $value) {
                        if ($value['cid'] != 3) {
                           continue;
                        }
                     ?>
                        <a class="dropdown-item text-center" href="../web/sanpham.php?id=<?=$value['id']?>"><?=$value['name']?></a>
                     <?php } ?>
                  </div>
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
               <form class="form-inline" method="GET" action="../web/search.php">
                  <input class="form-control mr-sm-2" type="search" placeholder="At least 3 characters..." aria-label="Search" name="search" id="textsearch">
                  <button class="btn btn-info searchbox padding" role="button" id="btn" type="submit" style="height: 2.38em !important;">
                     <i class="fa fa-search"></i>
                  </button>
               </form>
   			</ul>
   		</div>
   	</nav>
   <!-- End header -->  
      <div class="container">
         <h3 class="title"><strong>Có <span style="color: red;"><?php echo count($result_search); ?></span> sản phẩm phù hợp với từ khóa <span style="color: red;"><?=$text_find?></span></strong></h3>
         <hr>
         <?php if ($result_search == null) { }
            else{ ?>
               <div class="row">
                  <?php foreach ($result_search as $value) { ?>
                     <div class="col-md-3 col-sm-6">
                        <div class="products">
                           <?php if ($value['status'] != null) { ?>
                              <div class="offer"><?=$value['status']?></div>
                           <?php }
                           else { } ?>
                           <div class="thumbnail"><a href="#" ><img src="./<?=$value['image']?>" alt="Product Image" class="zoom"></a></div>
                           <div class="productname"><?=$value['name']?></div>
                           <h4 class="price"><?=$value['price']?> VNĐ</h4>
                           <div class="button_group"><button class="button add-cart" type="button">Thêm vào giỏ</button><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                        </div>
                     </div>
                  <?php } ?>
               </div>
            <?php } ?>
      </div>
   </header>
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
   							<a href="index.php">Home</a>
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