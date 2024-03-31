<?php
include "../backend/connect.php";
$sql="SELECT * FROM sanpham ";
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
    <link rel="stylesheet" href="./assets/admin_product.css"/>
    <title>Admin_product</title>
  </head>
<body style="height: 3000px">
      <div class="menu">
          <ul>
            <li class="list_option"><a href="./admin_product.php" class="option" style="font-weight:bold;color:black;background-color:white;">PRODUCT</a></li>
            <li class="list_option"><a href="./admin_order.php" class="option ">ORDERS</a></li>
            <li class="list_option"><a href="./statistics.php" class="option">STATISTICS</a></li>
            <li class="list_option"><a href="./index.php" class="option">HOME</a></li>
            <li class="list_option"><a href="../backend/logout.php" class="option ">LOGOUT</a></li>
          </ul>
      </div>
      <div class="info" style="padding: 20px 20px 20px 121px;">
        <table>
                <thead >
                    <tr>
                        <th>Product's name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th colspan="2">Option</th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                    $name="";
                    $price="";
                    $image="";
                    $quantity="";
                    while($row = mysqli_fetch_array($result)){
                        $name=$row['name'];
                        $price=$row['price'];
                        $image=$row['img'];
                        $id=$row['id'];
                        $quantity=$row['sanphamhienco'];
                    ?>
                    <tr>
                        <td style="font-style:italic;"><?php echo $name;?></td>
                        <td><?php echo $price;?></td>
                        <td><img src="../img/product/<?php echo $image;?>" width="50" alt="" class="thumb"></td>
                        <td><?php echo $quantity; ?></td>
                        <td><button type="submit" class="btn_delete"><a href="../backend/Delete_product_admin.php?this_id=<?php echo $id;?>" style="font-style: italic;color: black;">Delete</a></button></td>
                        <td><button type="submit" class="btn_delete"><a href="./edit_product_admin.php?this_id=<?php echo $id;?>" style="font-style: italic;color: black;">Edit</a></button></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
          </table>
          <div class="btn"><a href="./add_product_admin.php" style="color:white;font-weight:bold;">ADD PRODUCT</a></div>
        </div>
</body>
</html> 
