<?php

include '../connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have established a database connection

    // Get the logged-in user's ID from the session
    $userId = $_SESSION['user_id'];

    // Retrieve the data from the form
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthDate = $_POST['birth_date'];
    $nip = $_POST['nip'];
    $email = $_POST['email'];
    $classId = $_POST['id_class'];

    // Update the data in the teachers table for the logged-in user
    $query = "UPDATE teachers SET name = '$name', gender = '$gender', birth_date = '$birthDate',
              nip = '$nip', email = '$email', id_class = '$classId' WHERE id_teacher = '$userId'";

    if (mysqli_query($connection, $query)) {
        // Data updated successfully
        echo "<p>Update successful.</p>";

        header("Location: index.php");
        exit();
    } else {
        // Error occurred during update
        echo "<p>Update failed: " . mysqli_error($connection) . "</p>";
    }

    // Close the database connection
    mysqli_close($connection);
}
