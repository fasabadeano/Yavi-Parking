<?php

include ('../app/config.php');

$id_rol = $_GET['id_rol'];
$idle_state = "0"; //estado inactivo (idle_state)

date_default_timezone_set("America/Lima");
$date_hour = date("Y-m-d h:i:s"); //fecha y hora (date_hour)

$sentencia = $pdo->prepare("UPDATE tb_roles SET
enable_status = :enable_status, 
elimination = :elimination
WHERE id_rol = :id_rol");

$sentencia->bindParam('enable_status', $idle_state);
$sentencia->bindParam('elimination', $date_hour);
$sentencia->bindParam('id_rol', $id_rol);

if($sentencia->execute()){
    echo "Se elimino el registro";
    ?>
    <script>location.href = "../roles/";</script>
<?php
}else{
    echo "Error al eliminar el registro";
}