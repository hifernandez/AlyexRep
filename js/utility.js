// CODIGÓ AJAX/JQUERY PARA LLAMADOS ASÍNCRONOS.
$(document).ready(function ()
{
	/* Asociar el evento de clic del botón 'igual'
	   con la lógica del negocio de la aplicación */

			   
			$('#guardarHistorial').click(function()
			{
				//procesarHistorial();
				alert("Prueba de que funciona");
				
			});
			
			
	
});



function procesarHistorial(){
	
		$.ajax ({
		url: 	'guardaHistorial.php',                   /* URL a invocar asíncronamente */
		type:   'post',                           /* Método utilizado para el requerimiento */
		data: 	$('#formGuargarHist').serialize(),     /* Información local a enviarse con el requerimiento */


		/* Que hacer en caso de ser exitoso el requerimiento */

		success: 	function(request, settings)
		{
			/* Cambiar el color del texto a verde */

			$('#mensaje').css('color', '#0ab53a');

			/* Mostrar un mensaje informando el éxito sucedido */

			//$('#mensaje').html(request);
			$('#mensaje').html("¡Historial guardado exitosamente!");

			/* Mostrar el resultado obtenido del cálculo solicitado */

			//$('#resultado').html(request);
		},
		
		//En caso de que la invocación sea fallida se deberá mostrar un mensaje rojo informando 
		//el error sucedido y se removerá cualquier resultado previo que pueda haber para no confundir
		//al usuario con información anterior.

		/* Que hacer en caso de que sea fallido el requerimiento */

		error: 	function(request, settings)
		{
			/* Cambiar el color del texto a rojo */

			$('#mensaje').css('color', '#ff0e0e');

			/* Mostrar el mensaje de error */

			$('#mensaje').html('Error: ');// + request.responseText);

			/* Limpiar cualquier resultado anterior */

			//$('#resultado').html('Error');
		}
		
		
	});  // Fin de la invocación al método ajax
	
	
	
}


//Función para validar datos del formulario del caso.

function dropDownVal()
{
	var nomlen=document.Datos.nom_doc_rev.value.length;
	var apatlen=document.Datos.ap1_doc_rev.value.length;
	var amatlen=document.Datos.ap2_doc_rev.value.length;
	var generallen==document.Datos.descGeneral.value.length;
	var detalleslen==document.Datos.descDetallada.value.length;
	
/*EJEMPLO
	var txt=document.Datos.CaseClass.options[document.Datos.CaseClass.selectedIndex].value;
	alert('La opción seleccionada es '+txt);
	*/
	if(document.Datos.categoriaCaso.options[document.Datos.categoriaCaso.selectedIndex].value=="none")
	{
		alert("Debe elegir una opción del campo Clase de caso." );
		return false;
	}
	if(document.Datos.divCaso.options[document.Datos.divCaso.selectedIndex].value=="none")
	{
		alert("Debe elegir una opción del campo Tipo de caso." );
		return false;
	}

	if(document.Datos.nom_doc_rev.value.length==0 || Datos.ap1_doc_rev.value.length==0 || Datos.ap2_doc_rev.value.length==0)
	{
		alert("Debe escrbir el nombre completo del doctor." );
		return false;
	}
	

//	alert("En la descripcion ya hay " + document.Datos.general.value);
	//alert("En la descripcion ya hay " + detalleslen);
/*	if(document.Datos.general.value==" " ||document.Datos.general.value=="")
	{
		alert("Debe escrbir la descripcion general del caso.");
		return false;
	}
	else if(document.Datos.detalles.value.length==0 || document.Datos.detalles.value.length==1)
	{
		alert("Debe escrbir la descripcion detallada del caso.");
		return false;
	}
*/

}


/*function onTestChange() {
									var key = window.event.keyCode;

									// If the user has pressed enter
									if (key == 13) {
										document.getElementById("historialCambios").value =document.getElementById("historialCambios").value + "\n-";
										return false;
									}
									else {
										return true;
									}
}*/










