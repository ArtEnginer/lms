<produk>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us</title>

        <!-- swiper css link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!-- custom css file link -->
        <link rel="stylesheet" href="style.css">

</head>
<body>

        <!-- header section starts -->
<section class="header">
    <a href="#" class="logo"> BBC ETS </a>

    <nav class="navbar">
        <a href="dashboard.php"> Home </a>
        <a href="about.php"> Tentang Kami </a>
        <a href="produk.php"> Course </a>
        <a href="book.php"> Try Out </a>
    </nav>

<div id="menu-btn"class="fa-solid fa-bars" ></div> 
<!-- gataaww -->
<!-- <i class="fa-solid fa-bars"></i> -->


<!-- Dropdown Nama start -->

<!DOCTYPE html>
<html>
<head>
<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

<?php
 @include 'konek.php';

 session_start();

 if(!isset($_SESSION['user_name'])){
  header('location:login_form.php');
 }
 ?>

<div class="dropdown">
<h1>Hello <span><?php echo $_SESSION['user_name'] ?></span></h1>
  <div class="dropdown-content">

        <div class="container">
            <div class="content">
                <font size="3">
                <a class="btn btn-outline-dark" href="logout.php"> Log Out </a>
                </font>
            </div>
        </div>

  </div>
</div>

</body>
</html>
<!-- Dropdown Nama End -->

</section>
        <!-- header section end -->

<div class="heading" style="background:url(pict/ourcourse.png) no-repeat">
    <h1> Online Course </h1>
</div>

<!-- produk section start -->

<section class="packages">
    <h1 class="heading-title"> Click here <br>
    <i class="fa-regular fa-hand-point-down fa-sm" style="color: #b92d5d;"></i></h1>
    

    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="inggris.jpg" alt="">
            </div>
            <div class="content">
                <h3> adventureeee </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dolorum eius autem atque totam voluptas, et sunt unde praesentium odit. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="inggris.jpg" alt="">
            </div>
            <div class="content">
                <h3> m </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dolorum eius autem atque totam voluptas, et sunt unde praesentium odit. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="inggris.jpg" alt="">
            </div>
            <div class="content">
                <h3> y </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dolorum eius autem atque totam voluptas, et sunt unde praesentium odit. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="pict/toefl3.png" alt="">
            </div>
            <div class="content">
                <h3> Structure TOEFL </h3>
                <p> TOEFL adalah kepanjangan dari Test of English as a Foreign Language (Test Bahasa Inggris sebagai bahasa asing), 
                    yang dibuat oleh ETS (Educational Testing Service), sebuah lembaga di Amerika Serikat. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="inggris.jpg" alt="">
            </div>
            <div class="content">
                <h3> h </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dolorum eius autem atque totam voluptas, et sunt unde praesentium odit. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="inggris.jpg" alt="">
            </div>
            <div class="content">
                <h3> n </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dolorum eius autem atque totam voluptas, et sunt unde praesentium odit. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="inggris.jpg" alt="">
            </div>
            <div class="content">
                <h3> d </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dolorum eius autem atque totam voluptas, et sunt unde praesentium odit. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="inggris.jpg" alt="">
            </div>
            <div class="content">
                <h3> u </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dolorum eius autem atque totam voluptas, et sunt unde praesentium odit. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="inggris.jpg" alt="">
            </div>
            <div class="content">
                <h3> f </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dolorum eius autem atque totam voluptas, et sunt unde praesentium odit. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="inggris.jpg" alt="">
            </div>
            <div class="content">
                <h3> j </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dolorum eius autem atque totam voluptas, et sunt unde praesentium odit. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="inggris.jpg" alt="">
            </div>
            <div class="content">
                <h3> g </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dolorum eius autem atque totam voluptas, et sunt unde praesentium odit. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="inggris.jpg" alt="">
            </div>
            <div class="content">
                <h3> ap </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint dolorum eius autem atque totam voluptas, et sunt unde praesentium odit. </p>
                <a href="book.php" class="btn"> Book Noww </a>
            </div>
        </div>

    </div>

    <div class="load-more"> <span class="btn"> Load More </span> </div>


</section>

<!-- produk section end -->



















        <!-- footer section start -->
<section class="footer">

    <div class="box-container">
        <div class="box">
            <h3> Open Hour </h3>
            <a> 
Senin	08.00–21.00
<br>
Selasa	08.00–21.00
<br>
Rabu	08.00–21.00
<br>
Kamis	08.00–21.00
<br>
Jumat	08.00–21.00
<br>
Sabtu	08.00–16.00 
<br>
Minggu  Libur </a>
        </div>
 
        <div class="box">
            <h3> Location </h3>
            <a href="#"> <i class="fa-solid fa-location-dot"></i> Jln. Raya Ciwaru No. 2 Warung Pojok, Serang 42117 </a>
        </div>

        <div class="box">
            <h3> Contact Info </h3>
            <a href="#"> <i class="fa-brands fa-whatsapp"></i> 0877-7447-0590 </a>
            <a href="#"> <i class="fa-solid fa-phone"></i> (0254) 378423, 9260742 </a>
        </div>

        <div class="box">
            <h3> Social Media </h3>
            <a href="https://buildbettercommunication.com"> <i class="fa-solid fa-globe"></i> Website </a>
            <a href="https://www.instagram.com/bbcserang/"> <i class="fa-brands fa-instagram"></i> Instagram </a>
            <a href="#"> <i class="fa-brands fa-tiktok"></i> TikTok </a>
            <a href="#"> <i class="fa-brands fa-youtube"></i> YouTube </a>
            <a href="https://www.facebook.com/bbcserang/?locale=id_ID"> <i class="fa-brands fa-facebook"></i> Facebook </a>
        </div>

    </div>

    <div class="credit"> Created by <span> Meh </span> | all right reserved</div>
</section>
        <!-- footer section end -->




        <!-- swiper js link -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
       <!-- custom js file link -->
<script src="script.js"></script>

</body>
</html>