<?php 
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
     
require 'functions.php';

// ambil data dari url
$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id=$id ")[0];

// apakah tombol sudah ditekan
if (isset($_POST["submit"])) {

    if (ubah($_POST)>0){
        echo "
            <script>
                alert ('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    }else {
        echo "
        <script>
                alert ('data gagal diubah');
                document.location.href = 'index.php';
            </script>
            ";
    }
    echo "<br>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UBAH DATA</title>
</head>
<body>
    <h1>UBAH DATA MAHASISWA</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <ul>
        <li style="list-style:none;">
            <label for="nrp">NRP :</label>
            <input type="text" name="nrp" id="nrp" value="<?= $mhs["nrp"]; ?>" required readonly>
        </li>
        <br>
        <li style="list-style:none;">
            <label for="nama">NAMA :</label>
            <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>" required>
        </li>
        <br>
        <li style="list-style:none;">
            <label for="alamat">ALAMAT :</label>
            <input type="text" name="alamat" id="alamat" value="<?= $mhs["alamat"]; ?>" required>
        </li>
        <br>
        <li style="list-style:none;">
            <button type="submit" name="submit"><b>UBAH DATA</b></button>
        </li>
        <br>
        <li style="list-style:none;">
            <button><a href="index.php"><b>KEMBALI</b></a></button>
        </li>
        </ul>
    </form>
</body>
</html>