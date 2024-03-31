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
    <link rel="stylesheet" href="./assets/style_index.css" />
    <title>Trang chủ</title>
  </head>
  <body style="height: 2000px">
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
                <a href="./product_frontend.php" class="PRODUCT">PRODUCT</a>
              </li>
              <li>
                <a href="./size_chart.php" class="SIZE CHART">SIZE CHART</a>
              </li>
              <li>
                <a href="./about_us.php" class="ABOUT US">ABOUT US</a>
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
      <div class="hero">
        <div class="main-content">
          <div class="body">
            <div class="media-block">
              <img src="../img/website_frontend_pic/media_pic_1.jpg" alt="" />
            </div>
            <div class="content-block">
              <h1 class="heading">
                Vans <br />
                Off The Wall
              </h1>
              <p class="desc">
                Having long become a defining characteristic of Vans, the slogan
                "Off The Wall" is short but contains a delicate meaning. In
                skateboarding, “Off The Wall” is a difficult technique, meaning
                going beyond the floor or wall. In fact, the saying "Off The
                Wall" means going beyond the framework and rules, bringing
                breakthrough and difference.
              </p>
            </div>
          </div>
        </div>
      </div>
      <!--popular-->
      <div class="popular">
        <div class="main-content">
          <div class="popular-top">
            <div class="info">
              <h2 class="heading-lv2">NEW ARRIVALS</h2>
              <p class="desc">Back to school with our new collection</p>
            </div>
            <div class="controls">
              <button class="control-btn">
                <img src="../img/website_frontend_pic/muitentrai.jpg" alt="" width=20px>
              </button>
              <button class="control-btn">
                <img src="../img/website_frontend_pic/muitenphai.jpg" alt="" width=20px>
              </button>
            </div>
          </div>
          <div class="product_list">
            <?php
            include "../backend/connect.php"; 
            $sql ="SELECT *FROM sanpham ORDER BY RAND() LIMIT 0,5";
            $result=mysqLi_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){
            ?>
            <div class="product_item">  
              <img src="../img/product/<?php echo $row  ['img']?>" alt="" class="thumb">
              <div class="info">
                <div class="head">
                  <h3 class="title"><?php echo $row['name'];?></h3>
                </div>
              </div>
              <div class="foot">
               <span class="price"><?php echo $row['price']?></span>
              </div>
              <div>
          <form action="../backend/Add_product_to_cart.php?this_id=<?php echo $row['id'];?>" method="POST">
            <button type="submit" name="add_to_cart" class="btn btn1">Add to cart</button>
            <select name="Size" class="size">
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
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="store_part">
        <div class="main-content">
          <div class="body">
            <div class="media-block">
              <img src="../img/website_frontend_pic/media_pic_2_cua_hang.jpg" alt="Đây là hình ảnh cửa hàng vans" class="store">
            </div>
            <div class="content-block">
                <p class="desc">Welcome to the Vans store!
  Over a century in the sports and street lifestyle industries, Vans has become a symbol of creativity, individuality and DIY style. In our store, you'll discover a range of high-quality products, from sneakers and clothing to accessories, all with the brand's signature signature.
  With a great combination of personal style and optimal performance, Vans products are not only the perfect choice for sports lovers but also a symbol of confidence and exclusivity in each person. step.  
  Please visit our store to explore and experience a vibrant shopping space, where you can find products that suit your style and passion. Vans - Where Style Meets Adventure!</p>

            </div>
          </div>
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
