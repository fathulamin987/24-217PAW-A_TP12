<?php
include 'config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT gambar FROM vehicles WHERE id=$id");
    $data = mysqli_fetch_assoc($result);

    if ($data && $data['gambar'] && file_exists("uploads/" . $data['gambar'])) {
        unlink("uploads/" . $data['gambar']);
    }

    if (mysqli_query($conn, "DELETE FROM vehicles WHERE id=$id")) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
    }
}
?>