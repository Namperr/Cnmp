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
    <link rel="stylesheet" href="./assets/about_us.css" />
    <title>About us</title>
  </head>
<body style="height: 5200px">
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
        <div class="content-ab">
            <div class="content content1"><p class="heading-lv2">Lịch Sử Của VANS Từ Năm 1996 Tới Nay</p></div>
            <div  class="year"><p>Năm 1966</p></div>
           <div class="content img"><img src="../img/website_frontend_pic/About_us.jpg" alt="Đây là cửa hàng Vans"></div>
           <div class="vanban content">
            <p>Vào ngày 16 tháng 3 năm 1966, hai anh em Pauld Van Doren và Jim Van Doren cùng với những người đồng nghiệp là Gordon Lee và Serge Delia đã bắt đầu sự nghiệp tại căn nhà địa chỉ 704 E Broadway tại Anaheim, thành phố Califonia. Là xưởng duy nhất sản xuất giày tại gia và phân phối ngay lập tức cho công chúng.</p>
            <p>Vào ngày đầu tiên đó có 12 thợ nhân công sản xuất những đôi giày và những đôi giày đó được bán ra thị trường ngay buổi chiều cùng ngày.</p>
          </div>
          <div class="content img"><img src="../img/website_frontend_pic/About_us2.jpg" alt="Đây là ảnh quá trình sản xuất giày"></div>
          <div class="vanban content">
            <p>Phiên bản giày cổ điển <span style="font-style:italic">Vans #44</span> hay hiện nay được gọi là <span style="font-weight:bold;font-style:italic">The Authentic</span> ra đời.</p>
            <p>Biệt danh <span style="font-style:italic">"The House Of Vans"</span> được đặt ra vào những năm đầu thập niên 70 bởi những dân trượt ván thích cách họ trưng bày sản phẩm trên cửa sổ ở Anaheim</p>
          </div>
          <div class="year"><p>Đầu thập niên 1970</p></div>
          <div class="vanban content">
            <p style="text-align:center;">Fan hâm mộ chủ yếu là dân trượt ván của Vans lan rộng và trải khắp miền nam California</p>
          </div>
          <div class="year">Năm 1976</div>
          <div class="content img"><img src="../img/website_frontend_pic/About_us3.jpg" alt="Đây là hình ảnh Vans"></div>
          <div class="vanban content">
            <p>Phiên bản Vans <span style="font-style:italic">#95</span> hay hiện nay gọi là <span style="font-weight:bold;">ERA</span> được gia cố thêm lớp đệm và ra mắt nhiều màu sắc khác nhau ra đời. Được thiết kế bởi <spans tyle="font-style:italic">Tony Alva</spans> và <span style="font-style:italic">Stacy Peralta</span> và trở thành sự lựa chọn hàng đầu của dân trượt ván thời bấy giờ.</p>
            <p>Đồng thời năm 1976 logo <span style="font-weight:bold;font-style: italic;">VANS "OFF THE WALL"</span> lần đầu tiên xuất hiện trước công chúng.</p>
          </div>
          <div class="year">Năm 1995</div>
          <div class="content img1">
            <img src="../img/website_frontend_pic/About_us4.jpg" alt="Ảnh hội chợ">
          </div>
          <div class="vanban content">
            <p><span style="font-weight:bold;">Vans</span> tài trợ cho <span style="font-weight:bold;">Wared Tour</span> lần đầu tiên. Và vào năm 2001 <span style="font-weight:bold;">Vans</span> đã đạt một khoản lợi nhuận không nhỏ từ <span style="font-weight:bold;">Vans Wared Tour</span>, chương trình hòa nhạc chạy dài nhất ở Mỹ.</p>
          </div>
          <div class="year">Năm 2012</div>
          <div class="content img1">
            <img src="../img/website_frontend_pic/About_us5.jpg" alt="Đây là người chơi ván trượt">
          </div>
          <div class="vanban content">
            <p><span style="font-style:italic; font-weight:bold;text-decoration: underline;">Vans</span> kỷ niệm 20 năm thành lập bằng sự giới thiệu phong cách <span style="font-weight:bold;">Half Cab</span>, phong cách trượt ván mang tính biểu tượng của Steve Caballero, được coi là chiếc giày quan trọng nhất trong lịch sử ván trượt ván trượt và văn hoá skate.</p>
            <p><span style="font-weight:bold;font-style:italic;">No Room for Rockstars</span> ra mắt vào tháng Tư như là bộ phim tài liệu dài đầu tiên về <span style="font-weight:bold;font-style:italic;">Vans Warped Tour</span>, được sản xuất bởi đội ngũ từng làm nên Dogtown và Z-Boys. Bộ phim được chấp nhận tham gia Liên hoan phim Slamdance như là một bài thuyết trình nổi bật và được quay ở đầu iTunes Documentary Chart.</p>
            <p><span style="font-weight:bold;font-style:italic;">Vans</span> giới thiệu công nghệ <span style="font-weight:bold;font-style:italic;">UltraCush Lite</span> mới trong dòng giày <span style="font-weight:bold;font-style:italic;">LXVI. UltraCush Lite</span> là một hỗn hợp pha trộn các loại bọt được thiết kế để cung cấp độ đệm siêu nhẹ cho giày.</p>
            <p>Vans giới thiệu loại đế cao su lưu hoá đầu tiên. Công nghệ <span style="font-weight:bold;font-style:italic;">WAFFLECUP ™</span> mới với khả năng kết hợp tốt đến tuyệt vời của độ bền đế lót và vỏ giày.</p>
          </div>
          <div class="year">Năm 2015</div>
          <div class="content img1">
            <img src="../img/website_frontend_pic/media_pic_3_anh_giay.jpg" alt="Đây là ảnh giày vans">
          </div>
          <div class="vanban content">
            <p>Vào tháng 5 năm 2015, <span class="nhanmanh">Vans</span> ra mắt <span class="nhanmanh">Propeller: A Vans Skateboarding Video</span>, bộ phim ngắn về ván trượt đầu tiên của <span class="nhanhmanh">Vans</span>. Dịp trọng đại này đã đánh dấu giá trị của <span class="nhanhmanh">Vans Pro Skate</span> trên nền thương nghiệp thời trang quốc tế.<span class="nhanhmanh">PROPELLER</span>trở thành một trong những bộ phim trượt băng có thời lượng xem xong nhanh nhất trên iTunes.</p>
            <p>Vào mùa hè năm 2015, <span  class="nhanhmanh">Vans</span> phát hành bộ sưu tập <span  class="nhanhmanh">"Young at Heart"</span> của <span  class="nhanhmanh">Disney</span> và <span  class="nhanhmanh">Vault by Vans x Takashi Murakami</span>. Sự hợp tác này đã cho ra đời các sản phẩm yêu thích dành cho những người hâm mộ trên toàn thế giới.</p>
            <p>Nhóm tích hợp trực tuyến của <span class="nhanhmanh">Vans</span> đã nhận được giải thưởng <span class="nhanhmanh">“VF Pinnacle 2015"</span>. Danh hiệu có uy tín được cấp hàng năm cho một nhóm trong <span class="nhanhmanh">VF</span> trên toàn cầu đã nâng cao các mệnh lệnh chiến lược của công ty thông qua hợp tác và phát triển với phương pháp <span class="nhanhmanh">One VF</span>.</p>
            <p>Năm 2015 đánh dấu kỷ niệm 10 năm bằng bộ sưu tập <span class="nhanhmanh">Syndicate</span>, lễ hội dành cho <span class="nhanhmanh">Vans Pro Skate</span> tôn vinh những đóng góp đa dạng về ý tưởng thiết kế, thái độ tận tâm đã làm nên di sản bất hủ cho nền văn hóa độc đáo về ván trượt.</p>
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