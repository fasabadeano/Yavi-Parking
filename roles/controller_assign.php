<?php

include('../app/config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$id_user = $_POST['id_user'];
$rol = $_POST['rol'];


date_default_timezone_set("America/Lima");
$fechaHora = date("Y-m-d h:i:s");

$sentencia = $pdo->prepare("UPDATE tb_users SET
rol = :rol
WHERE id = :id");

$sentencia->bindParam(':rol',$rol);
$sentencia->bindParam(':id',$id_user);

if($sentencia->execute()){
    echo "Se asigno el rol de manera correcta";
    ?>
    <script>location.href = "../roles/assign.php";</script>
    <?php
}else{
    echo "error al asignar el rol al usuario";
}