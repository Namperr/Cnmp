<?php
include "./connect.php";
$idnguoidung= $_GET['this_id'];
$sql3="DELETE FROM trangthaidonhang WHERE idnguoidung='$idnguoidung'";
mysqLi_query($conn,$sql3);
header('location: ../frontend/your_order.php');
?>