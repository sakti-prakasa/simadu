<?php
// Assuming you have established a database connection
include '../connection.php';

// Check if email is provided
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) === 1) {
        // Generate a random password
        $newPassword = generateRandomPassword();

        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $updateQuery = "UPDATE admin SET password = '$hashedPassword' WHERE email = '$email'";
        $updateResult = mysqli_query($connection, $updateQuery);

        if ($updateResult) {
            // Password reset successful
            $response = array(
                'success' => true,
                'message' => 'Password reset successful.',
                'newPassword' => $newPassword
            );
        } else {
            // Password reset failed
            $response = array(
                'success' => false,
                'message' => 'Password reset failed. Please try again later.'
            );
        }
    } else {
        // Email not found in the database
        $response = array(
            'success' => false,
            'message' => 'Email not found. Please enter a valid email address.'
        );
    }

    echo json_encode($response);
}

function generateRandomPassword($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, strlen($characters) - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}
