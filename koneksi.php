<?php
$db_user = "root";
$db_pass = "";
$db_name = "rs_asih";

$koneksi = new mysqli("localhost", $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
    echo "Koneksi gagal : " . mysqli_connect_error();
}

// if($koneksi){
//     echo "Berhasil";
// }else{
//     echo "gagal";
// }