<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $koneksi->query("SELECT * FROM bayar WHERE id=$id");
    $data = $result->fetch_assoc();
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    $sql = "UPDATE bayar SET nama='$nama', alamat='$alamat', nohp='$nohp', jumlah=$jumlah, tanggal='$tanggal' WHERE id=$id";
    if ($koneksi->query($sql)) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='tbtransaksi.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to bottom, #0077b6, #0096c7, #00b4d8, #48cae4, #90e0ef);
            min-height: 100vh;
        }
    </style>
</head>
<body>

    <main class="min-h-screen flex items-center justify-center">
        <section class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
            <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Edit Data Pembayaran</h2>
            <form method="POST" class="space-y-4">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                <div>
                    <label for="nama" class="block font-semibold">Nama</label>
                    <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label for="alamat" class="block font-semibold">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="<?= $data['alamat'] ?>" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label for="nohp" class="block font-semibold">No HP</label>
                    <input type="text" id="nohp" name="nohp" value="<?= $data['nohp'] ?>" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label for="jumlah" class="block font-semibold">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" value="<?= $data['jumlah'] ?>" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label for="tanggal" class="block font-semibold">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="text-center">
                    <button type="submit" name="update" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Update</button>
                </div>
            </form>
        </section>
    </main>

</body>
</html>
