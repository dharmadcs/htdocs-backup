<?php 

    // koneksi ke database
    $conn = mysqli_connect("sql313.epizy.com", "epiz_31867956", "12t9vzTaLcA0o", "phpdasar");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function hapus($id){
        global $conn;

        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
        return mysqli_affected_rows($conn);
    }


    function tambah($data){
        global $conn;
        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);

        $query = "INSERT INTO mahasiswa 
                   VALUES
                   ('','$nrp','$nama','$alamat')
                   ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);

    }

    function ubah($data){
        global $conn;
        $id = $data["id"];
        $nrp = htmlspecialchars($data["nrp"]);
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);

        $query = "UPDATE mahasiswa SET
                    nrp = '$nrp',
                    nama = '$nama',
                    alamat = '$alamat'
                    WHERE id=$id
                    ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);

    }

    function cari($keyword){
        $query = "SELECT * FROM mahasiswa 
                    WHERE 
        nama LIKE '%$keyword%' OR
        alamat LIKE '%$keyword%' OR
        nrp LIKE '%$keyword%'
        ";
        return query($query) ;
    }
 

    function registrasi($data){
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        // cek username sudah ada atau belum
            $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

            if (mysqli_fetch_assoc($result)>0){
                echo "<script>
                        alert ('username sudah terdaftar!')
                    </script>";

                    return false;
            }

        // cek kesamaan konfirmasi password
            if ($password !== $password2){
                echo "
                <script> alert('konfirmasi password tidak sesuai')</script>
                ";
            return false;
            }
        
        // enskripsi password
            $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan userbaru ke database
            mysqli_query($conn, "INSERT INTO user VALUES ('','$username', '$password') ");

            return mysqli_affected_rows($conn);

        }

?>