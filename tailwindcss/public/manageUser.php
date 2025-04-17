<?php
include 'koneksi.php';

$query = "SELECT * FROM users";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User | Mancing Mas</title>
    <link rel="icon" href="icon.png">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
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
            <li><a href="event.html">Event</a></li>
            <li><a href="sewa.html">Sewa</a></li>
            <li><a href="tips.html">Tips</a></li>
            <li><a href="daftar.html">Daftar</a></li>
            <li><a href="login.html">Login</a></li>
        </ul>
    </header>

    <div class="container mx-auto px-4 mt-28">
        <h2 class="text-4xl font-bold mb-4 text-center text-white">Data User Mancing Mas</h2>
        <hr class="mb-6 border-white">

        <div class="overflow-x-auto shadow-lg">
            <table class="min-w-full bg-white text-sm border border-gray-200">
                <thead class="bg-blue-600 text-white text-lg">
                    <tr>
                        <th class="py-3 px-4 text-left">NAMA</th>
                        <th class="py-3 px-4 text-left">JENIS KELAMIN</th>
                        <th class="py-3 px-4 text-left">TGL LAHIR</th>
                        <th class="py-3 px-4 text-left">ALAMAT</th>
                        <th class="py-3 px-4 text-left">NO TELP</th>
                        <th class="py-3 px-4 text-center">EMAIL</th>
                        <th class="py-3 px-4 text-left">USERNAME</th>
                        <th class="py-3 px-4 text-center">PASSWORD</th>
                        <th class="py-3 px-4 text-left">HOBI</th>
                        <th class="py-3 px-4 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php while ($data = mysqli_fetch_assoc($result)) : ?>
                        <tr class="hover:bg-blue-50">
                            <td class="py-2 px-4"><?= htmlspecialchars($data['nama']); ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($data['jk']); ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($data['tgl_lahir']); ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($data['alamat']); ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($data['no_telp']); ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($data['email']); ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($data['username']); ?></td>
                            <td class="py-2 px-4 max-w-xs break-words whitespace-normal">
                                <?= htmlspecialchars($data['password']); ?>
                            </td>
                            <td class="py-2 px-4"><?= htmlspecialchars($data['hobi']); ?></td>
                            <td class="py-2 px-4">
                                <div class="flex space-x-2">
                                    <a href="updateUserForm.php?username=<?= urlencode($data['username']); ?>"
                                        class="bg-yellow-300 hover:bg-yellow-500 text-white font-semibold px-3 py-1 rounded-md">
                                        EDIT
                                    </a>
                                    <a href="prosesDelete.php?username=<?= urlencode($data['username']); ?>"
                                        onclick="return confirm('Yakin ingin menghapus data user <?= htmlspecialchars($data['username']); ?>?')"
                                        class="bg-red-500 hover:bg-red-600 text-white font-semibold px-3 py-1 rounded-md">
                                        HAPUS
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>