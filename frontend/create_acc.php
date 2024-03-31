<?php
include "../backend/connect.php";  
if(isset($_POST['button'])){    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];
    if($password == $retype_password){
    $sql="INSERT INTO nguoidung (username,password) VALUE('$username','$password')";
    mysqLi_query($conn,$sql);
    ?>
    <script>
      alert("Successful");
    </script>
    <?php
    header('location: login.php');
    }
    else{
      ?>
      <script>
        alert("Fail");
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
    <title>Create account</title>
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

          <?php
          session_start();
          if(!isset($_SESSION['mySession'])){
          ?>
          <div class="action">
            <a href="./login.php" class="btn btn_signup">SIGN UP</a>
          </div>
          <?php
          }
          else{
            ?>
            <div class="action">
            <a href="./profile_info.php" class="btn btn_signup"><?php echo $_SESSION['mySession']; ?></a>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
    </header>
    <main>
    <div style="display:flex; justify-content: center;margin-top:5px;font-size:25px;font-weight:bold"><span>User register:</span></div>
    <div style="display:flex; justify-content: center;">
      <form action="#" method="POST">
        <div class="form" style="height: 350px">
          <label for="username"><span style="font-weight:bold;color:white">Username</span></label>
          <input type="text" id="username" name="username" class="input"> 

          <label for="password"><span style="font-weight:bold;color:white">Password</span></label>
          <input type="password" id="password" name="password" class="input">

          <label for="retype_password"><span style="font-weight:bold;color:white">Retype password</span></label>
          <input type="password" id="retype_password" name="retype_password" class="input">

          <button type="submit" name="button" class="button" style="font-weight:bold;">Create</button>
          <a href="./login.php"><span style="font-style:italic;text-decoration:underline;font-size:14px;color:white">Login</span></a>
          <a href="./forgot_password.php"><span style="font-style:italic;text-decoration:underline;font-size:14px;color:white">Forgot password</span></a>
        </div>
      </form>
        </div>
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