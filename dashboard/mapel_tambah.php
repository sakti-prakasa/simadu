<?php
$pageTitle = "Tambah Mata Pelajaran";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2> <?php echo $pageTitle; ?></h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="mapel_tambah_process.php">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Mata Pelajaran</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Pilih Guru</label>
                                <select class="form-select" id="nama_guru" name="nama_guru" required>
                                    <option value="">Pilih Guru</option> <!-- Default empty option -->
                                    <?php
                                    // Connect to the database
                                    include '../connection.php';

                                    // Retrieve the list of gurus from the database
                                    $query = "SELECT id_guru, nama FROM guru";
                                    $result = mysqli_query($connection, $query);

                                    // Check if any rows are found
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Display each guru as an option
                                            echo '<option value="' . $row['id_guru'] . '">' . $row['nama'] . '</option>';
                                        }
                                    }

                                    // Close the database connection
                                    mysqli_close($connection);
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Tambah</button>
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