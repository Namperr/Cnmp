<?php
include "./connect.php";
$type= $_GET['type'];
header('location: ../frontend/product_frontend.php?type='.$type);
exit;
?>