<?php
include 'koneksi.php';

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=laporan-data-pendaftar.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "
<table border='1'>
    <tr style='background-color:#D9D9D9; 
               font-weight:bold; 
               text-align:center;'>
        <th>No</th>
        <th>Nama Mahasiswa</th>
        <th>Nim</th>
        <th>Kursus</th>
        <th>Durasi</th>
        <th>Tanggal Daftar</th>
    </tr>
";

$sql = "SELECT diaz_tbpendaftaran.id, diaz_tbmhs.nama, diaz_tbkursus.kursus, 
        diaz_tbmhs.nim, diaz_tbkursus.durasi, diaz_tbpendaftaran.tglDaftar AS tanggal_daftar
        FROM diaz_tbpendaftaran
        JOIN diaz_tbmhs ON diaz_tbpendaftaran.idNama = diaz_tbmhs.id
        JOIN diaz_tbkursus ON diaz_tbpendaftaran.idKursus = diaz_tbkursus.id";

$result = mysqli_query($koneksi, $sql);
$no = 1;
$warna = false;

while ($row = mysqli_fetch_assoc($result)) {
    $bg = $warna ? '#F2F2F2' : '#FFFFFF';
    
    echo "
    <tr style='background-color:$bg'>
        <td style='text-align:center;'>".$no++."</td>
        <td>".$row['nama']."</td>
        <td>".$row['nim']."</td>
        <td>".$row['kursus']."</td>
        <td>".$row['durasi']."</td>
        <td>".$row['tanggal_daftar']."</td>
    </tr>
    ";
    
    $warna = !$warna;
}

echo "</table>";