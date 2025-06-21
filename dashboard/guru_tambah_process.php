<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nama'];
    $gender = $_POST['gender'];
    $birthDate = $_POST['jabatan'];
    $nip = $_POST['nip'];
    $email = $_POST['email'];
    $idClass = $_POST['id_class'];
    $password = $_POST['password'];



    // Check if the provided email and NIP already exist in the database
    $existingEmailQuery = "SELECT id_guru FROM guru WHERE email = '$email'";
    $existingNipQuery = "SELECT id_guru FROM guru WHERE nip = '$nip'";

    $existingEmailResult = mysqli_query($connection, $existingEmailQuery);
    $existingNipResult = mysqli_query($connection, $existingNipQuery);

    if (mysqli_num_rows($existingEmailResult) > 0) {
        // Email already exists, show an alert and exit
        echo "<script>alert('Email sudah ada, silahkan masukkan email lainnya.'); window.location.href = 'guru_tambah.php';</script>";
        exit();
    }

    if (mysqli_num_rows($existingNipResult) > 0) {
        // NIP already exists, show an alert and exit
        echo "<script>alert('NIP sudah ada, silahkan masukkan NIP lainnya.'); window.location.href = 'guru_tambah.php';</script>";
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Perform the insert operation to add a new teacher
    $query = "INSERT INTO guru (nama, gender, jabatan, id_kelas, email, nip, password) VALUES ('$name', '$gender', '$birthDate', '$idClass', '$email', '$nip', '$hashedPassword')";
    $result = mysqli_query($connection, $query);

    // Close the database connection
    mysqli_close($connection);

    // Redirect back to the teachers page with the toast notification parameters in the URL
    header("Location: guru.php");
    exit();
}
