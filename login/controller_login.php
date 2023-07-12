<?php

include('../app/config.php');

session_start();

$user_user = $_POST['user'];
$password_user = $_POST['password_user'];

//echo $usuario." - ".$password_user;
$email_table = ''; $password_table ='';

$query_login = $pdo->prepare("SELECT * FROM tb_users WHERE email = '$user_user' AND password_user= '$password_user' AND enable_status = '1' ");
$query_login->execute();
$users =$query_login->fetchall(PDO::FETCH_ASSOC);
foreach($users as $user){
    $email_table = $user['email'];
    $password_table = $user['password_user'];
}

if(($user_user == $email_table) && ($password_user == $password_table)){
    ?>
    <div class="alert alert-success" role="alert">
         Usuario Correcto
        </div>
        <script>location.href = "principal.php"</script>
    <?php
    $_SESSION['user_sesion'] = $email_table;
}else{
    ?>
    <div class="alert alert-danger" role="alert">
         Error al introducir sus datos
        </div>
        <script>$('#password').val("");$('#password').focus();</script>
    <?php
}


//if( $user == "jlc.rodriguez@yavirac.edu.ec"){
    ?>
    <!--<div class="alert alert-success" role="alert">
         Usuario Correcto
        </div>
    <?php
//}else{
    ?>
    <div class="alert alert-danger" role="alert">
         Usuario Incorrecto
        </div> -->
    <?php 
//}



?>