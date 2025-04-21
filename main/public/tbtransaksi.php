<?php
include 'koneksi.php';
$result = $koneksi->query("SELECT * FROM bayar");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to bottom, #0077b6, #0096c7, #00b4d8, #48cae4, #90e0ef);
            min-height: 100vh;
        }
    </style>
</head>
<body>

<header
        class="bg-blue-600 text-white font-bold py-4 px-6 shadow-lg w-full fixed top-0 left-0 flex items-center justify-between">

        <a href="index.html" class="text-2xl font-bold flex items-center">🐟 Delta Fishing</a>
        <ul class="flex space-x-9 text-2xl">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="galeri.html">Galeri</a></li>
            <li><a href="jenisikan.html">Ikan</a></li>
            <li><a href="event.html">Event</a></li>
            <li><a href="sewa.html">Sewa</a></li>
            <li><a href="tips.html">Tips</a></li>
            <li><a href="daftar.html">Daftar</a></li>
            <li><a href="login.html">Login</a></li>
        </ul>
    </header>

    <main class="container mx-auto px-4 py-10 mt-24">
        <section class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-blue-800">Daftar Transaksi</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left text-sm font-semibold">ID</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Nama</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Alamat</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">No HP</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Jumlah</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Tanggal</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td class="px-4 py-2"><?= $row['id'] ?></td>
                            <td class="px-4 py-2"><?= $row['nama'] ?></td>
                            <td class="px-4 py-2"><?= $row['alamat'] ?></td>
                            <td class="px-4 py-2"><?= $row['nohp'] ?></td>
                            <td class="px-4 py-2"><?= $row['jumlah'] ?></td>
                            <td class="px-4 py-2"><?= $row['tanggal'] ?></td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="updateDataTransaksi.php?id=<?= $row['id'] ?>" class="inline-block px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md text-sm">Edit</a>
                                <a href="deleteDataTransaksi.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="inline-block px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

</body>
</html>
