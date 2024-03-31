<?php
include "./connect.php";
$tensp=$_GET['productname'];
header('location: ../frontend/product_frontend.php?productname='.$tensp);
?>