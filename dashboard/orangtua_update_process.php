<?php
include '../connection.php';

if (isset($_POST['update_parent'])) {
    $parentId = $_POST['parent_id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthDate = $_POST['birth_date'];
    $nip = $_POST['nip'];
    $email = $_POST['email'];
    $idStudent = $_POST['id_student'];
    $password = $_POST['password'];

    // Check if the password is provided
    if (!empty($password)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the parent record with the hashed password
        $query = "UPDATE parents SET name='$name', gender='$gender', birth_date='$birthDate', nip='$nip', email='$email', password='$hashedPassword', id_student='$idStudent' WHERE id_parent='$parentId'";
    } else {
        // Update the parent record without changing the password
        $query = "UPDATE parents SET name='$name', gender='$gender', birth_date='$birthDate', nip='$nip', email='$email', id_student='$idStudent' WHERE id_parent='$parentId'";
    }

    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect back to the parents page with a success message
        header("Location: orangtua.php");
        exit();
    } else {
        echo "error";
        // Redirect back to the parents page with an error message
        header("Location: orangtua.php");
        exit();
    }
}

// Close the database connection
mysqli_close($connection);
