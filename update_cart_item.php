<?php
include "config.php";

$input = json_decode(file_get_contents('php://input'), true);

$id = $input['id'];
$size = $input['size'];
$quantity = $input['quantity'];
$total_price = $input['total_price'];

$sql = "UPDATE cart SET product_size = ?, product_quantity = ?, total_price = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sidi", $size, $quantity, $total_price, $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$stmt->close();
$conn->close();
?>
