<?php 

function cari ($keyword) {
$query = "SELECT * FROM mahasiswa 
    WHERE
    nama LIKE '%$keyword%' 
    ";

    return query ($query);
}

?>