<?php

include ('../app/config.php');

$id_user = $_GET['id_user'];
$idle_state = "0"; //estado inactivo (idle_state)

date_default_timezone_set("America/Lima");
$date_hour = date("Y-m-d h:i:s"); //fecha y hora (date_hour)

$sentencia = $pdo->prepare("UPDATE tb_users SET
enable_status = :enable_status, 
elimination = :elimination
WHERE id = :id");

$sentencia->bindParam('enable_status', $idle_state);
$sentencia->bindParam('elimination', $date_hour);
$sentencia->bindParam('id', $id_user);

if($sentencia->execute()){
    echo "Se elimino el registro";
    ?>
    <script>location.href = "../users/";</script>
<?php
}else{
    echo "Error al eliminar el registro";
}