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
$sql="SELECT * FROM trangthaidonhang WHERE idnguoidung = $id";
$result = mysqLi_query($conn,$sql);
$row=mysqli_fetch_array($result);
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
    <link rel="stylesheet" href="./assets/your_order.css"/>
    <title>Your order</title>
  </head>
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
            <li class="list_option"><a href="./profile_info.php" class="option option1" name="TATCA">INFOMATION</a></li>
            <li class="list_option"><a href="./your_cart.php" class="option option1" name="CLASSIC" >YOUR CART</a></li>
            <li class="list_option"><a href="./your_order.php" class="option option2" ><span style="font-weight:bold">YOUR ORDER</span></a></li>
            <li class="list_option"><a href="../backend/logout.php" class="option option3" name="VAULT" >LOGOUT</a></li>
          </ul>
      </div>
          <div style="display:flex;flex-direction:column;">
          <?php
         if($row){
          $trangthaidonhang= $row['Trangthaidonhang'];
          $payment=$row['payment'];
          $phuongthucvanchuyen=$row['phuongthucvanchuyen'];
        ?>
          <div style="padding:10px 0 0 0;">
            <p style="font-style: italic"><span style="color:red">Your order status:</span> 
            <?php
            if($trangthaidonhang == 1){
              echo "Wait for confirmation from the seller.";
            }
            elseif($trangthaidonhang == 2){
              echo "The order has been accepted and is being delivered to you by the seller.";
            }
            elseif($trangthaidonhang == 0){
              echo "The seller has canceled your order.";
            }
            else{
              echo "No orders have been created yet";
            }
            ?>
            </p>
            <?php
            if($trangthaidonhang == 0){
              $sql="SELECT * FROM lydohuyhang WHERE idnguoidung='$id'";
              $result=mysqLi_query($conn,$sql);
              $row=mysqli_fetch_array($result);
              ?>
              <p style="font-style: italic ; margin:10px 0 0 0 "><span style="color:red">Reason:</span> <?php echo $row['lydo'];?></p>
              <?php
            }
              ?>
        </div>
        <p style="font-style: italic ; margin:10px 0 0 0"><span style="color:red">Payment: </span> <?php echo $payment;?></p>
        <p style="font-style: italic ; margin:10px 0 10px 0"><span style="color:red">Transport: </span> <?php $gia;
        if($phuongthucvanchuyen=='normalshipping'){
          $gia='30k';
        }
        else{
          $gia='50k';
        }
        ; echo $phuongthucvanchuyen." - ".$gia;?></p>
        
          <?php
          }
          else{
            ?>
            <p style="font-style: italic ; margin:10px 0"><span style="color:red">Your order status: </span>No orders have been created yet</p>
          <?php
          }
          ?>
            <div class="info">
              <table>
                    <thead >
                        <tr>
                            <th>Product's name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Order date</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $sql="SELECT * FROM trangthaidonhang WHERE idnguoidung = $id";
                        $result = mysqLi_query($conn,$sql);
                        $name="";
                        $price="";
                        $image="";
                        $Total=0;
                        $cnt=1;
                        $check=1; 
                        $x=mysqli_num_rows($result);
                        while($row = mysqli_fetch_array($result)){
                            $cnt=$cnt+1;
                            $name=$row['name'];
                            $price=$row['price'];
                            $image=$row['img'];
                            $quantity=$row['soluong'];
                            $size=$row['size'];
                            $order_date=$row['ngaydathang'];
                            $Total=$Total + $quantity*intval(str_replace(['.', 'đ'], '',$price));
                        ?>
                        <tr>
                            <td style="font-style:italic;"><?php echo $name;?></td>
                            <td><?php echo $price;?></td>
                            <td><img src="../img/product/<?php echo $image;?>" width="50" alt="" class="thumb"></td>
                            <td>
                              <?php echo $quantity;?>
                            </td>
                            <td><?php echo $size;?></td>
                            <?php
                            if($check == 1){
                              $check=$check-1;
                            ?>
                            <td rowspan="<?php echo $x;?>"><?php echo $order_date; ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                          <td>Total</td>
                          <td colspan="5"><?php echo number_format($Total)."đ";?></td>
                        </tr>
                    </tfoot>
              </table>
              <?php 

              $sql="SELECT *FROM trangthaidonhang WHERE idnguoidung='$id'";
              $result=mysqLi_query($conn,$sql);
              $row=mysqli_fetch_array($result);
              if($row){
              if($row['Trangthaidonhang']==2){
              ?>
              <form action="../backend/Received_order_success.php?this_id=<?php echo $id;?>" method="POST">
                <button type="submit" name="Received_btn" class="btn" style="margin-top:20px;">Received the goods</button>
              </form>
              <?php
              }
              elseif($row['Trangthaidonhang']!=2){
                ?>
              <form action="../backend/received_order_fail.php?this_id=<?php echo $id;?>" method="POST">
                <button type="submit" name="Received_btn" class="btn" style="margin-top:20px;">Delete</button>
              </form>
              <?php
              }
            }
              ?>
            </div>
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
