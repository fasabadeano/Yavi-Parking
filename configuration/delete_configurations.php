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
    
      <h2>Eliminación de la información</h2>
      <br>

      <div class="row">
        <div class="col-md-12">
        
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title" _msttexthash="318864" _msthash="234">¿Estas seguro que quieres eliminar este registro? </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>

              <?php
                $id_informations_get = $_GET['id'];
                $query_informations = $pdo->prepare("SELECT * FROM tb_informations WHERE enable_status = '1'  AND id_informations = '$id_informations_get'");
                $query_informations->execute();
                $informations =$query_informations->fetchall(PDO::FETCH_ASSOC);
                foreach($informations as $information){
                    $id_informations = $information['id_informations'];
                    $name_parking = $information['name_parking'];
                    $institute_activity = $information['institute_activity'];
                    $branch = $information['branch'];
                    $a_ddress = $information['a_ddress'];
                    $z_one = $information['z_one'];
                    $phone = $information['phone'];
                    $city = $information['city'];
                    $country = $information['country'];

                }
                ?>




              <!-- /.card-header -->
              <div class="card-body" _msttexthash="415961" _msthash="235">
              <div class="row">
                <div class="col-md-5">
                  <label for="">Nombre del parqueo <span style="color: red "><b></b></span></label>
                  <input type="text" class="form-control" id="name_parking" value="<?php echo $name_parking; ?>" disabled>
                </div>
                <div class="col-md-5">
                  <label for="">Actividad del Instituto </label>
                  <input type="text" class="form-control" id="institute_activity" value="<?php echo $institute_activity; ?>" disabled>
                </div>
                <div class="col-md-2">
                  <label for="">Sucursal </label>
                  <input type="text" class="form-control" id="branch" value="<?php echo $branch; ?>" disabled>
                </div>
              </div>  
              <div class="row">
                <div class="col-md-6">
                  <label for="">Dirección </label>
                  <input type="text" class="form-control" id="a_ddress" value="<?php echo $a_ddress; ?>" disabled>
                </div>
                <div class="col-md-6">
                  <label for="">Zona </label>
                  <input type="text" class="form-control" id="z_one" value="<?php echo $z_one; ?>" disabled>
                </div>
              </div>            
              <div class="row">
                <div class="col-md-4">
                  <label for="">Teléfono </label>
                  <input type="text" class="form-control" id="phone" value="<?php echo $phone; ?>" disabled>
                </div>
                <div class="col-md-4">
                  <label for="">Ciudad </label>
                  <input type="text" class="form-control" id="city" value="<?php echo $city; ?>" disabled>
                </div>
                <div class="col-md-4">
                  <label for="">País </label>
                  <input type="text" class="form-control" id="country" value="<?php echo $country; ?>" disabled>
                </div>
              </div>     
              <hr>
              <div class="row">
                <div class="col-md-6">
                    <a href="informations.php" class="btn btn-danger btn-block">Cancelar</a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger btn-block" id="btn_delete_information">
                        Eliminar
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
    $('#btn_delete_information').click(function(){
       
      var id_informations = '<?php echo $id_informations_get; ?>';

        
            var url = 'controller_delete_informations.php';
            $.get(url , {id_informations:id_informations}, function(datos){
            $('#respuesta').html(datos);
            });
        

    });
</script>