<?php 

include('app/config.php');
include('layout/admin/data_user_sesion.php');


   // echo "existe sesion";
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
<?php include('layout/admin/head.php');?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include('layout/admin/menu.php');?>

<div class="content-wrapper">
   <br> 
  <div class="container">
    
      <h2>BIENVENIDO AL SISTEMA DE PARQUEO DEL INSTITUTO YAVIRAC</h2>
      <br>

      <div class="row">
        <div class="col-md-12">
        
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title" _msttexthash="318864" _msthash="234">Mapeo actual del parqueo</h3>

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
                <?php
                $query_mappings = $pdo->prepare("SELECT * FROM tb_mappings WHERE enable_status = '1' ");
                $query_mappings->execute();
                $mappings =$query_mappings->fetchall(PDO::FETCH_ASSOC);
                foreach($mappings as $mapping){
                    $id_map = $mapping['id_map'];
                    $nro_space = $mapping['nro_space']; 
                    $state_space = $mapping['state_space'];

                    if ($state_space == "LIBRE") { ?>
                      <div class="col">
                          <center>
                              <h2><?php echo $nro_space; ?></h2>
                              <button class="btn btn-success" style="width: 100%; height: 91px"
                                      data-toggle="modal" data-target="#modal<?php echo $id_map; ?>">
                                  <p><?php echo $state_space; ?></p>
                              </button>
                  
                              <!-- Modal -->
                              <div class="modal fade" id="modal<?php echo $id_map; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                   aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">INGRESO DEL VEHICULO</h5>
                                              <button type="button" class="btn-close" data-dismiss="modal" 
                                              aria-label="Close" arial-hidden="true">&times;</button>
                                              
                                          </div>
                                          <div class="modal-body">
                                          <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Placa:</label>
                                            <div class="col-sm-7">
                                              <input type="text" style="text-transform: uppercase" class="form-control" id="placa_buscar<?php echo $id_map; ?>">
                                            </div>
                                            <div class="col-sm-3">
                                              <button class="btn btn-primary" id="btn_buscar_cliente<?php echo $id_map; ?>" type="button">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                              </svg>
                                                 Buscar
                                              </button>
                                              <script>
                                                $('#btn_buscar_cliente<?php echo $id_map; ?>').click(function () {
                                                  var placa =$('#placa_buscar<?php echo $id_map; ?>').val();
                                                  if(placa == ""){
                                                      alert('Debe de llenar el campo placa');
                                                      $('#placa_buscar<?php echo $id_map; ?>').focus();
                                                  }else{
                                                      var url = 'customers/controller_search_customer.php';
                                                      $.get(url , {placa:placa}, function(datos){
                                                      $('#respuesta_search_customer<?php echo $id_map; ?>').html(datos);
                                                      });
                                                  }
                                                  
                                                });

                                              </script>
                                               
                                            </div>
                                          </div>
                                          <div id="respuesta_search_customer<?php echo $id_map; ?>">
                                          </div>
                                          

                                          <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Fecha Ingreso</label>
                                            <div class="col-sm-9">
                                              <?php
                                              date_default_timezone_set("America/Lima");
                                              $date_hour = date("Y-m-d h:i:s");
                                               $day = date('d');
                                               $month = date('m');
                                               $year = date('Y');
                                              ?>
                                              <input type="date" class="form-control" value="<?php echo $year."-".$month."-".$day; ?>">
                                            </div>
                                          </div>

                                          <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Hora Ingreso</label>
                                            <div class="col-sm-9">
                                            <?php
                                              date_default_timezone_set("America/Lima");
                                              $date_hour = date("Y-m-d h:i:s");
                                               $hour = date('H');
                                               $minute = date('i');
                                              ?>
                                              <input type="time" class="form-control" value="<?php echo $hour.":".$minute; ?>">
                                            </div>
                                          </div>
                                          
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                              <button type="button" class="btn btn-primary">Imprimir Ticket</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                  
                          </center>
                      </div>
                  <?php
                  }
                  
                 if($state_space == "OCUPADO"){ ?>
                  <div class="col">
                  <center>
                    <h2><?php echo $nro_space;?></h2>
                    <button class="btn btn-danger">
                    <img src="<?php echo $URL;?>/public/imagenes/auto 1.png" width="60px" alt="">
                    </button>
                    <p><?php echo $state_space;?></p>
                  </center>
                </div>
                   <?php
                    }
                    ?>
                  <?php
                  }
                  ?>
                
              </div>
            </div>
            
          </div>
          </div>
        
      </div>


   
  </div>


  </div>
  <?php include('layout/admin/footer.php');?>
</div>
<?php include('layout/admin/footer_link.php');?>
</body>
</html>
     

