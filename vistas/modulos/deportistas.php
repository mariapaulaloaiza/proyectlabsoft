<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar deportistas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar deportistas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarDeportista">
          
          Agregar deportista

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
           <th>Estrato</th>
           <th>Rendimiento</th>
           <th>Campeonatos</th>
           <th>Faltas</th>
           <th>Observaciones</th>
          

           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $deportistas = ControladorDeportistas::ctrMostrarDeportistas($item, $valor);
        

       foreach ($deportistas as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["documento"].'</td>
                  <td>'.$value["edad"].'</td>
                  <td>'.$value["celular"].'</td>
                  <td>'.$value["estrato"].'</td>
                  <td>'.$value["rendimiento"].'</td>
                  <td>'.$value["campeonatos"].'</td>
                  <td>'.$value["faltas"].'</td>
                  <td>'.$value["observaciones"].'</td>';
                  

                  /*echo '<td>'.$value["direccion"].'</td>
                  <td>'.$value["telefono"].'</td>';*/


                  
                  
                  echo '
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarDeportista" idDeportista="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarDeportista"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarDeportista" idDeportista="'.$value["id"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR DEPORTISTA
======================================-->

<div id="modalAgregarDeportista" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Deportista</h4>

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

                <input type="number" class="form-control input-lg" name="nuevaEdad" placeholder="Ingresar edad" id="nuevaEdad" min ="10" required>

              </div>

            </div>


          <!-- ENTRADA PARA EL CELULAR -->

              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCelular" placeholder="Ingresar celular" id="nuevoCelular" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

          

          <!-- ENTRADA PARA EL ESTRATO -->
            
          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoEstrato" placeholder="Ingresar estrato socio-economico" id="nuevoEstrato" min="0" required>

              </div>

          </div>

          <!-- ENTRADA PARA EL RENDIMIENTO -->
            
          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoRendimiento" placeholder="Ingresar rendimiento (número del 1 al 100)" id="nuevoRendimiento"  min="1" max="100" required>

              </div>

          </div>

          <!-- ENTRADA PARA FALTAS -->
            
          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevaFalta" placeholder="Ingresar número de faltas" id="nuevaFalta" required>

              </div>

          </div>


          <!-- ENTRADA PARA CAMPEONATOS -->
            
          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoCampeonato" placeholder="Ingresar número de campeonatos" id="nuevoCampeonato" required>

              </div>

          </div>



          <!-- ENTRADA PARA OBSERVACIONES -->
            
          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaObservacion" placeholder="Ingresar observaciones" id="nuevaObservacion" required>

              </div>

          </div>
  
  

            
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar deportista</button>

        </div>

        <?php

          $crearDeportista = new ControladorDeportistas();
          $crearDeportista -> ctrCrearDeportista();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR DEPORTISTA
======================================-->

<div id="modalEditarDeportista" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Deportista</h4>

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

                <input type="hidden"  name="idDeportista" id="idDeportista" required>

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

                <input type="number" class="form-control input-lg" name="editarEdad" id="editarEdad" min="10" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CELULAR -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCelular"  id="editarCelular"  required>

              </div>

            </div>

            <!-- ENTRADA PARA LA ESTRATO-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" id="editarEstrato" name="editarEstrato" value="" min="0" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA RENDIMIENTO-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" id="editarRendimiento" name="editarRendimiento" value="" min="0" max="100" required>

              </div>

            </div>

            <!-- ENTRADA PARA FALTAS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" name="editarFalta"  id="editarFalta" required>

              </div>

            </div>

            <!-- ENTRADA PARA CAMPEONATOS -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" name="editarCampeonato"  id="editarCampeonato" required>

              </div>

            </div>

            <!-- ENTRADA PARA OBSERVACIONES -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarObservacion" id="editarObservacion" required>

              </div>

            </div>


          

        

            

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar deportista</button>

        </div>

     <?php

          $editarDeportista = new ControladorDeportistas();
          $editarDeportista-> ctrEditarDeportista();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarDeportista = new ControladorDeportistas();
  $borrarDeportista -> ctrBorrarDeportista();

?> 


