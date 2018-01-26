
	<form id="fmEditarFamilia" method="post" novalidate>
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Producci&oacute;n en proceso</div>
				<!-- Table -->
				<table class="table">
					<TR>
						<TD>
							<input id="txtFechaCreacion" name="txtFechaCreacion"  class="easyui-datetimebox" prompt="Fecha de inicio" data-options="" style="width:300px">
						</TD>
						<TD>
							<input id="txtFechaCreacion" name="txtFechaCreacion"  class="easyui-datetimebox" prompt="Fecha de fin" data-options="" style="width:300px">
						</TD>
					</TR>
				</Table>
			
			<table  id="dgPedido" title="Producto" class="easyui-datagrid" 
					style="width:auto;height:200px;"
					url="php/binding/getOrdenProdOrdenes.php" 
					toolbar="#toolFamilias" 
					rownumbers="true" 
					fitColumns="true" 
					singleSelect="true"  >
				<thead>
					<tr>
						<th field="IdElemCotiza" hidden></th>
						<th field="Item" >PEDIDO</th>
						<th field="Cantidad" >CLIENTE</th>
						<th field="Cliente" >TOTAL</th>
					</tr>
				</thead>
			</table>
			
			
		</div>
	</form>
	
	