<?php
// $pass = password_hash('jewepe123', PASSWORD_DEFAULT);
// var_dump($pass);
// die;

include("admin/koneksi.php");
$db = new database();
//Mulai session
session_start();

//cek session aktif
if (isset($_SESSION["username"]) || isset($_SESSION["id_users"])) {
    header('location:admin/index.php');
}else{
    // CEK APAKAH MELAKUKAN SUBMIT
    if(isset($_POST['submit'])){
        //Menghilangkan Backshlases
        $username = stripslashes($_POST['username']);
        $password = stripslashes($_POST['password']);

        //cek nilai username password apakah kosong?
        if(!empty(trim($username)) && !empty(trim($password))) {
            //Select data tb_users berdasarkan username

            $query = $db->get_data_users($username);

            if($query){
                $rows = mysqli_num_rows($query);
            }else {
                $rows = 0;
            }
            if ($rows != 0) {
                $getData = $query->fetch_assoc();

                if(password_verify($password, $getData['password'])){

                    $_SESSION['username'] = $username;
                    $_SESSION['id_users'] = $getData['id_users'];

                    header('location: admin/index.php');
                }else {
                    header("location:login.php?pesan=gagal");
                }
            }else {
                header("location:login.php?pesan=not found");
            }
        }else {
            header("location:login.php?pesan=empty");
        }

    }else {
        header("location:login.php?pesan=empty");
    }
}

?>