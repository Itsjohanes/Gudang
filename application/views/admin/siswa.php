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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Siswa</h6>
                </div>
                <?php echo form_open_multipart('Admin/tambahSiswa'); ?>
                <div class="row">
                    <div class="col">
                        <input type="text" required class="form-control" placeholder="Nama" id="nama" name="nama">
                    </div>
                    <div class="col">
                        <input type="text" required class="form-control" placeholder="Kelas" id="kelas" name="kelas">
                    </div>

                    <div class="col">
                        <Button class="btn btn-success">Submit</Button>
                    </div>
                </div>
                </form>
            </div>
        </div>





        <div class="container-fluid">

            <!-- Page Heading -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                </div>
                <div class="card-body">
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
                                            <a href="<?= base_url(); ?>Admin/hapusSiswa/<?= $j['id_siswa']; ?>" class="btn btn-danger" onclick="return confirm('Data Siswa ini akan dihapus permanen, yakin?');"><i class="fas fa-trash-alt"></i></a>
                                            <a href="<?= base_url(); ?>Admin/editSiswa/<?= $j['id_siswa']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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