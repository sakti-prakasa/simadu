<?php
include '../connection.php';

if (isset($_POST['update_teacher'])) {
    $teacherId = $_POST['teacher_id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $jabatan = $_POST['jabatan'];
    $nip = $_POST['nip'];
    $email = $_POST['email'];
    $idClass = $_POST['class'];
    $password = $_POST['password'];

    // Check if the provided email and NIP already exist in the database
    $existingEmailQuery = "SELECT id_guru FROM guru WHERE email = '$email' AND id_guru != '$teacherId'";
    $existingNipQuery = "SELECT id_guru FROM guru WHERE nip = '$nip' AND id_guru != '$teacherId'";

    $existingEmailResult = mysqli_query($connection, $existingEmailQuery);
    $existingNipResult = mysqli_query($connection, $existingNipQuery);

    if (mysqli_num_rows($existingEmailResult) > 0) {
        // Email already exists, show an alert and exit
        echo "<script>alert('Email sudah ada, silahkan masukkan email lainnya.'); window.location.href = 'guru_update.php?id=$teacherId';</script>";
        exit();
    }

    if (mysqli_num_rows($existingNipResult) > 0) {
        // NIP already exists, show an alert and exit
        echo "<script>alert('NIP sudah ada, silahkan masukkan NIP lainnya.'); window.location.href = 'guru_update.php?id=$teacherId';</script>";
        exit();
    }

    // Check if the password is provided
    if (!empty($password)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the teacher record with the new password
        $query = "UPDATE guru SET nama='$name', gender='$gender', nip='$nip', jabatan='$jabatan', email='$email', id_kelas='$idClass', password='$hashedPassword' WHERE id_guru='$teacherId'";
    } else {
        // Update the teacher record without changing the password
        $query = "UPDATE guru SET nama='$name', gender='$gender', nip='$nip', jabatan='$jabatan', email='$email', id_kelas='$idClass' WHERE id_guru='$teacherId'";
    }

    // Execute the update query
    $result = mysqli_query($connection, $query);

    if ($result) {
        header("Location: guru.php");
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
