<?php
    include "./connect.php";
    $this_id = $_GET['this_id'];
    $sql="SELECT * FROM giohang WHERE idsanpham = '$this_id'";
    $result=mysqLi_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($row['Soluong']>=2){
        $sql="UPDATE giohang SET Soluong=Soluong-1 WHERE idsanpham='$this_id'";
        mysqLi_query($conn,$sql);
    }
    else{
    $sql ="DELETE FROM giohang WHERE idsanpham = '$this_id'";
    mysqLi_query($conn,$sql);
    }
    header('location: ../frontend/your_cart.php');
?>