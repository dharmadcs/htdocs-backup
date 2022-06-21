<?php 
session_start();
require 'functions.php';

    // cek ada cookie tidak?
    if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id=$id");

    // $row isinya cuma username
    $row = mysqli_fetch_assoc($result);


    // cek cookie dan username
    // bandingkan $key yg sudah diacak dengan $row(username) yang diacak juga
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }

    // jika SESSION true maka boleh lanjut
    if (isset($_SESSION["login"])) {
        header("Location : index.php");
        exit;
}
}

if (isset($_POST["login"])){

    // tangkep dlu data username dan password
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek username adakah di database
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

    // cek apakah ada baris yang dikembalikan
    if (mysqli_num_rows($result)=== 1 ){

        // cek password
        $row = mysqli_fetch_assoc($result);

        // cek kesamaan password
        if (password_verify($password, $row["password"])){

            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST["remember"])){

                // buat 2 cookie yaitu id dan key
                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }

            // arahkan ke index
            header("Location: index.php");
            exit;
        }
    }
        $error = true;
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN LOGIN</title>

    <style>

body {
  background-image: url('bggg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

.btn-group button {
  background-color: #4CAF50; /* background hijau */
  border: 1px solid green; /* border hijau */
  color: white; /* teks putih */
  padding: 5px 7px; /* padding */
  cursor: pointer; /* ikon Pointer/hand */
  float: left; /* Letakkan tombol secara berdampingan */
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; /* Mencegah border ganda */
}

/* Tambahkan warna background saat mengarahkan kursor */
.btn-group button:hover {
  background-color: #3e8e41;
}
</style>

</head>
<body>
<h1><p style="text-align:center; color:white; background-color:#282a35" >===| HALAMAN LOGIN |===</p></h1>

        <?php if (isset($error)) : ?>
                <h3><p style="color:red; font-style:italic;">password/username salah!</p></h3>
            <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li style="list-style:none;">
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" required autocomplete="off" autofocus>
            </li><br>
            <li style="list-style:none;">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required autocomplete="off">
            </li><br>
            <li style="list-style:none;">
                 <input type="checkbox" name="remember" id="remember">
                 <label for="remember">Remember Me!</label>
            </li><br>
            <div class="btn-group">
            <li style="list-style:none;">
            <button type="submit" name="login"><b>LOGIN</b></button>
            <button><a href="registrasi.php"><b>DAFTAR BARU</b></button>
            </li>
        </ul>
    </form>
</body>
</html>