<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Materi</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
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
<h1>Fighting <span><?php echo $_SESSION['user_name'] ?></span></h1>
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
        <a href="produk.php" class="btn" style="margin-left: 10px; margin-bottom: 10px"> Back </a>

<div class="heading">
    <h1> Structure TOEFL </h1>
</div>

<!-- produk section start -->

<section class="packages">
    <?php
        $res=mysqli_query($link, "SELECT * FROM materi WHERE id = ".$_GET['id']."");
        while($row=mysqli_fetch_array($res)):
    ?>
    <p style="font-size: 24px"><?= $row['materi_course'] ?></p>      
    <!-- <div class="load-more"> <a href="card.php?category=<?= $row['category'] ?>&type=KUIS" class="btn"> Take a Mini Quiz </a> </div> -->
    <?php endwhile; ?>

</section>

<!-- produk section end -->

<?php
include "footer.php";
?>
</body>
</html>