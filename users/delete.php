<?php 
include('../app/config.php');
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

        <?php
            $id_get = $_GET['id'];
            $query_user = $pdo->prepare("SELECT * FROM tb_users WHERE id = '$id_get' AND enable_status = '1' ");
            $query_user->execute();
            $users = $query_user->fetchAll(PDO::FETCH_ASSOC);
            foreach($users as $user) {
                $id = $user['id'];
                $names = $user['names'];
                $email = $user['email'];
                $password_user = $user['password_user'];
            }
        ?>
    
      <h2>Eliminacion Usuario</h2>

      <div class="conteiner">
        <div class="row">
            <div class="col-md-6">


            <div class="card card-danger" style="border: 1px solid #777777">
            <div class="card-header">
            <h3 class="card-title">Datos a Eliminar</h3>
            </div>
            <div class="card-body">
            <div class="form-group">
            <label for="">Nombres</label>
            <input type="text" class="form-control" id="names" value="<?php echo $names;?>" disabled>
            </div>
            <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" id="email" value="<?php echo $email;?>" disabled>
            </div>
            <div class="form-group">
            <label for="">Contraseña</label>
            <input type="text" class="form-control" id="password_user" value="<?php echo $password_user;?>" disabled>
            </div>
            <div class="form-group">
            <button class="btn btn-danger" id="btn_delete">Eliminar</button>
            <a href="<?php echo $URL;?>/users/" class="btn btn-secondary">Cancelar</a>
            </div>
            <div id="respuesta">
            </div>
            </div>
            </div>


            
            </div>
            <div class="col-md-6"></div>
        </div>
      </div>
   
  </div>


  </div>
  <?php include('../layout/admin/footer.php');?>
</div>
<?php include('../layout/admin/footer_link.php');?>
</body>
</html>

<script>
    $('#btn_delete').click(function () {
        
        var id_user = '<?php echo $id_get = $_GET['id'];?>';
        
            var url = 'controller_delete.php';
            $.get(url,{id_user:id_user},function (datos) {
                $('#respuesta').html(datos);
            });
        
    });
</script>