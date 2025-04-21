<?php
include 'koneksi.php';


if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "Username tidak ditemukan di URL!";
    exit;
}


if (isset($_POST['submit'])) {

    $nama       = $_POST['nama'];
    $jk         = $_POST['jk'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    $alamat     = $_POST['alamat'];
    $no_telp    = $_POST['no_telp'];
    $email      = $_POST['email'];
    $hobi       = $_POST['hobi'];

    $update = "UPDATE users SET 
                nama='$nama', 
                jk='$jk', 
                tgl_lahir='$tgl_lahir',
                alamat='$alamat',
                no_telp='$no_telp',
                email='$email',
                hobi='$hobi' 
                WHERE username='$username'";

    $result_update = mysqli_query($koneksi, $update);

    if ($result_update) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href='manageUser.php';</script>";
    } else {
        echo "<script>alert('Gagal update data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit User | Delta Fishing</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-600 via-blue-400 to-blue-200 p-4">

    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Edit Data User</h2>
        <form method="POST" class="space-y-4">

            <div>
                <label class="block text-sm font-semibold text-blue-700">Nama</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-blue-700">Jenis Kelamin</label>
                <select name="jk" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="Laki-laki" <?= ($data['jk'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= ($data['jk'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-blue-700">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" value="<?= htmlspecialchars($data['tgl_lahir']) ?>" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-blue-700">Alamat</label>
                <input type="text" name="alamat" value="<?= htmlspecialchars($data['alamat']) ?>" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-blue-700">No Telp</label>
                <input type="text" name="no_telp" value="<?= htmlspecialchars($data['no_telp']) ?>" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-blue-700">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-blue-700">Hobi</label>
                <select name="hobi" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="Ya" <?= ($data['hobi'] == 'Ya') ? 'selected' : '' ?>>Ya</option>
                    <option value="Tidak" <?= ($data['hobi'] == 'Tidak') ? 'selected' : '' ?>>Tidak</option>
                </select>
            </div>

            <div class="text-center">
                <input type="submit" name="submit" value="Update"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md cursor-pointer">
            </div>
        </form>
    </div>

</body>

</html>