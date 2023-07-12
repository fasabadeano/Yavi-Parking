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
    
      <h2>Listado de Informaciones</h2>
      <br>
      <a href="create_informations.php" class="btn btn-primary">Registrar Nuevo</a> <br><br>
      <table class= "table table-bordered table-sm table-striped">
        <th><center>Nro</center></th>
        <th>Nombre del Parqueoo</th>
        <th>Actividad del Instituto</th>
        <th>Sucursal</th>
        <th>Dirección</th>
        <th>Zona</th>
        <th>Teléfono</th>
        <th>Ciudad</th>
        <th>Pais</th>
        <th><center>Acció</center></th>
        
        
        <?php
        $contador = 0;
        $query_informations = $pdo->prepare("SELECT * FROM tb_informations WHERE enable_status = '1' ");
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
            $contador = $contador + 1;

        ?>
          <tr>
          <td><center><?php echo $contador;?></center></td> 
          <td><?php echo $name_parking;?></td>
          <td><?php echo $institute_activity;?></td>
          <td><?php echo $branch;?></td>
          <td><?php echo $a_ddress;?></td>
          <td><?php echo $z_one;?></td>
          <td><?php echo $phone;?></td>
          <td><?php echo $city;?></td>
          <td><?php echo $country;?></td>
          <td>
            <center>
            <a href="update_configurations.php?id=<?php echo $id_informations; ?>"class="btn btn-success">Editar</a>
            <a href="delete_configurations.php?id=<?php echo $id_informations; ?>"class="btn btn-danger">Borrar</a>
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