<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Đăng ký Admin</title>
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
</head>
  <body>
    <div class="header">
    <h2>Đăng ký Admin</h2>
  </div>
  
  <form method="post" action="register_admin.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Tài khoản</label>
      <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
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
      <button type="submit" class="btn" name="reg_admin">Đăng ký</button>
    </div>
    <p>Bạn đã đăng ký tài khoản quản trị ? <a href="login_admin.php">Đăng nhập</a></p>
  </form>
</body>
</html>