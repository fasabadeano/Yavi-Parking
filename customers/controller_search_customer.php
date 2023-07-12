<?php

include('../app/config.php');


$placa = $_GET['placa'];

$placa = strtoupper($placa);//Esto no ayuda a tranformar a mayuscula

//echo "buscando la placa ".$placa;
$id_customer ='';
$name_customer ='';
$ruc_ci_customer ='';


        $query_searchs = $pdo->prepare("SELECT * FROM tb_customers WHERE enable_status = '1' AND car_plate = '$placa' ");
        $query_searchs->execute();
        $searchs =$query_searchs->fetchall(PDO::FETCH_ASSOC);
        foreach($searchs as $search){
            $id_customer = $search['id_customer'];
            $name_customer = $search['name_customer'];
            $ruc_ci_customer = $search['ruc_ci_customer'];

          
        }

    
        if($name_customer == ""){
            //echo "el cliente es nuevo";
            ?>
            <div class="mb-3 row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="name_customer<?php echo $id_map;?>">
               </div>
             </div>
             <div class="mb-3 row">
               <label for="staticEmail" class="col-sm-2 col-form-label">RUC/ID</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="ruc_ci_customer<?php echo $id_map;?>">
               </div>
             </div>
        <?php
        }else{
        //echo $name_customer." - ". $ruc_ci_customer;
        ?>
        <div class="mb-3 row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control"  id="name_customer<?php echo $id_map;?>" value="<?php echo $name_customer; ?>">
               </div>
             </div>
             <div class="mb-3 row">
               <label for="staticEmail" class="col-sm-2 col-form-label">RUC/ID</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="ruc_ci_customer<?php echo $id_map; ?>" value="<?php echo $ruc_ci_customer; ?>">
               </div>
             </div>
        <?php

        }

        ?>