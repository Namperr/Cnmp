<?php
include "./connect.php";
session_start();
if(!isset($_SESSION['mySession'])){
    header('location: login.php');
}
else{
    //$username=$_SESSION['mySession'];
    //$sql="SELECT * FROM nguoidung WHERE username='$username'";
    //$result = mysqLi_query($conn,$sql);
    //$row=mysqli_fetch_array($result);
    $string =$_GET['this_id'];
    $parts = explode(".", $string);
    $id = $parts[0];
    $payment = $parts[1];
    $phuongthucvanchuyen=$parts[2];
    $sql="SELECT * FROM giohang WHERE id=$id";
    $result = mysqLi_query($conn,$sql);
    $name="";
    $price="";
    $image="";
    while($row = mysqli_fetch_array($result)){
        $name=$row['name'];
        $price=$row['price'];
        $image=$row['img'];
        $quantity=$row['Soluong'];
        $size=$row['size'];
        $trangthaidonhang=1;
        $sql="INSERT INTO trangthaidonhang (name,price,img,idnguoidung,soluong,size,trangthaidonhang,payment,phuongthucvanchuyen) VALUE ('$name','$price','$image','$id','$quantity','$size','$trangthaidonhang','$payment','$phuongthucvanchuyen')";
        mysqLi_query($conn,$sql);
}
$sql="DELETE FROM giohang WHERE id = '$id'";
mysqLi_query($conn,$sql);
header('location: ../frontend/your_order.php');
}
?>