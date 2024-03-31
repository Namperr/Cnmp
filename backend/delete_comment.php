<?php
include "connect.php";
if(isset($_POST['xoa_comment'])){
    $content=$_GET['idcmt'];
    $parts = explode(".", $content);
    $idbinhluan = $parts[0];
    $id = $parts[1];
    $sql="DELETE FROM  comment WHERE idbinhluan=$idbinhluan";
    mysqli_query($conn,$sql);
    header('location: ../frontend/chitietsanpham.php?id='.$id);
}
exit;
?>