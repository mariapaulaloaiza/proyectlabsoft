<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar becas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar becas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarBeca">
          
          Agregar becas

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:5px"></th>
           <th>Beca</th>
           <th>Responsable</th>
           <th>Descripcioón</th>
           <th>Edad Minima</th>
           <th>Edad Maxima</th>
           <th>Estrato Maximo</th>
           <th>Rendimiento Minimo</th>
           <th># Campeonatos Minimos</th>
           <th>Fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $becas = ControladorBecas::ctrMostrarBecas($item, $valor);

       foreach ($becas as $key => $value){
        
        if($value["estratoMaximo"]==6){

          $value["estratoMaximo"]= "No aplica";

        }

        if($value["campeonatos"]==0){

          $value["campeonatos"]= "No aplica";

        }
         
          echo ' <tr>
                  <td></td>
                  <td>'.$value["beca"].'</td>
                  <td>'.$value["responsable"].'</td>
                  <td>'.$value["descripcion"].'</td>
                  <td>'.$value["edadMinima"].'</td>
                  <td>'.$value["edadMaxima"].'</td>
                  <td>'.$value["estratoMaximo"].'</td>
                  <td>'.$value["rendimientoMinimo"].'</td>
                  <td>'.$value["campeonatos"].'</td>
                  <td>'.$value["fecha"].'</td>';


                  

                  
                  
                  echo '
                  <td>

                    <div class="btn-group">

                      <button class="btn btn-danger btnEliminarBeca" idBeca="'.$value["id"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR BECA
======================================-->

<div id="modalAgregarBeca" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar beca</h4>

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

                <input type="text" class="form-control input-lg" name="nuevaBeca" placeholder="Ingresar nombre de la beca" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL RESPONSABLE -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoResponsable" placeholder="Ingresar nombre del responsable" id="nuevoResponsable" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCION -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción de la beca" id="nuevaDescripcion" required>

              </div>

            </div>


            <!-- ENTRADA PARA EL EDAD -->

                <div class="form-group">

                <h4>Requisitos obligatorios</h4>
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                  <input type="number" class="form-control input-lg" name="nuevaEdadMinima" placeholder="Ingresar requisito de edad mínima" id="nuevaEdadMinima" min="10" required>

                </div>

              </div>

           <!-- ENTRADA PARA EL EDAD -->

              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevaEdadMaxima" placeholder="Ingresar requisito de edad máxima" id="nuevaEdadMaxima" min="10" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA RENDIMIENTO-->

            <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                  <input type="number" class="form-control input-lg" name="nuevoRendimiento" placeholder="Ingresar requisito de rendimiento mínimo (número de 1 a 100)" id="nuevoRendimiento" min="1" max="100" required>

                </div>

              </div>


            <!-- ENTRADA PARA LA ESTRATO-->

            <div class="form-group">

              <h4> Requisitos opcionales. Si no se requieren, por favor dejar los campos vacíos </h4>
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                  

                  <input type="number" class="form-control input-lg" name="nuevoEstrato" placeholder="Ingresar requisito de estrato máximo" id="nuevoEstrato" min="0">

                </div>

              </div> 

            

          

            <!-- ENTRADA PARA LA CAMPEONATOS-->

            <div class="form-group">
                
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                  <input type="number" class="form-control input-lg" name="nuevoCampeonato" placeholder="Ingresar requisito de número de campeonatos minimos" id="nuevoCampeonato">

                </div>

            </div>

            </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

        <?php

          $crearBeca = new ControladorBecas();
          $crearBeca -> ctrCrearBecas();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR BECA
======================================-->

<div id="modalEditarBeca" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Beca</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL BECA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarBeca" name="editarBeca" value="" required>

                <input type="hidden"  name="idBeca" id="idBeca" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL RESPONSABLE -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarResponsable" name="editarResponsable" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" value="" required>

              </div>

            </div>


          <!-- ENTRADA PARA LA EDAD -->

          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarEdadMinima" name="editarEdadMinima" value="" required>

              </div>

            </div>


           <!-- ENTRADA PARA LA EDAD -->

          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarEdadMaxima" name="editarEdadMaxima" value="" required>

              </div>

            </div>

          <!-- ENTRADA PARA EL ESTRATO-->

          <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarEstrato" name="editarEstrato" value="" required>

              </div>

            </div>

         <!-- ENTRADA PARA LA RENDIMIENTO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarRendimiento" name="editarRendimiento" value="" required>

              </div>

            </div>

         <!-- ENTRADA PARA LA CAMPEONATOS -->

         <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCampeonato" name="editarCampeonato" value="" required>

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

          $editarBecas = new ControladorBecas();
          $editarBecas -> ctrEditarBeca();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarBeca = new ControladorBecas();
  $borrarBeca -> ctrBorrarBeca();

?> 


