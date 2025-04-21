<?php
include 'koneksi.php'; // Hubungkan ke database

// Ambil ID ikan dari URL
$id = $_GET['id'];

// Hapus data dari database
$sql = "DELETE FROM ikan WHERE id = $id";
if ($koneksi->query($sql) === TRUE) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'readIkan.php';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>


