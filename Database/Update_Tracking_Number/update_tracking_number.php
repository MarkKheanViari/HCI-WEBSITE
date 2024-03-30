<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
    <link  rel="stylesheet" type="text/css" href="update_tracking_number_style.css">
</head>
<body>
    <h1>Update Order</h1>
    <form action="update_tracking_number_server.php" method="post">
        <label for="order_id">Order ID:</label>
        <input type="number" id="order_id" name="order_id" required>
        
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="sot">SOT:</label>
        <input type="number" id="sot" name="sot" required>

        <input type="submit" value="Update Order">
    </form>
</body>
</html>
