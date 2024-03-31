<?php
include "../backend/connect.php";
$id=$_GET['this_id'];
$sql = "SELECT* FROM sanpham WHERE id='$id'";
$row=mysqli_fetch_array(mysqli_query($conn,$sql));
if(isset($_POST['btn'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image=$_FILES['imag']['name'];
    $sanphamhienco=$_POST['quantity'];
    $image_tmp_name = $_FILES['imag']['tmp_name'];
    $type=$_POST['luachon'];
    $sql="UPDATE sanpham SET name ='$name',price='$price',img='$image',type='$type',sanphamhienco='$sanphamhienco' WHERE id='$id'";
    mysqLi_query($conn,$sql);
    move_uploaded_file($image_tmp_name,'../img/product/'.$image);
    header('location: admin_product.php');
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
    <link rel="stylesheet" href="./assets/style_add_pro_ad.css"/>
    <title>Admin_add_pro</title>
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
          elseif($_SESSION['mySession']!='admin'){
            ?>
            <div class="action">
            <a href="./profile_info.php" class="btn btn_signup"><?php echo $_SESSION['mySession']; ?></a>
          </div>
          <?php
          }
          else{
            ?>
            <div class="action">
            <a href="./admin_product.php" class="btn btn_signup"><?php echo $_SESSION['mySession']; ?></a>
          </div>
            <?php
          }
          ?>
          </div>
        </div>
      </div>
    </header>
    <main>
    <div class ="content_box">
      <div class="input_box">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="element">
                <Label for="name">Product's name:</Label>
                <input type="text" id="name" name="name" class="text" value="<?php echo $row['name'];?>">
            </div>
            <div class="element text1">
            <Label for="price">Price:</Label>
            <input type="text" id="price" name="price" class="text" value="<?php echo $row['price'] ?>">
            </div>
            <div class="element text4">
              <label for="soluong">Quantity:</label>
              <input type="number" id="soluong" name="quantity" class="text" value="<?php echo $row['sanphamhienco']?>">
            </div>
            <div class="element text2">
                <Label for="imag">Image:</Label>
                <input type="file" id="imag" name="imag" value="<?php echo $row['img'] ?>">
            </div>
            <div style="margin-left:30px; margin-bottom:20px">
              <label for="luachon">Product Type:</label>
              <select name="luachon" id="luachon" value="<?php echo $row['type'] ?>">
                <option value="classic">VANS CLASSIC</option>
                <option value="knu">VANS VAULT</option>
                <option value="old_skool">VANS OLD_SKOOL</option>
                <option value="slip_on">VANS SLIP_ON</option>
              </select>
            </div>
            <div class="element text3"><button id="submit" name="btn" class="btn_sub">SUBMIT</button></div>
            </form>
            </div>
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