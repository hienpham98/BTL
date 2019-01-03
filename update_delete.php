<?php
	include("lib_db.php");
	session_start();

	//Login session
  	if (!isset($_SESSION['username'])) {
  		$_SESSION['msg'] = "Bạn phải đăng nhập trước";
  		header('location: login_admin.php');
  	}
  	if (isset($_GET['logout'])) {
	  	session_destroy();
	  	unset($_SESSION['username']);
	  	header("location: login_admin.php");
  	}
  	//End login session
  	
  	$sql = "select * from category";
	$result = exec_select($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản trị web - Insert Content</title>

	<!-- <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/form.css">
	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/all.js"></script>
	<!-- Hàm js disabled button Post khi chưa thỏa mãn điều kiện -->
	<script>
        $(document).ready(function() {
            $('.btncheck').attr('disabled', true);
            
            $('.importdatacheck').on('keyup',function()
            {
                var text_length = $("#inputTitle").val();
                var choice1 =  $('#exampleFormControlSelect1').val();

                if(text_length != '' && text_length.length >= 3 && choice1 != "")
                {
                    $('.btncheck').attr('disabled', false);
                } else {
                	$('.btncheck').attr('disabled', true);
                }
            });

            $('#exampleFormControlSelect1').change(function () {
			 	var choice2 =  $('#exampleFormControlSelect1').val();
			 	var text_length = $("#inputTitle").val();
			 	
			 	if(choice2 == "")
			 	{
			 		$('.btncheck').attr('disabled', true);
			 	} else {
			 		if(text_length != '' && text_length.length >= 3){
			 			$('.btncheck').attr('disabled', false);
			 		}
			 	}
			})

        });
    </script>
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<i class="fas fa-chalkboard-teacher" style="color: white; font-size: 1.5em;"></i>
		<span class="navbar-text" style="padding-left: 0.7em; padding-right: 2em; color: white;">Welcome Admin <span style="font-weight: 700;"><?php echo $_SESSION['username']; ?></span></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Insert
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item active" href="upload_product.php">Insert Product</a>
						<a class="dropdown-item" href="upload_productchild.php">Insert ProductChild</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Edit & Delete
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="update_delete.php">Edit & Delete Content</a>
						<a class="dropdown-item" href="update_delete_child.php">Edit & Delete ContentChild</a>
					</div>
				</li>
				<li class="nav-item" >
                	<a class="nav-link" href="upload_product.php?logout='1'" style="color: red;">Log out</a>
                </li>
			</ul>
		</div>
	</nav>
	<!-- End Navigation -->

	
	<form action="upload_product_exec.php" method="post" class="margin">
		<div class="form-inline row padding">
			<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Loại sản phẩm:</label>
			<div class="col-sm-10">
				<select class="form-control" id="exampleFormControlSelect1" name="cid">
					<option value="" style="color: gray;">Chọn danh mục sản phẩm</option>
					<?php foreach ($result as $item) {?>
						<option value="<?php echo $item["id"]?>"><?php echo $item["name"]?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-inline row padding">
			<label for="inputTitle" class="col-sm-2 col-form-label">Name:</label>
			<div class="col-sm-10">
				<input name="name" class="form-control importdatacheck" id="inputTitle" placeholder="Title..." value="">
			</div>
		</div>
		<div class="form-inline row padding" style="padding-left: 58px;">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary btncheck" name="insertdata" style="margin-left: 10.9em;">Save</button>
			</div>
		</div>
	</form>


	

	<!-- Footer Section -->
	<footer>
		<div class="container-fluid">
			<div class="row text-center">
				<div class="col-12">
					<h5><span>&copy; Copyright 2018</span> Master admin hienpt62@wru.vn - All Rights Reserved</h5>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer Section -->
</body>
</html>     