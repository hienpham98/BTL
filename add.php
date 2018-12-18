<!--php-->
	<?php
		include("lib_db.php");

		$sql = "select * from product";
		$product = select_list($sql);
	?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Admin</title>
	</head>

	<body>
		<div class="header"></div>

		<!--Upload các món ăn và đồ uống mới------------->
			<div class="content">
				<h1>Upload các món ăn và đồ uống mới</h1>
				<br/>
				<form action="./excute_upload.php" method="post" enctype="multipart/form-data">

					<!--Chọn chuyên mục Food/Drink-->
					<div class="row-edit">
						<label>Chuyên mục: </label>
						<select name="pid">
							<?php 
							foreach ($product as $value) {?>
								<option value= " <?php echo $value['id']?> "><?php echo $value['name']?></option>
							<?php } ?>
						</select>
					</div>
					<br/>

					<!--Chọn file để upload lên CSDL-->
					<div class="row-edit">
						<label>Chọn ảnh:  </label>
						<input name="path-name" type="file" />
					</div>
					<br>

					<!--Tiêu cho smón ăn-->
					<div class="row-edit">
						<label>Tiêu đề image: </label>
						<input name="title-img" value=""/>
					</div>
					<br>

					<!--Giá món ăn-->
					<div class="row-edit">
						<label>Giá bán sản phẩm: </label>
						<input name="price" value=""/>
					</div>
					<br>

					<!--Mô tả chi tiết cho món ăn-->
					<div class="row-edit">
						<label>Mô tả chi tiết: </label>
						<textarea name="description"></textarea>
					</div>
					<br>

					<!--Button upload-->
					<div class="row-edit">
						<button type="submit" class="save">Upload</button>
					</div>
				</form>
			</div>
		<div class="footer"></div>

	</body>
</html>