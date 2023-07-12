<?php

include ('../app/config.php');
$names = $_GET['names'];
$email = $_GET['email'];
$password_user = $_GET['password_user'];

date_default_timezone_set("America/Lima");
$date_hour = date("Y-m-d h:i:s");


//echo $names ."-".$email."-".$password_user;

$sentencia = $pdo->prepare ( "INSERT INTO tb_users
        (names, email, password_user, created, enable_status) 
 VALUES (:names, :email, :password_user, :created, :enable_status)");

 $sentencia->bindParam( 'names', $names);
 $sentencia->bindParam( 'email', $email);
 $sentencia->bindParam( 'password_user', $password_user);
 $sentencia->bindParam( 'created', $date_hour);
 $sentencia->bindParam( 'enable_status', $registration_enable);
 
 if($sentencia->execute()){
    echo "Registro satisfactorio";
    //header('index.php');
    ?>
    <script>location.href = "../roles/assign.php";</script>
<?php
 }else{
    echo "No se pudo registrar a la base de datos";
 }