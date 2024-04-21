
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Mali:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');

        html,body {

            font-family: "Mali", cursive;
            background: rgb(3,227,255);
            background: linear-gradient(90deg, rgba(3,227,255,1) 0%, rgba(61,91,223,1) 53%, rgba(61,138,223,1) 100%);
        
        }

        .container {

            display: flex;
            justify-content: center;
            margin-top: 150px;
            align-items: center;
            margin-right: auto;
            margin-left: auto;
            margin-bottom: auto;
            background: white;
            width: 40%;
            border-radius: 25px;
            
        }

        .container h1 {

            text-align: center;
            text-transform: uppercase;
            font-size: 50px;

        }

        .container input[type=text], input[type=password], input[type=email] {

            display: flex;
            font-family: "Mali", cursive;
            position: relative;
            margin-top: 10px;
            margin-left: -15px;
            font-size: large;
            padding: 10px;
            border-radius: 10px;
            width: 100%;
            
        }

        .container .gender input[type=radio] {

            font-weight: bold;

        }

        .container input[type=submit] {

            width: 100%;
            margin-top: 10px;
            padding: 15px;
            text-transform: uppercase;
            font-family: "Mali", cursive;
            border: none;
            border-radius: 5px;
            background: #5f91c8;
            color: white;
            font-weight: bold;
            transition: 0.2s;
            margin-bottom: 25px;

        }

        .container input[type=submit]:hover {

            background-color: #1a5698;

        }

        .container a {

            text-decoration: none;
            transition: 0.2s;
            color: rgb(3,227,255);

        }

        .container a:hover {

            color: red;

        }
        
    </style>

</head>

<body>
    
    <div class="container">

        <form action="Check_Login.php" method="POST">

            <h1>Login</h1>

            <input type="text" name="user" id="user" placeholder="username">
            <br>

            <input type="password" name="pws" id="pws" placeholder="password">
            <br>

            <input type="submit" value="submit" name="enter">

            <p>Have you an account ? <a href="Register.php">Register</a></p>
        </form>

    </div>
</body>
</html>