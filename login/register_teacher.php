<?php
// Assuming you have established a database connection
include '../connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $classId = $_POST["class_id"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the query
    $query = "INSERT INTO teachers (name, email, password, id_class) VALUES (?, ?, ?, ?)";
    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, "sssi", $name, $email, $hashedPassword, $classId);
    mysqli_stmt_execute($statement);

    if (mysqli_stmt_affected_rows($statement) > 0) {
        // Registration successful
        echo "Teacher registered successfully!";
    } else {
        // Registration failed
        echo "Failed to register teacher!";
    }

    // Close the statement
    mysqli_stmt_close($statement);
}
