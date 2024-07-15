<?php

@include 'konek.php';

session_start();

if (isset($_POST['submit'])) {

   $nama = mysqli_real_escape_string($link, $_POST['nama']);
   $email = mysqli_real_escape_string($link, $_POST['email']);
   $telpon = $_POST['telpon'];
   $password = $_POST['password'];


   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($link, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['role'] == 'admin') {
         $_SESSION['admin_name'] = $row['nama'];
         $_SESSION['id'] = $row['id'];
         header('location:admin_page.php');
      } elseif ($row['role'] == 'user') {
         $_SESSION['user_name'] = $row['nama'];
         $_SESSION['id'] = $row['id'];
         header('location:dashboard.php');
      }
   } else {
      $error[] = 'incorrect email or password!';
   }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>

   <!-- custom css file link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

   <div class="form-container" style="padding: 100px 100px 100px 500px;">
      <!-- atas  bawah kanan  kiri  -->
      <form action="" method="post">
         <h3 style="padding: 10px 100px 20px 200px;"> Log In </h3>

         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>

         <div class="mb-3 mt-3">
            <div class="col-lg-6">
               <label for="email" class="form-label">Email:</label>
               <input type="email" class="form-control" id="email" name="email" required placeholder="enter your email">
            </div>
         </div>

         <div class="mb-3">
            <div class="col-lg-6">
               <label for="password" class="form-label">Password:</label>
               <input type="password" class="form-control" id="password" name="password" required placeholder="enter your password">
            </div>
         </div>

         <input type="submit" class="btn btn-primary" name="submit" value="Login" class="form-btn">
         <p>don't have an account? <a href="register_form.php">register now</a></p>
      </form>
   </div>

</body>

</html>