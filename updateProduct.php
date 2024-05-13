<?php 

    require 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>

        form button[type=button] a{

            text-decoration: none;
            color: white;

        }

        h1 {

            margin-top: 5px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: .5rem ;

        }

        form, label, input[type=text], input[type=number], textarea{

            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
            width: 50%
            
        }
        
        input[type=submit], a {
            
            margin: 5px;

        }

    

    </style>

</head>
<body>

    <h1>Update Product</h1>
    
    <?php 
    
        if(isset($_GET["id"])) {

            $product_id = $_GET["id"];

            $sql = "SELECT * FROM products WHERE product_id = '$product_id';";

            $result = mysqli_query($conn, $sql);

            $fetech_product = mysqli_fetch_assoc($result);

    ?>

    <form action="save.php" method="post">

        <div class="mb-3">
            <label for="ID" class="form-label">ID</label>
            <input type="text" value="<?php echo $fetech_product["product_id"]; ?>" class="form-control" name="product_id" readonly></input>
        </div>

        <div class="mb-3">
            <label for="product-name" class="form-label">Product name</label>
            <input type="text" name="product_name" id="product_name" value="<?php echo $fetech_product["product_name"]; ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="product-price" class="form-label">Price</label>
            <input type="number" name="price" id="price" value="<?php echo $fetech_product["price"]; ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" value="<?php echo $fetech_product["quantity"]; ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="5" rows="5" class="form-control"><?php echo $fetech_product["description"]; ?></textarea>
        </div>

        <select name="type" id="type">
            <option disabled selected>เลือกหมวดหมู่</option>
            <option value="1">Controller</option>
            <option value="2">Console</option>
            <option value="3">Game</option>
        </select>
        
        <input type="submit" value="update" class="btn btn-primary" name="update">

        <a href="adminProduct.php" class="btn btn-danger">Back</a>

    </form>

    <?php } ?>

</body>
</html>