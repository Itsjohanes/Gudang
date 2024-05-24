<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home admin</div>
                    <?php
                    if ($title == 'Dashboard') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Data Akun</div>

                    <?php
                    if ($title == 'Data Akun') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/akun') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/akun') . '">';
                    }
                    ?>

                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Data Akun
                    </a>

                    <div class="sb-sidenav-menu-heading">Data Barang</div>

                    <?php
                    if ($title == 'Data Barang') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/barang') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/barang') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Data Barang
                    </a>
                    <?php
                    if ($title == 'Data Jumlah Barang') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/jumlah_barang') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/jumlah_barang') . '">';
                    }
                    ?>

                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Data Barang Berdasarkan Tempat
                    </a>
                    <div class="sb-sidenav-menu-heading">Data Tempat</div>

                        <?php
                        if ($title == 'Data Tempat') {
                            //arahih ke controller admin
                            echo '<a class="nav-link active" href="' . base_url('admin/tempat') . '">';
                        } else {
                            echo '<a class="nav-link" href="' . base_url('admin/tempat') . '">';
                        }
                        ?>
                          <div class="sb-nav-link-icon"><i class="fas fa-location"></i></div>
                    Data Tempat
                    </a>
                    <div class="sb-sidenav-menu-heading">Pindah Barang</div>

                    <?php
                    if ($title == 'Pindah Barang') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/pindah') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/pindah') . '">';
                    }
                    ?>
                    
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Data Pindah Barang
                    </a>
                    <?php
                    if ($title == 'Cetak Laporan Kepindahan') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/laporan_kepindahan') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/laporan_kepindahan') . '">';
                    }
                    ?> <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Cetak Laporan Kepindahan
                    </a>
                    <div class="sb-sidenav-menu-heading">Penjualan Barang</div>
                    <?php
                    if ($title == 'Data Pindah Barang') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/pindah') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/pindah') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Data Penjualan Barang
                    </a>
                    <?php
                    if ($title == 'Cetak Laporan Kepindahan') {
                        //arahih ke controller admin
                        echo '<a class="nav-link active" href="' . base_url('admin/laporan_kepindahan') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('admin/laporan_kepindahan') . '">';
                    }
                    ?> <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Cetak Surat Penjualan
                    </a>
                   
                    
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $this->session->userdata('nama'); ?>
            </div>
        </nav>
    </div>