<?php 

    require 'connection.php';
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/login_register.css">

</head>

<body>
    
    <div class="container">
        <a href="Home_Visitor.php" class="arrow">&#x2190;</a>
        <?php 
        
            if(isset($_POST['enter'])) {

                $user = $_POST['user'];
                $password = $_POST['pws'];

                $sql_user = "SELECT * FROM users WHERE username = '$user'";

                $result_users = mysqli_query($conn, $sql_user);

                $user = mysqli_fetch_array($result_users, MYSQLI_ASSOC);

                if($user) {

                    if($password === $user['password']) {

                        if($user['user_type'] === 'user') {

                            $_SESSION['user_email'] = $user["email"];
                            $_SESSION['user_username'] = $user["username"];
                            $_SESSION['user_id'] = $user["user_id"];
                            header("Location: Home.php");
                            exit();

                        } elseif($user['user_type'] === 'admin') {

                            $_SESSION['admin_email'] = $user['email'];
                            $_SESSION['admin_user'] = $user['username'];
                            $_SESSION['admin_id'] = $user['user_id'];
                            header("Location: adminPage.php");
                            exit();

                        }
                    } else {

                        echo "<div class='alert alert-danger'>Password incorrect!</div>";
                    }

                } else {

                    echo "<div class='alert alert-danger'>User not found!</div>";
                        
                }
            }
        ?>
        <form action="Login.php" method="POST">

            <h1>Login</h1>

            <input type="text" name="user" id="user" placeholder="username" class="form-control">
            <br>

            <input type="password" name="pws" id="pws" placeholder="password" class="form-control">
            <br>

            <input type="submit" value="submit" name="enter" class="btn btn-primary md-3">

            <p>Have you an account ? <a href="Register.php">Register</a></p>
        </form>

    </div>
</body>
</html>