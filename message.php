<?php 

    include 'connection.php';

    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)) {

        header("location:Login.php");
        exit();
        
    }

    function showImagesCarousel() {

        $image_folder = 'upload_images/';
            
        $images = glob($image_folder . '*');
            
        if ($images) {

            $active = 'active';

            foreach ($images as $image) {
                ?>

                <div class="carousel-item <?php echo $active ?>">

                    <img src="<?php echo $image ?>" class="d-block w-100" alt="...">

                </div>

                <?php

                $active = '';

            }
        }

    }

?>

<?php require 'header_user.php'; ?>
<style>
body {
  font-family: sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: #f0f0f0;
  padding: 20px;
}

h1 {
  text-align: left;
}

nav {
  text-align: center;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

nav li {
  display: inline-block;
  margin: 0 10px;
}

nav a {
  text-decoration: none;
  color: #333;
}

.contact-us {
  padding: 20px;
}

h2 {
  text-align: center;
}

p {
  text-align: center;
}

form {
  margin: 20px 0;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="email"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

address {
  text-align: center;
  margin-top: 20px;
}

footer {
  background-color: #f0f0f0;
  padding: 20px;
  text-align: center;
}

.contact-container {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.contact {
  flex: 1 1 300px;
  margin: 0 10px;
}

.contactat {
  flex: 1 1 300px;
  margin: 0 10px;
}

.contact,
.cotactat {
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* .contact h2,
.cotactat h2 {
  text-align: center;
} */


/* textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  box-sizing: border-box;
 
}   */

 </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Contact Us</title>
  
</head>
<body>
  <header>
    
    
  </header>

  </header>

<section class="contact-container">
  <div class="contact">
    <h2>CONTACT</h2>
    <p>Message us</p>

    <form action="message.php" method="post">
    <label for="name">Name</label>
  <input type="text" id="name" name="name" placeholder="Enter your name" style="width: 100%; padding: 10px; border: 1px solid #ccc; box-sizing: border-box;">

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email address">

      <label for="phone">Phone</label>
      <input type="text" id="phone" name="phone" placeholder="Enter your phone" style="width: 100%; padding: 10px; border: 1px solid #ccc; box-sizing: border-box;">

      <label for="subject">subject</label>
      <input type="text" id="subject" name="subject" placeholder="Enter your subject"style="width: 100%; padding: 10px; border: 1px solid #ccc; box-sizing: border-box;">

      <label for="message">Message</label>
      <textarea id="text" name="message" placeholder="Enter your message"></textarea>

      <button type="submit">Send</button>
    </form>
  </div>

  <div class="Contact at">
    <h2 style="margin-bottom: 20px;">Contact at</h2>
    
    <center>
    <!-- Instagram -->
     <div style="margin-bottom: 20px;">
        
            <i class="fab fa-instagram" style="font-size: 50px; margin-bottom: 10px; color: #bc2a8d;"></i>
            <h5>@cgame_shop</h5>
        </a>
    </div>

    <!-- Facebook -->
    <div style="margin-bottom: 20px;">
        
            <i class="fab fa-facebook-square" style="font-size: 50px; margin-bottom: 10px; color: #3b5998;"></i>
            <h5> Facebook.com/cgameshop</h5>
        </a>
    </div>

    <!-- LINE -->
    <div style="margin-bottom: 20px;">
       
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/LINE_logo.svg/1200px-LINE_logo.svg.png" alt="LINE" style="width: 50px; height: 50px; margin-bottom: 10px;">
            <h5>@cgameshop</h5>
        </a>
    </div>

    <!-- Phone -->
    <h3 style="margin-bottom: 10px;">Phone</h3>
    <h5>เบอร์โทรศัพท์ของคุณ</h5>

    <!-- Gmail -->
    <h3 style="margin-bottom: 10px;">Gmail</h3>
    <h5>cgameshop@gmail.com</h5>
    </center>
  </div>


</section>


  <footer>
  <nav>
      <ul>
        <li><a href="Home.php">HOME</a></li>
        <li><a href="Catagory.php">CATAGORY</a></li>
        <li><a href="About_us_Login.php">ABOUT US</a></li>
        <li><a href="Contact_Login.php">CONTACT</a></li>
        
      </ul>
    </nav>
  </footer>

  <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Validate user input (optional)

        // Send email notification (optional)

        echo "<p class='response'>Thank you for your message, $name. We will get back to you shortly.</p>";
    }
    ?>
                        </div>

</div>
    <script src="js/script.js"></script>

</body>
</html>



<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if (!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "cgameshop";

    // create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email FROM message WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO message (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
        
        // Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);
            $stmt->execute();
            echo "<script>alert('บันทึกข้อมูลเรียบร้อย')</script>";
        } else {
            echo "<script>alert('อีเมลซ้ำ มีอีเมลนี้ในระบบแล้ว!!')</script>";
        }
        
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
    die();
}
?>
