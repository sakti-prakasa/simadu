<?php
$pageTitle = "Rapor";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body text-center">
                        <h2> Pilih Kelas</h2>

                        <a type="button btn-xl" href="rapor_k1.php" class="btn btn-rounded btn-primary">Kelas 1</a>
                        <a type="button btn-xl" href="rapor_k2.php" class="btn btn-rounded btn-primary">Kelas 2</a>
                        <a type="button btn-xl" href="rapor_k3.php" class="btn btn-rounded btn-primary">Kelas 3</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>