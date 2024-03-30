<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "contact_us";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted and data is received
if(isset($_POST['full_name'], $_POST['email'], $_POST['message'])) {
    // Retrieve form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Escape special characters to prevent SQL injection
    $full_name = mysqli_real_escape_string($conn, $full_name);
    $email = mysqli_real_escape_string($conn, $email);
    $message = mysqli_real_escape_string($conn, $message);

    // Insert into database
    $sql = "INSERT INTO message (full_name, email, message) VALUES ('$full_name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form data not received.";
}

// Close connection
$conn->close();
?>
