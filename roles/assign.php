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
    
      <h2>ASIGNACION DE ROLES A USUARIOS</h2>
      <br>

      <div class="row">
        <div class="col-md-12">
        
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title" _msttexthash="318864" _msthash="234">Listado de Usuarios</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" _msttexthash="415961" _msthash="235">
              <table class= "table table-bordered table-sm table-striped">
             <th><center>Nro</center></th>
             <th>Nombre Usuario</th>
             <th>Email</th>
             <th><center>Roles</center></th>
        
        
        <?php
        $contador = 0;
        $query_user = $pdo->prepare("SELECT * FROM tb_users WHERE enable_status = '1' ");
        $query_user->execute();
        $users =$query_user->fetchall(PDO::FETCH_ASSOC);
        foreach($users as $user){
            $id = $user['id'];
            $names = $user['names'];
            $email = $user['email'];
            $rol = $user['rol'];
            $contador = $contador + 1;

        ?>
          <tr>
          <td><center><?php echo $contador;?></center></td> 
          <td><?php echo $names;?></td>
          <td><?php echo $email;?></td>
          <td>
            <center>
              <?php
              if($rol == ""){ ?>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $id;?>">
            Asignar
            </button>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Asignar Rol</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
        
                    </div>
                    <div class="modal-body">
                      <form action="controller_assign.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre del usuario</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $names;?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $email;?>">
                                    <input type="text" name="id_user" value="<?php echo $id;?>" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Rol</label>
                                    <select name="rol" id="" class="form-control">
                                      <?php 
                                       $query_roles = $pdo->prepare("SELECT * FROM tb_roles WHERE enable_status = '1' ");
                                       $query_roles->execute();
                                       $roles =$query_roles->fetchall(PDO::FETCH_ASSOC);
                                       foreach($roles as $rol){
                                           $id_rol = $rol['id_rol'];
                                           $name_rol = $rol['name_rol'];
                                           ?>
                                           <option value="<?php echo $name_rol;?>"><?php echo $name_rol;?></option>
                                      <?php
                                       }
                                      ?>
                                      
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

               <?php 
              }else{
                echo $rol;
            }
              ?>
            
            </center>
            
          </td>
        </tr>
        <?php
        }

        ?>

      </table>
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