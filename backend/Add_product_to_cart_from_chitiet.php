<?php
include "./connect.php";
session_start();
$username = $_SESSION['mySession'];
$x=$_POST['quantity'];
$sql="SELECT * FROM nguoidung WHERE username='$username'";
$result = mysqLi_query($conn,$sql);
$row=mysqli_fetch_array($result);
$idnguoidung = $row['id'];
$idsanpham = $_GET['this_id'];
$sql ="SELECT * FROM sanpham WHERE id='$idsanpham'";
$result = mysqLi_query($conn,$sql);
$row=mysqli_fetch_array($result);
$name=$row['name'];
$price=$row['price'];
$image=$row['img'];
$size=$_POST['Size'];
$sql="SELECT *FROM giohang WHERE name='$name' AND size='$size'";
$result = mysqLi_query($conn,$sql);
if($result->num_rows > 0){
    $sql="UPDATE giohang SET soluong = soluong + $x WHERE name='$name'";
    mysqLi_query($conn,$sql);
}
else{
$sql="INSERT INTO giohang (name,img,price,id,Soluong,size) VALUE ('$name','$image','$price','$idnguoidung','$x','$size')";
mysqLi_query($conn,$sql);
}
header('location: ../frontend/chitietsanpham.php?id='.$idsanpham);
exit;
?>