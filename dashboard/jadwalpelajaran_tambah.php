<?php
$pageTitle = "Tambah Jadwal Pelajaran";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

if (isset($_POST['add_jadpel'])) {
    $hari = $_POST['hari'];
    $jks = array();
    for ($i = 1; $i <= 8; $i++) {
        $jks[] = $_POST['jk' . $i];
    }
    $id_kelas = $_POST['id_kelas'];

    $jksString = implode("', '", $jks);
    $insertQuery = "INSERT INTO jadpel (jadpel_hari, jadpel_jk1, jadpel_jk2, jadpel_jk3, jadpel_jk4, jadpel_jk5, jadpel_jk6, jadpel_jk7, jadpel_jk8, id_kelas) VALUES ('$hari', '$jksString', '$id_kelas')";
    $insertResult = mysqli_query($connection, $insertQuery);

    if ($insertResult) {
        echo "<script>alert('jadwal Berhasil Ditambahkan');</script>";
        echo "<script>window.location.href = 'jadwalpelajaran.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan jadwal pelajaran');</script>";
    }
}

$kelasQuery = "SELECT *, kelas.nama AS nama_kelas FROM kelas";
$kelasResult = mysqli_query($connection, $kelasQuery);

$mapelQuery = "SELECT *, mapel.nama AS nama_mapel FROM mapel";
$mapelResult = mysqli_query($connection, $mapelQuery);

// Fetch mapel data into an array
$mapelOptions = array();
while ($mapelRow = mysqli_fetch_assoc($mapelResult)) {
    $mapelOptions[] = $mapelRow;
}

mysqli_close($connection);
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Jadwal Pelajaran</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="row">
                                <div class="col b-3">
                                    <label for="hari" class="form-label">Hari</label>
                                    <select class="form-control" id="hari" name="hari">
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jum'at</option>
                                        <option value="Sabtu">Sabtu</option>
                                    </select>
                                </div>
                                <div class="col mb-3">
                                    <label for="id_kelas" class="form-label">Kelas</label>
                                    <select class="form-control" id="id_kelas" name="id_kelas" required>
                                        <?php while ($kelasRow = mysqli_fetch_assoc($kelasResult)) { ?>
                                            <option value="<?php echo $kelasRow['id_kelas']; ?>"><?php echo $kelasRow['nama_kelas']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>



                            <?php for ($i = 0; $i < 8; $i += 4) { ?>
                                <div class="row mb-3">
                                    <?php for ($j = 1; $j <= 4; $j++) { ?>
                                        <div class="col">
                                            <label for="jk<?php echo $i + $j; ?>" class="form-label">Jam Ke-<?php echo $i + $j; ?></label>
                                            <select class="form-control" id="jk<?php echo $i + $j; ?>" name="jk<?php echo $i + $j; ?>" required>
                                                <option value="" selected disabled>Pilih Mapel</option>

                                                <?php foreach ($mapelOptions as $mapelOption) { ?>
                                                    <option value="<?php echo $mapelOption['id_mapel']; ?>"><?php echo $mapelOption['nama_mapel']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>


                            <button type="submit" class="btn btn-primary" name="add_jadpel">Tambah Jadwal Pelajaran</button>
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