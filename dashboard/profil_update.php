<?php
$pageTitle = "Profil";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


?>

<div class="content-body">
    <div class="container">
        <h2> <a href="index.php"><?php echo $pageTitle; ?> </a> / Update</h2>


        <form action="profil_update_process.php" method="POST">
            <?php
            // Assuming you have established a database connection

            // Get the logged-in user's ID from the session
            $userId = $_SESSION['user_id'];

            // Retrieve the data for the logged-in user from the teachers table
            $query = "SELECT * FROM teachers WHERE id_teacher = '$userId'";

            $result = mysqli_query($connection, $query);

            // Check if a row is found
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
            ?>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="" <?php echo ($row['gender'] === '') ? 'selected' : ''; ?>>Select gender</option>
                        <option value="Male" <?php echo ($row['gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($row['gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birth_date">Birth Date:</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?php echo $row['birth_date']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nip">NIP:</label>
                    <input type="text" class="form-control" id="nip" name="nip" maxlength="18" value="<?php echo $row['nip']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="id_class">Class ID:</label>
                    <input type="text" class="form-control" id="id_class" name="id_class" value="<?php echo $row['id_class']; ?>">
                </div>
                <input type="submit" class="btn btn-primary" value="Update">
            <?php
            } else {
                echo '<p>No data found.</p>';
            }

            // Close the database connection
            mysqli_close($connection);
            ?>
        </form>
    </div>
</div>

<?php
include 'template/footer.php';
?>