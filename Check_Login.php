<?php

    require 'connection.php';
    session_start();

    if(isset($_POST['enter'])) {
        
        $username = mysqli_real_escape_string($conn, $_POST['user']);
        $pws = $_POST['pws'];

        $select_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        
        if(mysqli_num_rows($select_user) > 0) {

            $rows = mysqli_fetch_assoc($select_user);

            if($pws == $rows["password"]) {

                if($rows['user_type'] == 'admin') {
                
                    $_SESSION['admin_email'] = $rows["email"];
                    $_SESSION['admin_user'] = $rows["username"];
                    $_SESSION['admin_id'] = $rows["user_id"];
                    header("location:adminPage.php");
                    exit();
        
                } elseif($rows['user_type'] == 'user') {
                    
                    $_SESSION['user_email'] = $rows["email"];
                    $_SESSION['user_username'] = $rows["username"];
                    $_SESSION['user_id'] = $rows["user_id"];
                    header("location:Home.php");
                    exit();
                    
                }
                
            } else {

                echo "<script>alert('Password incorrect!')</script>";
                echo "<script>window.location='Home_Visitor.php';</script>";
                exit();
            }

        } else {

            echo "<script>alert('User not found!')</script>";
            echo "<script>window.location='Home_Visitor.php';</script>";
            exit();

        }

    }
?>