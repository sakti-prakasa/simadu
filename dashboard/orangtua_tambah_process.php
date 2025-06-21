<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthDate = $_POST['birth_date'];
    $nip = $_POST['nip'];
    $email = $_POST['email'];
    $idClass = $_POST['id_student'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Perform the insert operation to add a new parent
    $query = "INSERT INTO parents (name, gender, birth_date, nip, email, password, id_student) VALUES ('$name', '$gender', '$birthDate', '$nip', '$email', '$hashedPassword', '$idClass')";
    $result = mysqli_query($connection, $query);

    // Close the database connection
    mysqli_close($connection);

    // Redirect back to the parents page with the toast notification parameters in the URL
    header("Location: orangtua.php");
    exit();
}
