<?php
$pageTitle = "Update Mata Pelajaran";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

if (isset($_GET['id'])) {
    $mapelId = $_GET['id'];

    // Retrieve the data for the selected subject
    $query = "SELECT * FROM mapel WHERE id_mapel = $mapelId";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
    } else {
        // Handle the case where subject data is not found
        echo "Subject not found.";
        exit;
    }
} else {
    // Handle the case where 'id' parameter is not provided
    echo "Invalid request.";
    exit;
}

// Process the form submission
if (isset($_POST['update_subject'])) {
    $newNama = $_POST['nama'];

    // Update the subject name in the database
    $updateQuery = "UPDATE mapel SET nama = '$newNama' WHERE id_mapel = $mapelId";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        header("Location: matapelajaran.php");
        exit;
    } else {
        echo "Error updating subject: " . mysqli_error($connection);
    }
}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2><?php echo $pageTitle; ?></h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="mapel_update_process.php">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Mata Pelajaran</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_guru" class="form-label">Pilih Guru</label>
                                <select class="form-select" id="nama_guru" name="nama_guru" required>
                                    <?php
                                    // Connect to the database
                                    include '../connection.php';

                                    // Retrieve the list of gurus from the database
                                    $query = "SELECT id_guru, nama FROM guru";
                                    $result = mysqli_query($connection, $query);

                                    // Check if any rows are found
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Determine if this option should be selected based on guru_id
                                            $selected = ($row['id_guru'] == $nama_guru_id) ? 'selected' : '';

                                            // Output the option with the determined 'selected' attribute
                                            echo '<option value="' . $row['id_guru'] . '" ' . $selected . '>' . $row['nama'] . '</option>';
                                        }
                                    } else {
                                        // If there are no gurus in the database, display a disabled option
                                        echo '<option value="" disabled>No Gurus Available</option>';
                                    }

                                    // Close the database connection
                                    mysqli_close($connection);
                                    ?>
                                </select>
                            </div>

                            <input type="hidden" name="mapel_id" value="<?php echo $mapelId; ?>"> <!-- Hidden input for mapel_id -->
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>