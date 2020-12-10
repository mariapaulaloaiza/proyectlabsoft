<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar entrenadores
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar entrenadores</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEntrenador">
          
          Agregar entrenador

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:5px"></th>
           <th>Nombre completo</th>
           <th>Documento</th>
           <th>Edad</th>
           <th>Celular</th>
           <th>Email</th>
           <th>Deporte orientado</th>

           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $entrenadores = ControladorEntrenadores::ctrMostrarEntrenadores($item, $valor);

       foreach ($entrenadores as $key => $value){
         
          echo ' <tr>
                  <td></td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["documento"].'</td>
                  <td>'.$value["edad"].'</td>
                  <td>'.$value["celular"].'</td>
                  <td>'.$value["email"].'</td>
                  <td>'.$value["deporte"].'</td>';


                  /*echo '<td>'.$value["direccion"].'</td>
                  <td>'.$value["telefono"].'</td>';*/


                  
                  
                  echo '
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarEntrenador" idEntrenador="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarEntrenador"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarEntrenador" idEntrenador="'.$value["id"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR ENTRENADOR
======================================-->

<div id="modalAgregarEntrenador" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Entrenador</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre completo" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDocumento" placeholder="Ingresar documento de identidad" id="nuevoDocumento" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA EDAD -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevaEdad" placeholder="Ingresar edad" id="nuevaEdad" required>

              </div>

            </div>


          <!-- ENTRADA PARA EL CELULAR -->

              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCelular" placeholder="Ingresar celular" id="nuevoCelular" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

          <!-- ENTRADA PARA EL EMAIL -->
            
          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar correo electrónico" id="nuevoEmail" required>

              </div>

          </div>

          <!-- ENTRADA PARA EL DEPORTE -->
            
          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDeporte" placeholder="Ingresar deporte orientado" id="nuevoDeporte" required>

              </div>

          </div>

  
  

            
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar entrenador</button>

        </div>

        <?php

          $crearEntrenador = new ControladorEntrenadores();
          $crearEntrenador -> ctrCrearEntrenador();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR ENTRENADOR
======================================-->

<div id="modalEditarEntrenador" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Entrenador</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                <input type="hidden"  name="idEntrenador" id="idEntrenador" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDocumento" id="editarDocumento" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA EDAD -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="number" class="form-control input-lg" name="editarEdad" id="editarEdad" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CELULAR -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCelular"  id="editarCelular"  required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DEPORTE-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDeporte" name="editarDeporte" value="" required>

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

          $editarEntrenador = new ControladorEntrenadores();
          $editarEntrenador-> ctrEditarEntrenador();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarEntrenador = new ControladorEntrenadores();
  $borrarEntrenador -> ctrBorrarEntrenador();

?> 


