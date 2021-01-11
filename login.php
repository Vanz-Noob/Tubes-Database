<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: index.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Akademik</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
        <center><br>
        <font size='4' face="Helvetica">Masuk ke Akademik<br>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>

        <html>
<head>
<style>
table, th, td {
  border: 2px solid black;
  padding: 5px;
  text-align: justify;
  border-spacing: 5px;

}
</style>
</head>
<body>
<form action="" method="POST">
    <table style="width:20%">
        <tr>
            <td>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Username atau email" />
                </div>
            </td>
            
        </tr>
        <tr>
            <td>
                <div class="form-group">
                    <label for="password">Password&nbsp;</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" />
                </div>
            </td>
        </tr>
    </table>
    <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />

</form>
            

        <div class="col-md-6">
            <!-- isi dengan sesuatu di sini -->
        </div>

    </div>
</div>
    
</body>
</html>