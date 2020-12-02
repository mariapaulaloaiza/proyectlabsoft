<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Agregar ligas a entrenadores
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Agregar ligas a entrenadores</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEntrenadorLiga">
          
          Asignar entrenadores a ligas

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:5px"></th>
           <th>Entrenador</th>
           <th>Liga</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $entrenadorligas = ControladorEntrenadorLigas::ctrMostrarEntrenadorLigas($item, $valor);

       foreach ($entrenadorligas as $key => $value){
         
          echo ' <tr>
                  <td></td>
                  <td>'.$value["entrenador"].'</td>
                  <td>'.$value["catliga"].'</td>';


                

                  
                  
                  echo '
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarEntrenadorLiga" idEntrenadorLiga="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarEntreandorLiga"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarEntrenadorLiga" idEntrenadorLiga="'.$value["id"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR LIGA
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

          <h4 class="modal-title">Asignar entrenador a liga</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA ENTRENADOR -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoEntrenador" name="nuevoEntrenador" required>
                  
                  <option value="">Selecionar entrenador</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores($item, $valor);

                  foreach ($entrenadores as $key => $value) {
                    
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
                    
                    echo '<option value="'.$value["id"].'">'.$value["liga"].'</option>';
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

          $crearEntrenadorLiga = new ControladorEntrenadorLigas();
          $crearEntrenadorLiga -> ctrCrearEntrenadorLiga();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR 
======================================-->

<div id="modalEditarEntrenadorLiga" class="modal fade" role="dialog">
  
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

            <!-- ENTRADA PARA EL ENTRENADOR -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarEntrenador" name="editarEntrenador" required>
                  
                  <option value="">Selecionar entrenador</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores($item, $valor);

                  foreach ($entrenadores as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                  }

                  ?>
  
                </select>

                <input type="hidden"  name="idEntrenadorLiga" id="idEntrenadorLiga" required>


              </div>

            </div>
          

           

           <!-- ENTRADA PARA SELECCIONAR LIGA -->

           <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarCatliga" name="editarCatLiga" required>
                  
                  <option value="">Selecionar liga</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $catligas = ControladorCatLigas::ctrMostrarCatLigas($item, $valor);

                  foreach ($catligas as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["liga"].'</option>';
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

          $editarEntrenadorLiga = new ControladorEntrenadorLigas();
          $editarEntrenadorLiga -> ctrEditarEntrenadorLiga();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarEntrenadorLiga = new ControladorEntrenadorLigas();
  $borrarEntrenadorLiga -> ctrBorrarEntrenadorLiga();

?> 


