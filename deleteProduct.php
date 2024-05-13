<?php

    require 'connection.php';

    if(isset($_GET["id"])) {

        $id = $_GET["id"];

        $sql = "DELETE FROM products WHERE product_id = '$id';";

        $result = mysqli_query($conn , $sql);

        if($result) {

            header("location:adminProduct.php");
            exit();

        } else {

            echo "เกิดข้อผิดพลาดในการลบข้อมูล";

        }

    } else {

        echo "ไม่พบข้อมูลที่จะลบ";

    }

?>