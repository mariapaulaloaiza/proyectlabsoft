<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Agregar categorias a una liga
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Agregar categorias a ligas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCatLiga">
          
          Agregar categorias a una liga

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:5px"></th>
           <th>Liga</th>
           <th>Categoria</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $catligas = ControladorCatLigas::ctrMostrarCatLigas($item, $valor);

       foreach ($catligas as $key => $value){
         
          echo ' <tr>
                  <td></td>
                  <td>'.$value["liga"].'</td>
                  <td>'.$value["categoria"].'</td>';


                

                  
                  
                  echo '
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarCatLiga" idCatLiga="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCatLiga"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarCatLiga" idCatLiga="'.$value["id"].'"><i class="fa fa-times"></i></button>

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

<div id="modalAgregarCatLiga" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar categorias a liga</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA LIGA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaLiga" name="nuevaLiga" required>
                  
                  <option value="">Selecionar liga</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $ligas = ControladorLigas::ctrMostrarLigas($item, $valor);

                  foreach ($ligas as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["nombreliga"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>
            <!-- ENTRADA PARA EL CATEGORIA1 -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                  
                  <option value="">Selecionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
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

          $crearCatLiga = new ControladorCatLigas();
          $crearCatLiga -> ctrCrearCatLiga();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR 
======================================-->

<div id="modalEditarCatLiga" class="modal fade" role="dialog">
  
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

            <!-- ENTRADA PARA LA LIGA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarLiga" name="editarLiga" required>
                  
                  <option value="">Selecionar liga</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $ligas = ControladorLigas::ctrMostrarLigas($item, $valor);

                  foreach ($ligas as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["nombreliga"].'</option>';
                  }

                  ?>
  
                </select>

                <input type="hidden"  name="idCatLiga" id="idCatLiga" required>


              </div>

            </div>
          

           

           <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

           <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="editarCategoria" name="editarCategoria" required>
                  
                  <option value="">Selecionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
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

          $editarCatLiga = new ControladorCatLigas();
          $editarCatLiga -> ctrEditarCatLiga();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCatLiga = new ControladorCatLigas();
  $borrarCatLiga -> ctrBorrarCatLiga();

?> 


