    <input id="tipoOperacionCreaPE" type="hidden" value=""/>
    <table  id="dgAleaciones" title="Aleaciones" class="easyui-datagrid" style="width:auto;height:800px;"
            url="php/binding/getCatAleaciones.php" 
            toolbar="#toolAleaciones" 
            rownumbers="true" 
			fitColumns="true" 
			singleSelect="true">
        <thead>
            <tr>
				<!--<th field="ck" checkbox="true" ></th>-->
				<th field="IdAleacion" hidden></th>
				<th field="Clave" style="width:33%">Clave</th>
				<th field="Descripcion" style="width:33%">Descripción</th>
            </tr>
        </thead>
    </table>
	
	<!--Cargando la barra de edición y busqueda-->
	<div id="toolAleaciones">
        <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Agregar Usuario</a>-->
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="abrirModalEdicionAcabado('ALTAALEACION')">Alta de aleación</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="abrirModalEdicionAcabado('EDICIONALEACION')">Editar aleación</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="muestraPDF()">Eliminar aleación</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="muestraWord()">Reporte del aleación</a>
		<br>
		<!--Busqueda de elementos-->
		<TABLE BORDER=0 WIDTH=100 CELLPADDING=15 align="center">
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
		</TABLE>
	</div>
	

	<!-- MODAL PARA MOSTRAR EN LA AGREGACIÓN -->
	<div id="dlgAleaciones" class="easyui-dialog" style="width:550px;height:400px;padding:10px 20px"
	closed="true" buttons="#dlg-buttons">
        <form id="fmEditarAleacion" method="post" novalidate>
			<fieldset align="center">
				<form enctype="multipart/form-data" id="Datos"  name="Datos" action="GuardaEdicion.php" method="post"	onsubmit="return dropDownVal()">
					<TABLE BORDER=1 CELLPADDING=15 align="center">
						<TR>
							<TD>
								<input id="txtAleClave" name="txtAleClave" label="Clave" class="easyui-textbox" prompt="Clave" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							<TD>
								<input id="txtAleDescripcion" name="txtAleDescripcion" label="Descripción" class="easyui-textbox" prompt="Descripción" data-options="" style="width:300px">
								<BR>
							</TD>
						</TR>
						<TR>
							
						</TR>
						<TR>
							<TD>
								<div align="center">
								<div class="btn-group btn-group-lg" role="group" aria-label="...">
									<button id="btnAltaEditAleacion" type="button" onclick="guardaAcabado()" class="btn btn-primary btn-sm">ACTUALIZAR</button>
								</div>
								</div>
							</TD>

						</TR>
					</TABLE>
				</form>
			</fieldset>	
        </form>
    </div>
	<!-- ******************************** -->
