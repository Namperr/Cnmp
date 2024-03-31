<?php
include "./connect.php";
$idnguoidung=$_GET['this_id'];
$sql="UPDATE trangthaidonhang SET trangthaidonhang=2 WHERE idnguoidung='$idnguoidung'";
mysqLi_query($conn,$sql);
header('location: ../frontend/admin_order_detail.php?this_id='.$idnguoidung);
?>