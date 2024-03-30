<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "track_order";

// Create a new connection
$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Query all records from the database
$sql = "SELECT * FROM track_number";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

// Display all order information


while ($row = $result->fetch_assoc()) {
    $orderId = isset($row['order_id']) ? $row['order_id'] : '';
    $product_name = isset($row['product_name']) ? $row['product_name'] : '';
    $quantity = isset($row['quantity']) ? $row['quantity'] : '';
    $price = isset($row['price']) ? $row['price'] : '';
    $status = isset($row['status']) ? $row['status'] : '';
    $address = isset($row['address']) ? $row['address'] : '';
    $sot = isset($row['sot']) ? $row['sot'] : '';

    echo "<tr>";
    echo "<td>$orderId</td>";
    echo "<td>$product_name</td>";
    echo "<td>$quantity</td>"; // Replace with actual product name
    echo "<td>$price</td>"; // Replace with actual quantity
    echo "<td>$status</td>"; // Replace with actual price
    echo "<td>$address</td>"; // Replace with actual status
    echo "<td>$sot</td>";
    echo "</tr>";
}

echo "</table>";

$connection->close();
?>
