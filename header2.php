<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- font awesome cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!-- custom css file link -->
  <link rel="stylesheet" href="style.css">
</head>
<body>

        <!-- header section start -->
<section class="header">
    <a class="logo" style="text-decoration: none"> BBC ETS </a>

    <nav class="navbar" >
        <a href="dashboard.php" style="text-decoration: none"> Home </a>
        <a href="about.php" style="text-decoration: none"> Tentang Kami </a>
       <!-- <a href="produk.php" style="text-decoration: none"> Program </a> -->
        <a href="try.php" style="text-decoration: none"> Try Out </a>
        <a href="results.php" style="text-decoration: none"> Your Stamp </a>

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