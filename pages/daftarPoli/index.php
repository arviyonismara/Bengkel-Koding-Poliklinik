<?php
include('config/koneksi.php');

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
                        <form method="post" id="pasienForm" action="pages/daftarPoli/daftarPoli.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Poli</label>
                                    <select class="form-control" name="id_poli">
                                        <?php
                                        // Ambil data poli dari database dan isi dropdown
                                        require "config/koneksi.php";
                                        $resultPoli = mysqli_query($koneksi, "SELECT * FROM poli");
                                        while ($rowPoli = mysqli_fetch_assoc($resultPoli)) {
                                            echo "<option value='" . $rowPoli['id'] . "'>" . $rowPoli['poli'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Dokter</label>
                                    <select class="form-control" name="dokter">
                                        <?php
                                        // Ambil data dokter dari database dan isi dropdown
                                        require "config/koneksi.php";
                                        $resultDokter = mysqli_query($koneksi, "SELECT * FROM dokter");
                                        while ($rowDokter = mysqli_fetch_assoc($resultDokter)) {
                                            echo "<option value='" . $rowDokter['id'] . "'>" . $rowDokter['nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jadwal</label>
                                    <select class="form-control" name="jadwal">
                                        <?php
                                        require "config/koneksi.php";
                                        $poliId = $_POST['poliId'];
                                        $query = "SELECT jadwal_periksa.id as idJadwal, dokter.nama, jadwal_periksa.hari, DATE_FORMAT(jadwal_periksa.jam_mulai, '%H:%i') as jamMulai, DATE_FORMAT(jadwal_periksa.jam_selesai, '%H:%i') as jamSelesai FROM jadwal_periksa INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id INNER JOIN poli ON dokter.id_poli = poli.id WHERE poli.id = '$poliId'";
                                        $result = mysqli_query($koneksi, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            $jadwalOptions = "";
                                            while ($dataJadwal = mysqli_fetch_assoc($result)) {
                                                $jadwalOptions .= "<option value='" . $dataJadwal['idJadwal'] . "'>" . $dataJadwal['nama'] . ' - ' . $dataJadwal['hari'] . ' ' . $dataJadwal['jamMulai'] . ' - ' . $dataJadwal['jamSelesai'] . "</option>";
                                            }
                                            // Kirim data jadwal ke AJAX
                                            echo $jadwalOptions;
                                        } else {
                                            echo "<option value=''>Jadwal tidak ditemukan</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group" name="keluhan">
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