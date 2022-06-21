<?php 
require 'functions.php';

if (isset($_POST["register"])){
    
    if (registrasi($_POST)>0){
        echo"
            <script>
                alert ('user baru berhasil ditambahkan');
                document.location.href='login.php'
            </script>";

    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRASI</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    <h1>HALAMAN REGISTRASI</h1>
    <br>
    <form action="" method="post">
        <ul>
            <li style="list-style:none;">
                <label for="nama"> Username :</label>
                <input type="text" name="username" id="name" required autocomplete="off">
            </li><br>
            <li style="list-style:none;">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required autocomplete="off">
            </li><br>
            <li style="list-style:none;">
                <label for="password2">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2" required autocomplete="off">
            </li><br>
            <li style="list-style:none;">
                <button type="submit" name="register"><b>REGISTRASI</b></button>
            </li><br>
            <li style="list-style:none;">
                <button><a href="login.php"><b>LOGIN</b></button>
            </li>
        </ul>
    </form>
</body>
</html>