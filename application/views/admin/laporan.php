<!-- Begin Page Content -->



<div id="layoutSidenav_content">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!--Date picker -->
    <div class="container mt-1">
        <?php echo form_open_multipart('Admin/cetakLaporan'); ?>
        <div class="form-group">
            <label for="datepicker">Pilih Tanggal:</label>
            <input type="text" name="date" class="form-control" id="datepicker">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>













    <!-- End of Main Content -->
    <!-- Page level plugins -->