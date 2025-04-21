<?php
include 'koneksi.php'; // Pastikan koneksi database tersedia

// Ambil data dari tabel ikan
$sql = "SELECT * FROM ikan";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ikan - Delta Fishing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script>
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(to bottom, #0077b6, #00b4d8, #90e0ef);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
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
    <!-- Container -->
    <div class="max-w-3xl mx-auto mt-10 text-center rounded-xl shadow-lg p-6" style="background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(5px);">

        <!-- Header -->
        <h2 class="text-4xl font-bold text-white text-center mb-6 flex items-center justify-center gap-2">
            Data Ikan
        </h2>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-blue-300 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="border p-3 text-center">ID</th>
                        <th class="border p-3">Nama Ikan</th>
                        <th class="border p-3">Jenis</th>
                        <th class="border p-3 text-center">Berat (gram)</th>
                        <th class="border p-3 text-center">EDIT/HAPUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="hover:bg-blue-100 transition duration-300">
                                <td class="border p-3 text-center"><?= $row['id']; ?></td>
                                <td class="border p-3 text-white-700">
                                    <?= htmlspecialchars($row['nama']); ?>
                                </td>
                                <td class="border p-3 text-white-700">
                                    <?= htmlspecialchars($row['jenis']); ?>
                                </td>
                                <td class="border p-3 text-center text-white-700 ">
                                    <?= htmlspecialchars($row['berat']); ?> gram
                                </td>
                                <td class="border p-3 text-center flex justify-center gap-4">
                                    <a href="updateIkan.php?id=<?= $row['id']; ?>"
                                        class="text-black-600 hover:text-black-800 transition duration-200">
                                        ✏️ Edit
                                    </a>
                                    <a href="deleteIkan.php?id=<?= $row['id']; ?>"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="text-black-600 hover:text-black-800 transition duration-200">
                                        🗑️ Hapus
                                    </a>

                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="border p-3 text-center text-gray-500">Tidak ada data ikan</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Tombol Kembali -->
        <div class="text-center mt-6">
            <a href="jenisikan.html" class="inline-block bg-blue-600 text-white px-5 py-2 rounded-xl font-semibold hover:bg-blue-700 transition duration-300 shadow-md transform hover:scale-105">

                ⬅ Kembali ke Dashboard
            </a>
        </div>
    </div>
</body>

</html>