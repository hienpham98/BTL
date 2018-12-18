<?php
	#print_r($_REQUEST); exit();
	#print_r($_FILES); exit();
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
	
	$cid = get_input("pid") * 1;
	$path_img = get_upload("path-name");
	$title = get_input("title-img");
	$price= get_input("price");
	$description = get_input("description");
	
	//tao sql
	$stitle = sql_str($title);
	$sprice = sql_str($price);
	$sdescription = sql_str($description);
	$spath_img = sql_str($path_img);
	
	$sql  = "INSERT INTO `product_child`";
	$sql .= " (pid, name, price, description, image) ";
	$sql .= " VALUES (";
	$sql .= "	'{$cid}', ";
	$sql .= "	'{$stitle}', ";
	$sql .= "	'{$sprice}', ";
	$sql .= "   '{$sdescription}', ";
	$sql .= "	'{$spath_img}' ";
	$sql .= ")";
	//echo "sql=[$sql]"; exit();
	//Thuc thi sql
	$ret = exec_update($sql);
	//header("Location:search_product.php");
	//exit();
?>
Upload nội dung thành công.  <a href="add.php">Về trang Admin</a>
