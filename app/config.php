<?php

define('SERVER','localhost');
define('USER','root');
define('PASSWORD','');
define('BD','parking');

$server = "mysql:dbname=".BD."; host=".SERVER;

try{
    $pdo = new PDO($server,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "La conexion es exitosa";
}catch(PDOException $e){
    //echo "Error de conexion";
    echo "<script>alert('Error a la base de datos');</script>";
}

$URL = "http://localhost/www.sistemaparqueo.com";

$registration_enable = "1";


?>