<?php
include "../backend/connect.php";
$sql="SELECT * FROM trangthaidonhang ";
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
<body style="height: 10000px">
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
        <table>
                <thead >
                    <tr>
                        <th>Customer name</th>
                        <th><span>Address</span></th>
                        <th>Order value</th>
                        <th>Order date</th>
                        <th>Order details</th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                    $arr = array();
                    while($row = mysqli_fetch_array($result)){
                        $id=$row['idnguoidung'];
                        $price=$row['price'];
                        $quantity=$row['soluong'];
                        $order_date=$row['ngaydathang'];
                        $price = preg_replace("/[^0-9]/", "", $price);
                        $price = intval($price)*$quantity;
                        if(isset($arr[$id])){
                            $arr[$id]+=$price;
                        }
                        else{
                            $arr[$id]=$price;
                        }
                    }
                    if(empty($arr)){
                        ?>
                        <p style="margin-bottom:20px;font-style:italic;"><span style="color:red;">Your order status:</span>You don't have any orders yet.</p>
                        <?php
                    }
                    foreach($arr as $key => $value){
                        $sql="SELECT * FROM chitietnguoidung WHERE id='$key' ";
                        $result = mysqLi_query($conn,$sql);
                        $row=mysqli_fetch_array($result);
                        ?>
                        <tr>
                            <td><?php echo $row['hoten'];?></td>
                            <td><?php echo $row['diachi'];?></td>
                            <td><?php echo number_format($value, 0, ',', '.') . 'đ';?></td>
                            <td><?php echo $order_date;?></td>
                            <td><a href="./admin_order_detail.php?this_id=<?php echo $id;?>">Detail</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
          </table>
        </div>
</body>
</html> 
