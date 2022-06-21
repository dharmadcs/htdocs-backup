<?php 
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    require 'functions.php';

    // pagination

    //konfigurasi
    $jumlahDataPerHalaman = 3;
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    
    // $halamanAktif pake ternary
    // tanda (?) jika kondisi true, tanda (:) jika kodisi false
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

    // if (isset($_GET["halaman"])){
    //     $halamanAktif = $_GET["halaman"];
    //     } else {
    //         $halamanAktif = 1;
    //     }

    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    // batasi data yang tampil
    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");


    // $usertampil = query("SELECT FROM mahasiswa WHERE nama=");

    if (isset($_POST["cari"])){
        $mahasiswa = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ADMIN</title>


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
    <h1><p style="text-align:center; color:white; background-color:#282a35" >===| DAFTAR MAHASISWA |===</p></h1>
    <div class="btn-group"><button><a href="tambah.php"><b>TAMBAH DATA</b></a></button></div>
    <br>
    <br>
    
    <form action="" method="post">
        <input type="text" name="keyword" autofocus autocomplete="off" placeholder="masukan keyword">
        <button type="submit" name="cari"><b>CARI</b></button>
    </form>

    <br>
    <!-- navigasi -->

    <?php if($halamanAktif > 1) :?>
            <a href="?halaman=<?= $halamanAktif - 1?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif ) : ?> 
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
            <?php else : ?>
                <a href="?halaman=<?= $i; ?>"><?= $i;?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman) :?>
            <a href="?halaman=<?= $halamanAktif + 1?>">&raquo;</a>
    <?php endif; ?>

    <!-- akhir navigasi -->

    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Alamat</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda yakin menghapus data?');">hapus</a>
            </td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["alamat"]; ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>
    <br>
    <div class="btn-group"><button><a href="logout.php"><b>LOGOUT</b></button></div>
    
</body>
</html>