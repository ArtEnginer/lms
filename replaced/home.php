<?php
include "header.php";
?>

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
    <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
        <div class="dropdown-content">
            <div class="container">
                <div class="content">
                    <font size="3">
                        <a href="logout.php"> Log Out </a>
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

        <!-- home section start -->

<section class="home">

<div class="swiper home-slider">

    <div class="swiper-wrapper">
        
        <div class="swiper-slide slide" style="background:url(pict/london.jpg) no-repeat">
            <div class="content">
                <span> Learn English then </span>
                <h3> Travel Arround The World </h3>
                <a href="produk.php" class="btn"> See More </a>
            </div>
        </div>

        <div class="swiper-slide slide" style="background:url(pict/opera.jpg) no-repeat">
            <div class="content">
                <span> Learn English then</span>
                <h3> Discover New Place </h3>
                <a href="produk.php" class="btn"> See More </a>
            </div>
        </div>

        <div class="swiper-slide slide" style="background:url(pict/canada.jpg) no-repeat">
            <div class="content">
                <span> Learn English then</span>
                <h3> Achieve Your Dream </h3>
                <a href="produk.php" class="btn"> See More </a>
            </div>
        </div>

    </div>     

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

</div>

</section> 

        <!-- home section end -->


        <!-- home services section start -->
        
<section class="services">
    <h1 class="heading-title"> Program Kami </h1>

    <div class="box-container">

        <div class="box">
            <img src="pict/child.jpg" alt="">
            <h3> Child </h3>
        </div>    
    
        <div class="box">
            <img src="pict/teen.jpg" alt="">
            <h3> Teenager </h3>
        </div>

        <div class="box">
            <img src="pict/adult.jpg" alt="">
            <h3> Adult </h3>
        </div>

        <div class="box">
            <img src="pict/work.jpg" alt="">
            <h3> Corporate </h3>
        </div>

        <div class="box">
            <img src="pict/conver.png" alt="">
            <h3> Conversation </h3>
        </div>

    </div>
</section>
        <!-- home services section end -->
    
        <!-- home about section start -->
    <section class="home-about">

            <div class="image">
                <img src="pict/bbc.jpg" alt=""> 
            </div>

            <div class="content">
                <h3> Tentang Kami </h3>
                <p> BBC English Training Specialist adalah lembaga pendidikan Bahasa Inggris yang didirikan pada Juni 1980.
                    Lembaga yang dilengkapi dengan fasilitas modern, kurikulum serta manajemen yang teratur dan terkontrol rapi, 
                    saat ini memiliki siswa ± 15.000 orang terbagi dalam kelompok anak-anak, pelajar, dewasa, para eksekutif, ataupun manajer. 
                    Kami BBC English Training Specialist.</p>
                    <a href="about.php" class="btn"> Read More </a>
            </div>

        </section> 
        <!-- home about section end -->

        <!-- home product section start -->

        <section class="home-packages">
            <h1 class="heading-title"> Online Course </h1>

            <div class="box-container">

                <div class="box">

                    <div class="image">
                        <img src="pict/toefl.png" alt="">
                        </div>

                            <div class="content">
                                <h3> Structure TOEFL </h3>
                                <p> TOEFL adalah kepanjangan dari Test of English as a Foreign Language (Test Bahasa Inggris sebagai bahasa asing), 
                                    yang dibuat oleh ETS (Educational Testing Service), sebuah lembaga di Amerika Serikat. </p>
                                <a href="materi.php" class="btn">Read the Course</a>
                            </div>

                        </div>
                    

                <div class="box">

                    <div class="image">
                        <img src="pict/toefl2.png" alt="">
                        </div>

                            <div class="content">
                                <h3> Structure TOEFL </h3>
                                <p> TOEFL adalah kepanjangan dari Test of English as a Foreign Language (Test Bahasa Inggris sebagai bahasa asing), 
                                    yang dibuat oleh ETS (Educational Testing Service), sebuah lembaga di Amerika Serikat. </p>
                                <a href="book.php" class="btn">Read the Cource</a>
                            </div>

                        </div>
                    </div> 
                </div>

            </div>

            <div class="load-more"> <a href="produk.php" class="btn"> Load More </a> </div>
        
</section>

        <!-- home product section end -->

        <!-- home offer section start -->
<!--
<section class="home-offer">

    <div class="content">

    <h3> Up to 50% </h3>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Doloremque nostrum nisi sed placeat rerum nesciunt incidunt, 
        et perspiciatis ipsam consectetur debitis fuga in eius? 
        Recusandae rem dolor inventore necessitatibus officiis. </p>
        <a href="book.php" class="btn"> Book Now! </a>
    </div>

</section>
-->
        <!-- home offer section end -->

<?php
include "footer.php";
?>