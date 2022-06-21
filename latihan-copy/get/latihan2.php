<?php // GET PENANGKAP ?>

<?php 
    // redirect !isset (belum ada data dikirim) maka balikan
    if (!isset ($_GET["nama"]) ||
        !isset ($_GET["nim"])) {
            
        //redirectnya
        header("Location: latihan1.php");
    exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA MAHASISWA</title>
</head>
<body>
    <ul>
        <li><?= $_GET["nama"]; ?></li>
        <li><?= $_GET["nim"]; ?></li>
    </ul>

<a href="latihan1.php">KEMBALI</a>
</body>
</html>