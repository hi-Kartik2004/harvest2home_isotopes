<?php

@include 'config.php';

session_start();

$farmer_id = $_SESSION['farmer_id'];

if(!isset($farmer_id)){
    header('location:login.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!---Bootstrap cdn link---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>

<?php include 'farmer_header.php'; ?>

<section class="dashboard">

    <h1 class="title">dashboard</h1>

    <div class="box-container">

        <div class="box">
            <div class="dashboard-details">
                <?php
                $select_products = $conn->prepare("SELECT * FROM `products`");
                $select_products->execute();
                $number_of_products = $select_products->rowCount();
                ?>
                <h3><?= $number_of_products; ?></h3>
                <p>products added</p>
                <a href="farmer_products.php" class="btn">see products</a>
                <a href="register_certified_farmers.php" class="btn">Certified Farmers Association Membership (Click to register)</a>
            </div>


            <div class="table">
                <?php
                    $select_farmers = $conn->prepare("SELECT * FROM `certified_farmers` ORDER BY `id` DESC");
                    $select_farmers->execute();
                    $number_of_farmers = $select_farmers->rowCount();
                ?>
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Names</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Farm Name</th>
                        <th scope="col">Produce Specialty</th>
                        <th scope="col">Location</th>
                    </tr>
                    </thead>
                    <?php

                            if($select_farmers->rowCount() > 0)
                            while($data = $select_farmers->fetch(PDO::FETCH_ASSOC))


                            {
                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $data['id']??''; ?></td>
                            <td><?php echo $data['names']??''; ?></td>
                            <td><?php echo $data['phone_number']??''; ?></td>
                            <td><?php echo $data['farm_name']??''; ?></td>
                            <td><?php echo $data['produce_specialty']??''; ?></td>
                            <td><?php echo $data['location']??''; ?></td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

</section>













<script src="js/script.js"></script>

</body>
</html>