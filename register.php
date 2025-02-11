<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        header("Location: ../myAccount.html?error=Passwords do not match");
        exit();
    }

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        header("Location: ../myAccount.html?error=Email already exists");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into the database
    $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$hashedPassword')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../login.html?success=Registration successful! Please login.");
    } else {
        header("Location: ../myAccount.html?error=Unable to register. Please try again.");
    }

    $conn->close();
    exit();
}
?>
