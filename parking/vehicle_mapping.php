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
    
      <h2>Listado de Espacios</h2>
      <br>

      <div class="row">
        <div class="col-md-6">
        <table class= "table table-bordered table-sm table-striped">
        <th><center>Nro</center></th>
        <th>Nro Espacio</th>
        <th><center>Accion</center></th>
        
        
        <?php
        $contador = 0;
        $query_mappings = $pdo->prepare("SELECT * FROM tb_mappings WHERE enable_status = '1' ");
        $query_mappings->execute();
        $mappings =$query_mappings->fetchall(PDO::FETCH_ASSOC);
        foreach($mappings as $mapping){
            $id_map = $mapping['id_map'];
            $nro_space = $mapping['nro_space'];
            $contador = $contador + 1;

        ?>
          <tr>
          <td><center><?php echo $contador;?></center></td> 
          <td><?php echo $nro_space;?></td>
          <td>
            <center>
            <a href="delete.php?id=<?php echo $id_rol; ?>"class="btn btn-danger">Borrar</a>
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
  <?php include('../layout/admin/footer.php');?>
</div>
<?php include('../layout/admin/footer_link.php');?>
</body>
</html>