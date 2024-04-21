
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/login_register.css">
    
</head>
<body>

    <div class="container">


        <form action="Check_Register.php" method="POST">

            <h1>Register</h1>

            <input type="text" name="username" id="username" required placeholder="username">
            <br>

            <input type="password" name="pws" id="pws" required placeholder="passoword">
            <br>

            <input type="password" name="con_pws" id="con_pws" required placeholder="confirm password">
            <br>
        
            <input type="text" name="firstname" id="name" required placeholder="firstname">
            <br>

            <input type="text" name="lastname" id="lastname" required placeholder="lastname">
            <br>

            <p class="gender">Gender</p>
            <input type="radio" name="gender" id="gender" value="men"><label for="">MEN</label>
            <input type="radio" name="gender" id="gender" value="women"><label for="">WOMEN</label>
            <input type="radio" name="gender" id="gender" value="other"><label for="">OTHER</label>
            <br>

            <input type="email" name="email" id="email" required placeholder="email">
            <br>

            <input type="submit" value="enter" name="reg">

            <p>Already have an account? <span><a href="Login.php">Login now</a></span> </p>
        </form>

    </div>

</body>
</html>