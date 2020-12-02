/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarEntrenadorLiga", function(){

	var idEntrenadorLiga = $(this).attr("idEntrenadorLiga");

	var datos = new FormData();
	datos.append("idEntrenadorLiga", idEntrenadorLiga);

	$.ajax({
		url: "ajax/entrenadorligas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

			 $("#editarLiga").val(respuesta["liga"]);
			 $("#editarEntrenador").val(respuesta["entrenador"]);
			 $("#idEntrenadorLiga").val(respuesta["id"]);
     		

     	}

	})


})
/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarEntrenadorLiga", function(){

	 var idEntrenadorLiga = $(this).attr("idEntrenadorLiga");

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

	 		window.location = "index.php?ruta=entrenadorligas&idEntrenadorLiga="+idEntrenadorLiga;

	 	}

	 })

})