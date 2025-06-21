<?php
$pageTitle = "Update Pelanggaran";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Check if violation ID is provided in the URL
if (isset($_GET['id'])) {
    $violationId = $_GET['id'];

    // Retrieve the violation data from the database
    $query = "SELECT * FROM pelanggaran WHERE id_pelanggaran = $violationId";
    $result = mysqli_query($connection, $query);

    // Check if the violation exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['nama'];
        $score = $row['skor'];
    } else {
        // Redirect if the violation does not exist
        echo "<script>window.location.href = 'pelanggaran.php';</script>";
    }
} else {
    // Redirect if violation ID is not provided
    echo "<script>window.location.href = 'pelanggaran.php';</script>";
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
                        <form method="POST" action="pelanggaran_update_process.php">
                            <input type="hidden" name="violation_id" value="<?php echo $violationId; ?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="score" class="form-label">Skor</label>
                                <input type="number" class="form-control" id="score" name="score" value="<?php echo $score; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="update_violation">Update Pelanggaran</button>
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