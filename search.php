<?php 


?>


<?php 

    include 'connection.php';

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

            <li><a href="Home_Visitor.php">Home</a></li>
            <li><a href="Catagory.php">Catagory</a></li>
            <li><a href="About_us.php">About us</a></li>
            <li><a href="contact.php">Contact</a></li>

        </ul>

    </nav>


    <h1 class="title">Search</h1>

    <div class="show-product">

        <div class="container">

                <?php 
                    
                    if(isset($_POST["submit"])) {

                        $imagesFolder = "upload_images/";

                        $imageFiles = glob($imagesFolder . "*");

                        $imagePathsString = "'" . implode("','", $imageFiles) . "'";

                        $keyword = $_POST["keyword"];

                        $sql_search = "SELECT * FROM products WHERE product_name LIKE '%" . $keyword . "%'";

                        $result = mysqli_query($conn, $sql_search);

                        if($result && mysqli_num_rows($result) > 0) {
                            
                            while($fetch_product = mysqli_fetch_assoc($result)) {
                                
                                $productImageName = basename($fetch_product["image_url"]);
                                
                                if(in_array($productImageName, array_map('basename', $imageFiles))) {

                                    ?>
                                        <a href="product.php?id=<?php echo $fetch_product["product_id"]; ?>">
                                            <div class="container-box">

                                                <img src="upload_images/<?php echo $fetch_product["image_url"]; ?>" alt="">

                                                <p>
                                                    <?php echo $fetch_product["product_name"]; ?> 
                                                    <br> 
                                                    ราคา <?php echo $fetch_product["price"]; ?>
                                                </p>

                                            </div>  
                                        </a>

                                    <?php 

                                } else {

                                    echo "ไม่พบรูปภาพที่ตรงกับ image_url '{$productImageName}' ในฐานข้อมูล<br>";

                                }

                            }
                                
                        } else {

                            echo "No products found.";

                        }

                    }

                ?>

        </div>

    </div>

    <script src="js/script.js"></script>

</body>
</html>