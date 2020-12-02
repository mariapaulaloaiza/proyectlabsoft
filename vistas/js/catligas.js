/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarCatLiga", function(){

	var idCatLiga = $(this).attr("idCatLiga");

	var datos = new FormData();
	datos.append("idCatLiga", idCatLiga);

	$.ajax({
		url: "ajax/catligas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

			 $("#editarLiga").val(respuesta["liga"]);
			 $("#editarCategoria").val(respuesta["categoria"]);
			 $("#idCatLiga").val(respuesta["id"]);
     		

     	}

	})


})
/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCatLiga", function(){

	 var idCatLiga = $(this).attr("idCatLiga");

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

	 		window.location = "index.php?ruta=catligas&idCatLiga="+idCatLiga;

	 	}

	 })

})