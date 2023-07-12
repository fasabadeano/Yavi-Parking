<?php include('../app/config.php');
include('../layout/admin/data_user_sesion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('../layout/admin/head.php');?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include('../layout/admin/menu.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <br> 
  <div class="container">
    
      <h2>Listado de Usuarios</h2>
      <br>
      <table class= "table table-bordered table-sm table-striped">
        <th><center>Nro</center></th>
        <th>Nombre Usuario</th>
        <th>Email</th>
        <th><center>Accion</center></th>
        
        
        <?php
        $contador = 0;
        $query_user = $pdo->prepare("SELECT * FROM tb_users WHERE enable_status = '1' ");
        $query_user->execute();
        $users =$query_user->fetchall(PDO::FETCH_ASSOC);
        foreach($users as $user){
            $id = $user['id'];
            $names = $user['names'];
            $email = $user['email'];
            $contador = $contador + 1;

        ?>
          <tr>
          <td><center><?php echo $contador;?></center></td> 
          <td><?php echo $names;?></td>
          <td><?php echo $email;?></td>
          <td>
            <center>
            <a href="update.php?id=<?php echo $id; ?>"class="btn btn-success">Editar</a>
            <a href="delete.php?id=<?php echo $id; ?>"class="btn btn-danger">Borrar</a>
            </center>
            
          </td>
        </tr>
        <?php
        }

        ?>

      </table>
   
  </div>


  </div>
  <?php include('../layout/admin/footer.php');?>
</div>
<?php include('../layout/admin/footer_link.php');?>
</body>
</html>