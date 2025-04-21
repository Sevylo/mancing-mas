<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    $query = "INSERT INTO bayar (nama, alamat, nohp, jumlah, tanggal) 
        VALUES ('$nama', '$alamat', '$nohp', $jumlah, '$tanggal')";

    if ($koneksi->query($query) === TRUE) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='payment.html';</script>";
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>
