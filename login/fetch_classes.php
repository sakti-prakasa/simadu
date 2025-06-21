<?php
include '../connection.php';
// Query to fetch classes
$query = "SELECT id_class, name FROM class";
$result = mysqli_query($connection, $query);

$classes = array();

// Fetch classes as associative arrays
while ($row = mysqli_fetch_assoc($result)) {
    $classes[] = $row;
}

// Return classes as JSON
echo json_encode($classes);
