<?php 

class Contoh{
    public static $angka = 1;

    public static function cetak(){
        return self::$angka++ ;
    }
}

$obj = new Contoh;
$obj2 = new Contoh;
echo $obj->cetak();
echo $obj->cetak();
echo $obj->cetak();

echo "<hr>";

echo $obj2->cetak();
echo $obj2->cetak();
echo $obj2->cetak();






?>