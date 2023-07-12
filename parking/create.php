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
    
      <h2>CREACION DE ESPACIOS</h2>
      <br>

      <div class="row">
        <div class="col-md-6">
        
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title" _msttexthash="318864" _msthash="234">Llenar todos los campos</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" _msttexthash="415961" _msthash="235">

              <div class="row">
                <div class="col-md-6">
                    <div class="form group">
                        <label for="">Nro Espacio</label>
                        <input type="number" id="nro_space" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form group">
                        <label for="">Estado</label>
                        <select name="" id="state_space" class="form-control">
                            <option value="LIBRE">LIBRE</option>
                        </select>
                    </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <label for="">Observaciones</label>
                        <textarea name="" id="observation" cols="30" class="form-control" rows="5"></textarea>
                    </div>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col-md-6">
                    <a href="" class="btn btn-danger btn-block">Cancelar</a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block" id="btn_register">
                        Registrar
                    </button>
                </div>
              </div>

              <div id="respuesta">

              </div>

            </div>
            
          </div>
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
    $('#btn_register').click(function(){
        var nro_space = $('#nro_space').val(); 
        var state_space = $('#state_space').val(); 
        var observation = $('#observation').val();
        

        if(nro_space == ""){
            alert('Debe de llenar el campo numero de espacio');
            $('#nro_space').focus();
        }else{
            var url = 'controller_create.php';
            $.get(url , {nro_space:nro_space, state_space:state_space, observation:observation}, function(datos){
            $('#respuesta').html(datos);
            });
        }

    });
</script>