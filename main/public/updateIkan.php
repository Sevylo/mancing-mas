<?php
include 'koneksi.php'; // Hubungkan ke database

// Ambil ID ikan dari URL
$id = $_GET['id'];
$sql = "SELECT * FROM ikan WHERE id = $id";
$result = $koneksi->query($sql);
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $jenis = $_POST["jenis"];
    $berat = $_POST["berat"];

    // Query Update
    $update_sql = "UPDATE ikan SET nama='$nama', jenis='$jenis', berat='$berat' WHERE id=$id";
    if ($koneksi->query($update_sql) === TRUE) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                window.location.href = 'readIkan.php';
              </script>";
    } else {
        echo "Error: " . $update_sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Ikan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #0077b6, #0096c7, #00b4d8, #48cae4, #90e0ef);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .form-input {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            color: black;
            font-weight: bold;
        }
        .form-input::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }
        .btn-submit {
            background: white;
            color: #0077b6;
            transition: all 0.3s ease-in-out;
            font-weight: bold;
        }
        .btn-submit:hover {
            background: #90e0ef;
            color: white;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <!-- Background Gambar Ikan -->
    <div class="absolute inset-0 bg-cover bg-center opacity-30" 
        style="background-image: url('https://source.unsplash.com/1200x800/?ocean,fish,sea');">
    </div>

    <!-- Container -->
    <div class="relative container p-8 w-full max-w-lg">
        <!-- Header -->
        <h2 class="text-3xl font-semibold text-white text-center mb-6 flex items-center justify-center gap-2">
            ✏️ Edit Data Ikan
        </h2>

<!-- Form Update -->
<form method="post" class="space-y-5">
    <!-- Nama Ikan -->
    <div>
        <label class="block font-medium text-black">Nama Ikan</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required 
        class="form-input bg-white/30 text-white p-3 w-full rounded-xl focus:ring-2 focus:ring-white outline-none placeholder-white placeholder-opacity-70 border border-white-300">
    </div>

    <!-- Jenis Ikan -->
    <div>
        <label class="block font-medium text-black">Jenis Ikan</label>
        <select name="jenis" required 
            class="form-input bg-white/30 text-white p-3 w-full rounded-xl focus:ring-2 focus:ring-white outline-none border border-white-300">
            <option value="Air Tawar" <?= ($data['jenis'] == 'Air Tawar') ? 'selected' : ''; ?>>Air Tawar</option>
            <option value="Air Payau" <?= ($data['jenis'] == 'Air Payau') ? 'selected' : ''; ?>>Air Payau</option>
            <option value="Air Laut" <?= ($data['jenis'] == 'Air Laut') ? 'selected' : ''; ?>>Air Laut</option>
        </select>
    </div>

    <!-- Berat Ikan -->
    <div>
        <label class="block font-medium text-black">Berat Ikan</label>
        <select name="berat" required 
            class="form-input bg-white/30 text-white p-3 w-full rounded-xl focus:ring-2 focus:ring-white outline-none border border-white-300">
            <option value="100" <?= ($data['berat'] == 100) ? 'selected' : ''; ?>>100 gram</option>
            <option value="200" <?= ($data['berat'] == 200) ? 'selected' : ''; ?>>200 gram</option>
            <option value="300" <?= ($data['berat'] == 300) ? 'selected' : ''; ?>>300 gram</option>
            <option value="400" <?= ($data['berat'] == 400) ? 'selected' : ''; ?>>400 gram</option>
            <option value="500" <?= ($data['berat'] == 500) ? 'selected' : ''; ?>>500 gram</option>
        </select>
    </div>

    <!-- Tombol Submit -->
    <div class="flex justify-center">
        <button type="submit" 
            class="btn-submit px-6 py-3 rounded-xl shadow-md bg-white text-blue-700 hover:bg-blue-600 hover:text-white transition duration-300 font-bold border border-blue-300">
            ✅ Simpan Perubahan
        </button>
    </div>
</form>

