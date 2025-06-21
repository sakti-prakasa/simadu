<?php
$pageTitle = "Tambah Pelanggaran";
include 'template/header.php';
include 'template/sidebar.php';
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
                        <form method="POST" action="pelanggaran_tambah_process.php">
                            <div class="mb-3">
                                <label for="name" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="score" class="form-label">Skor</label>
                                <input type="number" class="form-control" id="score" name="score" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="add_violation">Tambah Pelanggaran</button>
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