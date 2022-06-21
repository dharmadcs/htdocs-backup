<?php 

class Produk {

    // buat $ property
    private $judul,
            $pengarang,
            $penerbit,
            $harga,
            $diskon = 0;


    // isikan nilai default di () construct
    public function __construct($judul="judul", $pengarang="pengarang", $penerbit="penerbit", $harga=0){
        

    // globalkan varibel tersebut
    $this->judul = $judul;
    $this->pengarang = $pengarang;
    $this->penerbit = $penerbit;
    $this->harga = $harga;

    }

    // setter yg diakses dari luar class
    public function setJudul($judul){
        if (!is_string($judul)){
            throw new Exception("Judul Harus String");
        }
        $this->judul = $judul;
    }

    // getter untuk ambil data dari luar class
    public function getJudul(){
        return $this->judul;
    }

    public function setDiskon($diskon){
        $this->diskon = $diskon;
    }

    public function getDiskon(){
        return $this->diskon;
    }
    
    public function setHarga($harga){
        $this->harga = $harga;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon/100);
    }

    // public function setHarga($harga){
    //     $this->harga = 
    // }

    // buat sebuah function
    public function getLabel(){
        return "$this->pengarang, $this->penerbit";
    }

    // function cetak info produk
    public function getInfoProduk(){
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }

}

class Komik extends Produk {
    // tambahkan property yang berbeda dg parent
    public $jmlHalaman;

    // construct ulang parent dan tambahkan property yang berbeda
    public function __construct($judul="judul", $pengarang="pengarang", $penerbit="penerbit", $harga=0, $jmlHalaman=0){
        
        // panggil construct milik parent tapi kosongkan property yang berbeda
        // sama saja dg $this->
        parent::__construct($judul, $pengarang, $penerbit, $harga);
        // $this->judul = $judul;
        // $this->pengarang = $pengarang;
        // $this->penerbit = $penerbit;
        // $this->harga = $harga;


        // globalkan property.nya
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk(){
        $str = "Komik :  ". parent::getInfoProduk() ." - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}


class Game extends Produk {
    public $waktuMain;

    public function __construct($judul="judul", $pengarang="pengarang", $penerbit="penerbit", $harga=0, $waktuMain=0){
        
        parent::__construct($judul, $pengarang, $penerbit, $harga);

        $this->waktuMain = $waktuMain;
    }

    public function getInfoProduk(){
        $str = "Game :  ". parent::getInfoProduk()." ~ {$this->waktuMain} Jam.";
        return $str;
    }
}

class CetakInfoProduk {

    public $daftarProduk = [];

    public function tambahProduk(Produk $produk){
        $this->daftarProduk[] = $produk;
    }    


    // $ produk(adalah sebuah objek) sbg parameter
    // isi function untuk ambil data dari $produk ( -> )
    // agar class ini hanya menerima class Produk , maka tambahkan Produk di parameternya
    public function cetak(){
        $str = "DAFTAR PRODUK : <br>";

        foreach ($this->daftarProduk as $p) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }

        return $str;

    }

}

// instance objek dari class
$produk1 = new Komik("Naruto", "Masashi Kisimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted","Murdock", "Sony Computer", 250000, 50);



// $cetakProduk instace dari class CetakInfoProduk
$cetakProduk = new CetakInfoProduk(); 


// suruh instance.nya jalankan method dg parameter (objek) produknya
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

// perintahkan instance.nya jalakan method cetak();

echo $cetakProduk->cetak();






















// $cetakk = new Game();

?>

<!-- // cara panggil function dengan ( $ -> nama_function)  // -->





<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR PRODUK</title>
</head>
<body>
    <h1><u>DAFTAR PRODUK</u></h1>
    <h3>
    <b>
    <?= $produk1->getInfoProduk(); ?>
    <br>
    <?= $produk2->getInfoProduk(); ?>
    <br>
    <hr>
    <?= $produk1->setJudul("JUDUL BARUUU");
        echo $produk1->getJudul();
     ?>
     <hr>
     <?= $produk2->setDiskon(50); 
        echo $produk2->getHarga();
     ?>
    </b>
    </h3>
    <hr>

</body>
</html> -->