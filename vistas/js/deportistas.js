/*=============================================
EDITAR DEPORTISTA
=============================================*/
$(".tablas").on("click", ".btnEditarDeportista", function(){

	var idDeportista = $(this).attr("idDeportista");

	var datos = new FormData();
	datos.append("idDeportista", idDeportista);

	$.ajax({
		url: "ajax/deportistas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

			var datosliga = new FormData();
          datosliga.append("idLiga",respuesta["liga"]);

           $.ajax({

              url:"ajax/ligas.ajax.php",
              method: "POST",
              data: datosliga,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarLiga").val(respuesta["id"]);
                  $("#editarLiga").html(respuesta["nombreliga"]);

              }

          })
			 

			 $("#editarNombre").val(respuesta["nombre"]);
			 $("#editarDocumento").val(respuesta["documento"]);
			 $("#editarEdad").val(respuesta["edad"]);
			 $("#editarCelular").val(respuesta["celular"]);
			 /*$("#editarLiga").val(respuesta["liga"]);*/
			 $("#editarEstrato").val(respuesta["estrato"]);
			 $("#editarRendimiento").val(respuesta["rendimiento"]);
			 $("#editarFalta").val(respuesta["faltas"]);
			 $("#editarObservacion").val(respuesta["observaciones"]);
			 $("#idDeportista").val(respuesta["id"]);
     		

     	}

	})


})

/*=============================================
ELIMINAR DEPORTISTAS
=============================================*/
$(".tablas").on("click", ".btnEliminarDeportista", function(){

	 var idDeportista = $(this).attr("idDeportista");

	 swal({
	 	title: '¿Está seguro de borrar el Deportista?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Deportista!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=deportistas&idDeportista="+idDeportista;

	 	}

	 })

})