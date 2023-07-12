<?php

include ('../app/config.php');
$name_rol = $_GET['name_rol'];


date_default_timezone_set("America/Lima");
$date_hour = date("Y-m-d h:i:s");


//echo $names ."-".$email."-".$password_user;

$sentencia = $pdo->prepare ( "INSERT INTO tb_roles
        (name_rol, created, enable_status) 
 VALUES (:name_rol, :created, :enable_status)");

 $sentencia->bindParam( 'name_rol', $name_rol);
 $sentencia->bindParam( 'created', $date_hour);
 $sentencia->bindParam( 'enable_status', $registration_enable);
 
 if($sentencia->execute()){
    echo "Registro satisfactorio";
    //header('index.php');
    ?>
    <script>location.href = "../roles/";</script>
<?php
 }else{
    echo "No se pudo registrar a la base de datos";
 }