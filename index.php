<?php include('app/config.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
    <title>Document</title>
</head>
<body style="background-image: url('public/imagenes/piso 2.jpg')">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Yavi-Parking
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">SOBRE NOSOTROS</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PROMOCIONES
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Mensuales</a></li>
            <li><a class="dropdown-item" href="#">Dias</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Otros</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="#">CONTACTANOS</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        
      </form>

      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Ingresar
      </button>

    </div>
  </div>
</nav>




<br>
<div class="container">
<div class="row">
                <?php
                $query_mappings = $pdo->prepare("SELECT * FROM tb_mappings WHERE enable_status = '1' ");
                $query_mappings->execute();
                $mappings =$query_mappings->fetchall(PDO::FETCH_ASSOC);
                foreach($mappings as $mapping){
                    $id_map = $mapping['id_map'];
                    $nro_space = $mapping['nro_space']; 
                    $state_space = $mapping['state_space'];

                    if($state_space == "LIBRE"){ ?>
                    <div class="col">
                  <center>
                    <h2><?php echo $nro_space;?></h2>
                    <button class="btn btn-success" style="width: 100%;height: 91px">
                    <p><?php echo $state_space;?></p>
                    </button>
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

     <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="public/js/bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
     <!-- Option 2: Separate Popper and Bootstrap JS -->
    
     
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="public/js/jquery-3.7.0.min.js"></script>
    <!-- <script src="public/js/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
JS -->
</body>
</html>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicio de Sesion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
            <div class="form-group">
                <label for="">user/Email</label>
                <input type="email" id="user" class="form-control">
            </div>
            </div>  
            
            <div class="col-md-12">
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" id="password" class="form-control">
            </div>
            </div> 
        </div>
        <div id="respuesta">

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_ingresar">Ingresar</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#btn_ingresar').click(function(){
    login();
});

$('#password').keypress(function(e){
    if(e.which == 13){
        login();
    }
});

function login(){
    var user = $('#user').val();
    var password_user = $('#password').val();

    if(user == ""){
        alert('Debe introducir su Usuario....');
        $('#user').focus();
    }else if(password_user == ""){
        alert('Debe introducir su Contraseña...');
        $('#password').focus();
    }else{
        var url = 'login/controller_login.php'
        $.post(url , {user:user , password_user:password_user}, function(datos){
        $('#respuesta').html(datos);
    });
    }
}

</script>