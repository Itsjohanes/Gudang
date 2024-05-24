<!-- Begin Page Content -->



<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php if ($this->session->flashdata('category_success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
    <?php } ?>
    <?php if ($this->session->flashdata('category_error')) { ?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
    <?php } ?>
    <div class="row no-gutters">

        <br>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mencari Data Siswa</h6>
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['nama_siswa']; ?></td>
                                        <td><?= $j['kelas_siswa']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>Admin/tambahTerlambat/<?= $j['id_siswa']; ?>" class="btn btn-success" onclick="return confirm('Data akan ditambahkan ke tabel keterlambatan');"><i class="fas fa-plus"></i></a>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Siswa yang Terlambat Tanggal <?php echo date("d-m-Y"); ?> </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($terlambat as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['nama_siswa']; ?></td>
                                        <td><?= $j['kelas_siswa']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>Admin/hapusTerlambat/<?= $j['id_terlambat']; ?>" class="btn btn-danger" onclick="return confirm('Data akan dihapus');"><i class="fas fa-trash-alt"></i></a>
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