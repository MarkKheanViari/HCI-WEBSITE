<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "track_order";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $order_id = $_POST["order_id"];
    $product_name = $_POST["product_name"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $status = $_POST["status"];
    $address = $_POST["address"];
    $sot = $_POST["sot"];

    // Check if order ID exists in the database
    $sql = "SELECT * FROM track_number WHERE order_id = $order_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Order ID exists, update status and SOT
        $sql_update = "UPDATE track_number SET status = '$status', sot = '$sot' WHERE order_id = $order_id";

        if ($conn->query($sql_update) === TRUE) {
            echo "Status and SOT updated successfully for order ID $order_id.";
        } else {
            echo "Error updating status and SOT: " . $conn->error;
        }
    } else {
        // Order ID does not exist, insert new order
        $sql_insert = "INSERT INTO track_number (order_id, product_name, quantity, price, status, address, sot) 
                       VALUES ($order_id, '$product_name', $quantity, $price, '$status', '$address', '$sot')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "New order inserted successfully.";
        } else {
            echo "Error inserting new order: " . $conn->error;
        }
    }
}

// Close database connection
$conn->close();
?>