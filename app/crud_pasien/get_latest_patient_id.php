<?php
// get_latest_patient_id.php

include '../../config/koneksi.php'; // Sertakan file konfigurasi database

// Mengambil nomor urut terbaru dari kolom no_rm
$result = mysqli_query($koneksi, "SELECT MAX(CAST(SUBSTRING(no_rm, 8) AS SIGNED)) AS latest_patient_num FROM pasien");
$row = mysqli_fetch_assoc($result);

// Jika tidak ada data di database, atur nomor urut menjadi 0
$latestPatientNum = $row['latest_patient_num'] ? $row['latest_patient_num'] : 0;

// Mengembalikan nilai sebagai JSON
echo json_encode(array('latestPatientNum' => $latestPatientNum));
mysqli_close($koneksi);
