<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Materi</title>

        <!-- swiper css link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <!-- custom css file link -->
        <link rel="stylesheet" href="materi.css">

</head>
<body>

        <!-- header section starts -->
<section class="header">
    <a class="logo"> BBC ETS </a>
        <nav class="navbar">
            <a> COURSE </a>
        </nav>

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
        <a href="dashboard.php" class="btn"> Back </a>

<div class="heading">
    <h1> Structure TOEFL </h1>
</div>

<!-- produk section start -->

<section class="packages">

<?php
include "konek.php";
?>

<!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  grid-template-rows: 80px 200px;
  gap: 10px;
  background-color: #fff;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}
</style>
</head>
<body>

<h1>The grid-template-rows Property</h1>

<div class="grid-container">
      <?php
        $count=0;
        $res =mysqli_query($link, "SELECT * FROM materi");                                                                
        WHILE($row=mysqli_fetch_array($res))
        {
        $count=$count+1;
      ?> 
    
    <div><?php echo $row["materi_course"]; ?></div>
    <div><?php echo $row["materi_course"]; ?></div>
    <div><?php echo $row["materi_course"]; ?></div>

      <?php
        }
      ?>
</div>

<div class="grid-container">
  <div>4</div>
</div>

<p>Use the <em>grid-template-rows</em> property to specify the size (height) of each row.</p>

</body>
</html>
        <div class="load-more"> <a href="index.html" class="btn"> Take a Mini Quiz </a> </div>


</section>

<!-- produk section end -->



















 <?php
 include "footer.php";
 ?>