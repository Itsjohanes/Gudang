<!-- /.container-fluid -->
<div id="layoutSidenav_content">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <?php echo form_open_multipart('kantor/run_edit_akun'); ?>
        <div class="form-group">
            <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $akun['id_user'];  ?>">
            <label for="link">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $akun['nama'];  ?>">
            <label for="link">Email</label>
            <input type="text" class="form-control" required id="email" name="email" value="<?php echo $akun['email'];  ?>">
            <label for="link">Role</label>
            <input type = "hidden" class = "form-control" id = "role" name = "role" value = "<?php echo $akun['role']; ?>">
            <select class="form-control" id="roles" name="roles" disabled>
            <option value="1" <?php if ($akun['role'] == 1) {
                                        echo 'selected';
                                    } ?>>Super Admin</option>
                <option value="2" <?php if ($akun['role'] == 2) {
                                        echo 'selected';
                                    } ?>>Gudang</option>
                <option value="3" <?php if ($akun['role'] == 3) {
                                        echo 'selected';
                                    } ?>>Kantor</option>
            </select>
            <label for="link">Tempat</label>
            <input type = "hidden" class = "form-control" id = "id_tempat" name = "id_tempat" value = "<?php echo $akun['id_tempat']; ?>">
            <select class="form-control" id="id_tempats" name="id_tempats" disabled>
                <?php foreach ($tempat as $t) : ?>
                    <option value="<?= $t['id_tempat']; ?>" <?php if ($akun['id_tempat'] == $t['id_tempat']) {
                                                                echo 'selected';
                                                            } ?>><?= $t['nama']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="link">Password</label>
            <input type = "password" class = "form-control" id = "password" name = "password">



            
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

    <!-- End of Main Content -->