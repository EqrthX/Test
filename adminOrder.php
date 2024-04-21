<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Check</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Order Check</h1>
        <form action="check_order.php" method="GET">
            <label for="order_id">Enter Order ID:</label>
            <input type="text" id="order_id" name="order_id" required>
            <button type="submit">Check Order</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
