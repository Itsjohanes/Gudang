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
        <!-- Button to trigger the modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAccountModal">
    Tambah Akun
</button>

<!-- Modal Structure -->
<div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccountModalLabel">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/tambah_akun'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" required class="form-control" placeholder="Email" id="email" name="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" required class="form-control" placeholder="Nama" id="nama" name="nama">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" required class="form-control" placeholder="Password" id="password" name="password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <select class="form-control" id="role" name="role">
                                    <option value="2">Gudang</option>
                                    <option value="3">Kantor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <select class="form-control" id="id_tempat" name="id_tempat">
                            <?php foreach ($tempat as $t) : ?>
                                <option value="<?= $t['id_tempat']; ?>"><?= $t['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>





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
                                    <th scope="col">Email</th>
                                    <th scope="col">Nama</th>
                                    <th scope= "col">Role</th>
                                    <th scope= "col">Tempat</th>
                                    <th scope= "col">Action</th>


                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th scope="col">No.</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nama</th>
                                    <th scope= "col">Role</th>
                                    <th scope= "col">Tempat</th>
                                    <th scope= "col">Action</th>


                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($akun as $j) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $j['email']; ?></td>
                                        <td><?= $j['nama']; ?></td>
                                        <td>
                                            <?php if ($j['role'] == 1) {
                                                echo "Super Admin";
                                            } else if ($j['role'] == 2) {
                                                echo "Gudang";
                                            } else {
                                                echo "Kantor";
                                            } ?>
                                        </td>
                                        <td>
                                            <?php foreach ($tempat as $t) : ?>
                                                <?php if ($j['id_tempat'] == $t['id_tempat']) {
                                                    echo $t['nama'];
                                                } ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url(); ?>admin/delete_akun/<?= $j['id_user']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin untuk menghapus barang ini secara permanen?');"><i class="fas fa-trash-alt"></i></a>
                                            <a href="<?= base_url(); ?>admin/edit_akun/<?= $j['id_user']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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


 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>














    <!-- End of Main Content -->
    <!-- Page level plugins -->