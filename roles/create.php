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
    
      <h2>Crear Nuevo Rol</h2>

      <div class="conteiner">
        <div class="row">
            <div class="col-md-6">
            <div class="card" style="border: 1px solid #606060">
            <div class="card-header" style="background-color: #007bff;color: #ffffff;">
             <h4>Nuevo Rol</h4>
            </div>
           <div class="card-body">
              <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control" id="name_rol">
              </div>
              <div class="form-group">
                <button class="btn btn-primary" id="btn_save">Guardar</button>
                <a href="<?php echo $URL;?>/roles/" class="btn btn-danger">Cancelar</a>
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
    $('#btn_save').click(function(){
        var name_rol = $('#name_rol').val();
        

        if(name_rol == ""){
            alert('Debe de llenar el campo nombre');
            $('#name_rol').focus();
        }else{
            var url = 'controller_create.php';
            $.get(url , {name_rol:name_rol }, function(datos){
            $('#respuesta').html(datos);
            });
        }

    });
</script>