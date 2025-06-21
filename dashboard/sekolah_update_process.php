<?php

include '../connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the updated data from the form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $accreditation = $_POST['accreditation'];
    $npsn = $_POST['npsn'];

    // Update the school data in the database
    $query = "UPDATE sekolah SET nama = '$name', alamat = '$address', no_hp = '$phone', akreditasi = '$accreditation', npsn = '$npsn' WHERE id_sekolah = 1"; // Assuming you want to update the first school with id_school = 1. Change this condition based on your requirements.
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect to the read and update page after successful update
        header('Location: index.php'); // Change this to the appropriate page name or URL
        exit;
    } else {
        // Handle update error, you can display an error message or log the error
        echo 'Error updating school data: ' . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
