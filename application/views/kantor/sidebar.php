<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home kantor</div>
                    <?php
                    if ($title == 'Dashboard') {
                        //arahih ke controller kantor
                        echo '<a class="nav-link active" href="' . base_url('kantor') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('kantor') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Data Akun</div>

                    <?php
                    if ($title == 'Edit Akun') {
                        //arahih ke controller kantor
                        echo '<a class="nav-link active" href="' . base_url('kantor/edit_akun') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('kantor/edit_akun') . '">';
                    }
                    ?>

                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Data Akun
                    </a>

                    <div class="sb-sidenav-menu-heading">Data Barang</div>

                    
                    <?php
                    if ($title == 'Data Jumlah Barang') {
                        //arahih ke controller kantor
                        echo '<a class="nav-link active" href="' . base_url('kantor/jumlah_barang') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('kantor/jumlah_barang') . '">';
                    }
                    ?>

                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Data Barang Berdasarkan Tempat
                    </a>
                    
                    <div class="sb-sidenav-menu-heading">Pindah Barang</div>

                    <?php
                    if ($title == 'Pindah Barang') {
                        //arahih ke controller kantor
                        echo '<a class="nav-link active" href="' . base_url('kantor/pindah') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('kantor/pindah') . '">';
                    }
                    ?>
                    
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Data Pindah Barang
                    </a>
                    <div class="sb-sidenav-menu-heading">Penjualan Barang</div>
                    <?php
                    if ($title == 'Data Penjualan Barang') {
                        //arahih ke controller kantor
                        echo '<a class="nav-link active" href="' . base_url('kantor/penjualan') . '">';
                    } else {
                        echo '<a class="nav-link" href="' . base_url('kantor/penjualan') . '">';
                    }
                    ?>
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Data Penjualan Barang
                    </a>

                   
                    
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $this->session->userdata('nama'); ?>
            </div>
        </nav>
    </div>