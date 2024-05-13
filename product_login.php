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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
    <?php require 'header_user.php'; ?>

    <div class="show-curosel">

        <div id="carouselExample" class="carousel slide">
            
            <div class="carousel-inner">
                
                <?php

                    showImagesCarousel();
                
                ?>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">

                <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                <span class="visually-hidden">Previous</span>
                
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">

                <span class="carousel-control-next-icon" aria-hidden="true"></span>

                <span class="visually-hidden">Next</span>

            </button>

        </div>

        <div id="carouselExampleCaptions" class="carousel slide">

            <div class="carousel-indicators">

                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>

                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            
            </div>

            <div class="carousel-inner">

                <?php 
                
                    $img_folder = "upload_goodproducts/";

                    $imgs = glob($img_folder . "*");

                    if($imgs) {

                        $active = 'active';

                        foreach ($imgs as $img) {
                            ?>

                                <div class="carousel-item <?php echo $active; ?>">
                        
                                    <img src="<?php echo $img; ?>" class="d-block w-100" alt="...">

                                    <div class="carousel-caption d-none d-md-block">

                                        <h5>สินค้าขายดี</h5>

                                    </div>

                                </div>

                            <?php 

                            $active = '';

                        }

                    }
                
                ?>
                
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">

                <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                <span class="visually-hidden">Previous</span>

            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                
                <span class="carousel-control-next-icon" aria-hidden="true"></span>

                <span class="visually-hidden">Next</span>

            </button>

        </div>
    </div>

    <nav class="menu">

        <ul>

            <li><a href="Home.php">Home</a></li>
            <li><a href="Catagory_Login.php">Catagory</a></li>
            <li><a href="About_us_Login.php">About us</a></li>
            <li><a href="Contact_Login.php">Contact</a></li>

        </ul>

    </nav>

    <?php 

        if(isset($_GET["id"])) {

            $imgF = "upload_images/";

            $imgFiles = glob($imgF . "*");

            $imagePathString = "'" . implode("','" , $imgFiles) . "'";

            $id = $_GET["id"];

            $sql = "SELECT products.*, categories.category_name FROM products 
            INNER JOIN categories ON products.category_id = categories.category_id
            WHERE products.product_id = $id";

            $result = mysqli_query($conn, $sql);

            if($result && mysqli_num_rows($result) > 0) {
                
                while($fetch_product = mysqli_fetch_assoc($result)) {

                    $productImage = basename($fetch_product["image_url"]);

                    if(in_array($productImage, array_map('basename', $imgFiles))) {

                        ?>

                        <form action="cart.php" method="post" enctype="multipart/form-data">

                            <div class="product-box">

                                <div class="box-item">

                                    <a href="Home.php" class="arrow">&#x2190;</a>

                                        <input type="hidden" name="product_id" value="<?php echo $fetch_product["product_id"]; ?>">

                                        <div class="box-img">

                                            <img src="upload_images/<?php echo $fetch_product["image_url"]; ?>" alt="">
                                            <input type="hidden" name="images" value="<?php echo $fetch_product["image_url"]; ?>">

                                        </div>

                                        <div class="box-text">

                                            <h2 ><?php echo $fetch_product["product_name"] ?></h2>

                                            <input type="hidden" name="product_name" id="product_name" value="<?php echo $fetch_product["product_name"]; ?>">

                                            <p class="brand-name">แบรนด์ : <?php echo $fetch_product["category_name"]; ?> | Product ID :  <?php 
                                            
                                                if($fetch_product["category_name"] === "PlayStation") {

                                                    echo "S" . $fetch_product["product_id"]; 

                                                } else if($fetch_product["category_name"] === "Xbox") {

                                                    echo "X" . $fetch_product["product_id"];

                                                } else if($fetch_product["category_name"] === "Nintendo Switch") {

                                                    echo "NS" . $fetch_product["product_id"];

                                                }

                                            ?></p> 

                                            <p class="des"><?php echo substr($fetch_product["description"], 0, 271); ?> </p>
                                            
                                            <div class="box-pattern">

                                                

                                            </div>

                                            <div class="box-qty">

                                                <input type="number" value="1" min="1" name="qty"/>

                                                <p id="price"><?php echo $fetch_product["price"]; ?> บาท</p>

                                                <input type="hidden" name="price" value="<?php echo $fetch_product["price"]; ?>">

                                            </div>

                                            <div class="box-input-submit">
                                                
                                                <input type="submit" value="add to cart" name="cart" class="btn btn-danger">
                                        
                                                <input type="submit" value="buy now" name="buy" class="btn btn-success">

                                            </div>
                                            
                                        </div>

                                </div>

                            </div>

                        </form>

                        <?php

                    }
                    
                }
               
            } else {

                echo "ข้อมูลผิดพลาด";

            }

        }

    
    ?>

    <script src="js/script.js"></script>

</body>
</html>