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
        <!-- Button to trigger modal -->

       <!-- Modal Structure -->
    <div class="modal fade" id="tambahPindahBarangModal" tabindex="-1" role="dialog" aria-labelledby="tambahPindahBarangModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPindahBarangModalLabel">Tambah Data Pindah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('admin/tambah_pindah'); ?>
                    <div class="form-group">
                        <label for="id_barang">Pilih Barang</label>
                        <select class="selectpicker form-control" data-show-subtext="true" id="id_barang" name="id_barang" data-live-search="true">
                            <option value="">Pilih Barang</option>
                            <?php foreach ($barang as $b) : ?>
                                <option data-subtext="" value="<?= $b['id_barang']; ?>"><?= $b['id_barang'] . "-" . $b['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" required class="form-control" placeholder="Jumlah" id="jumlah" name="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="id_tempat_asal">Asal</label>
                        <select class="form-control" id="id_tempat_asal" name="id_tempat_asal">
                            <option value="">Asal</option>
                            <?php foreach ($tempat as $b) : ?>
                                <option value="<?= $b['id_tempat']; ?>"><?= $b['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_tempat_tujuan">Tujuan</label>
                        <select class="form-control" id="id_tempat_tujuan" name="id_tempat_tujuan">
                            <option value="">Tujuan</option>
                            <?php foreach ($tempat as $b) : ?>
                                <option value="<?= $b['id_tempat']; ?>"><?= $b['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="datetime-local" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" required class="form-control" placeholder="Keterangan" id="keterangan" name="keterangan">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
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
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Perpindahan Barang</h6>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPindahBarangModal" width = "50px">
                        +
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
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
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
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
                                    <th scope="col">Aksi</th>

                                </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pindahbarang as $j) : ?>
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
                                    <td>
                                        <a href="<?= base_url(); ?>admin/batal_pindah/<?= $j['id_pindah']; ?>" class="btn btn-danger" onclick="return confirm('Batal Pindah, yakin?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>