// MANEJO PARA CATÁLOGOS
function pintaCatalogoSel(tipoCatalogo) {
    $("#btnProductos").removeClass("active");
    $("#btnFamilias").removeClass("active");
    $("#btnAcabados").removeClass("active");
    $("#btnCalidades").removeClass("active");
    $("#btnAleaciones").removeClass("active");
    $("#btnTemples").removeClass("active");
    $("#btnDados").removeClass("active");
    $("#btnPerfiles").removeClass("active");
    $("#btnLineas").removeClass("active");
    $("#btnLongitudes").removeClass("active");
    $("#btnSubFamilias").removeClass("active");
    $("#btnClientes").removeClass("active");
    $("#btnProveedores").removeClass("active");
    $("#btnPrensas").removeClass("active");

    $("#divProductos").hide();
    $("#divFamilias").hide();
    $("#divAcabados").hide();
    $("#divCalidades").hide();
    $("#divAleaciones").hide();
    $("#divTemples").hide();
    $("#divDados").hide();
    $("#divPerfil").hide();
    $("#divPerfil").hide();
    $("#divLinea").hide();
    $("#divLongitud").hide();
    $("#divSubFamilia").hide();
    $("#divClientes").hide();
    $("#divProveedores").hide();
    $("#divPrensas").hide();

    $("#btnBrConcepto").hide();


    switch (tipoCatalogo) {

        case 1:
            $("#btnProductos").addClass("active");
            $("#divProductos").show();
            $('#dgProductos').datagrid('reload');
            break;
        case 2:
            $("#btnFamilias").addClass("active");
            $("#divFamilias").show();
            $('#dgFamilias').datagrid('reload');
            break;
        case 3:
            $("#btnAcabados").addClass("active");
            $("#divAcabados").show();
            $('#dgAcabados').datagrid('reload');
            break;
        case 4:
            $("#btnCalidades").addClass("active");
            $("#divCalidades").show();
            $('#dgCalidades').datagrid('reload');
            break;
        case 5:
            $("#btnAleaciones").addClass("active");
            $("#divAleaciones").show();
            $('#dgAleaciones').datagrid('reload');
            break;
        case 6:
            $("#btnTemples").addClass("active");
            $("#divTemples").show();
            $('#dgTemples').datagrid('reload');
            break;
        case 7:
            $("#btnDados").addClass("active");
            $("#divDados").show();
            $('#dgDados').datagrid('reload');
            break;
        case 8:
            $("#btnLineas").addClass("active");
            $("#divLinea").show();
            $('#dgLineas').datagrid('reload');
            break;
        case 9:
            $("#btnLongitudes").addClass("active");
            $("#divLongitud").show();
            $('#dgLongitudes').datagrid('reload');
            break;
        case 10:
            $("#btnSubFamilias").addClass("active");
            $("#divSubFamilia").show();
            $('#dgSubFamilias').datagrid('reload');
            break;
        case 11:
            $("#btnClientes").addClass("active");
            $("#divClientes").show();
            $('#dgClientes').datagrid('reload');
            break;
        case 12:
            $("#btnPrensas").addClass("active");
            $("#divPrensas").show();
            $('#dgPrensas').datagrid('reload');
            break;
        case 13:
            $("#btnProovedores").addClass("active");
            $("#divProveedores").show();
            //$('#dgPrensas').datagrid('reload');
            break;
    }

}

//MANEJO PARA DOCUMENTACIÓN
function pintaDocumentoSel(tipoDocumento) {
    $("#btnDocCotiza").removeClass("active");
    //$("#btnDocCotiza2").removeClass("active");
    $("#btnDocPedido").removeClass("active");
    $("#btnDocOrdProd").removeClass("active");
    $("#btnDocEstadisticas").removeClass("active");
    $("#btnDocOrdEmb").removeClass("active");
    $("#btnDocRemision").removeClass("active");
    $("#btnDocFactura").removeClass("active");
    $("#btnDocCobranza").removeClass("active");
    $("#btnPoolCotiza").removeClass("active");
    $("#btnDocPoolPed").removeClass("active");



    $("#divDocEstadisticas").hide();
    $("#divDocCotiza").hide();
    //$("#divDocCotiza2").hide();
    $("#divDocPedido").hide();
    $("#divDocOrdProd").hide();
    $("#divDocOrdEmb").hide();
    $("#divDocRemision").hide();
    $("#divDocFactura").hide();
    $("#divDocCobranza").hide();
    $("#divPoolCotizacion").hide();
    $("#divDocPoolPed").hide();
    //$("#CrearCotizacion").hide();

    switch (tipoDocumento) {
        case 1:
            $("#divDocPoolPed").hide();
            $("#btnDocCotiza").addClass("active");
            $("#divDocCotiza").show();
            $('#dgCotiza').datagrid('reload');
            break;
        case 2://Módulo de pedidos. 
            $("#btnDocPedido").addClass("active");
            $("#divDocPedido").show();
            $('#dgCotizaPed').datagrid('reload');
            break;
        case 3://Pool de pedidos. 
            $("#btnDocPoolPed").addClass("active");
            $("#divDocPoolPed").show();
            $('#dgPoolPedidos').datagrid('reload');
            break;
        case 4:
            $("#btnDocOrdEmb").addClass("active");
            $("#divDocOrdEmb").show();
            break;
        case 5:
            $("#btnDocRemision").addClass("active");
            $("#divDocRemision").show();
            break;
        case 6:
            $("#btnDocFactura").addClass("active");
            $("#divDocFactura").show();
            break;
        case 7:
            $("#btnDocCobranza").addClass("active");
            $("#divDocCobranza").show();
            break;
        case 8:
            $("#btnPoolCotiza").addClass("active");
            $("#divPoolCotizacion").show();
            $('#dgPoolCotizaciones').datagrid('reload');
            break;
        case 9:
            //$("#btnPoolCotiza").addClass("active");
            $("#btnDocEstadisticas").addClass("active");
            $("#divDocEstadisticas").show();
            //$('#dgPoolCotizaciones').datagrid('reload');
            break;
    }
}
//MANEJO PARA ALMACEN
function pintaAlmacenSel(tipoProduccion) {
    $("#btnAlmaMatPr").removeClass("active");
    $("#btnAlmaProdProc").removeClass("active");
    $("#btnAlmaProdTer").removeClass("active");


    $("#divAlmaMatPr").hide();
    $("#divAlmaProdProc").hide();
    $("#divAlmaProdTer").hide();
    switch (tipoProduccion) {
        case 1:
            $("#btnAlmaMatPr").addClass("active");
            $("#divAlmaMatPr").show();
            break;
        case 2:
            $("#btnAlmaProdProc").addClass("active");
            $("#divAlmaProdProc").show();
            break;
        case 3:
            $("#btnAlmaProdTer").addClass("active");
            $("#divAlmaProdTer").show();
            break;
    }
}

//MANEJO PARA PRODUCCIÓN
function pintaProdSel(tipoProduccion) {
    
    //Submenu de registro de extrusión.
    $('#navExtrusion').hide();

    //Ocultando botones.
    $("#btnProdBackOrd").removeClass("active");
    $("#btnProdOrdExtr").removeClass("active");
    $("#btnProdProgSem").removeClass("active");
    $("#btnRegExtrusion").removeClass("active");
    $("#btnOrdPendProg").removeClass("active");

    //Ocultando DIVS.
    $("#divProdBackOrders").hide();
    $("#divProdOrdExtr").hide();
    $("#divProgSemanal").hide();
    $("#divRegExtrusion").hide();
    $("#divOrdsPendProg").hide();

    switch (tipoProduccion) {
        case 1:
            $("#btnProdBackOrd").addClass("active");
            $("#divProdBackOrders").show();
            break;
        case 2:
            $("#btnProdOrdExtr").addClass("active");
            $("#divProdOrdExtr").show();
            break;
        case 3:
            $("#btnProdProgSem").addClass("active");
            $("#divProgSemanal").show();
            break;
        case 4:
            $('#navExtrusion').show();
            $("#btnRegExtrusion").addClass("active");
            $("#divRegExtrusion").show();
            break;
        case 5:
            $("#btnOrdPendProg").addClass("active");
            $("#divOrdsPendProg").show();
            break;
    }
}

//MANEJO PARA MANTENIMIENTO
function pintaMantenimSel(tipoMantenim) {
    $('#navPlanMantenim').hide();
    switch (tipoProduccion) {
        case 1:
            $('#navPlanMantenim').show();
            break;
        case 5:
            break;
    }
}

function pintaIngenieria(tipoInge) {
    $("#btnSolMatriz").removeClass("active");
    $("#btnRegMatriz").removeClass("active");
    $("#btnPoolDib").removeClass("active");
    $("#btnAprobDib").removeClass("active");
    $("#btnPoolRd").removeClass("active");
    $("#btnKardex").removeClass("active");
    

    $("#divSolMatriz").hide();
    $("#divRegMatriz").hide();
    $("#divPoolDib").hide();
    $("#divAprobDib").hide();
    $("#divPoolRD").hide();
    $("#divKardex").hide();
    

    $('#navPlanMantenim').hide();

    switch (tipoInge) {
        case 1:
            $("#btnSolMatriz").addClass("active");
            $('#divSolMatriz').show();
            $('#dgNvoDibujos').datagrid('reload');
            break;
        case 2:
            $("#btnRegMatriz").addClass("active");
            $("#divRegMatriz").show();
            $('#dgDados').datagrid('reload');
            break;
        case 3:
            $("#btnPoolDib").addClass("active");
            $("#divPoolDib").show();
            $('#dgPoolDibujos').datagrid('reload');
            break;
        case 4:
            $("#btnAprobDib").addClass("active");
            $("#divAprobDib").show();
            $('#dgAproDib').datagrid('reload');
            break;
        case 5:
            $("#btnPoolRd").addClass("active");
            $("#divPoolRD").show();
            $('#dgPoolRD').datagrid('reload');
            break;
        case 6:
            $("#btnKardex").addClass("active");
            $("#divKardex").show();
            $('#dgKardex').datagrid('reload');
            break;
    }
}