<?php
include "config.php";

$id = $_GET['id'];

$sql = "SELECT * FROM cart WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["error" => "Item not found"]);
}

$stmt->close();
$conn->close();
?>
