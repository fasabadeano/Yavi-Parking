<?php

include ('../app/config.php');

$id_informations = $_GET['id_informations'];
$idle_state = "0"; //estado inactivo (idle_state)

date_default_timezone_set("America/Lima");
$date_hour = date("Y-m-d h:i:s"); //fecha y hora (date_hour)

$sentencia = $pdo->prepare("UPDATE tb_informations SET
enable_status = :enable_status, 
elimination = :elimination
WHERE id_informations = :id_informations");

$sentencia->bindParam('enable_status', $idle_state);
$sentencia->bindParam('elimination', $date_hour);
$sentencia->bindParam('id_informations', $id_informations);

if($sentencia->execute()){
    echo "Se elimino el registro";
    ?>
    <script>location.href = "informations.php";</script>
<?php
}else{
    echo "Error al eliminar el registro";
}