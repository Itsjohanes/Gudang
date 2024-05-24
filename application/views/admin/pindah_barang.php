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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pindah Barang</h6>
                </div>
                <?php echo form_open_multipart('admin/tambah_pindah'); ?>
                <div class="row">
                    <div class="col">
                        <select class="form-control" id="id_barang" name="id_barang">
                            <option value="">Pilih Barang</option>
                            <?php foreach ($barang as $b) : ?>
                                <option value="<?= $b['id_barang']; ?>"><?= $b['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" required class="form-control" placeholder="Jumlah" id="jumlah" name="jumlah">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <select class="form-control" id="id_tempat_asal" name="id_tempat_asal">
                            <option value="">Asal</option>
                            <?php foreach ($tempat as $b) : ?>
                                <option value="<?= $b['id_tempat']; ?>"><?= $b['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" id="id_tempat_tujuan" name="id_tempat_tujuan">
                            <option value="">Tujuan</Table></option>
                            <?php foreach ($tempat as $b) : ?>
                                <option value="<?= $b['id_tempat']; ?>"><?= $b['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                    <input type="datetime-local" id="birthdaytime" name="tanggal">

                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <input type="text" required class="form-control" placeholder="Keterangan" id="keterangan" name="keterangan">
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Perpindahan Barang</h6>
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