<?php
include "../backend/connect.php";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/reset.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/chitietsanpham.css"/>
    <title>Product details</title>
  </head>
  <body Style="height:900px">
  <header class="header fixed">
      <div class="main-content">
        <div class="body">
          <img
            src="../img/website_frontend_pic/Anh_logo.jpg"
            width="150px"
            alt=""
            class="logo"
          />
          <nav class="nav">
          <ul>
              <li>
                <a href="./index.php"><span class="HOME">HOME</span></a>
              </li>
              <li>
                <a href="./product_frontend.php"><span class="Product">PRODUCT</span></a>
              </li>
              <li>
                <a href="./size_chart.php"><span class="SIZE CHART">SIZE CHART</span></a>
              </li>
              <li>
                <a href="./about_us.php"><span class="ABOUT US">ABOUT US</span></a>
              </li>
            </ul>
          </nav>

          <?php
          session_start();
          $tennd="";
          if(!isset($_SESSION['mySession'])){
          ?>
          <div class="action">
            <a href="./login.php" class="btn btn_signup">SIGN UP</a>
          </div>
          <?php
          }
          elseif($_SESSION['mySession']!='admin'){
            $tennd=$_SESSION['mySession'];
            ?>
            <div class="action">
            <a href="./profile_info.php" class="btn btn_signup"><?php echo $_SESSION['mySession']; ?></a>
          </div>
          <?php
          }
          else{
            $tennd=$_SESSION['mySession'];
            ?>
            <div class="action">
            <a href="./admin_product.php" class="btn btn_signup"><?php echo $_SESSION['mySession']; ?></a>
          </div>
            <?php
          }
          ?>
        </div>
      </div>
    </header>
<main>
    <?php
    $id=$_GET['id'];
    $sql="SELECT*FROM sanpham WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    ?>
    <div style="display:flex;width:100%;height:600px;padding-top:20px">
      <img src="../img/product/<?php echo $row['img']?>" alt="" class="pic">

      <div class="info_pro">
        <p id="tensp"><?php echo $row['name'];?></p>
        <p style="font-size: 24px;"><span>PRICE : </span><span class="demuc" style="color:red;"><?php echo $row['price'];?></span></p>
        <p style="font-weight: bold;"><span>QUANTITY SOLD: </span> <?php echo $row['Luotmua']?></p>
        <p style="font-weight: bold;"><span>QUANTITY AVAILABLE: </span> <?php echo $row['sanphamhienco']-1;?></p>
        <?php
        $sanphamhienco=$row['sanphamhienco'];
        $sql="SELECT danhgia FROM comment WHERE idsanpham='$id'";
        $result=mysqli_query($conn,$sql);
        $sosao=0;
        while($row=mysqli_fetch_array($result)){
          $sosao=$sosao+$row['danhgia'];
        }
        if(mysqli_num_rows($result)==0){
          $eva="There are no reviews yet";
        }
        else{
          $eva=$sosao/mysqli_num_rows($result);
        }
        ?>
        <p style="font-weight: bold;"><span>EVALUATE : </span> <?php echo $eva;?>
        <?php
        if(mysqli_num_rows($result)!=0){
        ?>
        <span>/ 5</span>
        <?php
        }
        ?>
        </p>
         <form action="../backend/Add_product_to_cart_from_chitiet.php?this_id=<?php echo $id;?>"  method="POST">
            <div style="display:flex;flex-direction:column;">
              <div style="flex-direction:row; margin-bottom:36px;">
                  <label for="size"><span style="font-weight: bold;">SIZE:</span></label>
                  <select name="Size" id="size" class="size">
                    <option value=36>36</option>
                    <option value=37>37</option>
                    <option value=38>38</option>
                    <option value=39>39</option>
                    <option value=40>40</option>
                    <option value=41>41</option>
                    <option value=42>42</option>
                 </select>
              </div>
             </div>
            <div style="display:flex;flex-direction:row;">
               <div style="margin-bottom:20px">
               <label for="number"  style="font-weight: bold;">QUANTITY : </label>
                  <input type="number" id="number" name="quantity" value="1" min="1" max="10">
               </div>
            </div>
            <?php
            if($sanphamhienco >1){
            ?>
            <button type="submit" name="btn-add" class="btn">ADD TO CART</button>
            <?php
            }
            else{
            ?>
            <p style="font-weight: bold;"><span>THIS PRODUCT IS SOLD OUT!!</span></p>
            <?php
            }
            ?>
          </form>
      </div>
    </div>
    <div class="binhluan">
      <form action="../backend/Xulybinhluan.php?idsanpham_tennguoidung=<?php echo $id.".".$tennd;?>" method="POST"  onsubmit="return validateForm()" style="display:flex;flex-direction:column; gap:20px; border: 1px solid black; padding:10px; margin-right:40px  ">
        <label for="binhluan"><span class="demuc">Comment:</span> </label>
        <input type="text" name="binhluan" id="binhluan" placeholder="Enter your comment here!!" style="width:300px;height:46px">
        <div>
          <label for="danhgia"><span style="font-weight: bold;">EVALUATE :</span></label>
                  <select name="danhgia" id="danhgia" class="size">
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                </select>
          <span style="font-weight:bold;">/5</span>
        </div>
        <button type="submit" name="btn-comment" class="btn sua_comment">SUBMIT</button>
      </form>
      <?php
      $sql="SELECT * FROM comment WHERE idsanpham='$id'";
        $result=mysqLi_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
      ?>
      <div class="hiencomment">
        <?php
        while($row=mysqli_fetch_array($result)){
        ?>
        <div class="o_comment">
            <div class="dong1">
              <p><span class="demuc"><?php echo $row['Tennguoidung'];?></span><span style="margin-left: 182px"><?php echo $row['ngaybinhluan'];?></span></p>
            </div>
             <div class="dong2">
              <p><span><?php echo $row['comment_content']; ?></span></p>
            </div>
            <div class="dong2">
            <p><span>EVALUATE : <?php echo $row['danhgia'];?> / 5</span></p>
            </div>
        </div>
          <?php
          if($tennd==$row['Tennguoidung']){
          ?>
          <form action="../backend/delete_comment.php?idcmt=<?php echo $row['idbinhluan'].".".$id;?>" method="POST">
          <button type="submit" name="xoa_comment" class="delete">Delete</button>
        </form>
          <?php
          }
          ?>
        <?php }
        }?>
        </div>
    </div>
    </main>
    <footer class="footer">
      <div class="main-content">
        <div class="row">
          <div class="column">
            <h3 class="title"><strong>Experience VANS Strore right at home</strong></h3>
            <ul class="list">
              <li>
                <p>Shop Vans online</p>
              </li>
              <li>
                <p>Address: Hồ Chí Minh</p>
              </li>
              <li>
                <p>Hotline: 0866956907</p>
              </li>
            </ul>
          </div>
          <div class="column">
            <h3 class="title"><strong>Policy</strong></h3>
            <ul class="list">
              <li>
                <p>Payment policy</p>
              </li>
              <li>
                <p>Return policy</p>
              </li>
              <li>
                <p>Warranty policy</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
<script>
    function validateForm() {
        var comment = document.getElementById("binhluan").value;
        if (comment == "") {
            alert("Content cannot be empty");
            return false;
        }
        return true;
    }
    function increaseQuantity() {
      event.preventDefault();
    var input = document.getElementById('quantity');
    var value = parseInt(input.value, 10);
    if (!isNaN(value)) {
        input.value = value + 1;
    }
}

function decreaseQuantity() {
  event.preventDefault();
    var input = document.getElementById('quantity');
    var value = parseInt(input.value, 10);
    if (!isNaN(value) && value > 1) {
        input.value = value - 1;
    }
}
</script>