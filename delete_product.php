<?php
	include("lib_db.php");
	session_start();
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
	if ($id<  1) return ;
	//tao sql
	$sql = "select * from product_child 
	where id={$id}";
	$result = select_one($sql);

	if (!$result) return ;
	//Login section
  	if (!isset($_SESSION['username_admin'])) {
  		$_SESSION['msg'] = "Bạn phải đăng nhập trước";
  		header('location: login.php');
  	}
  	if (isset($_GET['logout'])) {
	  	session_destroy();
	  	unset($_SESSION['username_admin']);
	  	header("location: login_admin.php");
  	}
  	//End login section
  	
  	//Lấy ra id danh mục sản phẩm của sản phẩm cần sửa thông tin
  	$sql_id = "SELECT id FROM category WHERE id = (SELECT cid FROM product WHERE id = {$result['pid']})";
  	$result_id = select_one($sql_id);

  	//Lấy ra tất cả các danh mục sản phẩm
  	$sql_cate = "Select * from category";
  	$result_cate = select_list($sql_cate);

  	//Lấy ra danh sách loại sản phẩm của danh mục sản phẩm đã chọn bên trên
  	$sql_product = "Select * from product where cid = {$result_id['id']}";
  	$result_product = select_list($sql_product);

  	//Lấy tên loại sản phẩm của sản phẩm đang cần sửa thông tin
  	$sql_productGoal = "Select * from product where id = {$result['pid']}";
  	$result_productGoal = select_one($sql_productGoal);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản trị web - Edit Product</title>
	<!-- <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/form.css">
	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/all.js"></script>
</head>
<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<i class="fas fa-chalkboard-teacher" style="color: white; font-size: 1.5em;"></i>
		<span class="navbar-text" style="padding-left: 0.7em; padding-right: 2em; color: white;">Welcome Admin<span style="font-weight: 700;"><?php echo $_SESSION['username_admin']; ?></span></span>
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
						<a class="dropdown-item" href="upload_product.php">Insert Product</a>
						<a class="dropdown-item" href="upload_productchild.php">Insert ProductChild</a>
					</div>
				</li>
				<li class="nav-item" >
                	<a class="nav-link active" href="update_delete_product.php">Edit & Delete Product</a>
                </li>
				<li class="nav-item" >
                	<a class="nav-link" href="upload_product.php?logout='1'" style="color: red;">Log out</a>
                </li>
			</ul>
		</div>
	</nav>
	<!-- End Navigation -->

	<form action="delete_product_exec.php" method="post" class="margin" enctype="multipart/form-data">
		<div class="form-inline row padding">
			<label for="inputId" class="col-sm-2 col-form-label">ID:</label>
			<div class="col-sm-10">
				<input name="id" class="form-control importdatacheck" id="inputId" value="<?php echo $result["id"] ?>" readonly>
			</div>
		</div>
		<div class="form-inline row padding">
			<label class="col-sm-2 col-form-label">Danh mục sản phẩm:</label>
			<div class="col-sm-10">
				<select class="form-control" id="exampleFormControlSelect1" name="type" disabled>
					<option value="" style="color: gray;">Chọn danh mục sản phẩm</option>
					<?php foreach ($result_cate as $item) {?>
						<?php if ($item[id] == $result_id[id]): ?>
							<option selected value="<?php echo $item["id"]?>"><?php echo $item["name"]?></option>;
						<?php continue; endif ?>
						<option value="<?php echo $item["id"]?>"><?php echo $item["name"]?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-inline row padding">
			<label class="col-sm-2 col-form-label">Loại sản phẩm:</label>
			<div class="col-sm-10">
				<select class="form-control" id="exampleFormControlSelect2" name="pid" disabled>
					<option value="" style="color: gray;">Chọn loại sản phẩm</option>
					<?php foreach ($result_product as $item) { ?>
						<?php if ($item[id] == $result_productGoal[id]): ?>
							<option selected value="<?php echo $item["id"]?>"><?php echo $item["name"]?></option>;
						<?php continue; endif ?>
						<option value="<?php echo $item["id"]?>"><?php echo $item["name"]?></option>;
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-inline row padding">
			<label for="inputImage" class="col-sm-2 col-form-label">Ảnh của sản phẩm:</label>
			<div class="col-sm-10">
				<img src="<?php echo $result['image'];?>" alt="Old Product Image" width="300" height="200">
			</div>
		</div>
		<div class="form-inline row padding">
			<label for="inputName" class="col-sm-2 col-form-label">Tên sản phẩm:</label>
			<div class="col-sm-10">
				<input name="title" class="form-control importdatacheck" id="inputName" placeholder="Tên sản phẩm..." value="<?php echo $result['name'];?>" readonly>
			</div>
		</div>
		<div class="form-inline row padding">
			<label for="inputDes" class="col-sm-2 col-form-label">Ghi chú sản phẩm:</label>
			<div class="col-sm-10">
				<textarea class="form-control importdatacheck changeinput" name="description" rows="5" id="inputDes" placeholder="Ghi chú..." readonly><?php echo $result['description'];?></textarea>
			</div>
		</div>
		<div class="form-inline row padding">
			<label for="inputDes" class="col-sm-2 col-form-label">Trạng thái sản phẩm:</label>
			<div class="col-sm-10">
				<input name="status" class="form-control importdatacheck" id="inputSts" placeholder="Trạng thái sản phẩm..." value="<?php echo $result['status'];?>" readonly>
			</div>
		</div>
		<div class="form-inline row padding">
			<label for="inputPrice" class="col-sm-2 col-form-label">Giá sản phẩm:</label>
			<div class="col-sm-10">
				<input name="price" class="form-control importdatacheck" id="inputPrice" placeholder="Giá sản phẩm..." value="<?php echo $result['price'];?>" readonly>
			</div>
		</div>
		<div class="form-inline row padding" style="padding-left: 58px;">
			<label for="inputPrice" class="col-form-label">Bạn chắc chắn muốn xóa sản phẩm này chứ ?</label>
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary btncheck" name="insertdata" style="margin-left: 10.9em;">Yes</button>
				<a class="btn btn-danger" href="update_delete_product.php" style="margin-left: 2.5em;">No</a>
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