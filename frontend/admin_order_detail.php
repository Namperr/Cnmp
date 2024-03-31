<?php
include "../backend/connect.php";
session_start();
if(!isset($_SESSION['mySession'])){
  header('location: login.php');
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
    <link rel="stylesheet" href="./assets/admin_order_detail.css"/>
    <title>Admin_order</title>
  </head>
<body style="height: 2000px">
      <div class="menu">
      <ul>
            <li class="list_option"><a href="./admin_product.php" class="option">PRODUCT</a></li>
            <li class="list_option"><a href="./admin_order.php" class="option" style="font-weight:bold;color:black;background-color:white;">ORDERS</a></li>
            <li class="list_option"><a href="./statistics.php" class="option">STATISTICS</a></li>
            <li class="list_option"><a href="./index.php" class="option">HOME</a></li>
            <li class="list_option"><a href="../backend/logout.php" class="option ">LOGOUT</a></li>
          </ul>
      </div>
      <div class="info" style="padding: 20px 20px 20px 121px;">
      <?php
      $idnguoidung = $_GET['this_id'];
      $sql="SELECT *FROM chitietnguoidung WHERE id='$idnguoidung'";
      $result=mysqLi_query($conn,$sql);
      $row=mysqli_fetch_array($result);
      ?>
      <ul>
        <li class="thongtin"><span style="color:red;text-decoration:underline;">Full name :</span> <?php echo $row['hoten']; ?></li>
        <li class="thongtin"><span style="color:red;text-decoration:underline;">Address :</span><?php echo $row['diachi']; ?></li>
        <li class="thongtin"><span style="color:red;text-decoration:underline;">Phone number :</span><?php echo $row['sodienthoai']; ?></li>
        <li class="thongtin"><span style="color:red;text-decoration:underline;">Gmail :</span><?php echo $row['gmail']; ?></li>
      <?php 
      $sql="SELECT * FROM trangthaidonhang WHERE idnguoidung = $idnguoidung";
      $result = mysqLi_query($conn,$sql);
      $row=mysqli_fetch_array($result);
      ?>
       <li class="thongtin"><span style="color:red;text-decoration:underline;">Payment : </span><?php echo $row['payment']; ?></li>
       <li class="thongtin"><span style="color:red;text-decoration:underline;">Trangsport : </span><?php echo $row['phuongthucvanchuyen']; ?></li>
       <li class="thongtin"><span style="color:red;text-decoration:underline;">Status :</span>
       <?php
       $status="";
       $check=$row['Trangthaidonhang'];
       if($row['Trangthaidonhang']==1){
        $status="Order is waiting to be accepted.";
       }
       elseif($row['Trangthaidonhang']==0){
        $status="You have declined the order";
       }
       else{
        $status="Wait for customer confirmation of receipt";
       }
        echo $status; 
        ?>
        </li>
      </ul>
      <?php 
      $sql="SELECT * FROM trangthaidonhang WHERE idnguoidung = $idnguoidung";
      $result = mysqLi_query($conn,$sql);
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
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $name="";
                        $price="";
                        $image="";
                        $Total=0;
                        $cnt=1;
                        while($row = mysqli_fetch_array($result)){
                            $cnt=$cnt+1;
                            $name=$row['name'];
                            $price=$row['price'];
                            $image=$row['img'];
                            $quantity=$row['soluong'];
                            $size=$row['size'];
                            $Total=$Total + $quantity*intval(str_replace(['.', 'đ'], '',$price));
                        ?>
                        <tr>
                            <td style="font-style:italic;"><?php echo $name;?></td>
                            <td><?php echo $price;?></td>
                            <td><img src="../img/product/<?php echo $image;?>" width="50" alt="" class="thumb"></td>
                            <td>
                              <?php echo $quantity;?>
                            </td>
                            <td>
                              <?php echo $size;?>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                    <tr>
                          <td>Total</td>
                          <td colspan="4"><?php echo number_format($Total)."đ";?></td>
                        </tr>
                    </tfoot>
                    </table>
                    <?php
                    if($check==1){
                    ?>
                    <button type="submit" name="acept_btn" class="btn"><a href="../backend/Accept_order.php?this_id=<?php echo $idnguoidung;?>" style="color:white;">Accept order</a></button>
                    <form action="../backend/Reject_order.php?this_id=<?php echo $idnguoidung;?>" method="POST">
                    <div style="display:flex;margin :10px 10px 0 0;">
                        <input type="text" name="reason" placeholder="Reason for cancellation" style="width:400px">
                        <button type="submit" name="reject_btn" class="btn" style="margin-left:10px">Reject order</button>
                    </div>
                    </form>
                    <?php
                    }
                    ?>
      </div>
</body>
</html> 