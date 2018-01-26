<input id="tipoOperacionPlc" type="hidden" value="" />
<table id="dgPlcs" title="Aleaciones" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Prensa/PLC/getCatPLCPrensa.php"
       toolbar="#toolPlcs"
       rownumbers="true"
       fitColumns="true"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <!--<th field="ck" checkbox="true" ></th>-->
            <th data-options="field:'id_plc'" hidden></th>
            <th data-options="field:'descripcion_plc'">Descripcion PLC</th>

        </tr>
    </thead>
</table>

<!--Cargando la barra de edición y busqueda-->
<div id="toolPlcs">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionPlcs('ALTAALEACION')">Alta de aleación</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionPlcs('EDICIONALEACION')">Editar aleación</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="EliminarAleacion()">Eliminar aleación</a>
    <!-- <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del aleación</a>-->
    <br>
    <!--Busqueda de elementos-->
    <!--<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
        <TR>
            <TD >
                <input id="bscAleClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
            </TD>

            <TD>
                <input id="bscAleDesc" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
            </TD>
            <TD>
                <div class="btn-group btn-group-lg" role="group" aria-label="...">
                    <button type="button" onclick="btnBuscarAleaciones()" class="btn btn-primary btn-sm">BUSCAR</button>
                </div>
            </TD>
        </TR>
    </TABLE>-->
</div>


<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->
<div id="dlgPlcs" class="easyui-dialog" style="width:auto"
     closed="true" buttons="#dlg-buttons">
    <form id="fmEditarPlcs" method="post" novalidate>

        <div style="margin-bottom:5px;font-size:14px;border-bottom:1px solid #ccc">Datos del PLC:</div>
        <div style="margin-bottom:5px"></div>
        <table>
            <tr>
                <td>Clave:</td>
                <td>
                    <input id="txtAleClave" name="txtAleClave" class="easyui-textbox" required="true" style="width:100%;padding:5px" />
                </td>

            </tr>
            <tr>
                <td>Descripción:</td>
                <td><input id="txtAleDescripcion" name="txtAleDescripcion" class="easyui-textbox" required="true" style="width:100%;padding:5px"></td>
            </tr>
            


        </table>
        <div style="margin-bottom:5px"></div>
        <div align="center">

            <button id="btnAltaEditPlcs" type="button" onclick="guardaAleacion()" class="btn btn-primary">ACTUALIZAR</button>


        </div>
        <div style="margin-bottom:10px">
        </div>






        <!--<TABLE BORDER=1 CELLPADDING=45 align="center">
            <TR>
                <TD>
                    <input id="txtAleClave" name="txtAleClave" label="Aleación" class="easyui-textbox" prompt="Aleación" data-options="" style="width:380px">
                    <BR>
                </TD>
            </TR>
            <TR>
                <TD>
                    <input id="txtAleDescripcion" name="txtAleDescripcion" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:380px">
                    <BR>
                </TD>
            </TR>
            <TR>
                <TD>
                    <input id="txtAleComposicion" name="txtAleComposicion" label="Composición Química" class="easyui-textbox" prompt="Composición Química" data-options="" style="width:380px">
                    <BR>
                </TD>
            </TR>

            <TR>
                <TD>
                    <div align="center">
                    <div class="btn-group btn-group-lg" role="group" aria-label="...">
                        <button id="btnAltaEditPlcs" type="button" onclick="guardaAleacion()" class="btn btn-primary btn-sm">ACTUALIZAR</button>
                    </div>
                    </div>
                </TD>

            </TR>
        </TABLE>-->
    </form>

</div>
<!-- ******************************** -->



<script>
	$(document).ready(function()
	{

		 $('#dgPlcs').datagrid('reload');    // reload the user data

	});

	function btnBuscarFamilia(){


		 $('#dgPlcs').datagrid('reload');


	}


	function abrirModalEdicionPlcs(tipoOperacion)
	{
		switch(tipoOperacion)
		{
			case "EDICIONALEACION":
				$('#tipoOperacionPlc').val("EDICIONALEACION");
				var row = $('#dgPlcs').datagrid('getSelected');
				if (row)
				{
					//guardaAleacion();
					$('#dlgPlcs').dialog('open').dialog('setTitle','Editar Aleacion');
					$('#fmEditarPlcs').form('load',row);
					$('#txtAleClave').textbox("setValue",row.clave_aleacion);
					$('#txtAleDescripcion').textbox("setValue",row.descripcion_aleacion);
					$('#txtAleComposicion').textbox("setValue",row.comp_quimica_aleacion);

				}
				else
				{
					alert("Debe seleccionar una aleación dando clic sobre el registro para poder editarlo.");
				}
			break;

			case "ALTAALEACION":
				$('#fmEditarFamilia').form('clear');
				$('#tipoOperacionPlc').val("ALTAALEACION");
				$('#dlgPlcs').dialog('open').dialog('setTitle','Nueva Aleación');
				$('#fmEditarPlcs').form('load');

				$("#btnAltaEditPlcs").html('GUARDAR');
			break;
		}

	}// FIN

	function guardaAleacion()
	{
		var tipoOperacionGuardado = $('#tipoOperacionPlc').val();
		//alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
		switch(tipoOperacionGuardado)
		{
			case "EDICIONALEACION":
				//alert("Entre al CASE Edicion Familia");
				//alert("El valor de TipoOperacion es: "+ tipoOperacionGuardado);
				var row = $('#dgPlcs').datagrid('getSelected');
				var claveTxt = $('#txtAleClave').val();
				var descTxt = $('#txtAleDescripcion').val();
				var compTxt = $('#txtAleComposicion').val();
				var dataSelectedContent = 'ID=' + row.id_aleacion +'&Clave='+claveTxt+'&Descripcion='+descTxt+'&Composicion='+compTxt+'&TipoOperacion='+tipoOperacionGuardado;
				//var dataSelectedContent = 'ID=' + row.id_aleacion +'&Clave='+row.clave_aleacion+'&Descripcion='+row.descripcion_aleacion+'&Composicion='+row.comp_quimica_aleacion+'&TipoOperacion='+tipoOperacionGuardado;

				//alert ('El valor de Data =' + row.id_aleacion);
				//alert(request.Clave+" "+request.Descripcion);

					$.ajax (
					{
						url: 	'php/binding/Aleaciones/updateCatAleaciones.php',
						type:   'post',
						dataType: "json",
						data: 	dataSelectedContent,
						success: function(request)
						{
							//alert(request.responseText);
						},
						error: 	function(request, settings)
						{
							//alert(request.responseText);
						}
					});
					$('#dlgPlcs').dialog('close');
					$('#dgPlcs').datagrid('reload');

			break;
			case "ALTAALEACION":
				//alert("Se guardo correctamente la nueva familia");
				//var row = $('#dgPlcs').datagrid('getSelected');
				var claveTxt = $('#txtAleClave').val();
				var descTxt = $('#txtAleDescripcion').val();
				var compTxt = $('#txtAleComposicion').val();
				var dataSelectedContent = 'Clave='+claveTxt+'&Descripcion='+descTxt+'&Composicion='+compTxt+'&TipoOperacion='+tipoOperacionGuardado;

				//alert ("El valor de dataSelectedContent =");// + dataSelectedContent);
				//alert(request.Clave+" "+request.Descripcion);

					$.ajax (
					{
						url: 	'php/binding/Aleaciones/updateCatAleaciones.php',
						type:   'post',
						dataType: "json",
						data: 	dataSelectedContent,
						success: function(request)
						{
							//alert(request.responseText);

						},
						error: 	function(request, settings)
						{
							//alert(request.responseText);
						}
					});
				$('#dlgPlcs').dialog('close');
				$('#dgPlcs').datagrid('reload');
			break;
		}


	}


	function EliminarAleacion()
	{
			var row = $('#dgPlcs').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirma','Estás seguro de eliminarlo?',function(r){
					if (r){
						$.post('php/binding/Aleaciones/deleteCatAleaciones.php',{id_aleacion:row.id_aleacion},function(result){
							if (result.success){
								$('#dgPlcs').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
		}

	/*$.extend($.fn.datagrid.methods, {
			editCell: function(jq,param){
				return jq.each(function(){
					var opts = $(this).datagrid('options');
					var fields = $(this).datagrid('getColumnFields',true).concat($(this).datagrid('getColumnFields'));
					for(var i=0; i<fields.length; i++){
						var col = $(this).datagrid('getColumnOption', fields[i]);
						col.editor1 = col.editor;
						if (fields[i] != param.field){
							col.editor = null;
						}
					}
					$(this).datagrid('beginEdit', param.index);
                    var ed = $(this).datagrid('getEditor', param);
                    if (ed){
                        if ($(ed.target).hasClass('textbox-f')){
                            $(ed.target).textbox('textbox').focus();
                        } else {
                            $(ed.target).focus();
                        }
                    }
					for(var i=0; i<fields.length; i++){
						var col = $(this).datagrid('getColumnOption', fields[i]);
						col.editor = col.editor1;
					}
				});
			},
            enableCellEditing: function(jq){
                return jq.each(function(){
                    var dg = $(this);
                    var opts = dg.datagrid('options');
                    opts.oldOnClickCell = opts.onClickCell;
                    opts.onClickCell = function(index, field){
                        if (opts.editIndex != undefined){
                            if (dg.datagrid('validateRow', opts.editIndex)){
                                dg.datagrid('endEdit', opts.editIndex);
                                opts.editIndex = undefined;
                            } else {
                                return;
                            }
                        }
                        dg.datagrid('selectRow', index).datagrid('editCell', {
                            index: index,
                            field: field
                        });
                        opts.editIndex = index;
                        opts.oldOnClickCell.call(this, index, field);
                    }
                });
            }
		});

		$(function(){
			$('#dgPlcs').datagrid().datagrid('enableCellEditing');
		})*/
</script>

