
	<form id="fmEditarFamilia" method="post" novalidate>
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Orden de embarque</div>
				<!-- Table -->
				<table class="table">
					<TR>
						<TD>
							<input id="txtFechaCreacion" name="txtFechaCreacion"  class="easyui-datetimebox" prompt="Fecha de recepción" data-options="" style="width:300px">
						</TD>
					</TR>
				</Table>
			
			<table  id="dgPedido" title="Pedido" class="easyui-datagrid" 
					style="width:auto;height:200px;"
					url="php/binding/getOrdenProdOrdenes.php" 
					toolbar="#toolFamilias" 
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
	
	