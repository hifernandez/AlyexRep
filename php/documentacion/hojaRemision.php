
	<form id="fmEditarFamilia" method="post" novalidate>
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Orden de embarque</div>
			
			<table  id="dgPedido" title="Pedido" class="easyui-datagrid" 
					style="width:auto;height:200px;"
					url="php/binding/getOrdenProdOrdenes.php" 
					toolbar="#toolHojaRemision" 
					rownumbers="true" 
					fitColumns="true" 
					singleSelect="true"  >
				<thead>
					<tr>
						<th field="IdElemCotiza" hidden></th>
						<th field="Item" >CLIENTE</th>
						<th field="Cantidad" >ITEM</th>
						<th field="Cliente" >CANTIDAD</th>
						<th field="Cliente" >CLAVE ALYEX</th>
						<th field="PrecioUnitario" >PT ML</th>
						<th field="Importe" >KILOS</th>
						<th field="FechaEntrega" >FECHA DE ENTREGA</th>
						<th field="FechaEntrega" >FOLIO</th>
					</tr>
				</thead>
			</table>
			
		</div>
	</form>
	
	<!--Cargando la barra de edición y busqueda-->
	<div id="toolHojaRemision">
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionFamilia('ALTAFAMILIA')">Revisar</a>
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
