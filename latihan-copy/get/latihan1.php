<?php // GET PENGIRIM ?>

<?php
$mahasiswa = [
    [
        "nama" => "ajie",
        "nim" => "001"
    ],
    [
        "nama" => "dharma",
        "nim" => "002"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 

<body>
    <h1>DAFTAR MAHASISWA</h1>

<ul>
    <?php foreach ($mahasiswa as $mhs ) : ?>
                <li>
                <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nim=<?= $mhs["nim"]; ?>">
                <?= $mhs["nama"]; ?></a>
                </li>
        <?php endforeach; ?>
</ul>
</body>
</html>