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

// Retrieve messages from the database
$sql = "SELECT * FROM message";
$result = $conn->query($sql);

// Display messages table
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Full Name</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><a href='?fullName=" . urlencode($row['full_name']) . "'>" . $row["full_name"] . "</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No messages found.";
}

// Close connection
$conn->close();
?>

<?php
// Display messages for the selected full name if it's provided in the URL
if (isset($_GET['fullName'])) {
    $selectedFullName = $_GET['fullName'];
    echo "<h2>Messages for $selectedFullName</h2>";

    // Reconnect to the database
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve messages for the selected full name
    $sql = "SELECT * FROM message WHERE full_name = '$selectedFullName'";
    $result = $conn->query($sql);

    // Display messages
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Email</th><th>Message</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No messages found for $selectedFullName";
    }

    // Close connection
    $conn->close();
}
?>
