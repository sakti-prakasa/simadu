<?php
$pageTitle = "Tambah Siswa";
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
                <form method="POST" action="siswa_tambah_process.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" required>
                            </div>

                            <div class="mb-3">
                                <label for="nis" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NISN" required pattern="[0-9]{10}">


                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_ortu" class="form-label">Nama Ortu</label>
                                <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Masukkan nama orang tua" required>
                            </div>

                            <div class="mb-3">
                                <label for="nohp_ortu" class="form-label">No HP Ortu</label>
                                <input type="text" class="form-control" id="nohp_ortu" name="nohp_ortu" placeholder="Masukkan NO HP Orang Tua" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_class" class="form-label">Kelas</label>
                                <select class="form-select" id="id_class" name="id_class" required>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id_kelas'] . '">' . $row['nama'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>