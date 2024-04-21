<?php 

    require 'connection.php';

    session_start();

    if(isset($_POST['reg'])){

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['pws'];
        $password_con = $_POST['con_pws'];
        $first_name = mysqli_real_escape_string($conn, $_POST['firstname']);
        $last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
        $gender = $_POST['gender'];
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        
        $select_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND email = '$email'; ");

        if(mysqli_num_rows($select_user) > 0) {

            echo "<script>alert('username and email already exit')</script>";

        } else {
            
            if($password == $password_con) {
                    
                $sql = "INSERT INTO users(username, password, firstname, lastname, gender, email) VALUES('$username', '$password_con', '$first_name', '$last_name', '$gender', '$email')";
                    
                $result = mysqli_query($conn, $sql);

                if($result) {

                    header('location:Login.php');
                    exit(0);

                } else {

                    echo mysqli_error($conn);

                }

            } else {

                echo "<script>alert('password not matched!')</script>";

            }
        }
    }
?>