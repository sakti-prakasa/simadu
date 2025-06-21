<?php
$pageTitle = "Tambah Rapor";
include 'template/header.php';
include 'template/sidebar.php';
include '../connection.php';


// Check if the student ID is provided in the URL
if (isset($_GET['id'])) {
    $studentId = $_GET['id'];

    // Retrieve the student data from the database 
    $query = "SELECT * FROM siswa WHERE id_siswa = $studentId";
    $result = mysqli_query($connection, $query);

    // kondisi cek walikelas BEGIN
    $cekguru = "SELECT * FROM guru WHERE id_guru = $userId AND id_kelas IN (1, 2, 3);";
    $resultcekguru = mysqli_query($connection, $cekguru);
    $iswalikelas = 0;
    if (mysqli_num_rows($resultcekguru) > 0) {
        $iswalikelas = 1;
    }
    // kondisi cek walikelas END


    // kondisi cek guru mapel tsb BEGIN 
    $cekgurupengampu = "SELECT * FROM mapel WHERE id_guru = $userId";
    $resultcekgurupengampu = mysqli_query($connection, $cekgurupengampu);
    $isgurupengampu = "";
    if (mysqli_num_rows($resultcekgurupengampu) > 0) {
        $hasilcekgurupengampu = mysqli_fetch_assoc($resultcekgurupengampu);
        $isgurupengampu = $hasilcekgurupengampu['nama'];
    }
    // kondisi cek guru mapel tsb END



    // Check if the student exists
    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);


?>

        <!-- Add your HTML form for editing student information -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2> <?php echo $pageTitle; ?></h2>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="rapor_tambah_process.php">
                                    <input type="hidden" name="id_siswa" value="<?php echo $student['id_siswa']; ?>">

                                    <div class="row">
                                        <div class="row" style="margin-bottom : 20px;">
                                            <div class="col">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="name" value="<?php echo $student['nama']; ?>" disabled>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Semester</label>
                                                <select class="form-select" name="semester">
                                                    <option value="1">1</option>

                                                    <option value="2">2</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Tahun Pelajaran</label>
                                                <select class="form-select" name="tapel">
                                                    <option value="20232024">2023/2024</option>

                                                    <option value="20242025">2024/2025</option>
                                                    <option value="20252026">2025/2026</option>

                                                </select>
                                            </div>

                                        </div>



                                        <!-- a1 -->
                                        <?php if ($iswalikelas == 1 || $role == 1) { ?>
                                            <div class="row" style="margin-bottom : 20px;">
                                                <hr>
                                                </hr>
                                                <h4> A. Sikap</h4>
                                                <h6>1. Sikap Spiritual</h6>

                                                <div class="col">
                                                    <label class="form-label">Predikat</label>
                                                    <select class="form-select" name="spir_predikat">
                                                        <option value="Kurang">Kurang</option>
                                                        <option value="Cukup">Cukup</option>
                                                        <option value="Baik">Baik</option>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <label class="form-label">Deskripsi</label>
                                                    <input type="text" class="form-control" name="spir_desk" maxlength="200">
                                                </div>

                                            </div>
                                            <!-- a1 end-->


                                            <!-- a2 -->
                                            <div class="row" style="margin-bottom : 20px;">
                                                <h6>2. Sikap Sosial</h6>

                                                <div class="col">
                                                    <label class="form-label">Predikat</label>
                                                    <select class="form-select" name="sos_predikat">
                                                        <option value="Kurang">Kurang</option>
                                                        <option value="Cukup">Cukup</option>
                                                        <option value="Baik">Baik</option>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <label class="form-label">Deskripsi</label>
                                                    <input type="text" class="form-control" name="sos_desk" maxlength="200">
                                                </div>

                                            </div>
                                            <!-- a2 end-->


                                            <!-- nilai ekstrakurikuler begin-->
                                            <div class="row">
                                                <hr>
                                                </hr>
                                                <h4> C. Ekstrakurikuler</h4>
                                                <div class="row">
                                                    <h6> &nbsp; &nbsp;Ekstrakurikuler 1</h6>
                                                    <div class="col">
                                                        <label class="form-label">Nama Ekstrakurikuler</label>
                                                        <input type="text" class="form-control" name="eks1_nama">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="eks1_nilai" min="0" max="100">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Keterangan</label>
                                                        <input type="text" class="form-control" name="eks1_ket">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <h6> &nbsp; &nbsp;Ekstrakurikuler 2</h6>
                                                    <div class="col">
                                                        <label class="form-label">Nama Ekstrakurikuler</label>
                                                        <input type="text" class="form-control" name="eks2_nama">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="eks2_nilai" min="0" max="100">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Keterangan</label>
                                                        <input type="text" class="form-control" name="eks2_ket">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- nilai ekstrakurikuler end-->

                                            <!-- nilai prestasi begin-->
                                            <div class="row">
                                                <hr>
                                                </hr>
                                                <h4> D. Prestasi</h4>
                                                <div class="row">
                                                    <h6> &nbsp; &nbsp;Prestasi 1</h6>
                                                    <div class="col">
                                                        <label class="form-label">Jenis Prestasi</label>
                                                        <input type="text" class="form-control" name="pres1_jenis">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Keterangan</label>
                                                        <input type="text" class="form-control" name="pres1_ket">
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <h6> &nbsp; &nbsp;Prestasi 2</h6>
                                                    <div class="col">
                                                        <label class="form-label">Jenis Prestasi</label>
                                                        <input type="text" class="form-control" name="pres2_jenis">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Keterangan</label>
                                                        <input type="text" class="form-control" name="pres2_ket">
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <h6> &nbsp; &nbsp;Prestasi 3</h6>
                                                    <div class="col">
                                                        <label class="form-label">Jenis Prestasi</label>
                                                        <input type="text" class="form-control" name="pres3_jenis">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Keterangan</label>
                                                        <input type="text" class="form-control" name="pres3_ket">
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- nilai prestasi end-->

                                            <!-- ketidakhadiran begin-->
                                            <div class="row">
                                                <hr>
                                                </hr>
                                                <h4> E. Ketidak Hadiran</h4>
                                                <div class="row">

                                                    <div class="col">
                                                        <label class="form-label">Sakit</label>
                                                        <input type="number" class="form-control" name="sakit">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Ijin</label>
                                                        <input type="number" class="form-control" name="ijin">
                                                    </div>

                                                    <div class="col">
                                                        <label class="form-label">Alpa</label>
                                                        <input type="number" class="form-control" name="alpa">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ketidakhadiran end-->

                                            <!-- catatan wali kelas begin-->
                                            <div class="row">
                                                <hr>
                                                </hr>
                                                <h4> F. Catatan Wali Kelas</h4>
                                                <div class="row">

                                                    <div class="col">
                                                        <label class="form-label">Catatan wali kelas</label>
                                                        <input type="textarea" class="form-control" name="cat_guru">
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- catatan wali kelas end-->

                                            <!-- ket naik kelas begin -->
                                            <div class="row">
                                                <hr>
                                                </hr>
                                                <h4> Keterangan Naik Kelas</h4>
                                                <div class="row">

                                                    <div class="col">
                                                        <label class="form-label">Keterangan Naik Kelas</label>
                                                        <select class="form-select" name="ket_naik_kelas">
                                                            <option value="-"></option>
                                                            <option value="naik">Naik Kelas</option>
                                                            <option value="tetap">Tetap Di Kelas</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- ket naik kelas end -->




                                            <!-- nilai mapel begin-->
                                            <div class="row d-none">
                                                <hr>
                                                </hr>
                                                <h4> B. Pengetahuan dan Keterampilan</h4>
                                                <h6> &nbsp; &nbsp;1. Pendidikan Agama Islam</h6>
                                                <div class="row">


                                                    <h6> &nbsp; &nbsp; &nbsp; A. Al-Qur'an Hadits</h6>
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_qurdis_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_qurdis_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <h6> &nbsp; &nbsp; &nbsp; B. Akidah Akhlaq</h6>
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_aa_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_aa_desk" maxlength="200">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <h6> &nbsp; &nbsp; &nbsp; C. Fikih</h6>
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_fikih_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_fikih_desk" maxlength="200">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <h6> &nbsp; &nbsp; &nbsp; D. Sejarah Kebudayaan Islam</h6>
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_ski_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_ski_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp;2. Pendidikan Pancasila dan Kewarganegaraan</h6>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_pp_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_pp_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp;3. Bahasa Indonesia</h6>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_bi_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_bi_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp; 4. Matematika</h6>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_mtk_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_mtk_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp; 5. Bahasa Arab</h6>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_ba_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_ba_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp; 6. Sejarah Indonesia</h6>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_si_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_si_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp; 7. Bahasa Inggris</h6>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_big_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_big_desk" maxlength="200">
                                                    </div>
                                                </div>
                                                <h4> &nbsp; &nbsp; Kelompok B</h4>


                                                <h6> &nbsp; &nbsp; 1. Seni Budaya</h6>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_sb_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_sb_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp; 2. Pendidikan Jasmani, Olahraga dan Kesehatan</h6>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_pjok_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_pjok_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp; 3. Prakarya dan Kewirausahaan</h6>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_pk_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_pk_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp; 4. Muatan Lokal</h6>
                                                <h6> &nbsp; &nbsp; &nbsp; A. Aswaja</h6>

                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_aswaja_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_aswaja_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp; &nbsp; B. Informatika</h6>

                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_inf_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_inf_desk" maxlength="200">
                                                    </div>
                                                </div>
                                                <h4> Kelompok C</h4>

                                                <h6> &nbsp; &nbsp; 1. Geografi</h6>

                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_geo_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_geo_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp; 2. Sejarah</h6>

                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_sj_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_sj_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp; 3. Sosiologi</h6>

                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_sos_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_sos_desk" maxlength="200">
                                                    </div>
                                                </div>

                                                <h6> &nbsp; &nbsp; 4. Ekonomi</h6>

                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label">Nilai</label>
                                                        <input type="number" class="form-control" name="p_eko_nilai" min="0" max="100">
                                                    </div>
                                                    <div class="col">
                                                        <label class="form-label">Deskripsi</label>
                                                        <input type="text" class="form-control" name="p_eko_desk" maxlength="200">
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- nilai mapel end-->

                                        <?php }  ?>







                                    </div>

                                    <!-- ... -->
                                    <!-- ... -->
                                    <!-- ... -->


                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Update Nilai</button>
                                        <a href="rapor.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                            </div>




                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

<?php
    } else {
        echo "Siswa tidak ditemukan.";
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    echo "Invalid student ID.";
}

include 'template/footer.php';
?>