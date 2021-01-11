<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/images/favicon.png" type="image/ico" />

    <title> Informasi Akademik Fakultas Elektro Tel-U </title>
<center><br><br><br><br><br><br><br><br>
<img src="assets/images/telyu.png" width="200px height="200px" /> <br>
<font Size="6" face="Helvetica">Fakultas Teknik Elektro</font> <br>
<font Size="6" face="Helvetica">Telkom University</font>
</center>   
<head>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Akademik</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
        <center><br>
        <font size='4' face="Helvetica">Bergabunglah bersama ribuan orang lainnya...<br>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    
<head>
<style>
table, th, td {
  border: 2px solid black;
  padding: 5px;
  text-align: justify;
}
</style>
</head>
<body>
<form action="" method="POST">
    <table style="width:23.1%">
        <tr>
            <td>
                <div class="form-group">
                    <label for="name">Nama Lengkap&nbsp;</label>
                    <input class="form-control" type="text" name="name" placeholder="Nama kamu" />
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <label for="username">Username&emsp;&emsp;&nbsp;&nbsp;</label>
                    <input class="form-control" type="text" name="username" placeholder="Username" />
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <label for="email">Email&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;</label>
                    <input class="form-control" type="email" name="email" placeholder="Alamat Email" />
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <label for="password">Password&emsp;&emsp;&ensp;&nbsp;</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" />
                </div>
            </td>
        </tr>
    </table>
    <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

</form>
            
        </div>

      

    </div>
</div>

</body>
</html> 