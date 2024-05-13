<?php 
    require "connection.php";

    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)) {

        header("location:Login.php");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    
    <link rel="stylesheet" href="css/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>
<body>
    
    <?php require 'adminHeader.php' ?>

    <section class="dashboard">

        <h1>dashboard</h1>

        <div class="box-container">

            <div class="box">

                <h3>A</h3>
                <p>total pending</p>

            </div>
            <div class="box">

                <h3>A</h3>
                <p>completed payment</p>

            </div>
            <div class="box">    

                <h3>A</h3>
                <p>order placed</p>

            </div>
            <div class="box">

                <h3><?php 
                
                $sql = "SELECT * FROM products";
                $result = mysqli_query($conn, $sql);
                $number_products = mysqli_num_rows($result);
                echo $number_products;

                ?></h3>
                <p>products added</p>

            </div>
            <div class="box">

                <h3><?php 
                
                    $sql = "SELECT * FROM users WHERE user_type = 'user'";
                    $result = mysqli_query($conn, $sql);
                    $number_user = mysqli_num_rows($result);
                    echo $number_user;
                
                ?></h3>

                <p>normal users</p>

            </div>
            <div class="box">

                <h3><?php 
                
                    $sql = "SELECT * FROM users WHERE user_type = 'admin'";
                    $result = mysqli_query($conn, $sql);
                    $number_admin = mysqli_num_rows($result);
                    echo $number_admin;
                
                ?></h3>

                <p>admin users</p>

            </div>

        </div>


    </section>


    <script src="js/Adminscript.js"></script>
</body>
</html>