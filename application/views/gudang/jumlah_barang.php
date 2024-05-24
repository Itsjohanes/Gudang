<!-- Begin Page Content -->



<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
    <?php if ($this->session->flashdata('category_success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
    <?php } ?>
    <?php if ($this->session->flashdata('category_error')) { ?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
    <?php } ?>

    
    <div class="row no-gutters">

        <br>
        





        <div class="container-fluid">

            <!-- Page Heading -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Barcode</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope= "col">Tempat</th>
                                    <th scope= "col">Jumlah</th>
                                    <th scope= "detail">Detail</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Barcode</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope= "col">Tempat</th>
                                    <th scope= "col">Jumlah</th>
                                    <th scope= "detail">Detail</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($jumlahbarang as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['id_barang']; ?></td>
                                        <td>
                                            <?php foreach ($barang as $t) : ?>
                                                <?php if ($j['id_barang'] == $t['id_barang']) {
                                                    echo $t['nama'];
                                                } ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                        <?php foreach ($tempat as $t) : ?>
                                                <?php if ($j['id_tempat'] == $t['id_tempat']) {
                                                    echo $t['nama'];
                                                } ?>
                                            <?php endforeach; ?>
                                            
                                            </td>
                                        <td>
                                            <?php echo $j['jumlah']; ?>
                                        </td>
                                        <td>
                                        <a href="<?= base_url(); ?>gudang/detail_jumlah_barang/<?= $j['id_jumlahbarang']; ?>" class="btn btn-primary" ><i class="fa fa-info-circle"></i></a>
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
        <!-- /.container-fluid -->

    </div>

















    <!-- End of Main Content -->
    <!-- Page level plugins -->