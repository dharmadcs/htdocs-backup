<?php 

    //cek submit sudah ditekan?
    if (isset($_POST["submit"])) {
    //cek username dan password
    if ($_POST["username"] == "admin" && $_POST["password"] == "admin") {
    //jika benar, redirect ke admin.php
        header("Location : admin.php");
        exit;
        } else {
    //jika salah, tampilkan pesan kesalahan
            $error = true;
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN LOGIN</title>
</head>
<body>
<h1>HALAMAN LOGIN</h1>

<?php if(isset($error)) : ?>
    <p>password/username yang anda masukan salah !!!</p>
<?php endif; ?>

    <ul>
    <form action="" method="post">
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">
        </li>
        <br>
        <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password">
        </li>
        <br>
        <button type="submit" name="submit">LOGIN</button>
    </form>
    </ul>
</body>
</html>