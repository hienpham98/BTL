<?php
	include("lib_db.php");
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	function get_upload($name){
		//kiem tra error
		if (!$_FILES
			|| !isset($_FILES[$name])
			|| !isset($_FILES[$name]["name"])
			|| !isset($_FILES[$name]["tmp_name"])
			|| !isset($_FILES[$name]["size"])
		){
			return "";
		}
		$ext = strtolower(pathinfo($_FILES[$name]["name"],PATHINFO_EXTENSION));
		$target_dir = "upload";
		$filename = date('d-m-Y_h-i-s');
		$target_file = "{$target_dir}/{$filename}.{$ext}";
		#echo $target_file;exit();
		if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
			return $target_file;
		} else {
			return "";//upload error
		}
	}



	//get input
	function get_input($name){
		return isset($_REQUEST[$name]) ? trim($_REQUEST[$name]) : "";
	}
	$id = get_input("id") * 1;
	$pid = get_input("pid") * 1;
	$title = get_input("title");
	$description = get_input("description");
	$status = get_input("status");
	$price = get_input("price");
	$path_img = get_upload("path-name");
	
	
	//tao sql
	$stitle = sql_str($title);
	$sdescription = sql_str($description);
	$sstatus = sql_str($status);
	$sprice = sql_str($price);
	$spath_img = sql_str($path_img);
	$date = date("Y-m-d H:i:s");
	
	//Check xem người dùng có nhập ảnh mới không nếu không thì ko update image trong CSDL
	if ($path_img != "") {
		$sql = "UPDATE product_child SET pid = '{$pid}', name = '{$stitle}', description = '{$sdescription}', status = '{$sstatus}', price = '{$sprice}', image = '{$spath_img}', LastUpdated = '{$date}' where id = '{$id}'";
	}
	else {
		$sql = "UPDATE product_child SET pid = '{$pid}', name = '{$stitle}', description = '{$sdescription}', status = '{$sstatus}', price = '{$sprice}', LastUpdated = '{$date}' where id = '{$id}'";
	}
	$ret = exec_update($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Complete Edit</title>

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
		alert('Sửa sản phẩm thành công!');
	</script>
	
	<div class="block">
		<img src="images system/norobot.jpeg" alt="No Robot" width="200" height="200">
	</div>
	<div class="block2">
		<a class="btn btn-primary btn-lg padding" href="update_delete_product.php" style="user-select: none;">Nhấn để quay trở lại</a>
	</div>


</body>
</html>