<?php
include('../../config/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_poli = $_POST["id_poli"];
    $id_dokter = $_POST["id_dokter"];
    $id_jadwal = $_POST["id_jadwal"];
    $keluhan = $_POST["keluhan"];

    // Lakukan operasi pendaftaran poli ke dalam database, sesuai kebutuhan
    $sql = "INSERT INTO daftar_poli (id_poli, id_dokter, id_jadwal, keluhan, no_antrian) VALUES ('$id_poli', '$id_dokter', '$id_jadwal', '$keluhan', '')";

    if (mysqli_query($koneksi, $sql)) {
        echo "Pendaftaran poli berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
