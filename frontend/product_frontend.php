<script>
function redirectToProductPage(productId) {
    window.location.href = './chitietsanpham.php?id=' + productId;
}
function handleSelectClick(event) {
    event.stopPropagation();
}
</script>
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
    <link rel="stylesheet" href="./assets/style_product.css"/>
    <script src="finding_product.js"></script>
    <title>Product</title>
  </head>

<body  Style="height:900px">
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
                <a href="./size_chart.php"><span class="SIZE CHART" style="color:black;background-color:white;">SIZE CHART</span></a>
              </li>
              <li>
                <a href="./about_us.php"><span class="ABOUT US">ABOUT US</span></a>
              </li>
            </ul>
          </nav>
          <?php
          session_start();
          if(!isset($_SESSION['mySession'])){
          ?>
          <div class="action">
            <a href="./login.php" class="btn btn_signup">SIGN UP</a>
          </div>
          <?php
          }
          elseif($_SESSION['mySession']!='admin'){
            ?>
            <div class="action">
            <a href="./profile_info.php" class="btn btn_signup"><?php echo $_SESSION['mySession']; ?></a>
          </div>
          <?php
          }
          else{
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
              include "../backend/connect.php";
              $sql="SELECT name FROM sanpham";
              $result = mysqli_query($conn,$sql);
              $products = array();
              while ($row = mysqli_fetch_array($result)) {
              $products[] = $row['name'];
              }
              $jsonProducts = json_encode($products);
              ?>
              <script>
var products = <?php echo $jsonProducts; ?>;
function searchProducts() {
    var searchInput = document.getElementById("searchInput").value.trim().toLowerCase();
    var searchResults = document.getElementById("searchResults");

    // Kiểm tra xem ô tìm kiếm có trống không
    if (searchInput === "") {
        // Nếu ô tìm kiếm trống, ẩn phần tử hiển thị kết quả tìm kiếm
        searchResults.style.display = "none";
        return; // Thoát khỏi hàm
    } else {
        // Nếu ô tìm kiếm không trống, hiển thị lại phần tử hiển thị kết quả tìm kiếm
        searchResults.style.display = "block";
    }

    // Xóa nội dung cũ của phần tử searchResults
    searchResults.innerHTML = "";

    // Lặp qua mảng sản phẩm để tìm kiếm
    for (var i = 0; i < products.length; i++) {
        // Kiểm tra xem tên sản phẩm có chứa từ khóa tìm kiếm không
        if (products[i].toLowerCase().indexOf(searchInput) >= 0) {
            // Tạo một phần tử div mới
            var divElement = document.createElement("div");
            divElement.className="select";
            // Tạo một phần tử a mới
            var aElement = document.createElement("a");
            aElement.href = "../backend/xuly_timkiem.php?productname=" + encodeURIComponent(products[i]); // Đặt href cho phần tử a (bạn có thể thay đổi thành URL thích hợp)
            aElement.textContent = products[i]; // Đặt nội dung của phần tử a là tên sản phẩm
            aElement.className = "option_finding";
            // Thêm phần tử a vào phần tử div
            divElement.appendChild(aElement);
            // Thêm phần tử div vào phần tử searchResults
            searchResults.appendChild(divElement);
        }
    }
}
</script>
        <div class="menu">
          <ul>
            <li class="list_option">
              <div style="display:flex;">
                <input type="text" id="searchInput" placeholder="Find product" class="find" oninput="searchProducts()">
                <div id="searchResults" class="div_finding"></div>
              </div>
            </li>
          <li class="list_option"><a href="../backend/product_user_type.php?type=<?php echo "all";?>" class="option option1" name="TATCA" >ALL</a></li>
          <li class="list_option"><a href="../backend/product_user_type.php?type=<?php echo "classic";?>" class="option option2" name="CLASSIC"><span>VANS CLASSIC</span></a></li>
          <li class="list_option"><a href="../backend/product_user_type.php?type=<?php echo "knu";?>" class="option option3" name="VAULT">VANS KNU</a></li>
          <li class="list_option"><a href="../backend/product_user_type.php?type=<?php echo "old_skool";?>" class="option option4" name="OLD SKOOL">VANS OLD_SKOOL</a></li>
          <li class="list_option"><a href="../backend/product_user_type.php?type=<?php echo "slip_on";?>" class="option option5" name="SLIP-ON">VANS SLIP_ON</a></li>
        </ul>
      </div>
      <div class="preview">
          <?php
          if(isset($_GET['productname'])){
            $tensp=$_GET['productname'];
            $sql="SELECT * FROM sanpham WHERE name='$tensp'";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
            ?>
  <div class="hang1">
    <div class="product_item" onclick="redirectToProductPage(<?php echo $row['id'];?>);">  
      <img src="../img/product/<?php echo $row['img']?>" alt="" class="thumb">
      <div class="info">
        <div class="head" style="margin:4px 13px 0 13px;">
          <h3 class="title"><?php echo $row['name'];?></h3>
        </div>
      </div>
      <div class="foot" style="padding: 10px 0 0 0;">
        <span class="price"><?php echo $row['price']?></span>
      </div>
      <div style="margin-top:17px">
        <form action="../backend/Add_product_to_cart.php?this_id=<?php echo $row['id']?>" method="POST">
          <button type="submit" name="add_to_cart" class="btn btn1">Add to cart</button>
          <select name="Size" class="size" onclick="handleSelectClick(event);">
            <option value=36>36</option>
            <option value=37>37</option>
            <option value=38>38</option>
            <option value=39>39</option>
            <option value=40>40</option>
            <option value=41>41</option>
            <option value=42>42</option>
          </select>
        </form>
      </div>
    </div>
  </div>
            <?php
            }
          }
          else{
          if(isset($_GET['type'])){
            $type = $_GET['type'];
          }
          elseif(isset($_GET['page'])){
            $parts = explode(".", $_GET['page']);
            $type = $parts[1];
          }
          else{
            $type="all";
          } 
           if($type=="all"){
           $sql ="SELECT * FROM sanpham";
           $result=mysqli_query($conn,$sql);
           $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
           }
           else{
          $sql ="SELECT * FROM sanpham WHERE type='$type'";
           $result=mysqli_query($conn,$sql);
           $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
           }
           if(isset($_GET['page'])){
            $parts = explode(".", $_GET['page']);
            $page =intval($parts[0]);
            $start = 8*($page-1);
            $end = count($rows)-1;
           }
           else{
            $start = 0;
            $end = count($rows)-1;  
           }
          ?>  
        <div class="hang1">
         <?php
    for($i=$start;$i<=$start+3 && $i<=$end;$i++){
      $row = $rows[$i];
         ?>
         <div class="product_item" onclick="redirectToProductPage(<?php echo $row['id'];?>);">  
            <img src="../img/product/<?php echo $row['img']?>" alt="" class="thumb">
            <div class="info">
                <div class="head" style="margin:4px 13px 0 13px;">
                    <h3 class="title"><?php echo $row['name'];?></h3>
                </div>
            </div>
            <div class="foot" style="padding: 10px 0 0 0;">
                <span class="price"><?php echo $row['price']?></span>
            </div>
            <div style="margin-top:17px">
          <form action="../backend/Add_product_to_cart.php?this_id=<?php echo $row['id']?>" method="POST">
            <button type="submit" name="add_to_cart" class="btn btn1">Add to cart</button>
            <select name="Size" class="size" onclick="handleSelectClick(event);">
                  <option value=36>36</option>
                  <option value=37>37</option>
                  <option value=38>38</option>
                  <option value=39>39</option>
                  <option value=40>40</option>
                  <option value=41>41</option>
                  <option value=42>42</option>
            </select>
          </form>
      </div>
         </div>
             <?php 
            }
             ?>
         </div>
    <div class="hang2">
    <?php
    for($i=$start+4;$i<=$start+7 && $i<=$end ;$i++){
      $row = $rows[$i];
    ?>
    <div class="product_item" onclick="redirectToProductPage(<?php echo $row['id'];?>);">  
        <img src="../img/product/<?php echo $row['img']?>" alt="" class="thumb">
        <div class="info">
            <div class="head" style="margin:4px 13px 0 13px;">
                <h3 class="title"><?php echo $row['name'];?></h3>
            </div>
        </div>
        <div class="foot" style="padding: 10px 0 0 0;">
            <span class="price"><?php echo $row['price']?></span>
        </div>
        <div style="margin-top:17px">
          <form action="../backend/Add_product_to_cart.php?this_id=<?php echo $row['id'];?>" method="POST">
            <button type="submit" name="add_to_cart" class="btn btn1">Add to cart</button>
            <select name="Size" class="size" onclick="handleSelectClick(event);">
                  <option value=36>36</option>
                  <option value=37>37</option>
                  <option value=38>38</option>
                  <option value=39>39</option>
                  <option value=40>40</option>
                  <option value=41>41</option>
                  <option value=42>42</option>
            </select>
          </form>
      </div>
    </div>
    <?php
    }
    ?>
</div>
<div style="display:flex;">
<?php
$soluongpage=count($rows)/8; 
if(count($rows)%8!=0){
  $soluongpage=$soluongpage+1;
}   
for($i=1;$i<=$soluongpage;$i++){
?>
     <div class="page">
      <button type="submit" name="page-btn<?php echo $i;?>" class="page-btn"><a href="../backend/page.php?page=<?php echo $i.".".$type;?>" style="padding:10px;color:black;"><?php echo $i;?></a></button>
     </div>
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