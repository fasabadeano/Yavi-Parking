<?php

include ('../app/config.php');


$name_parking = $_GET['name_parking'];
$institute_activity = $_GET['institute_activity'];
$branch = $_GET['branch'];
$a_ddress = $_GET['a_ddress'];
$z_one = $_GET['z_one'];
$phone = $_GET['phone'];
$city = $_GET['city'];
$country = $_GET['country'];
$id_informations = $_GET['id_informations'];


date_default_timezone_set("America/Guayaquil");
$date_hour = date("Y-m-d h:i:s"); //fecha y hora (date_hour)

$sentencia = $pdo->prepare("UPDATE tb_informations SET
name_parking = :name_parking,
institute_activity = :institute_activity,
branch = :branch,
a_ddress = :a_ddress,
z_one = :z_one,
phone = :phone,
city = :city,
country = :country,
date_update = :date_update
WHERE id_informations = :id_informations");

$sentencia->bindParam(':name_parking',$name_parking);
$sentencia->bindParam(':institute_activity',$institute_activity);
$sentencia->bindParam(':branch',$branch);
$sentencia->bindParam(':a_ddress',$a_ddress);
$sentencia->bindParam(':z_one',$z_one);
$sentencia->bindParam(':phone',$phone);
$sentencia->bindParam(':city',$city);
$sentencia->bindParam(':country',$country);
$sentencia->bindParam('date_update',$date_hour);
$sentencia->bindParam('id_informations',$id_informations);

if($sentencia->execute()){
echo 'success';
    ?>
    <script>location.href = "informations.php";</script>
    <?php
}else{
echo 'error al registrar a la base de datos';
}