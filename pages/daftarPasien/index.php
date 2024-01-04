<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pendaftaran pasien Baru</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" id="pasienForm" action="pages/daftarPasien/checkPasien.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" placeholder="isikan nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="alamat">alamat</label>
                                <input type="text" class="form-control" placeholder="isikan alamat" name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="nomor hp">Nomor HP</label>
                                <input type="text" class="form-control" placeholder="isikan nomor HP" name="no_hp">
                            </div>
                            <div class="form-group">
                                <label for="nomor ktp">nomor ktp</label>
                                <input type="text" class="form-control" placeholder="isikan nomor ktp" name="no_ktp">
                            </div>
                            <div class="form-group">
                                <label for="nomor RM">nomor RM</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="no_rm" id="no_rm" value="<?php echo $_SESSION['no_rm'] ?>">
                                    <span class=" input-group-append">
                                        <button type="button" class="btn btn-info btn-flat" onclick="generateKode()">buat kode</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>