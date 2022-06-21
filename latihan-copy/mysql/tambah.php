<?php 
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

require 'functions.php';

// apakah tombol sudah ditekan
if (isset($_POST["submit"])) {

    //cek kerberhasilan
    if (tambah($_POST)>0){
        echo "
        <script>
            alert ('data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script> 
        ";
    } else {
    echo "
    <script>
            alert ('data gagal ditambahkan');
            document.location.href = 'index.php';
        </script> ";
    }
        echo "<br>";
    
    echo mysqli_error($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH DATA</title>
</head>
<body>
    <h1>TAMBAH DATA MAHASISWA</h1>
    <form action="" method="post">
        <li>
            <label for="nrp">NRP :</label>
            <input type="text" name="nrp" id="nrp" required></input>
        </li>
        <br>
        <li>
            <label for="nama">NAMA :</label>
            <input type="text" name="nama" id="nama" required></input>
        </li>
        <br>
        <li>
            <label for="alamat">ALAMAT :</label>
            <input type="text" name="alamat" id="alamat" required></input>
        </li>
        <br>
        <li>
            <button type="submit" name="submit">SIMPAN</button>
        </li>
    </form>
</body>
</html>