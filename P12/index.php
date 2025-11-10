<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Kendaraan</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
  <h2>Data Kendaraan</h2>

  <form method="GET" class="inline">
    <input type="text" name="search" placeholder="Cari merk, jenis/ tipe" 
           value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    <button type="submit">Cari</button>
    <a href="tambah.php" class="btn btn-add"><i class="fa fa-plus"></i> Tambah Kendaraan</a>
  </form>

  <?php
  $search = isset($_GET['search']) ? $_GET['search'] : '';
  $limit = 5;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $start = ($page - 1) * $limit;

  $countSql = "SELECT COUNT(*) AS total FROM vehicles 
               WHERE merk LIKE '%$search%' OR jenis_kendaraan LIKE '%$search%' OR tipe LIKE '%$search%'";
  $countResult = mysqli_query($conn, $countSql);
  $countRow = mysqli_fetch_assoc($countResult);
  $total = $countRow['total'];
  $pages = ceil($total / $limit);

  $sql = "SELECT * FROM vehicles 
          WHERE merk LIKE '%$search%' OR jenis_kendaraan LIKE '%$search%' OR tipe LIKE '%$search%' 
          ORDER BY id ASC LIMIT $start, $limit";
  $result = mysqli_query($conn, $sql);
  ?>

  <table>
    <tr>
      <th>No</th>
      <th>Merk</th>
      <th>Jenis</th>
      <th>Tipe</th>
      <th>Warna</th>
      <th>Tahun</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>

    <?php
    if (mysqli_num_rows($result) > 0) {
      $no = $start + 1;
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo htmlspecialchars($row['merk']); ?></td>
      <td><?php echo htmlspecialchars($row['jenis_kendaraan']); ?></td>
      <td><?php echo htmlspecialchars($row['tipe']); ?></td>
      <td><?php echo htmlspecialchars($row['warna']); ?></td>
      <td><?php echo htmlspecialchars($row['tahun']); ?></td>
      <td>
        <?php if ($row['gambar']) { ?>
          <img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" width="90">
        <?php } else { echo "-"; } ?>
      </td>
      <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">
          <i class="fa fa-pen"></i> Edit
        </a>
        <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn-hapus" 
           onclick="return confirm('Yakin ingin menghapus data ini?')">
          <i class="fa fa-trash"></i> Hapus
        </a>
      </td>
    </tr>
    <?php 
      }
    } else {
      echo "<tr><td colspan='8' style='text-align:center;'>Tidak ada data kendaraan</td></tr>";
    }
    ?>
  </table>

  <div class="pagination">
    <?php for ($i = 1; $i <= $pages; $i++) { ?>
      <a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>" 
         class="<?php echo ($i==$page)?'active':''; ?>">
         <?php echo $i; ?>
      </a>
    <?php } ?>
  </div>
</div>
</body>
</html>