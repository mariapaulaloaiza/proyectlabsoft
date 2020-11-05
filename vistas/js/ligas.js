/*=============================================
EDITAR LIGA
=============================================*/
$(".tablas").on("click", ".btnEditarLiga", function(){

	var idLiga = $(this).attr("idLiga");

	var datos = new FormData();
	datos.append("idLiga", idLiga);

	$.ajax({
		url: "ajax/ligas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

			 $("#editarNombre").val(respuesta["nombreliga"]);
			 $("#editarDeporte").val(respuesta["deporte"]);
			 $("#editarDireccion").val(respuesta["direccion"]);
			 $("#editarTelefono").val(respuesta["telefono"]);
			 $("#idLiga").val(respuesta["id"]);
     		

     	}

	})


})

/*=============================================
ELIMINAR LIGA
=============================================*/
$(".tablas").on("click", ".btnEliminarLiga", function(){

	 var idLiga = $(this).attr("idLiga");

	 swal({
	 	title: '¿Está seguro de borrar la liga?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar liga!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=ligas&idLiga="+idLiga;

	 	}

	 })

})