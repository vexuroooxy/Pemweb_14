<?php
include 'koneksi.php';
$sql = "SELECT diaz_tbpendaftaran.id, diaz_tbmhs.nama, diaz_tbkursus.kursus, 
        diaz_tbmhs.nim, diaz_tbkursus.durasi, diaz_tbpendaftaran.tglDaftar AS tanggal_daftar
        FROM diaz_tbpendaftaran
        JOIN diaz_tbmhs ON diaz_tbpendaftaran.idNama = diaz_tbmhs.id
        JOIN diaz_tbkursus ON diaz_tbpendaftaran.idKursus = diaz_tbkursus.id";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pendaftar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
</head>
<body style="font-family: 'Google Sans Flex', sans-serif;">
  <script>
    window.print();
  </script>
  <center>
    <h1>Laporan Data Pendaftar</h1>
    <table border="1" cellpadding="10" cellspacing="0" width="80%">
      <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Kursus</th>
        <th>Durasi</th>
        <th>Tanggal Daftar</th>
      </tr>
      <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($data = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['nim']; ?></td>
            <td><?= $data['kursus']; ?></td>
            <td><?= $data['durasi']; ?></td>
            <td><?= $data['tanggal_daftar']; ?></td>
          </tr>
          <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="3">Data kosong</td></tr>
            <?php endif; ?>
          </table>
        </center>
</div>
</body>
</html>