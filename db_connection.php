<?php
// Database connection configuration
$servername = "192.168.1.178";
$username = "root";
$password = "takonbudi";
$database = "simrs2012";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
