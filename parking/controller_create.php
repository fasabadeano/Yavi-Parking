<?php

include ('../app/config.php');

$nro_space = $_GET['nro_space'];
$state_space = $_GET['state_space'];
$observation = $_GET['observation'];

//echo $nro_space."-".$state_space."-".$observation;

date_default_timezone_set("America/Guayaquil");
$date_hour = date("Y-m-d h:i:s"); //fecha y hora (date_hour)

$sentencia = $pdo->prepare ( "INSERT INTO tb_mappings
        (nro_space, state_space, observation, created, enable_status) 
 VALUES (:nro_space, :state_space, :observation, :created, :enable_status)");

$sentencia->bindParam('nro_space', $nro_space);
$sentencia->bindParam('state_space', $state_space);
$sentencia->bindParam('observation', $observation);
$sentencia->bindParam( 'created', $date_hour);
$sentencia->bindParam( 'enable_status', $registration_enable);

if($sentencia->execute()){
    echo "Registro satisfactorio";
    ?>
    <script>location.href = "vehicle_mapping.php";</script>
<?php
}else{
    echo "Error al registrar";
}