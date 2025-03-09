<?php
session_start();

$timeout = 60;

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout)) {
    session_unset();  
    session_destroy(); 
    header("Location: login.php?message=session_expired"); 
    exit();
}

$_SESSION['LAST_ACTIVITY'] = time();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-900 p-6">
    <div class=" bg-red-500 w-lg border-2 rounded-2xl py-6 px-8 shadow-2xl text-white">
        <h1 class="font-semibold text-4xl text-white text-center">BIODATA</h1>
        <div class="w-full my-5 text-lg">
            <form action="cv.php" method="post">
                <div class="pb-5">
                    <label for="nama">Nama</label><br>
                    <input class="w-full bg-transparent border outline-none rounded-2xl text-white py-2 pl-3 pr-3 mt-1" type="text" id="nama" name="nama" required autocomplete="off"><br>
                </div>
                <div class="pb-5">
                    <label for="ttl">Tempat & Tanggal Lahir</label><br>
                    <input class="w-full bg-transparent border outline-none rounded-2xl text-white py-2 pl-3 pr-3 mt-1" type="text" id="ttl" name="ttl" required autocomplete="off"><br>
                </div>
                <div class="pb-5">
                    <label for="SMA">Pendidikan SMA</label><br>
                    <input class="w-full bg-transparent border outline-none rounded-2xl text-white py-2 pl-3 pr-3 mt-1" type="text" id="SMA" name="SMA" required autocomplete="off"><br>
                </div>
                <div class="pb-5">
                    <label for="pendidikan">Pendidikan Sekarang</label><br>
                    <input class="w-full bg-transparent border outline-none rounded-2xl text-white py-2 pl-3 pr-3 mt-1" type="text" id="pendidikan" name="pendidikan" required autocomplete="off"><br>
                </div>
                <div class="pb-5">
                    <label for="deskripsi">Deskripsi Saya</label><br>
                    <input class="w-full bg-transparent border outline-none rounded-2xl text-white py-2 pl-3 pr-3 mt-1" type="text" id="deskripsi" name="deskripsi" required autocomplete="off"><br>
                </div>
                <div class="pb-5">
                    <label for="kontak">Kontak</label><br>
                    <input class="w-full bg-transparent border outline-none rounded-2xl text-white py-2 pl-3 pr-3 mt-1" type="text" id="kontak" name="kontak" required autocomplete="off"><br>
                </div>
                <div class="pb-5">
                    <label for="sosmed">Instagram</label><br>
                    <input class="w-full bg-transparent border outline-none rounded-2xl text-white py-2 pl-3 pr-3 mt-1" type="text" id="sosmed" name="sosmed" required autocomplete="off"><br>
                </div>
                <input class="w-full h-[45px] bg-white text-red-500 rounded-3xl font-bold mt-6 cursor-pointer hover:bg-gray-200" type="submit" name="submit" value="Submit">
            </form>
        </div>
        
        <form method="post">
            <button type="submit" name="logout" class="w-full h-[45px] bg-white text-red-500 rounded-3xl font-bold mt-6 cursor-pointer hover:bg-gray-200">
                Logout
            </button>
        </form>
    </div>
</body>
</html>
