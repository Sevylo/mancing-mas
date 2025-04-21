<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $koneksi->query("DELETE FROM bayar WHERE id=$id");
    header("Location: tbtransaksi.php");
    exit();
}
?>

