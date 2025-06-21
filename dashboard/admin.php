<?php
$pageTitle = "Admin";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';




// Function to delete the admin and parents 
function deleteadmin($adminId, $connection)
{
    // Delete parents first
    $deleteParentsQuery = "DELETE FROM parents WHERE id_admin = $adminId";
    mysqli_query($connection, $deleteParentsQuery);

    // Delete admin
    $deleteadminQuery = "DELETE FROM admin WHERE id_admin = $adminId";
    mysqli_query($connection, $deleteadminQuery);
}

// Check if the delete button is clicked
if (isset($_POST['delete_admin'])) {
    $adminId = $_POST['admin_id'];

    // Validate admin ID
    if (!empty($adminId)) {
        // Delete the admin and parents
        deleteadmin($adminId, $connection);
    } else {
        echo "<script>alert('Invalid admin ID');</script>";
    }
}

?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2> <?php echo $pageTitle; ?></h2> <a type="button" href="admin_tambah.php" class="btn btn-rounded btn-primary">+ Tambah admin</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Retrieve the data from the admin table
                                    $query = "SELECT * FROM admin";
                                    $result = mysqli_query($connection, $query);

                                    // Check if any rows are found
                                    if (mysqli_num_rows($result) > 0) {
                                        // Counter variable for numbering the rows
                                        $counter = 1;

                                        // Fetch each row and display the data 
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['email']; ?></td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a href="admin_update.php?id=<?php echo $row['id_admin']; ?>" class="btn btn-primary shadow btn-xs sharp me-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form method="post" action="">
                                                            <input type="hidden" name="admin_id" value="<?php echo $row['id_admin']; ?>">
                                                            <button type="submit" name="delete_admin" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want to delete this admin');">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        // No data found
                                        ?>
                                        <tr>
                                            <td colspan="7">No data found.</td>
                                        </tr>
                                    <?php
                                    }

                                    // Close the database connection
                                    mysqli_close($connection);
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>

                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>