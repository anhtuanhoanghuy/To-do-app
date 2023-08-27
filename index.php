<?php require 'db_connection.php';
session_start();
if(isset($_SESSION['username'])) {
    header('location:admin.php');
}
if (isset($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($username) && isset($password)) {
        $result = $conn->query("SELECT * FROM account WHERE username = '$username' AND password ='$password'");
        if ($result->rowCount() ==  1) {
            $_SESSION['username'] = $username;
            header('location:admin.php');
        } else {
            header('location:index.php');
        }
        $conn = null;
        exit();

    }
}

if (isset($_POST['dangky']) && $_POST['register_username'] != "" && $_POST['register_password'] != "" && $_POST['register_repassword'] != "") {
    $register_username = $_POST['register_username'];
    $register_password = $_POST['register_password'];    
    $register_repassword = $_POST['register_repassword'];
    if($register_password != $register_repassword) {
        header('location:index.php');
    } else {
        $result = $conn->query("SELECT * FROM account WHERE username = '$register_username'");
        if ($result->rowCount() != 0) {
            header('location:index.php');
        } else {
            $addaccount = $conn->query("INSERT INTO account(username,password) VALUES ('$register_username','$register_password')");
            $create_table = $conn->query("
                CREATE TABLE $register_username( 
                    id INT AUTO_INCREMENT,
                    title TEXT NOT NULL, 
                    date_time TIMESTAMP NOT NULL, 
                    checked BOOLEAN DEFAULT '0' NOT NULL,
                    PRIMARY KEY(id)
                )");
            header('location:admin.php');
        }
        $conn = null;
        exit();

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/login.css">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
</head>
<body background = "login.jpg">
<div class="container" id="container">
<div class="form-container register-container">
  <form action="#" method = 'POST'>
    <h1>Register hire.</h1>
    <input type="text" placeholder="Tên sử dụng" name="register_username">
    <input type="password" placeholder="Mật khẩu" name="register_password">
    <input type="password" placeholder="Gõ lại mật khẩu" name="register_repassword">
    <button type="submit" name= "dangky" id="register-btn">ĐĂNG KÝ</button>
  </form>
</div>

<div class="form-container login-container">
  <form action="#" method = 'POST'>
    <h1>Login hire.</h1>
    <input type="text" placeholder="Tên đăng nhập" name="username">
    <input type="password" placeholder="Mật khẩu" name="password">
    <button type="submit" name= "dangnhap" id="login-btn">ĐĂNG NHẬP</button>
  </form>
</div>

<div class="overlay-container">
  <div class="overlay">
    <div class="overlay-panel overlay-left">
      <h1 class="title">Hello <br> friends</h1>
      <p>if You have an account, login here and have fun</p>
      <button class="ghost" id="login">Đăng nhập
        <i class="lni lni-arrow-left login"></i>
      </button>
    </div>
    <div class="overlay-panel overlay-right">
      <h1 class="title">Start your <br> journey now</h1>
      <p>if You don't have an account yet, join us and start your journey.</p>
      <button class="ghost" id="register">Đăng ký
        <i class="lni lni-arrow-right register"></i>
      </button>
    </div>
  </div>
</div>

</div>
<script src="./js/login.js"></script>
</body>
</html>
