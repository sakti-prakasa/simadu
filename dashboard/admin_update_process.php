<?php
include '../connection.php';

if (isset($_POST['update_admin'])) {
    $adminId = $_POST['admin_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the password is provided 
    if (!empty($password)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the admin record with the hashed password
        $query = "UPDATE admin SET nama='$name', email='$email', password='$hashedPassword' WHERE id_admin='$adminId'";
    } else {
        // Update the admin record without changing the password
        $query = "UPDATE admin SET nama='$name', email='$email' WHERE id_admin='$adminId'";
    }

    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect back to the admin page with a success message
        header("Location: admin.php");
        exit();
    } else {
        echo "error";
        // Redirect back to the admin page with an error message
        header("Location: admin.php");
        exit();
    }
}

// Close the database connection
mysqli_close($connection);
