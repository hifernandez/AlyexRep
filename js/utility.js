// CODIG� AJAX/JQUERY PARA LLAMADOS AS�NCRONOS.
$(document).ready(function ()
{
	/* Asociar el evento de clic del bot�n 'igual'
	   con la l�gica del negocio de la aplicaci�n */

			   
			$('#guardarHistorial').click(function()
			{
				//procesarHistorial();
				alert("Prueba de que funciona");
				
			});
			
			
	
});



function procesarHistorial(){
	
		$.ajax ({
		url: 	'guardaHistorial.php',                   /* URL a invocar as�ncronamente */
		type:   'post',                           /* M�todo utilizado para el requerimiento */
		data: 	$('#formGuargarHist').serialize(),     /* Informaci�n local a enviarse con el requerimiento */


		/* Que hacer en caso de ser exitoso el requerimiento */

		success: 	function(request, settings)
		{
			/* Cambiar el color del texto a verde */

			$('#mensaje').css('color', '#0ab53a');

			/* Mostrar un mensaje informando el �xito sucedido */

			//$('#mensaje').html(request);
			$('#mensaje').html("�Historial guardado exitosamente!");

			/* Mostrar el resultado obtenido del c�lculo solicitado */

			//$('#resultado').html(request);
		},
		
		//En caso de que la invocaci�n sea fallida se deber� mostrar un mensaje rojo informando 
		//el error sucedido y se remover� cualquier resultado previo que pueda haber para no confundir
		//al usuario con informaci�n anterior.

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
		
		
	});  // Fin de la invocaci�n al m�todo ajax
	
	
	
}


//Funci�n para validar datos del formulario del caso.

function dropDownVal()
{
	var nomlen=document.Datos.nom_doc_rev.value.length;
	var apatlen=document.Datos.ap1_doc_rev.value.length;
	var amatlen=document.Datos.ap2_doc_rev.value.length;
	var generallen==document.Datos.descGeneral.value.length;
	var detalleslen==document.Datos.descDetallada.value.length;
	
/*EJEMPLO
	var txt=document.Datos.CaseClass.options[document.Datos.CaseClass.selectedIndex].value;
	alert('La opci�n seleccionada es '+txt);
	*/
	if(document.Datos.categoriaCaso.options[document.Datos.categoriaCaso.selectedIndex].value=="none")
	{
		alert("Debe elegir una opci�n del campo Clase de caso." );
		return false;
	}
	if(document.Datos.divCaso.options[document.Datos.divCaso.selectedIndex].value=="none")
	{
		alert("Debe elegir una opci�n del campo Tipo de caso." );
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










