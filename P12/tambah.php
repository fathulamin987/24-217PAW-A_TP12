<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Kendaraan</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Tambah Data Kendaraan</h2>

  <form method="POST" enctype="multipart/form-data">
    <table class="form-table">
      <tr><td>Merk</td><td><input type="text" name="merk" required></td></tr>
      <tr><td>Jenis Kendaraan</td><td><input type="text" name="jenis_kendaraan" required></td></tr>
      <tr><td>Tipe</td><td><input type="text" name="tipe" required></td></tr>
      <tr><td>Warna</td><td><input type="text" name="warna" required></td></tr>
      <tr><td>Tahun</td><td><input type="number" name="tahun" required></td></tr>
      <tr><td>Upload Gambar</td><td><input type="file" name="gambar"></td></tr>
      <tr><td></td>
        <td>
          <button type="submit" name="submit">Simpan</button>
          <a href="index.php" class="btn">Kembali</a>
        </td>
      </tr>
    </table>
  </form>

  <?php
  if (isset($_POST['submit'])) {
      $merk  = $_POST['merk'];
      $jenis = $_POST['jenis_kendaraan'];
      $tipe  = $_POST['tipe'];
      $warna = $_POST['warna'];
      $tahun = $_POST['tahun'];
      $gambar = "";

      if (!empty($_FILES['gambar']['name'])) {
          $gambar = time() . "_" . $_FILES['gambar']['name'];
          move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/" . $gambar);
      }

      $sql = "INSERT INTO vehicles (merk, jenis_kendaraan, tipe, warna, tahun, gambar)
              VALUES ('$merk', '$jenis', '$tipe', '$warna', '$tahun', '$gambar')";
      if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
      } else {
          echo "<script>alert('Gagal menambah data!'); window.location='tambah.php';</script>";
      }
  }
  ?>
</div>
</body>
</html>