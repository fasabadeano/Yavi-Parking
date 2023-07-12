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
    
      <h2>Eliminacion de Rol</h2>

      <?php
        $id_rol = $_GET['id'];
        $query_roles = $pdo->prepare("SELECT * FROM tb_roles WHERE id_rol = '$id_rol' AND enable_status = '1' ");
        $query_roles->execute();
        $roles =$query_roles->fetchall(PDO::FETCH_ASSOC);
        foreach($roles as $rol){
            $id_rol = $rol['id_rol'];
            $name_rol = $rol['name_rol'];
            
          }
        ?>


      <div class="conteiner">
        <div class="row">
            <div class="col-md-6">
            <div class="card" style="border: 1px solid #606060">
            <div class="card-header" style="background-color: #d92005;color: #ffffff;">
             <h4>Rol a Eliminar</h4>
            </div>
           <div class="card-body">
              <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control" id="name_rol" value="<?php echo $name_rol; ?>" disabled>
              </div>
              <div class="form-group">
                <button class="btn btn-danger" id="btn_delete">Eliminar</button>
                <a href="<?php echo $URL;?>/roles/" class="btn btn-secondary">Cancelar</a>
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
    $('#btn_delete').click(function(){
        var id_rol = '<?php echo $id_rol?>';
        

        
            var url = 'controller_delete.php';
            $.get(url , {id_rol:id_rol }, function(datos){
            $('#respuesta').html(datos);
            });
        

    });
</script>