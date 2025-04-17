<?php
include 'koneksi.php';

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $query = "DELETE FROM users WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='manageUser.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location.href='manageUser.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location.href='manageUser.php';</script>";
}
?>
