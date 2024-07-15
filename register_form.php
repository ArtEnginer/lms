<?php

@include 'konek.php';

if(isset($_POST['submit'])){

   $nama = mysqli_real_escape_string($link, $_POST['nama']);
   $email = mysqli_real_escape_string($link, $_POST['email']);
   $telpon = $_POST['telpon'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];

  
   

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($link, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(nama, email, telpon, password) VALUES('$nama','$email', '$telpon', '$pass')";
         mysqli_query($link, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>

   <!-- custom css file link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
   
<div class="form-container" style="padding: 100px 100px 100px 500px;">
                                       <!-- atas  bawah kanan  kiri  -->
   <form action="" method="post">
      <h3 style="padding: 10px 100px 20px 150px;"> Registration </h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

      <div class="mb-3 mt-3">
         <div class="col-lg-6">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required placeholder="enter your name">

         </div>
      </div>

      <div class="mb-3">
         <div class="col-lg-6">
            <label for="password" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="enter your email">

         </div>
      </div>

      <div class="mb-3">
         <div class="col-lg-6">
            <label for="password" class="form-label">Phone:</label>
            <input type="text" class="form-control" id="telpon" name="telpon" required placeholder="enter your phone number">

         </div>
      </div>

      <div class="mb-3">
         <div class="col-lg-6">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required placeholder="enter your password">
         </div>
      </div>

      <div class="mb-3">
         <div class="col-lg-6">
            <label for="password" class="form-label">Confirm Password:</label>
            <input type="password" class="form-control" id="password" name="cpassword" required placeholder="confirm your password">
         </div>
      </div>
      
      <input type="submit" class="btn btn-primary" name="submit" value="Register" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>
</div>

</body>
</html>