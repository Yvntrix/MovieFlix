<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "movieflix";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<script type='text/javascript'>console.log('Database Successfully Connected!')</script>";
