<?php
//koneksi ke database mysql,
$koneksi = mysqli_connect("localhost","root","","akademik");
$koneksi_host = "localhost";
$koneksi_user = "root";
$koneksi_pass = "";
$koneksi_name = "akademik";
//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$koneksi_host;dbname=$koneksi_name", $koneksi_user, $koneksi_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}
?>