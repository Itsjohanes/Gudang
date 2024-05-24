<!-- /.container-fluid -->
<div id="layoutSidenav_content">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <?php echo form_open_multipart('admin/run_edit_barang'); ?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_barang" name="id_barang" value="<?php echo $barang['id_barang'];  ?>">

            <label for="link">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $barang['nama'];  ?>">
            
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

    <!-- End of Main Content -->