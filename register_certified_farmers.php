<?php

include 'config.php';

if(isset($_POST['submit'])){

   $names = $_POST['names'];
   $names = filter_var($names, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $phone_number = $_POST['phone_number'];
   $gender = $_POST['gender'];

   $farm_name = $_POST['farm_name'];
   $farm_name = filter_var($farm_name, FILTER_SANITIZE_STRING);

   $produce_specialty = $_POST['produce_specialty'];
//   $produce_specialty = filter_var($produce_specialty, FILTER_SANITIZE_STRING);

   $location = $_POST['location'];


   $license_number = $_POST['license_number'];
   $license_number = filter_var($license_number, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;



   $select = $conn->prepare("SELECT * FROM `certified_farmers` WHERE phone_number = ? AND email =?");
   $select->execute([$phone_number, $email]);

   if($select->rowCount() > 0){
      $message[] = 'user email already exist!';

      }else{
         $insert = $conn->prepare("INSERT INTO `certified_farmers`(names, email, phone_number, gender, farm_name,produce_specialty,location, license_number,image) VALUES(?,?,?,?,?,?,?,?,?)");
         $insert->execute([$names, $email, $phone_number, $gender, $farm_name, $produce_specialty, $location, $license_number, $image]);

         if($insert){
            if($image_size > 20000000){
               $message[] = 'image size is too large!';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);
               $message[] = 'registered successfully!';
               header('location:farmer_page.php');
            }
         }

      }

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

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
   
<section class="form-container">

   <form action="" enctype="multipart/form-data" method="POST">
      <h3>register now to be part of the certified farmers association</h3>
      <input type="text" name="names" class="box" placeholder="enter your full names" required>
      <input type="email" name="email" class="box" placeholder="enter your email" required>
      <input type="text" name="phone_number" class="box" placeholder="enter your phone number e.g 0722100200" required>
       <select  class="box" name="gender" id="gender" required>
           <option value="">--Please choose your Gender--</option>
           <option value="male">Male</option>
           <option value="female">Female</option>
       </select>
       <input type="text" name="farm_name" class="box" placeholder="enter your farm name" required>
       <select  class="box" name="produce_specialty" id="produce_specialty" required>
           <option value="">--Select the food produce you specialize in growing--</option>
           <option value="farmer">Cereals</option>
           <option value="user">Dairy</option>
           <option value="user">Poultry</option>
           <option value="user">Pork</option>
           <option value="user">Bee Keeping</option>
           <option value="user">All of the above</option>
       </select>
       <select  class="box" name="location" id="location" required>
           <option value="">--Select your location--</option>
           <option value="farmer">Mombasa</option>
           <option value="user">Kisumu</option>
           <option value="user">Nairobi</option>
           <option value="user">Trans Nzoia</option>
           <option value="user">Eldoret</option>
           <option value="user">Nakuru</option>
           <option value="user">Thika</option>
           <option value="user">Embu</option>
           <option value="user">Mwea</option>
           <option value="user">Meru</option>
       </select>
       <input type="text" name="license_number" class="box" placeholder="enter your certified license number e.g FK3982847472L" required>

       <input type="file" name="image" class="box" required accept="image/jpg, image/jpeg, image/png">

      <input type="submit" value="register now" class="btn" name="submit">
   </form>

</section>


</body>
</html>