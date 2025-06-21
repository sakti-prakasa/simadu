<?php


$host = 'localhost'; // Replace with your database host
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$database = 'simadu'; // Replace with your database name


// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}
