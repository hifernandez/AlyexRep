<!--DATAGRID PARA VISUALIZAR LAS OTS--->
<table id="dgBackOrders" title="Ordenes de trabajo" class="easyui-datagrid" style="width:auto;height:450px;"
       url="php/binding/Produccion/getTrBackOrders.php" ;
       toolbar="#toolBackOrders"
       rownumbers="true"
       fitColumns="false"
       singleSelect="true"
       pagination="true"
       loadMsg="Cargando información...">
    <thead>
        <tr>
            <th data-options="field:'id_ot'">Orden de trabajo</th>
            <th data-options="field:'id_pedido'">Pedido</th>
            <th data-options="field:'estatus'">Estatus</th>
            <th data-options="field:'razon_social_cliente'">Cliente</th>
            <th data-options="field:'clave_cliente'">Clave Cliente</th>
            <th data-options="field:'clave_ot'">Fecha alta</th>
            
        </tr>
    </thead>
</table>

<!---TOOLS PARA BOTONES DE CREACIÓN DE PEDIDO-->
<div id="toolBackOrders">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="confirmaOperacionPedido('CREACION')">Ver detalle</a>
    <!---<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="openWinPedidos()">Editar pedido</a>-->
    <br>
</div>