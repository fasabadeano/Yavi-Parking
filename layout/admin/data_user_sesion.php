<?php


session_start();
if(isset($_SESSION['user_sesion'])){
    $user_sesion = $_SESSION['user_sesion'];

    $query_user_sesion = $pdo->prepare("SELECT * FROM tb_users WHERE email = :user_sesion AND enable_status = '1' ");
    $query_user_sesion->bindParam(':user_sesion', $user_sesion);
    $query_user_sesion->execute();
    $users_sesions = $query_user_sesion->fetchAll(PDO::FETCH_ASSOC);
    foreach($users_sesions as $users_sesion){
        $id_user_sesion = $users_sesion['id'];
        $names_sesion = $users_sesion['names'];
        $email_sesion= $users_sesion['email'];
        $rol_sesion= $users_sesion['rol'];
    }
     
    
}else{
    echo "Para ingresar a esta plataforma inicie sesion";
}
//echo "Bienvenido Administrador";
?>



