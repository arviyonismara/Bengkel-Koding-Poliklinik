<?php
include("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST["id"];

    // Query untuk melakukan update data obat
    $query = "DELETE FROM poli WHERE id = $id";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika berhasil, redirect kembali ke halaman index atau sesuaikan dengan kebutuhan Anda
        echo '<script>';
        echo 'alert("Data poli berhasil dihapus!");';
        echo 'window.location.href = "../../poli.php";';
        echo '</script>';
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Tutup koneksi
mysqli_close($koneksi);
