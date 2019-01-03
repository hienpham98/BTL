<?php
	include("lib_db.php");
	session_start();
	$sql = "select * from product_child order by pid asc";
	$result = exec_select($sql);
	//Login section
  	if (!isset($_SESSION['username_admin'])) {
  		$_SESSION['msg'] = "Bạn phải đăng nhập trước";
  		header('location: login_admin.php');
  	}
  	if (isset($_GET['logout'])) {
	  	session_destroy();
	  	unset($_SESSION['username_admin']);
	  	header("location: login_admin.php");
  	}
  	//End login section
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
	<title>Quản trị web - Update & Delete Product</title>

	<!-- <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/form.css">

	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/all.js"></script>
 </head>
 <body>
 	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<i class="fas fa-chalkboard-teacher" style="color: white; font-size: 1.5em;"></i>
		<span class="navbar-text" style="padding-left: 0.7em; padding-right: 2em; color: white;">Welcome Admin <span style="font-weight: 700;"><?php echo $_SESSION['username_admin']; ?></span></span>
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
	<div class="row justify-content-center" style="width: 98%; margin: auto;">
	<table class="table">
		<thead>
			<tr>
				<th><h4 style="user-select: none;">ID</h4></th>
				<th><h4 style="user-select: none;">Name</h4></th>
				<th><h4 style="user-select: none;">Image</h4></th>
				<th><h4 style="user-select: none;">Description</h4></th>
				<th><h4 style="user-select: none;">Price</h4></th>
				<th><h4 style="user-select: none;">Status</h4></th>
				<th><h4 style="user-select: none;">UploadedDate</h4></th>
				<th><h4 style="user-select: none;">LastUpdated</h4></th>
			</tr>
		</thead>
		<?php foreach ($result as $item) {?>
			<tr>
				<td><?php echo $item['id'];?></td>
				<td><?php echo $item['name'];?></td>
				<td><img src="<?php echo $item['image'];?>" alt="Product Image" width="200" height="150"></td>
				<td><?php echo $item['description'];?></td>
				<td><?php echo $item['price'];?></td>
				<td><?php echo $item['status'];?></td>
				<td><?php echo $item['DateInserted'] ?></td>
				<td><?php echo $item['LastUpdated'] ?></td>
				<td><a class="btn btn-primary" href="edit_product.php?id=<?php echo $item['id'];?>">Edit</a></td>
				<td><a class="btn btn-danger" href="delete_product.php?id=<?php echo $item['id'];?>">Delete</a></td>
			</tr>
		<?php } ?>
	</table>
	</div>
 </body>
 </html>