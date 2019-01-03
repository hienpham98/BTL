<?php
	include("lib_db.php");
	date_default_timezone_set("Asia/Ho_Chi_Minh");

	//get input
	function get_input($name){
		return isset($_REQUEST[$name]) ? trim($_REQUEST[$name]) : "";
	}
	$id = get_input("id") * 1;
	
	//Check xem người dùng có nhập ảnh mới không nếu không thì ko update image trong CSDL
	$sql = "Delete From product_child where id = '{$id}'";
	$ret = exec_update($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Complete Delete</title>

	<!-- <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/form_exec.css">

	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/all.js"></script>
</head>
<body>
	<script>
		alert('Xóa sản phẩm thành công!');
	</script>
	
	<div class="block">
		<img src="images system/norobot.jpeg" alt="No Robot" width="200" height="200">
	</div>
	<div class="block2">
		<a class="btn btn-primary btn-lg padding" href="update_delete_product.php" style="user-select: none;">Nhấn để quay trở lại</a>
	</div>


</body>
</html>