<?php
include 'config.php';
require_once('php/functions.php');
require_once('php/send_otp.php');
if (isset($_POST['submit']) && !empty($_POST)) {
   $_SESSION['userdata'] = $_POST;
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $phone_number = $_POST['phone_number'];
   sendOtp($phone_number);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/components.css">

</head>

<body>

   <?php

   if (isset($message)) {
      foreach ($message as $message) {
         echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
      }
   }

   ?>

   <section class="form-container">

      <form action="" enctype="multipart/form-data" method="POST">
         <h3>register now</h3>
         <input type="text" name="name" class="box" placeholder="enter your full names" required>
         <input type="email" name="email" class="box" placeholder="enter your email" required>
         <input type="text" name="phone_number" class="box" placeholder="enter your phone number e.g 0722100200" required>
         <select class="box" name="gender" id="gender" required>
            <option value="">--Please choose your Gender--</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
         </select>
         <input type="password" name="pass" class="box" placeholder="enter your password" required>
         <input type="password" name="cpass" class="box" placeholder="confirm your password" required>
         <input type="file" name="image" class="box" required accept="image/jpg, image/jpeg, image/png">

         <select class="box" name="user_type" id="user_type" required>
            <option value="">--Please choose an option--</option>
            <option value="farmer">Farmer</option>
            <option value="user">Customer</option>
         </select>

         <input type="submit" value="register now" class="btn" name="submit">
         <p>already have an account? <a href="login.php">login now</a></p>
      </form>

   </section>


</body>

</html>