<?php
header("Content-Type: application/json");

include "config.php";

try {
    // Delete all cart items
    $stmt = $conn->prepare("DELETE FROM cart");
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => true, "message" => "Cart cleared successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "No cart items to delete."]);
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}

$conn->close();
?>
