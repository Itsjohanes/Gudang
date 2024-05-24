<!-- Begin Page Content -->



<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title . " (". $jumlahbarang['jumlah'] .')'; ?></h1>
    <?php if ($this->session->flashdata('category_success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
    <?php } ?>
    <?php if ($this->session->flashdata('category_error')) { ?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
    <?php } ?>

    
    <div class="row no-gutters">
    <div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Perpindahan Barang (Masuk)</h6>
    </div>
    <div class="card-body">
        <div class="table">
        <table class="table table-striped table-bordered datatablesSimple">
        <thead>
            <tr>
                        <th scope="col">No.</th>
                        <th scope="col">ID Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Tempat Asal</th>
                        <th scope="col">Tempat Tujuan</th>
                        <th scope="col">Tanggal Pindah</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Penanggung Jawab</th>

            </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
                <?php foreach ($pindah_ke as $j) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $j['id_barang']; ?></td>
                        
                        <!-- Nama Barang -->
                        <?php foreach ($barang as $t) : ?>
                            <?php if ($j['id_barang'] == $t['id_barang']) : ?>
                                <td><?= $t['nama']; ?></td>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <!-- Tempat Asal -->
                        <?php foreach ($tempat as $t) : ?>
                            <?php if ($j['id_tempat_asal'] == $t['id_tempat']) : ?>
                                <td><?= $t['nama']; ?></td>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <!-- Tempat Tujuan -->
                        <?php foreach ($tempat as $t) : ?>
                            <?php if ($j['id_tempat_tujuan'] == $t['id_tempat']) : ?>
                                <td><?= $t['nama']; ?></td>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <td><?= $j['tanggal']; ?></td>
                        <td><?= $j['jumlah']; ?></td>
                        <td><?= $j['keterangan']; ?></td>
                        <td>
                            <?php foreach ($user as $t) : ?>
                                <?php if ($j['id_user'] == $t['id_user']) : ?>
                                    <?= $t['nama']; ?>
                                    <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                       
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
        </div>
    </div>
</div>

</div>
        <div class="container-fluid">

            <!-- Page Heading -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Penjualan Barang (Keluar)</h6>
                </div>
                <div class="card-body">
                    <div class="table">
                    <table class="table table-striped table-bordered datatablesSimple">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tempat Asal</th>
                            <th scope="col">Pembeli</th>
                            <th scope="col">Tanggal Jual</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Melalui</th>
                            <th scope="col">Penanggung Jawab</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($penjualan as $j) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td>
                                    <?php 
                                    foreach ($barang as $t) {
                                        if ($j['id_barang'] == $t['id_barang']) {
                                            echo $t['nama'];
                                            break;
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    foreach ($tempat as $t) {
                                        if ($j['id_tempat_asal'] == $t['id_tempat']) {
                                            echo $t['nama'];
                                            break;
                                        }
                                    }
                                    ?>
                                </td>
                                <td><?= $j['pembeli']; ?></td>
                                <td><?= $j['tanggal']; ?></td>
                                <td><?= $j['jumlah']; ?></td>
                                <td><?= $j['keterangan']; ?></td>
                                <td><?= $j['melalui']; ?></td>
                                <td>
                                        <?php foreach ($user as $t) : ?>
                                            <?php if ($j['id_user'] == $t['id_user']) : ?>
                                                <?= $t['nama']; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>

                                
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Perpindahan Barang (Keluar)</h6>
    </div>
    <div class="card-body">
        <div class="table">
        <table class="table table-striped table-bordered datatablesSimple">
        <thead>
            <tr>
                        <th scope="col">No.</th>
                        <th scope="col">ID Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Tempat Asal</th>
                        <th scope="col">Tempat Tujuan</th>
                        <th scope="col">Tanggal Pindah</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Penanggung Jawab</th>

            </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
                <?php foreach ($pindah_dari as $j) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $j['id_barang']; ?></td>
                        
                        <!-- Nama Barang -->
                        <?php foreach ($barang as $t) : ?>
                            <?php if ($j['id_barang'] == $t['id_barang']) : ?>
                                <td><?= $t['nama']; ?></td>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <!-- Tempat Asal -->
                        <?php foreach ($tempat as $t) : ?>
                            <?php if ($j['id_tempat_asal'] == $t['id_tempat']) : ?>
                                <td><?= $t['nama']; ?></td>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <!-- Tempat Tujuan -->
                        <?php foreach ($tempat as $t) : ?>
                            <?php if ($j['id_tempat_tujuan'] == $t['id_tempat']) : ?>
                                <td><?= $t['nama']; ?></td>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <td><?= $j['tanggal']; ?></td>
                        <td><?= $j['jumlah']; ?></td>
                        <td><?= $j['keterangan']; ?></td>
                        <td>
                            <?php foreach ($user as $t) : ?>
                                <?php if ($j['id_user'] == $t['id_user']) : ?>
                                    <?= $t['nama']; ?>
                                    <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                       
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
        </div>
    </div>
</div>

</div>
        </div>
        
        

















    <!-- End of Main Content -->
    <!-- Page level plugins -->