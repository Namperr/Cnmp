<?php
include "../backend/connect.php";
session_start();
if(!isset($_SESSION['mySession'])){
  header('location: login.php');
}
else{
$username=$_SESSION['mySession'];
$sql="SELECT * FROM nguoidung WHERE username='$username'";
$result = mysqLi_query($conn,$sql);
$row=mysqli_fetch_array($result);
$id =$row['id'];
$sql="SELECT * FROM chitietnguoidung WHERE id='$id'";
$result = mysqLi_query($conn,$sql);
$row=mysqli_fetch_array($result);
$diachi=$row['diachi'];
$sql="SELECT * FROM giohang WHERE id=$id";
$result = mysqLi_query($conn,$sql);
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
    <link rel="stylesheet" href="./assets/your_cart.css"/>
    <title>Your cart</title>
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
    <div  class="noidungchinh">
      <div class="menu">
          <ul>
            <li class="list_option"><a href="./profile_info.php" class="option option1" name="TATCA" >INFOMATION</a></li>
            <li class="list_option"><a href="./your_cart.php" class="option option2" name="CLASSIC" ><span style="font-weight:bold">YOUR CART</span></a></li>
            <li class="list_option"><a href="./your_order.php" class="option" >YOUR ORDER</a></li>
            <li class="list_option"><a href="../backend/logout.php" class="option option3" name="VAULT" >LOGOUT</a></li>
          </ul>
      </div>
        <div class="info" style="margin-right:10px">
        <table>
                <thead >
                    <tr>
                        <th>Product's name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Date</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                    $name="";
                    $price="";
                    $image="";
                    $Total=0;
                    if (mysqli_num_rows($result) == 0){
                    ?>
                    <p style="font-style:italic; padding:10px 0 20px 0;">Your shopping cart is empty!!</p>
                    <?php   
                    }
                    else{
                    while($row = mysqli_fetch_array($result)){
                        $name=$row['name'];
                        $price=$row['price'];
                        $image=$row['img'];
                        $soluong=$row['Soluong'];
                        $size=$row['size'];
                        $Total=$Total + $soluong*intval(str_replace(['.', 'đ'], '',$price));
                    ?>
                    <tr>
                        <td style="font-style:italic;"><?php echo $name;?></td>
                        <td><?php echo $price;?></td>
                        <td><img src="../img/product/<?php echo $image;?>" width="50" alt="" class="thumb"></td>
                        <td><?php echo $soluong; ?></td>
                        <td><?php echo $size; ?></td>
                        <td><?php echo $row['ngay']?></td>
                        <td><button type="submit" class="btn_delete"><a href="../backend/Delete_product.php?this_id=<?php echo $row['idsanpham'];?>" style="font-style: italic; color:white;">Delete</a></button></td>
                    </tr>
                    <?php
                    }
                  }
                    ?>
                </tbody>
                <tfoot>
                <tr>
                      <td>Total</td>
                      <td colspan="6"><?php echo number_format($Total)."đ";?></td>
                    </tr>
                </tfoot>
          </table>
          <div style="height:5px;border-bottom:1px solid black; margin-top:10px"></div>
          <form action="../backend/thanhtoan.php?id=<?php echo $id.".".$Total;?>" method="post" style="display: flex;flex-direction:column">
            <div style="padding:10px 0">
            <p style="font-style:italic; padding:10px 0 20px 0;">Address: <?php echo $diachi;?></p>
            <label for="vanchuyen">Transport:</label>
            <Select id="vanchuyen" name="vanchuyen" class="ele">
              <option value="fastshipping">Fast Shipping: 50.000vnđ</option>
              <option value="normalshipping">Normal Shipping: 30.000vnđ</option>
            </Select><br>
            <br>
            <div style="height:5px;border-bottom:1px solid black; margin:10px 0"></div>
              <label for="thanhtoan">Payments:</label>
            <select name="thanhtoan" class="ele" id="thanhtoan">
              <option value="vnpay">VNPAY</option>
              <option value="ttkhinhanhang">Payment on delivery</option>
            </select>
            </div>
            <?php
            $sql="SELECT *FROM giohang WHERE id='$id'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
            ?>
            <div><button type="submit" style="margin-top:10px;" class="btn ele" name = "ordernow">ORDER NOW</button></div>
            <?php
            }
            ?>     
          </form>
        </div>
    </div  >
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
