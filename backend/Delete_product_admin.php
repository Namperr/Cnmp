<?php
include "./connect.php";
$this_id =$_GET['this_id'];
$sql ="DELETE FROM sanpham WHERE id = '$this_id'";
mysqLi_query($conn,$sql);
?>
<script>
    alert('Product deletion was successful');
</script>
<?php
    header('location: ../frontend/admin_product.php');
?>