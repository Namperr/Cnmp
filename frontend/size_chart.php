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
    <link rel="stylesheet" href="./assets/style_size_chart.css" />
    <title>Size chart</title>
</head>
<body style="height: 700px">
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
                <a href="./product_frontend.php"><span class="PRODUCT">PRODUCT</span></a>
              </li>
              <li>
                <a href="./size_chart.php"><span class="SIZE_CHART">SIZE CHART</span></a>
              </li>
              <li>
                <a href="./about_us.php"><span class="ABOUT_US">ABOUT US</span></a>
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
            <div class="media-block" style="margin-right: 50px;">
              <img src="../img/website_frontend_pic/size_chart.png" alt="Đây là ảnh hướng dẫn đo " height =300px>    
            </div>
            <div class="content-block">
              <h1 class="heading">
                Shoes Size -Vans
              </h1>
              <p class="desc">
                 <p> <span class="desc1">Steps to check Vans shoe size :</span></p><br>
                 <p> <span class="step">Step 1: </span>Prepare a piece of paper and place your feet on that piece of paper.</p><br>
                 <p><span class="step">Step 2: </span>Draw the heel and toe of the shoe on the paper.</p> <br>
                 <p><span class="step">Step 3: </span>Kẻ 1 đường từ đầu gót chân đến đầu ngón dài nhất như hình.</p><br>
                 <p><span class="step">Step 4: </span>Đo chiều dài đường thẳng vừa kẻ và so sánh với mục Cm của bảng size.</p><br>
                 <p><span class="step" style="font-style : italic">Note: </span>Mỗi hãng thể thao có mỗi bảng size khác nhau, không áp dụng size của hãng khác vào hãng Vans.</p>
              </p>
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