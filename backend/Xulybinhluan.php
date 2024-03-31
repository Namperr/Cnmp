<?php
include "./connect.php";
if(isset($_POST['btn-comment'])){
$idsanpham_tennguoidung=$_GET['idsanpham_tennguoidung'];
$parts = explode(".", $idsanpham_tennguoidung, 2);
$idsanpham = $parts[0];
$tennguoidung = $parts[1];
$danhgia=$_POST['danhgia'];
$content=$_POST['binhluan'];
$sql="INSERT INTO comment (comment_content,idsanpham,Tennguoidung,danhgia) VALUE ('$content','$idsanpham','$tennguoidung','$danhgia')";
mysqli_query($conn,$sql);
header('location: ../frontend/chitietsanpham.php?id='.$idsanpham);
}
?>