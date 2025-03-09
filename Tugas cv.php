<?php
session_start();

if (!isset($_SESSION['cv_data'])) {
    header("Location: login.php");
    exit();
}
$cv = $_SESSION['cv_data'];
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV <?php echo htmlspecialchars($cv['nama']); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }
        .cv-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: auto;
            text-align: left;
        }
        h2 {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="cv-container">
        <h1><?php echo htmlspecialchars($cv['nama']); ?></h1>
        <p><strong>Tempat, Tanggal Lahir:</strong> <?php echo htmlspecialchars($cv['ttl']); ?></p>
        <p><strong>Jenis Kelamin:</strong> <?php echo htmlspecialchars($cv['gender']); ?></p>
        <p><strong>Kontak:</strong> <?php echo htmlspecialchars($cv['kontak']); ?></p>
        <h2>Deskripsi</h2>
        <p><?php echo nl2br(htmlspecialchars($cv['deskripsi'])); ?></p>
        <h2>Pengalaman</h2>
        <p><?php echo nl2br(htmlspecialchars($cv['pengalaman'])); ?></p>
        <h2>Pendidikan</h2>
        <p><?php echo nl2br(htmlspecialchars($cv['pendidikan'])); ?></p>
        <h2>Skill</h2>
        <p><?php echo nl2br(htmlspecialchars($cv['skill'])); ?></p>
    </div>
</body>
</html>
