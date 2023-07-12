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
    
      <h2>Actualizacion Usuario</h2>

      <div class="conteiner">
        <div class="row">
            <div class="col-md-6">


            <div class="card card-success" style="border: 1px solid #777777">
            <div class="card-header">
            <h3 class="card-title">Edición del Usuario</h3>
            </div>
            <div class="card-body">
            <div class="form-group">
            <label for="">Nombres</label>
            <input type="text" class="form-control" id="names" value="<?php echo $names;?>">
            </div>
            <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" id="email" value="<?php echo $email;?>">
            </div>
            <div class="form-group">
            <label for="">Contraseña</label>
            <input type="text" class="form-control" id="password_user" value="<?php echo $password_user;?>">
            </div>
            <div class="form-group">
            <button class="btn btn-primary" id="btn_edit">Actualizar</button>
            <a href="<?php echo $URL;?>/users/" class="btn btn-danger">Cancelar</a>
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
    $('#btn_edit').click(function () {
        var names = $('#names').val();
        var email = $('#email').val();
        var password_user = $('#password_user').val();
        var id_user = '<?php echo $id_get = $_GET['id'];?>';
        
        
        if(names == ""){
            alert('Debe de llenar el campo names');
            $('#names').focus();
        }else if(email == ""){
            alert('Debe de llenar el campo de email');
            $('#email').focus();
        }else if(password_user == ""){
            alert('Debe de llenar el campo de password');
            $('#password_user').focus();
        }else{
            var url = 'controller_update.php';
            $.get(url,{names:names, email:email, password_user:password_user, id_user:id_user},function (datos) {
                $('#respuesta').html(datos);
            });
        }
    });
</script>