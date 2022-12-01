<?php

$toleransi = 7;
$tanggalPinjam = date("d-m-Y");
echo "Tanggal Pinjam: $tanggalPinjam <br>";

$tanggalKembali = date("d-m-Y", strtotime($tanggalPinjam . "+$toleransi days"));

echo "Tanggal Kembali: $tanggalKembali <br>";

$hariKembali = date_format(date_create($tanggalKembali), "l");

if ($hariKembali == "Sunday") {
    echo "Perpustakaan tutup pada hari Ahad";
} elseif ($hariKembali == "Saturday") {
    echo "Anda dapat mengembalikan buku pukul 08.00 - 12.00";
} else {
    echo "Anda dapat mengembalikan buku pukul 08.00 - 16.00 <br>";
}
echo "Hari ini : ", date("D"), "  l", "<br>";
$nilai = 85;

if ($nilai >= 85) {
    echo "Nilai Anda A";
} elseif ($nilai >= 75) {
    echo "Nilai Anda B";
} elseif ($nilai >= 60) {
    echo "Nilai Anda C";
} elseif ($nilai >= 50) {
    echo "Nilai Anda D";
} else {
    echo "Nilai Anda E";
}
?>