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
    
      <h2>Creación de una nueva Información</h2>
      <br>

      <div class="row">
        <div class="col-md-12">
        
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title" _msttexthash="318864" _msthash="234">Registre los datos con sumo cuidado</h3>

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
                <div class="col-md-5">
                  <label for="">Nombre del parqueo <span style="color: red "><b>*</b></span></label>
                  <input type="text" class="form-control" id="name_parking" >
                </div>
                <div class="col-md-5">
                  <label for="">Actividad del Instituto <span style="color: red "><b>*</b></span></label>
                  <input type="text" class="form-control" id="institute_activity">
                </div>
                <div class="col-md-2">
                  <label for="">Sucursal <span style="color: red "><b>*</b></span></label>
                  <input type="text" class="form-control" id="branch">
                </div>
              </div>  
              <div class="row">
                <div class="col-md-6">
                  <label for="">Dirección <span style="color: red "><b>*</b></span></label>
                  <input type="text" class="form-control" id="a_ddress">
                </div>
                <div class="col-md-6">
                  <label for="">Zona <span style="color: red "><b>*</b></span></label>
                  <input type="text" class="form-control" id="z_one">
                </div>
              </div>            
              <div class="row">
                <div class="col-md-4">
                  <label for="">Teléfono <span style="color: red "><b>*</b></span></label>
                  <input type="text" class="form-control" id="phone">
                </div>
                <div class="col-md-4">
                  <label for="">Ciudad <span style="color: red "><b>*</b></span></label>
                  <input type="text" class="form-control" id="city">
                </div>
                <div class="col-md-4">
                  <label for="">País <span style="color: red "><b>*</b></span></label>
                  <input type="text" class="form-control" id="country">
                </div>
              </div>     
              <hr>
              <div class="row">
                <div class="col-md-6">
                    <a href="informations.php" class="btn btn-danger btn-block">Cancelar</a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block" id="btn_register_information">
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
    $('#btn_register_information').click(function(){
       
      var name_parking = $('#name_parking').val();
      var institute_activity = $('#institute_activity').val();
      var branch = $('#branch').val();
      var a_ddress = $('#a_ddress').val();
      var z_one = $('#z_one').val();
      var phone = $('#phone').val();
      var city = $('#city').val();
      var country = $('#country').val();

        

        if(name_parking == ""){
            alert('Debe de llenar el campo Nombre de parqueo');
            $('#name_parking').focus();
        }else if(institute_activity == ""){
          alert('Debe de llenar el campo Actividad del instituto');
            $('#institute_activity').focus();
        }else if(branch == ""){
          alert('Debe de llenar el campo Sucursal');
            $('#branch').focus();
        }else if(a_ddress == ""){
          alert('Debe de llenar el campo Dirección');
            $('#a_ddress').focus();
        }else if(z_one == ""){
          alert('Debe de llenar el campo Zona');
            $('#z_one').focus();
        }else if(phone == ""){
          alert('Debe de llenar el campo Celular');
            $('#phone').focus();
        }else if(city == ""){
          alert('Debe de llenar el campo Ciudad');
            $('#city').focus();
        }else if(country == ""){
          alert('Debe de llenar el campo País');
            $('#country').focus();
        }else{
            var url = 'controller_create_informations.php';
            $.get(url , {name_parking:name_parking, institute_activity:institute_activity, branch:branch, a_ddress:a_ddress, z_one:z_one, phone:phone, city:city, country:country}, function(datos){
            $('#respuesta').html(datos);
            });
        }

    });
</script>