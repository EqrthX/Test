<?php 

    require "connection.php";

    if(isset($_POST["add_product"])) {

        $product_name = $_POST["product_name"];

        $product_price = $_POST["price"];

        $product_quantity = $_POST["quantity"];

        $category_id = $_POST["category_id"];

        $type_game = $_POST["type"];

        $description = $_POST["description"];

        $date = date("Y-m-d", strtotime($_POST["date"]));

        $image = $_FILES["image"]["name"];

        $image_tmp_name = $_FILES["image"]["tmp_name"];
        
        $image_folder = "upload_images/" . $image;

        $sql = "SELECT product_name FROM products WHERE product_name = '$product_name'";

        $select_product_name = mysqli_query($conn, $sql);

        if(mysqli_num_rows($select_product_name) > 0) {

            echo "<script>alert('มีสินค้าชิ้นนี้อยู่แล้ว!')</script>";
            header("location:adminPage.php");

        } else {

            $sql = "INSERT INTO products(product_name, description, price, quantity, category_id, type_id, image_url, added_date) VALUES('$product_name', '$description', '$product_price', '$product_quantity', '$category_id', '$type_game', '$image', '$date')";            
            
            $result_insert = mysqli_query($conn, $sql);

            if($result_insert) {

                if(move_uploaded_file($image_tmp_name, $image_folder)) {

                    header("Location: adminProduct.php?message=ไฟล์ที่ย้ายสำเร็จ");
    
                } else {
    
                    header("Location: adminProduct.php?message=เกิดข้อผิดพลาดในการย้ายไฟล์");
    
                }

            }
        
            $check_status = mysqli_query($conn ,"SELECT * FROM products WHERE quantity = 0;");

            if(mysqli_num_rows($check_status) > 0) {

                $add_status = mysqli_query($conn, "UPDATE products SET status = 'Not in stock' WHERE quantity = 0;");

                header("location:adminProduct.php");
                
                
            } else {

                $add_status = mysqli_query($conn, "UPDATE products SET status = 'In stock' WHERE quantity > 0;");

                header("location:adminProduct.php");
            }

        }

    }

?>