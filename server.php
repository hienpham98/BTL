<?php
session_start();/* Dòng này dùng đăng ký phiên làm việc của người dùng trên Server, từ đó
Server sẽ tạo ra 1 ID riêng không trùng lặp để nhận diện cho client hiện tại */

// initializing variables
$hodem = "";
// $Ten = "";
// $DiaChi = "";
$email    = "";
$username = "";
$errors = array();

//Kết nối đến database
$db = mysqli_connect('localhost', 'root', '', 'shop_my_pham');


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // Nhận toàn bộ các giá trị input từ form
  $hodem = mysqli_real_escape_string($db, $_POST['hodem']);
  // $Ten = mysqli_real_escape_string($db, $_POST['Ten']);
  // $DiaChi = mysqli_real_escape_string($db, $_POST['DiaChi']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error into $errors array
  if (empty($hodem)) { array_push($errors, "Bạn chưa nhập họ đệm"); }
  // if (empty($Ten)) { array_push($errors, "Bạn chưa nhập tên"); }
  if (empty($username)) { array_push($errors, "Bạn chưa nhập tài khoản"); }
  // if (empty($DiaChi)) { array_push($errors, "Bạn chưa nhập địa chỉ"); }
  if (empty($email)) { array_push($errors, "Bạn chưa nhập email"); }
  if (empty($password_1)) { array_push($errors, "Bạn chưa nhập password"); }
  if ($password_1 != $password_2) {
    array_push($errors, "Mật khẩu không khớp");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Tài khoản đã tồn tại");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email đã tồn tại");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password, hodem) 
          VALUES('$username', '$email', '$password', '$hodem')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Bạn đã đăng nhập thành công";
  	header('location: index.php');
  }
}
// END REGISTER USER



// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Bạn chưa nhập tài khoản");
  }
  if (empty($password)) {
    array_push($errors, "Bạn chưa nhập password");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Bạn đã đăng nhập thành công";
      header('location: index.php');
    }else {
      array_push($errors, "Sai tài khoản hoặc mật khẩu");
    }
  }
}
// END LOGIN USER


// REGISTER ADMIN
if (isset($_POST['reg_admin'])) {
  // Nhận toàn bộ các giá trị input từ form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error into $errors array
  if (empty($username)) { array_push($errors, "Bạn chưa nhập tài khoản"); }
  if (empty($email)) { array_push($errors, "Bạn chưa nhập email"); }
  if (empty($password_1)) { array_push($errors, "Bạn chưa nhập password"); }
  if ($password_1 != $password_2) {
    array_push($errors, "Mật khẩu không khớp");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users_admin WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Tài khoản đã tồn tại");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email đã tồn tại");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users_admin (username, email, password) 
          VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Bạn đã đăng nhập thành công";
    header('location: upload_product.php');
  }
}
// END REGISTER ADMIN


// LOGIN ADMIN
if (isset($_POST['login_admin'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Bạn chưa nhập tài khoản");
  }
  if (empty($password)) {
    array_push($errors, "Bạn chưa nhập password");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users_admin WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Bạn đã đăng nhập thành công";
      header('location: upload_product.php');
    }else {
      array_push($errors, "Sai tài khoản hoặc mật khẩu");
    }
  }
}
// END LOGIN ADMIN
?>
