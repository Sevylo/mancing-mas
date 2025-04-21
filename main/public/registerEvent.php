<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Validasi nomor telepon harus berupa angka
    if (!preg_match('/^[0-9]+$/', $phone)) {
        // Jika tidak hanya angka, redirect kembali dengan status error_phone
        header("Location: event.html?status=error_phone");
        exit();
    }

    // Validasi email dengan filter bawaan PHP
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: event.html?status=error_email");
        exit();
    }

    // Menyimpan data ke database
    $stmt = $koneksi->prepare("INSERT INTO registrations (name, email, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);

    if ($stmt->execute()) {
        header("Location: event.html?status=success");
        exit();
    } else {
        header("Location: event.html?status=error");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

