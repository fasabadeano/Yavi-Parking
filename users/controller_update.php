<?php

include ('../app/config.php');
$names = $_GET['names'];
$email = $_GET['email'];
$password_user = $_GET['password_user'];
$id_user = $_GET['id_user'];

date_default_timezone_set("America/Lima");
$date_hour = date("Y-m-d h:i:s");
//echo $names ."-".$email."-".$password_user;

$sentencia = $pdo->prepare("UPDATE tb_users SET
names = :names,
email = :email,
password_user = :password_user,
date_update = :date_update
WHERE id = :id");

$sentencia->bindParam('names', $names);
$sentencia->bindParam('email', $email);
$sentencia->bindParam('password_user', $password_user);
$sentencia->bindParam('date_update', $date_hour);
$sentencia->bindParam('id', $id_user);

if($sentencia->execute()){
    echo "Se actualizo el registro";
    ?>
    <script>location.href = "../users/";</script>
<?php
}else{
    echo "Error al actualizar el registro";
}