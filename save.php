<?php 

    require 'connection.php';

    if(isset($_POST["update"])) {

        $id = $_POST["product_id"];
        $product_name = $_POST["product_name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $description = $_POST["description"];

        $sql = "UPDATE products 
                SET product_name = '$product_name', 
                    description = '$description', 
                    price = '$price', 
                    quantity = '$quantity'
                WHERE product_id = '$id';";

        $result = mysqli_query($conn , $sql);

        if($result) {

            header("location:adminProduct.php");

        } else {

            echo "เกิดข้อผิดพลาด";

        }
    }

?>