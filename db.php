<?php
// Database configuration
$host = 'localhost'; // Your database host (usually 'localhost')
$db_name = 'cv'; // Your database name
$username = 'root'; // Your database username (default is 'root' for XAMPP)
$password = ''; // Your database password (leave blank for XAMPP)

// Create connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>