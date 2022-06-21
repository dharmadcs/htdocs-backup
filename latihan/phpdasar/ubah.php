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
    
<h1><p style="text-align:center; color:white; background-color:#282a35" >===| UBAH DATA MAHASISWA |===</p></h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <div class="btn-group">
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
        <li style="list-style:none;">
            <button><a href="index.php"><b>KEMBALI</b></buttona>
        </li>
        </ul>
        </div>
        
    </form>
</body>
</html>