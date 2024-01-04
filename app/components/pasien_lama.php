<?php
// include('../crud_pasien/daftar_poli.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_rm = $_POST["no_rm"];

    // Lakukan pengecekan no_rm di database
    $result = mysqli_query($koneksi, "SELECT * FROM pasien WHERE no_rm = '$no_rm'");
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pendaftaran poli</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" id="pasienForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="no_rm">No RM</label>
                                <input type="text" class="form-control" placeholder="isikan no RM" name="no_rm">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">check</button>
                        </div>
                    </form>

                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && mysqli_num_rows($result) > 0) {
                    ?>
                        <form method="post" id="pasienForm" action="crud_pasien/daftar_poli.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Poli</label>
                                    <select class="form-control" name="id_poli">
                                        <?php
                                        // Ambil data poli dari database dan isi dropdown
                                        $resultPoli = mysqli_query($koneksi, "SELECT * FROM poli");
                                        while ($rowPoli = mysqli_fetch_assoc($resultPoli)) {
                                            echo "<option value='" . $rowPoli['id'] . "'>" . $rowPoli['poli'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Dokter</label>
                                    <select class="form-control" name="id_dokter">
                                        <?php
                                        // Ambil data dokter dari database dan isi dropdown
                                        $resultDokter = mysqli_query($koneksi, "SELECT * FROM dokter");
                                        while ($rowDokter = mysqli_fetch_assoc($resultDokter)) {
                                            echo "<option value='" . $rowDokter['id'] . "'>" . $rowDokter['nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jadwal</label>
                                    <select class="form-control" name="id_jadwal">
                                        <?php
                                        $resultJadwal = mysqli_query($koneksi, "SELECT * FROM jadwal_periksa");
                                        while ($rowJadwal = mysqli_fetch_assoc($resultJadwal)) {
                                            echo "<option value='" . $rowJadwal['id'] . "'>" . $rowJadwal['jam_mulai'] . " s/d " . $rowJadwal['jam_selesai'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Keluhan</label>
                                    <input type="text" class="form-control" placeholder="Masukkan keluhan" name="keluhan">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    <?php
                    }
                    ?>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var poliForm = document.getElementById('poliForm');

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && mysqli_num_rows($result) > 0) {
        ?>
            // Jika no_rm ditemukan, tampilkan formulir pendaftaran poli
            poliForm.style.display = 'block';
        <?php
        } else {
        ?>
            // Jika no_rm tidak ditemukan atau halaman belum dimuat melalui POST request, sembunyikan formulir pendaftaran poli
            poliForm.style.display = 'none';
        <?php
        }
        ?>
    });
</script>