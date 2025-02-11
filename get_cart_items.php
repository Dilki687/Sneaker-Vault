<?php
include 'config.php';

$result = $conn->query("SELECT * FROM cart");

$cartItems = [];
while ($row = $result->fetch_assoc()) {
    $cartItems[] = $row;
}

echo json_encode($cartItems);
?>
