<!-- /.container-fluid -->
<div id="layoutSidenav_content">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <?php echo form_open_multipart('admin/run_edit_tempat'); ?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_tempat" name="id_tempat" value="<?php echo $tempat['id_tempat'];  ?>">

            <label for="link">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $tempat['nama'];  ?>">

            <label for="link">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $tempat['alamat'];  ?>">
            
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

    <!-- End of Main Content -->