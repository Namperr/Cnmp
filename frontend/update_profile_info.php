<?php
include "../backend/connect.php";
session_start();
if(!isset($_SESSION['mySession'])){
  header('location: login.php');
}
else{
  if(isset($_POST['btn'])){
$username = $_SESSION['mySession'];
$sql="SELECT * FROM nguoidung WHERE username='$username'";
$result = mysqLi_query($conn,$sql);
$row=mysqli_fetch_array($result);
$id = $row['id'];
$hoten =  $_POST['hoten'];
$diachi = $_POST['diachi'];
$sodienthoai = $_POST['sodienthoai'];
$gmail = $_POST['gmail'];
$sql="UPDATE chitietnguoidung SET hoten = '$hoten',diachi = '$diachi',sodienthoai='$sodienthoai', gmail='$gmail' WHERE id = $id";
mysqLi_query($conn,$sql);
echo "<script>
alert('Update successful');
</script>";
header('location: profile_info.php');
}}
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
    <link rel="stylesheet" href="./assets/profile_info.css" />
    <title>Update-Frofile INFOMATION</title>
  </head>
<body style="height: 960px">
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
          if (session_status() == PHP_SESSION_NONE) {
            session_start();
        } 
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
    <div class="menu">
    <ul>
            <li class="list_option"><a href="./profile_info.php" class="option option1" name="TATCA" ><span style="font-weight:bold">INFOMATION</span></a></li>
            <li class="list_option"><a href="./your_cart.php" class="option option2" name="CLASSIC" >YOUR CART</a></li>
            <li class="list_option"><a href="./your_order.php" class="option " >YOUR ORDER</a></li>
            <li class="list_option"><a href="../backend/logout.php" class="option option3" name="VAULT" >LOGOUT</a></li>
          </ul>
      </div>
      <?php
      $username = $_SESSION['mySession'];
      $sql=  "SELECT * FROM nguoidung WHERE username='$username'";
      $result=mysqLi_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      $idnguoidung=$row['id'];
      $sql=  "SELECT * FROM chitietnguoidung WHERE id='$idnguoidung' ";
      $result=mysqLi_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      ?>
    <form action="#" method="POST"  class="info">
        <div class="content"><p class="demuc"><span class="aa">First and last name:</span> <input type="text" name="hoten" class="data"  value="<?php echo $row['hoten'];?>"></div>
        <div class="content">
          <p class="demuc"><span class="aa">Address:</span> <input type="text" name="diachi" class="data" value="<?php echo $row['diachi'];?>"></p>
        </div>
        <div class="content">
          <p class="demuc"><span class="aa">Phone number:</span> <input type="text" name="sodienthoai" class="data" value="<?php echo $row['sodienthoai'];?>"></p>
        </div>
        <div class="content">
          <p class="demuc"><span class="aa">Gmail:</span> <input type="text" name="gmail" class="data" value="<?php echo $row['gmail'];?>"></p>
        </div>
        <a href=""><button type="submid" name="btn" class="btn ">UPDATE PROFILE</button></a>
      </form>
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