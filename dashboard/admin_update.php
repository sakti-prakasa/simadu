<?php
$pageTitle = "Edit admin";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


// Check if the admin ID is provided in the URL
if (isset($_GET['id'])) {
    $adminId = $_GET['id'];

    // Retrieve the admin data from the database 
    $query = "SELECT * FROM admin WHERE id_admin = $adminId";
    $result = mysqli_query($connection, $query);

    // Check if the admin exists
    if (mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);


?>

        <!-- Add your HTML form for editing admin information -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2> <?php echo $pageTitle; ?></h2>
                            </div>
                            <div class="card-body">
                                <form method="post" action="admin_update_process.php">
                                    <input type="hidden" name="admin_id" value="<?php echo $admin['id_admin']; ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $admin['nama']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $admin['email']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_admin" class="btn btn-primary">Update</button>
                                <a href="admin.php" class="btn btn-secondary">Cancel</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

<?php
    } else {
        echo "admin not found.";
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    echo "Invalid admin ID.";
}

include 'template/footer.php';
?>