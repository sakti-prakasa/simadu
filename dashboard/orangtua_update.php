<?php
$pageTitle = "Edit orangtua";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


// Check if the parent ID is provided in the URL
if (isset($_GET['id'])) {
    $parentId = $_GET['id'];

    // Retrieve the parent data from the database
    $query = "SELECT * FROM parents WHERE id_parent = $parentId";
    $result = mysqli_query($connection, $query);

    $query2 = "SELECT * FROM students";
    $result2 = mysqli_query($connection, $query2);

    // Check if the parent exists
    if (mysqli_num_rows($result) > 0) {
        $parent = mysqli_fetch_assoc($result);


?>

        <!-- Add your HTML form for editing parent information -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2> <?php echo $pageTitle; ?></h2>
                            </div>
                            <div class="card-body">
                                <form method="post" action="orangtua_update_process.php">
                                    <input type="hidden" name="parent_id" value="<?php echo $parent['id_parent']; ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $parent['name']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" name="gender">
                                            <option value="Male" <?php if ($parent['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                            <option value="Female" <?php if ($parent['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Birth Date</label>
                                        <input type="date" class="form-control" name="birth_date" value="<?php echo $parent['birth_date']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">nip</label>
                                        <input type="text" class="form-control" name="nip" value="<?php echo $parent['nip']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $parent['email']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="id_student" class="form-label">Class</label>
                                            <select class="form-select" id="id_student" name="id_student" required>

                                                <?php
                                                while ($row = mysqli_fetch_assoc($result2)) {
                                                    if ($parent['id_student'] === $row['id_student']) {
                                                        echo '<option value="' . $row['id_student'] . '" selected disabled>' . $row['name'] . '</option>';
                                                    }
                                                    echo '<option value="' . $row['id_student'] . '">' . $row['name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_parent" class="btn btn-primary">Update</button>
                                        <a href="orangtua.php" class="btn btn-secondary">Cancel</a>
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
        echo "parent not found.";
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    echo "Invalid parent ID.";
}

include 'template/footer.php';
?>