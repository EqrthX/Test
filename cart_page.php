<?php 

    require "connection.php";

    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)) {

        header("location:Login.php");
        exit();
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
    
    <?php 
    
        require "header_user.php";
    
    ?>

    <h1 style="text-align:center; text-transform: uppercase; margin-top:5px">cart</h1>

    <div class="box-cart">

        <form action="enter_orders.php" method="post" enctype="multipart/form-data">

            <?php 

                if(isset($_GET["id"])) {

                    $sql = "SELECT * FROM cart WHERE user_id = '$user_id';";

                    $result_cart_show = mysqli_query($conn, $sql);
        
                    while($fetch_cart = mysqli_fetch_assoc($result_cart_show)) {

            ?>

                <div class="box-showcart">
                    
                    <img src="upload_images/<?php echo $fetch_cart["image"] ?>" alt="" style="width:100px; height: 100px;"><br>
                    <p>ชื่อสินค้า: <?php echo $fetch_cart["product_name"] ?></p><br>
                    <p>รหัสสินค้า: <?php echo $fetch_cart["cart_id"] ?></p><br>
                    <p>ราคา: <?php echo $fetch_cart["price"] ?>.00 บาท</p><br>
                    <p>จำนวน<input type="number" name="" id="" value="<?php echo $fetch_cart["quantity"] ?>"></p>
                    <p>ราคาทั้งหมด : <?php 
                    
                        $total_price = $fetch_cart["price"] * $fetch_cart["quantity"];
                        echo $total_price . ".00 บาท";

                    ?></p>
                    
                    <input type="hidden" name="price" value="<?php echo $fetch_cart["price"]; ?>">

                    <input type="hidden" name="qty" value="<?php echo $fetch_cart["quantity"]; ?>">

                    <a href="cart_del.php?id=<?php echo $fetch_cart["cart_id"]; ?>"><i class="fas fa-trash" style="font-size:25px; color:red;" onclick="return confirm('คุณแน่ใจว่าจะลบสินค้าชิ้นนี้')"></i></a><br>

                    

                </div>
                
            <?php 
                    }
                } 
            ?>

            <div class="box-payment">

                <p style="font-weight: bold;">วิธีการชำระเงิน</p>
                <p>เก็บเงินปลายทาง</p>
                <a href="">เปลี่ยน</a>

            </div>

            <div class="box-input">

                <input type="submit" value="submit" class="btn btn-success">

            </div>

        </form>
    </div>

    <a href="cart_del.php?del_all" name="del_all" class="btn btn-danger d" onclick="return confirm('คุณแน่ใจว่าจะลบสินค้าทั้งหมด')">DELETE ALL</a>

    <script src="js/script.js"></script>

</body>
</html>