<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Agregar deportistas a ligas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Agregar deportistas a ligas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEntrenadorLiga">
          
          Agregar deportistas a ligas

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:5px"></th>
           <th>Deportista</th>
           <th>Liga</th>
           <th>Categoria</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $deportistaligas = ControladorDeportistaLigas:: ctrMostrarDeportistaLigas($item, $valor);

       foreach ($deportistaligas as $key => $value){
         
          echo ' <tr>
                  <td></td>
                  <td>'.$value["deportista"].'</td>
                  <td>'.$value["liga"].'</td>
                  <td>'.$value["categoria"].'</td>';

                

                  
                  
                  echo '
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarDeportistaLiga" idDeportistaLiga="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarDeportistaLiga"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarDeportistaLiga" idDeportistaLiga="'.$value["id"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR 
======================================-->

<div id="modalAgregarEntrenadorLiga" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar deportista a ligas</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL DEPORTISTA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoDeportista" name="nuevoDeportista" required>
                  
                  <option value="">Selecionar deportista</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $deportistas = ControladorDeportistas::ctrMostrarDeportistas($item, $valor);

                  foreach ($deportistas as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>
            <!-- ENTRADA PARA LA LIGA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaCatLiga" name="nuevaCatLiga" required>
                  
                  <option value="">Selecionar liga</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $catligas = ControladorCatligas::ctrMostrarCatLigas($item, $valor);

                  foreach ($catligas as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'." "." ".$value["liga"]."-".$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

           
          
  

            
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

        <?php

          $crearDeportistaLiga = new ControladorDeportistaLigas();
          $crearDeportistaLiga -> ctrCrearDeportistaLiga();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR 
======================================-->

<div id="modalEditarDeportistaLiga" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL DEPORTISTA  -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarDeportista" name="editarDeportista" required>
                  
                  <option value="">Selecionar deportista</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $deportistas = ControladorDeportistas::ctrMostrarDeportistas($item, $valor);

                  foreach ($deportistas as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                  }

                  ?>
  
                </select>

                <input type="hidden"  name="idDeportistaLiga" id="idDeportistaLiga" required>


              </div>

            </div>
          

           

           <!-- ENTRADA PARA SELECCIONAR LIGA -->

           <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarCatLiga" name="editarCatLiga" required>
                  
                  <option value="" disabled>Selecionar liga</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $catligas = ControladorCatLigas::ctrMostrarCatLigas($item, $valor);

                  foreach ($catligas as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["liga"]." "."-"." ".$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

           
          
            

        

         
  

          

        

            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar</button>

        </div>

     <?php

          $editarDeportistaLiga = new ControladorDeportistaLigas();
          $editarDeportistaLiga -> ctrEditarDeportistaLiga();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarDeportistaLiga = new ControladorDeportistaLigas();
  $borrarDeportistaLiga -> ctrBorrarDeportistaLiga();

?> 


