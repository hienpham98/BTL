<?php
	include("lib_db.php");
	session_start();
	//get input
	$fields = "cid,name";
	$data = array();
	$cid = isset($_REQUEST["cid"]) ? $_REQUEST["cid"] : 0;
	$name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : "";
	//tao sql
	$sql = "insert into product (cid,name)
	values ('{$cid}','{$name}')";
	//cid,img,title,code,description,body,status
	//echo $sql;exit();
	$ret = exec_update($sql);
	//print_r($ret);exit();
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
		<a class="btn btn-primary btn-lg padding" href="upload_product.php" style="user-select: none;">Nhấn để quay trở lại</a>
	</div>


</body>
</html>