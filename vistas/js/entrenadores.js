/*=============================================
EDITAR ENTRENADOR
=============================================*/
$(".tablas").on("click", ".btnEditarEntrenador", function(){

	var idEntrenador = $(this).attr("idEntrenador");

	var datos = new FormData();
	datos.append("idEntrenador", idEntrenador);

	$.ajax({
		url: "ajax/entrenadores.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

			 $("#editarNombre").val(respuesta["nombre"]);
			 $("#editarDocumento").val(respuesta["documento"]);
			 $("#editarEdad").val(respuesta["edad"]);
			 $("#editarCelular").val(respuesta["celular"]);
			 $("#editarEmail").val(respuesta["email"]);
			 $("#editarDeporte").val(respuesta["deporte"]);
			 $("#idEntrenador").val(respuesta["id"]);
     		

     	}

	})


})

/*=============================================
ELIMINAR ENTRENADOR
=============================================*/
$(".tablas").on("click", ".btnEliminarEntrenador", function(){

	 var idEntrenador = $(this).attr("idEntrenador");

	 swal({
	 	title: '¿Está seguro de borrar la entrenador?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar entrenador!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=entrenadores&idEntrenador="+idEntrenador;

	 	}

	 })

})