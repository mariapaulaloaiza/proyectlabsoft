<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Asignación de becas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Asignación de becas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">


      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="50%">
         
        <thead>
         
         <tr>
           
            <th style="width:5px"></th>
           <th>Beca</th>
           <th>Deportista</th>
         

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $becaDeportista = ControladorBecaDeportista::ctrMostrarBecaDeportista($item, $valor);

       foreach ($becaDeportista as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["beca"].'</td>
                  <td>'.$value["deportista"].'</td>';


                

                  
                  
                  
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<?php


  $borrarBecaDeportista = new ControladorBecaDeportista();
  $borrarBecaDeportista -> ctrBorrarBecaDeportista();

?> 


