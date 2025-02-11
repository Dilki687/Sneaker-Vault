<?php
$servername = "localhost";
$username = "root";
$password = "2002"; // Change to your database password. 
$dbname = "sneaker_vault"; // create a db 'sneaker_vault'

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
