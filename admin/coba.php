<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>
  <!--css-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="login.css" rel="stylesheet">

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/19_SETUM.png"
          class="img-fluid" alt="Sample image" style="margin-top: 100px;">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form>
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
    <h3 class="navbar-brand mb-0 h3">
    <font face="monotype corsiva" size="30" color="black">
        <span>LOG IN</span>
</font>
</div>
</form>

	<center>
	<form action="proses_login.php" method="POST">
  <div class="form-outline mb-4">
            <label class="form-label">Username</label>
            <input type="text" class="form-control form-control-lg" placeholder="Enter a valid username" name="username" required="" autofocus="" autocomplete="off">
          </div>
		<br/>
    <div class="form-outline mb-3">
          <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-lg" placeholder="Enter password" name="password" required="" autocomplete="off">
          </div>
		
    <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">Login</button>
          </div>
		
	</form>

	<!-- Menampung jika ada pesan -->
	<?php if(isset($_GET['pesan'])) {  ?>
	<label style="color:red;"><?php echo $_GET['pesan']; ?></label>
	<?php } ?>	
	</center>
  </div>
  </div>
<br>
<br>
<br>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2024. All rights reserved.
    </div>
    <!-- Copyright -->
  </div>
  
</section>
</body>
</html>