<?php
	include("lib_db.php");
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

	$pid = get_input("pid") * 1;
	$title = get_input("title");
	$description = get_input("description");
	$price = get_input("price");
	$path_img = get_upload("path-name");
	
	//tao sql
	$stitle = sql_str($title);
	$sdescription = sql_str($description);
	$sprice = sql_str($price);
	$spath_img = sql_str($path_img);
	
	
	//tao sql
	$sql = "insert into product_child (pid,name,description,price,image)
	values ('{$pid}','{$stitle}','{$sdescription}','{$sprice}','{$spath_img}')";

	$ret = exec_update($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Complete Insert</title>

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
		alert('Thêm tin bài thành công!');
	</script>
	
	<div class="block">
		<img src="images system/norobot.jpeg" alt="No Robot" width="200" height="200">
	</div>
	<div class="block2">
		<a class="btn btn-primary btn-lg padding" href="upload_productchild.php" style="user-select: none;">Nhấn để quay trở lại</a>
	</div>


</body>
</html>