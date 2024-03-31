<?php
include "../backend/connect.php";
$sql="SELECT * FROM thongke ";
$result = mysqLi_query($conn,$sql);
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
    <link rel="stylesheet" href="./assets/admin_order.css"/>
    <title>Admin_order</title>
  </head>
<body style="height: 1000px">
      <div class="menu">
          <ul>
            <li class="list_option"><a href="./admin_product.php" class="option">PRODUCT</a></li>
            <li class="list_option"><a href="./admin_order.php" class="option">ORDERS</a></li>
            <li class="list_option"><a href="./statistics.php" class="option" style="font-weight:bold;color:black;background-color:white;">STATISTICS</a></li>
            <li class="list_option"><a href="./index.php" class="option">HOME</a></li>
            <li class="list_option"><a href="../backend/logout.php" class="option ">LOGOUT</a></li>
          </ul>
      </div>
      <div class="info" style="padding: 20px 20px 20px 121px;">
      <span style="font-style:italic; font-weight:bold;margin-bottom:20px;font-size:25px" >MONTH : <?php $cur_m= date('F'); echo $cur_m;?></span>
      <p style="font-style:italic; font-weight:bold;margin-bottom:20px;margin-top:10px;">Statistics on the number of products sold :</p>
         <table>
                <thead >
                    <tr>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>quantity</th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                    $total=0;
                    $name="";
                    $price="";
                    $quantity="";
                    while($row=mysqli_fetch_array($result)){
                        $name=$row['name'];
                        $price = $row['price'];
                        $quantity=$row['soluong'];

                    ?>
                    <tr>
                        <td><?php echo $name;?></td>
                        <td><?php echo $price;?></td>
                        <td><?php echo $quantity?></td>
                    </tr>
                    <?php
                    $price_convert = preg_replace("/[^0-9]/", "", $price);
                    $total=$total + (int)($price_convert)*$quantity;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <?php
                    $total_convert=number_format($total, 0, ',', '.') . 'đ';
                    ?>
                    <tr>
                        <td>
                            Total
                        </td>
                        <td colspan="2"><?php echo $total_convert;?></td>
                    </tr>
                </tfoot>
          </table>
          <div style="margin-top:20px">
          <span style="font-weight:bold">Number of successfully sold orders :</span>
          <?php 
          $sql="SELECT *FROM soluongdonhang";
          $result=mysqLi_query($conn,$sql);
          $soluongdonhang=0;
          while($row=mysqli_fetch_array($result)){
            $month = date('F', strtotime($row['Date']));
            if($month==$cur_m){
                $soluongdonhang=$soluongdonhang+1;
            }
        }
          ?>
          <span style="font-weight:bold"><?php echo $soluongdonhang;?></span>
          <a href="../backend/export_successorder.php">Export excel file</a>
        </div>
        <div style="margin-top:20px">
        <span style="font-weight:bold">Number of new registered customers :</span>
        <?php 
          $sql="SELECT *FROM chitietnguoidung";
          $result=mysqLi_query($conn,$sql);
          $soluongnguoidung=mysqli_num_rows($result);
          ?>
          <span style="font-weight:bold"><?php echo $soluongnguoidung;?></span>
          <a href="../backend/export_member.php">Export excel file</a>
        </div>
      </div>
</body>
</html>