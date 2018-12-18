<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Đăng ký thành viên</title>
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
</head>
  <body>
    <div class="header">
    <h2>Đăng ký thành viên</h2>
  </div>
	
  <form accept-charset="UTF-8" method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Họ đệm</label>
      <input type="text" name="hodem" value="<?php echo $hodem; ?>">
    </div>
    <!-- <div class="input-group">
      <label>Tên</label>
      <input type="text" name="Ten" value="<?php echo $Ten; ?>">
    </div>
    <div class="input-group">
      <label>Địa chỉ</label>
      <input type="text" name="DiaChi" value="<?php echo $DiaChi; ?>">
    </div> -->
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
      <label>Tài khoản</label>
      <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <label>Mật khẩu</label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label>Nhập lại mật khẩu</label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Đăng ký</button>
    </div>
    <p>Bạn đã là thành viên ? <a href="login.php">Đăng nhập</a></p>
  </form>
</body>
</html>