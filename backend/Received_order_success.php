<?php
include "./connect.php";
$idnguoidung= $_GET['this_id'];
$sql="SELECT * FROM trangthaidonhang WHERE idnguoidung='$idnguoidung'";
$result=mysqLi_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
$name=$row['name'];
$price=$row['price'];
$soluong=$row['soluong'];
$sql1="SELECT * FROM thongke WHERE name='$name'";
$result1=mysqLi_query($conn,$sql1);
if(mysqli_num_rows($result1)==0){
$sql2="INSERT INTO thongke (name,price,soluong,idnguoimua) VALUE ('$name','$price','$soluong','$idnguoidung')";
mysqLi_query($conn,$sql2);
}
else{
    $sql2="UPDATE thongke SET soluong=soluong+$soluong";
    mysqLi_query($conn,$sql2);
}
$sql4 = "UPDATE sanpham SET Luotmua=Luotmua+1 WHERE name='$name'";
mysqLi_query($conn,$sql4);
}
$sql5 = "UPDATE sanpham SET sanphamhienco=sanphamhienco-1 WHERE name='$name'";
mysqLi_query($conn,$sql5); 
$sql3="DELETE FROM trangthaidonhang WHERE idnguoidung='$idnguoidung'";
mysqLi_query($conn,$sql3);
$sql4="INSERT INTO soluongdonhang SET tmp=";
mysqLi_query($conn,$sql4);
header('location: ../frontend/your_order.php?xacnhan=1');
?>