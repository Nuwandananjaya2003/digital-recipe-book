<?php
// Database configuration
$servername = "localhost:3307";
$username = "root";
$password = ""; // Update this if your local setup requires a password
$dbname = "recipe_book";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
