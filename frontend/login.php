<?php
$ttdangki=0;
include "../backend/connect.php";
session_start();
if(isset($_POST['button'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $kiem_tra_username ="SELECT id FROM nguoidung WHERE username ='$username'";
  $result1 = $conn->query($kiem_tra_username);
  $row1=mysqli_fetch_array($result1);
  $kiem_tra_password ="SELECT id FROM nguoidung WHERE password ='$password'";
  $result2 = $conn->query($kiem_tra_password);
  $row2=mysqli_fetch_array($result2);
  if($row1['id']==$row2['id']){
    ?>
    <script>
      alert("Logged in successfully!!!");
    </script>
<?php
$_SESSION['mySession']=$username;
if($username != 'admin'){
 header('Location: ./index.php');
}
else{
  header('location: ./admin_product.php');
}
  }
  elseif($row1['id']!=$row2['id']){
    ?>
    <script>
      alert("Wrong password!!!");
    </script>
    <?php
  }
  elseif(mysqli_num_rows($result1)==0){
    ?>
    <script>
      alert("Account does not exist!!!");
    </script>
<?php  
  }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/reset.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/login.css" />
    <title>Login</title>
  </head>
<body>
<header class="header fixed">
      <div class="main-content">
        <div class="body">
          <img
            src="../img/website_frontend_pic/Anh_logo.jpg"
            width="150px"
            alt=""
            class="logo"
          />
          <nav class="nav">
            <ul>
              <li>
                <a href="./index.php"><span class="HOME">HOME</span></a>
              </li>
              <li>
                <a href="./product_frontend.php" class="PRODUCT">PRODUCT</a>
              </li>
              <li>
                <a href="./size_chart.php" class="SIZE CHART">SIZE CHART</a>
              </li>
              <li>
                <a href="./about_us.php" class="ABOUT US">ABOUT US</a>
              </li>
            </ul>
          </nav>

          <div class="action">
            <a href="./login.php" class="btn btn_signup">SIGN UP</a>
          </div>
        </div>
      </div>
    </header>
    <main>
      <div style="display:flex; justify-content: center;margin-top:5px;font-size:25px;font-weight:bold;"><span>User login:</span></div>
      <div style="display:flex; justify-content: center;">
        <form action="#" method="POST">
          <div class="form" style="height: 326px">
            <label for="username"><span style="font-weight:bold;color:white">Username</span></label>
            <input type="text" id="username" name="username" class="input"> 
            <label for="password"><span style="font-weight:bold;color:white">Password</span></label>
            <input type="password" id="password" name="password" class="input">
            <button type="submit" name="button" class="button" style="font-weight:bold;">Login</button>
            <a href="./create_acc.php"><span style="font-style:italic;text-decoration:underline;font-size:14px;color:white">Create account</span></a>
            <a href="./forgot_password.php"><span style="font-style:italic;text-decoration:underline;font-size:14px;color:white">Forgot password</span></a>
          </div>
        </form>
      </div >
</main>
<footer class="footer">
      <div class="main-content">
        <div class="row">
          <div class="column">
            <h3 class="title"><strong>Experience VANS Strore right at home</strong></h3>
            <ul class="list">
              <li>
                <p>Shop Vans online</p>
              </li>
              <li>
                <p>Address: Hồ Chí Minh</p>
              </li>
              <li>
                <p>Hotline: 0866956907</p>
              </li>
            </ul>
          </div>
          <div class="column">
            <h3 class="title"><strong>Policy</strong></h3>
            <ul class="list">
              <li>
                <p>Payment policy</p>
              </li>
              <li>
                <p>Return policy</p>
              </li>
              <li>
                <p>Warranty policy</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
</body>
</html>