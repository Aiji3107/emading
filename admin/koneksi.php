<?php
    // class database{
    //     var $host = "localhost";
    //     var $username = "root";
    //     var $password = "";
    //     var $database = "db_mading";
    //     var $koneksi = "";

    //     function __construct(){
    //         $this->koneksi = mysqli_connect($this->host,$this->username,$this->password, $this->database);

    //         if (mysqli_connect_errno()) {
    //             echo "Koneksi database Gagal : ". mysqli_connect_error();
    //         } else{
    //             echo "koneksi berhasil";
    //         }
            
    //     }

    //     //Get Data tb_users
    //     function get_data_users($username){
    //         $data = mysqli_query($this->koneksi, "SELECT * FROM tb_users
    //         WHERE username = '$username'");

    //         return $data;
    //     }
    // }
    $host = "localhost";
    $username = "root";
    $password = "NO";
    $database = "db_mading";
    
    $conn = mysqli_connect($host, $username, $password, $database);

    if ($conn) {
        echo "Oke terkoneksi";
    }else{
        echo "koneksi gagal";
    }
?>