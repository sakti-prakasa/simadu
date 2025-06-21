<?php
$pageTitle = "Tambah guru";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Retrieve data from the class table
$query = "SELECT * FROM kelas";
$result = mysqli_query($connection, $query);
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2><?php echo $pageTitle; ?></h2>
            </div>
            <div class="card-body">
                <form method="POST" action="guru_tambah_process.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Name</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>


                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nip" class="form-label">NUPTK / REG</label>
                                <input type="number" class="form-control" id="nip" name="nip" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_class" class="form-label">Wali Kelas</label>
                                <select class="form-select" id="id_class" name="id_class" required>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id_kelas'] . '">' . $row['nama'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Guru</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>