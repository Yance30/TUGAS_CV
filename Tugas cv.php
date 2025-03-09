<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $ttl = htmlspecialchars($_POST['ttl']);
    $sma = htmlspecialchars($_POST['SMA']);
    $pendidikan = htmlspecialchars($_POST['pendidikan']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $kontak = htmlspecialchars($_POST['kontak']);
    $sosmed = htmlspecialchars($_POST['sosmed']);
} else {
    header("Location: form_biodata.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil CV</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-900 to-black p-6">
    <div class="w-full max-w-4xl bg-white shadow-2xl rounded-xl overflow-hidden flex flex-col p-10">
        <h1 class="font-semibold text-4xl text-blue-600 text-center">Hasil CV</h1>
        <div class="w-full my-5 text-lg">
            <p><strong>Nama:</strong> <?php echo $nama; ?></p>
            <p><strong>Tempat & Tanggal Lahir:</strong> <?php echo $ttl; ?></p>
            <p><strong>Pendidikan SMA:</strong> <?php echo $sma; ?></p>
            <p><strong>Pendidikan Sekarang:</strong> <?php echo $pendidikan; ?></p>
            <p><strong>Deskripsi Saya:</strong> <?php echo $deskripsi; ?></p>
            <p><strong>Kontak:</strong> <?php echo $kontak; ?></p>
            <p><strong>Instagram:</strong> <a href="https://instagram.com/<?php echo $sosmed; ?>" target="_blank" class="text-blue-600">@<?php echo $sosmed; ?></a></p>
        </div>
        <a href="form_biodata.php" class="block w-full text-center bg-blue-600 text-white font-bold py-3 rounded-lg mt-6 hover:bg-blue-700 transition duration-300">Kembali</a>
    </div>
</body>
</html>
