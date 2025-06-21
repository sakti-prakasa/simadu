<?php
include '../connection.php';

// Check if the update course button is clicked
if (isset($_POST['update_course'])) {
    $courseId = $_POST['course_id'];
    $name = $_POST['name'];
    $day = $_POST['day'];
    $startHours = $_POST['start_hours'];
    $endHours = $_POST['end_hours'];

    // Update the course in the database
    $updateQuery = "UPDATE course SET name = '$name', day = '$day', start_hours = '$startHours', end_hours = '$endHours' WHERE id_course = $courseId";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        // Course updated successfully
        echo "<script>alert('Course updated successfully');</script>";
        echo "<script>window.location.href = 'jadwalpelajaran.php';</script>";
    } else {
        // Failed to update course
        echo "<script>alert('Failed to update course');</script>";
    }
}

// Close the database connection
mysqli_close($connection);
