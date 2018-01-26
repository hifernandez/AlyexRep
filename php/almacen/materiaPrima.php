
	<form id="fmEditarFamilia" method="post" novalidate>
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Materia prima</div>
			
			<table  id="dgPedido" title="Material" class="easyui-datagrid" 
					style="width:auto;height:200px;"
					url="php/binding/getOrdenProdOrdenes.php" 
					toolbar="#toolHojaRemision" 
					rownumbers="true" 
					fitColumns="true" 
					singleSelect="true"  >
				<thead>
					<tr>
						<th field="IdElemCotiza" hidden></th>
						<th field="Item" >NOMBRE</th>
						<th field="Cantidad" >DESCRIPCIÓN</th>
						<th field="Cliente" >CANTIDAD</th>
					</tr>
				</thead>
			</table>
			
		</div>
	</form>
	
	<!--Cargando la barra de edición y busqueda-->
	<div id="toolHojaRemision">
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionFamilia('ALTAFAMILIA')">Alta</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionFamilia('EDICIONFAMILIA')">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="muestraPDF()">Eliminar</a>
		<br>
		<!--Busqueda de elementos-->
		<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
			<TR>
				<TD >
					<input id="txtFechaCreacion" name="txtFechaCreacion"  class="easyui-datetimebox" prompt="Fecha de recepción" data-options="" style="width:300px">
				</TD>
			</TR>
		</TABLE>
	</div>
