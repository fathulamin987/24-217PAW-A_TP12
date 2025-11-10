<?php
include 'config.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM vehicles WHERE id=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Kendaraan</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Edit Data Kendaraan</h2>

  <form method="POST" enctype="multipart/form-data">
    <table class="form-table">
      <tr><td>Merk</td><td><input type="text" name="merk" value="<?= $row['merk']; ?>" required></td></tr>
      <tr><td>Jenis Kendaraan</td><td><input type="text" name="jenis_kendaraan" value="<?= $row['jenis_kendaraan']; ?>" required></td></tr>
      <tr><td>Tipe</td><td><input type="text" name="tipe" value="<?= $row['tipe']; ?>" required></td></tr>
      <tr><td>Warna</td><td><input type="text" name="warna" value="<?= $row['warna']; ?>" required></td></tr>
      <tr><td>Tahun</td><td><input type="number" name="tahun" value="<?= $row['tahun']; ?>" required></td></tr>
      <tr>
        <td>Gambar Saat Ini</td>
        <td>
          <?php if ($row['gambar']) { ?>
            <img src="uploads/<?= $row['gambar']; ?>" width="100"><br>
          <?php } else { echo "Tidak ada gambar<br>"; } ?>
          <input type="file" name="gambar">
        </td>
      </tr>
      <tr><td></td>
        <td>
          <button type="submit" name="update">Perbarui</button>
          <a href="index.php" class="btn">Kembali</a>
        </td>
      </tr>
    </table>
  </form>

  <?php
  if (isset($_POST['update'])) {
      $merk  = $_POST['merk'];
      $jenis = $_POST['jenis_kendaraan'];
      $tipe  = $_POST['tipe'];
      $warna = $_POST['warna'];
      $tahun = $_POST['tahun'];
      $gambar = $row['gambar'];

      if (!empty($_FILES['gambar']['name'])) {
          if ($gambar && file_exists("uploads/$gambar")) unlink("uploads/$gambar");
          $gambar = time() . "_" . $_FILES['gambar']['name'];
          move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/" . $gambar);
      }

      $update = "UPDATE vehicles SET merk='$merk', jenis_kendaraan='$jenis', tipe='$tipe', warna='$warna', tahun='$tahun', gambar='$gambar' WHERE id=$id";
      if (mysqli_query($conn, $update)) {
          echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
      } else {
          echo "<script>alert('Gagal memperbarui data!'); window.location='edit.php?id=$id';</script>";
      }
  }
  ?>
</div>
</body>
</html>