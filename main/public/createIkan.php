<?php
include 'koneksi.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $jenis = $_POST["jenis"];
    $berat = $_POST["berat"];

    // Query untuk menyimpan data
    $sql = "INSERT INTO ikan (nama, jenis, berat) VALUES ('$nama', '$jenis', '$berat')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href = 'readIkan.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>
