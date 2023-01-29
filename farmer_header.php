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

<header class="header">

    <div class="flex">

        <a href="farmer_page.php" class="logo">Farmer Panel</a>

        <nav class="navbar">
            <!-- <a href="home.php">Home</a> -->
            <a href="farmer_page.php">Dashboard</a>
            <a href="farmer_products.php">Add Products</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">
            <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$farmer_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
            <p><?= $fetch_profile['name']; ?></p>
           
            <a href="farmer_update_profile.php" value="" class="btn">Update profile</a>
            </form>
            <a href="logout.php" class="delete-btn">logout</a>
<!--            <div class="flex-btn">-->
<!--                <a href="login.php" class="option-btn">login</a>-->
<!--                <a href="register.php" class="option-btn">register</a>-->
<!--            </div>-->
        </div>

    </div>
    
</header>