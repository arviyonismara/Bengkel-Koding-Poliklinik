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
          <form method="post" id="pasienForm" action="crud_pasien/tambah_data.php">
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
                <input type="text" class="form-control" placeholder="isikan nomor HP" name="nomor_hp">
              </div>
              <div class="form-group">
                <label for="nomor ktp">nomor ktp</label>
                <input type="text" class="form-control" placeholder="isikan nomor ktp" name="nomor_ktp">
              </div>
              <div class="form-group">
                <label for="nomor RM">nomor RM</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="no_rm" id="no_rm">
                  <span class="input-group-append">
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
<script>
  function generateKode() {
    // Mendapatkan nilai nomor urut pasien terbaru dari database (harus disesuaikan)
    var nomorUrutPasienTerbaru = 1; // Sementara diatur 1, gantilah dengan nilai dari database

    // Fungsi untuk menghasilkan kode unik
    function generateUniqueCode(nomorUrutPasien) {
      var tahunSekarang = new Date().getFullYear().toString();
      var bulanSekarang = ("0" + (new Date().getMonth() + 1)).slice(-2);

      // Memformat nomor urut menjadi tiga digit
      var formattedNomorUrut = ("000" + nomorUrutPasien).slice(-3);

      // Menghasilkan kode unik dengan format TAHUNBULAN-NOMORURUT
      var kodeUnik = tahunSekarang + bulanSekarang + "-" + formattedNomorUrut;

      return kodeUnik;
    }

    // Mendapatkan elemen input no_rm
    var noRmInput = document.getElementById('no_rm');

    // Menghasilkan kode unik
    var kodeUnik = generateUniqueCode(nomorUrutPasienTerbaru);

    // Mengatur nilai input no_rm
    noRmInput.value = kodeUnik;
  }

  // Memanggil fungsi generateKode() saat formulir dimuat
  // window.onload = generateKode;
</script>