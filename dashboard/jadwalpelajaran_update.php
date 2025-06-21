<?php
$pageTitle = "Update Jadwal Pelajaran";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';

// Check if schedule ID is provided in the URL
if (isset($_GET['id'])) {
    $scheduleId = $_GET['id'];

    // Fetch existing schedule data based on schedule ID
    $query = "SELECT * FROM jadpel WHERE jadpel_id = $scheduleId";
    $result = mysqli_query($connection, $query);
    $scheduleData = mysqli_fetch_assoc($result);

    // Fetch mapel data into an array
    $mapelQuery = "SELECT *, mapel.nama AS nama_mapel FROM mapel";
    $mapelResult = mysqli_query($connection, $mapelQuery);
    $mapelOptions = array();
    while ($mapelRow = mysqli_fetch_assoc($mapelResult)) {
        $mapelOptions[] = $mapelRow;
    }

    // Fetch kelas data into an array
    $kelasQuery = "SELECT *, kelas.nama AS nama_kelas FROM kelas";
    $kelasResult = mysqli_query($connection, $kelasQuery);
} else {
    // Redirect or display an error message
    // For example: header("Location: jadwalpelajaran.php");
}

// Handle form submission for updating data
if (isset($_POST['update_jadpel'])) {
    $hari = $_POST['hari'];
    $jks = array();
    for ($i = 1; $i <= 8; $i++) {
        $jks[] = $_POST['jk' . $i];
    }
    $id_kelas = $_POST['id_kelas'];

    $jksString = implode("', '", $jks);
    $updateQuery = "UPDATE jadpel SET jadpel_hari = '$hari', jadpel_jk1 = '$jks[0]', jadpel_jk2 = '$jks[1]', jadpel_jk3 = '$jks[2]', jadpel_jk4 = '$jks[3]', jadpel_jk5 = '$jks[4]', jadpel_jk6 = '$jks[5]', jadpel_jk7 = '$jks[6]', jadpel_jk8 = '$jks[7]', id_kelas = '$id_kelas' WHERE jadpel_id = $scheduleId";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        echo "<script>alert('Jadwal berhasil diperbarui');</script>";
        echo "<script>window.location.href = 'jadwalpelajaran.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui jadwal pelajaran');</script>";
    }
}



mysqli_close($connection);
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
                        <form method="POST" action="">
                            <div class="row">
                                <div class="col b-3">
                                    <label for="hari" class="form-label">Hari</label>
                                    <select class="form-control" id="hari" name="hari">
                                        <option value="Senin" <?php if ($scheduleData['jadpel_hari'] == 'Senin') echo 'selected'; ?>>Senin</option>
                                        <option value="Selasa" <?php if ($scheduleData['jadpel_hari'] == 'Selasa') echo 'selected'; ?>>Selasa</option>
                                        <option value="Rabu" <?php if ($scheduleData['jadpel_hari'] == 'Rabu') echo 'selected'; ?>>Rabu</option>
                                        <option value="Kamis" <?php if ($scheduleData['jadpel_hari'] == 'Kamis') echo 'selected'; ?>>Kamis</option>
                                        <option value="Jumat" <?php if ($scheduleData['jadpel_hari'] == 'Jumat') echo 'selected'; ?>>Jum'at</option>
                                        <option value="Sabtu" <?php if ($scheduleData['jadpel_hari'] == 'Sabtu') echo 'selected'; ?>>Sabtu</option>
                                    </select>
                                </div>
                                <div class="col mb-3">
                                    <label for="id_kelas" class="form-label">Kelas</label>
                                    <select class="form-control" id="id_kelas" name="id_kelas" required>
                                        <?php while ($kelasRow = mysqli_fetch_assoc($kelasResult)) { ?>
                                            <option value="<?php echo $kelasRow['id_kelas']; ?>" <?php if ($scheduleData['id_kelas'] == $kelasRow['id_kelas']) {
                                                                                                        echo 'selected';
                                                                                                    } ?>>
                                                <?php echo $kelasRow['nama_kelas']; ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <?php for ($i = 0; $i < 8; $i += 4) { ?>
                                    <div class="row mb-3">
                                        <?php for ($j = 1; $j <= 4; $j++) { ?>
                                            <div class="col">
                                                <label for="jk<?php echo $i + $j; ?>" class="form-label">Jam Ke-<?php echo $i + $j; ?></label>
                                                <select class="form-control" id="jk<?php echo $i + $j; ?>" name="jk<?php echo $i + $j; ?>">
                                                    <option value="" selected disabled>Pilih Mapel</option>
                                                    <?php foreach ($mapelOptions as $mapelOption) { ?>
                                                        <option value="<?php echo $mapelOption['id_mapel']; ?>" <?php if ($scheduleData['jadpel_jk' . ($i + $j)] == $mapelOption['id_mapel']) echo 'selected'; ?>>
                                                            <?php echo $mapelOption['nama_mapel']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <button type="submit" class="btn btn-primary" name="update_jadpel">Update Jadwal Pelajaran</button>
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