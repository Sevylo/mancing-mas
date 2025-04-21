<?php
include 'koneksi.php';
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $jk = $_POST['jenis_kelamin'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['hp'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cfmpassword = $_POST['konfirmasi_password'];
    $hobi = $_POST['hobi'];

    if ($password !== $cfmpassword) {
        echo "<script>alert('Password dan Konfirmasi Password tidak sama!'); window.history.back();</script>";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query ="INSERT INTO users (nama,jk,tgl_lahir,alamat,no_telp,email,username,password,hobi) 
    VALUES('$nama','$jk','$tgl','$alamat','$nohp','$email','$username','$hashed_password','$hobi')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Pendaftaran Berhasil!'); window.location.href='login.html';</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
}
?>