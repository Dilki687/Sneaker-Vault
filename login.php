<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Check if email exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            header("Location: ../index.html");
            exit();
        } else {
            header("Location: ../login.html?error=Incorrect password");
            exit();
        }
    } else {
        header("Location: ../login.html?error=No account found with this email");
        exit();
    }

    $conn->close();
}
?>
