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
    

<h1><p style="text-align:center; color:white; background-color:#282a35" >===| HALAMAN REGISTRASI |===</p></h1>
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
            <div class="btn-group">
            <li style="list-style:none;">
                <button type="submit" name="register"><b>DAFTAR</b></button>
            </li>
            <li style="list-style:none;">
                <button><a href="login.php"><b>LOGIN</b></button>
            </li>
            </div>
        </ul>

    </form>
</body>
</html>