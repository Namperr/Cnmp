<?php
include "connect.php";
$page = $_GET['page'];
header('location: ../frontend/product_frontend.php?page='.$page);   
exit;
?>