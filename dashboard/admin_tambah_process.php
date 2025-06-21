<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $emailCheckQuery = "SELECT id_admin FROM admin WHERE email = '$email'";
    $emailCheckResult = mysqli_query($connection, $emailCheckQuery);

    if (mysqli_num_rows($emailCheckResult) > 0) {
        // Email already exists, display alert and redirect to admin_tambah.php
        echo "<script>alert('Email sudah ada. Silahkan pilih email lain.'); window.location.href = 'admin_tambah.php';</script>";
    } else {
        // Email is unique, perform the insert operation
        $insertQuery = "INSERT INTO admin (nama, email, password) VALUES ('$name', '$email', '$hashedPassword')";
        $insertResult = mysqli_query($connection, $insertQuery);

        // Close the database connection
        mysqli_close($connection);

        // Redirect back to the admin page with the toast notification parameters in the URL
        header("Location: admin.php");
        exit();
    }
}
