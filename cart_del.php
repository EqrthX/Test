<?php 

    require "connection.php";

    $user_id = $_SESSION['user_id'];

    if(isset($_GET["id"])) {

        $cart_id = $_GET["id"];

        $sql = "DELETE FROM cart WHERE cart_id = '$cart_id';";

        $result_select_del = mysqli_query($conn, $sql);

        $fetch_cart_id = mysqli_fetch_assoc($result_select_del);

        if($result_select_del) {

            header("location:Home.php");
            exit();

        } else {

            echo "การลบข้อมูลผิดพลาด";

        }

    }


    if(isset($_GET["del_all"])) {
        $sql_delAll = "DELETE FROM cart";
        $result_delAll = mysqli_query($conn, $sql_delAll);
        
        if($result_delAll) {
            header("location:Home.php");
            exit();
        } else {
            echo "การลบข้อมูลผิดพลาด";
        }
    }

?>