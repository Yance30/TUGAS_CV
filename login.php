<?php
session_start();

$error = isset($_SESSION['error']) ? $_SESSION['error'] : "";
unset($_SESSION['error']);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Username tidak valid!";
        header("Location: login.php");
        exit();
    } else {
        $domain = "@" . explode("@", $username)[1];

        if ($password === $domain) {
            $_SESSION['username'] = $username;
            header("Location: form.php");
            exit();
        } else {
            $_SESSION['error'] = "Password salah!";
            header("Location: login.php"); 
            exit();
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-900">
  <div class="bg-red-500 w-[420px] border-2 rounded-2xl py-6 px-8 shadow-2xl text-white">
    <h2 class="text-4xl text-center font-bold">Login Form</h2>

    <!-- Tampilkan error jika ada -->
    <?php if ($error): ?>
        <p class="text-white bg-red-600 p-2 rounded mt-3 text-center"><?php echo $error; ?></p>
    <?php endif; ?>

    <div class="w-full my-5 text-lg">
        <form action="login.php" method="post">
            <label for="username" class="block font-semibold">Username</label>
            <input class="w-full bg-transparent border outline-none rounded-2xl text-white py-2 pl-3 pr-3 mt-1" type="text" id="username" name="username" placeholder="example@gmail.com" autocomplete="off" required>

            <label for="password" class="block font-semibold mt-3">Password</label>
            <input class="w-full bg-transparent border outline-none rounded-2xl text-white py-2 pl-3 pr-3 mt-1" type="password" id="password" name="password" placeholder="*******" autocomplete="off" required>

            <input class="w-full h-[45px] bg-white text-red-500 rounded-3xl font-bold mt-6 cursor-pointer hover:bg-gray-200" type="submit" name="login" value="Login">
        </form>
    </div>
  </div>
</body>
</html>
