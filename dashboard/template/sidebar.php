        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">

                    <!-- SIDEBAR FIX -->

                    <!-- <li><a href="index.php" class="" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <span class="nav-text">Profil</span>
                        </a>
                    </li> -->
                    <?php if ($role == 1) { ?>
                        <li><a href="index.php" class="" aria-expanded="false">
                                <i class="fas fa-school"></i>
                                <span class="nav-text">Sekolah</span>
                            </a>
                        </li>


                        <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                                <i class="fas fa-users"></i>
                                <span class="nav-text">Akun</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="admin.php">Admin</a></li>
                                <li><a href="siswa.php">Siswa</a></li>
                                <li><a href="guru.php">Guru</a></li>
                                <!-- <li><a href="orangtua.php">Orang Tua</a></li> -->
                            </ul>

                        </li>

                        <li><a href="wali_kelas.php" class="" aria-expanded="false">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span class="nav-text">Wali Kelas</span>
                            </a>


                        </li>

                        <li><a href="kelas.php" class="" aria-expanded="false">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span class="nav-text">Kelas</span>
                            </a>


                        </li>


                        <li><a href="matapelajaran.php" class="" aria-expanded="false">
                                <i class="fas fa-book"></i>
                                Mata Pelajaran </a>
                        </li>
                        <li><a href="jadwalpelajaran.php" class="" aria-expanded="false">
                                <i class="fas fa-calendar"></i>
                                <span class="nav-text">Jadwal Pelajaran</span>
                            </a>
                        </li>

                        <li><a href="rapor.php" class="" aria-expanded="false">
                                <i class="fas fa-scroll"></i>
                                <span class="nav-text">Rapor</span>
                            </a>
                        </li>
                        <!-- 
                        <li><a href="pelanggaran.php" class="" aria-expanded="false">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span class="nav-text">Pelanggaran</span>
                            </a>
                        </li>


                        <li><a href="pelanggaran_detail.php" class="" aria-expanded="false">
                                <i class="fas fa-exclamation-circle"></i>
                                <span class="nav-text">Data Pelanggaran</span>
                            </a>
                        </li> -->
                    <?php } else if ($role == 2) {
                    ?>

                        <li><a href="index.php" class="" aria-expanded="false">
                                <i class="fas fa-school"></i>
                                <span class="nav-text">Sekolah</span>
                            </a>
                        </li>



                        <li><a href="s_rapor.php" class="" aria-expanded="false">
                                <i class="fas fa-scroll"></i>
                                <span class="nav-text">Rapor</span>
                            </a>
                        </li>
                    <?php } else if ($role == 3) {  ?>
                        <li><a href="index.php" class="" aria-expanded="false">
                                <i class="fas fa-school"></i>
                                <span class="nav-text">Sekolah</span>
                            </a>
                        </li>


                        <li><a href="rapor.php" class="" aria-expanded="false">
                                <i class="fas fa-scroll"></i>
                                <span class="nav-text">Data Rapor</span>
                            </a>
                        </li>


                    <?php }
                    ?>

                    <!-- <div class="copyright">
                        <p><strong>SIMADU © 2023</strong>All Rights Reserved</p>
                    </div> -->
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->