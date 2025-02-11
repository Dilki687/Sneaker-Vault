<?php
include 'config.php';

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $productName = $data['name'];
    $productPrice = $data['price'];
    $productSize = $data['size'];
    $productQuantity = $data['quantity'];
    $totalPrice = $data['total_price'];

    $sql = "INSERT INTO cart (product_name, product_price, product_size, product_quantity, total_price) 
            VALUES ('$productName', '$productPrice', '$productSize', '$productQuantity', '$totalPrice')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }
}
?>
