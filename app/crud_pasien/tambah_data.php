<?php
include('../../config/koneksi.php');

function generateUniqueCode($nomorUrut)
{
    $tahunSekarang = date("Y");
    $bulanSekarang = date("m");

    // Memformat nomor urut menjadi tiga digit
    $formattedNomorUrut = sprintf('%03d', $nomorUrut);

    $kodeUnik = $tahunSekarang . $bulanSekarang . "-" . $formattedNomorUrut;
    return $kodeUnik;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $nomor_ktp = $_POST["nomor_ktp"];
    $nomor_hp = $_POST["nomor_hp"]; // Menempatkan no_hp setelah no_ktp

    // Mendapatkan nomor urut pasien terbaru dari database
    $result = mysqli_query($koneksi, "SELECT COUNT(*) AS count_pasien FROM pasien");
    $row = mysqli_fetch_assoc($result);
    $nomorUrut = $row["count_pasien"] + 1;

    $sql = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm) VALUES ('$nama', '$alamat', '$nomor_ktp', '$nomor_hp', '')";

    if (mysqli_query($koneksi, $sql)) {
        $kodeUnik = generateUniqueCode($nomorUrut);

        $updateSql = "UPDATE pasien SET no_rm = '$kodeUnik' WHERE id = (SELECT MAX(id) FROM pasien)";
        mysqli_query($koneksi, $updateSql);

        // echo "Data berhasil disimpan. No RM: " . $kodeUnik;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
