<?php
include "./connect.php";
$idnguoidung=$_GET['this_id'];
if(isset($_POST['reject_btn'])){
$lydo=$_POST['reason'];
$sql="UPDATE trangthaidonhang SET trangthaidonhang=0 WHERE idnguoidung='$idnguoidung'";
mysqLi_query($conn,$sql);
$sql="SELECT *FROM lydohuyhang WHERE idnguoidung='$idnguoidung'";
$result=mysqLi_query($conn,$sql);
if(mysqli_num_rows($result) == 0){
    $sql="INSERT INTO lydohuyhang (lydo,idnguoidung) VALUE ('$lydo','$idnguoidung')";
    mysqLi_query($conn,$sql);
}
else{
    $sql="UPDATE lydohuyhang SET lydo='$lydo' WHERE idnguoidung='$idnguoidung'";
    mysqLi_query($conn,$sql);
}
header('location: ../frontend/admin_order_detail.php?this_id='.$idnguoidung);
}
?>