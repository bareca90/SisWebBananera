<?php
    require_once("../../Clases/Ingreso_Compra.php");
    require_once("../../Clases/Proveedor.php");
    require_once("../../Clases/Producto.php");

    if (isset($_POST["filtroFecha"]) && isset($_POST["filtroProducto"]) && isset($_POST["filtroEstado"])) {
        $filtroFecha = $_POST["filtroFecha"];
        $filtroProducto = $_POST["filtroProducto"];
        $filtroEstado = $_POST["filtroEstado"];
        
        $usuarioObj = new IngresoCompra();

        $usuarios = $usuarioObj->consultarIngresoCompra($filtroFecha,$filtroProducto,$filtroEstado);
        
        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["inv_inc_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            if($usuario["inv_inc_estado"] == "A" ){
                $estado="Activo" ;   
            }
            if($usuario["inv_inc_estado"] == "P" ){
                $estado="Procesado" ;   
            }
            if($usuario["inv_inc_estado"] == "N" ){
                $estado="Anulado" ;   
            }
            /* $estado = $usuario["inv_inc_estado"] == "A" ? "Activo" : $usuario["inv_inc_estado"] == "P" ? "Procesado":"Anulado"; */
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["inv_inc_codigo"]}</td>
                    <td style='display: none;'>{$usuario["reb_prv_codigo"]}</td>   
                    <td>{$usuario["reb_prv_razon_social"]}</td>
                    <td>{$usuario["inv_inc_cantidad"]}</td>
                    <td>{$usuario["inv_inc_fecha_ingreso"]}</td>
                    <td>{$usuario["inv_inc_observaciones"]}</td>
                    <td style='display: none;'>{$usuario["reb_pro_codigo"]}</td>   
                    <td>{$usuario["reb_pro_descripcion"]}</td>
                    <td>{$usuario["inv_inc_ubicacion"]}</td>
                    <td>{$usuario["inv_inc_factura"]}</td>                    
                    <td>$estado</td>             
                    <td style='display: none;'>{$usuario["inv_inc_estado"]}</td>   
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='search search-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Procesar'>&#xE15C;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Anular'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['comboproveedor'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['comboproveedor'];
        $usuarioAplicacion= new Proveedor();
        $aplicaciones = $usuarioAplicacion->consultarComboProveedor();
        echo "<option value='0'>Selecciona un Proveedor</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['reb_prv_codigo']."'>".$aplicacion['reb_prv_razon_social']."</option>";
        }
    } 
    if (isset($_POST['comboproducto'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['comboproducto'];
        $usuarioAplicacion= new Producto();
        $aplicaciones = $usuarioAplicacion->consultarComboProducto();
        echo "<option value='0'>Selecciona un Producto</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['reb_pro_codigo']."'>".$aplicacion['reb_pro_descripcion']."</option>";
        }
    } 
    if (isset($_POST['comboproductotipo'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['comboproductotipo'];
        $tipo = $_POST['tipocombo'];
        $usuarioAplicacion= new Producto();
        $aplicaciones = $usuarioAplicacion->consultarComboProductoTipo($tipo );
        echo "<option value='0'>Selecciona un Producto</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['reb_pro_codigo']."'>".$aplicacion['reb_pro_descripcion']."</option>";
        }
    } 
    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar" || $accion=="actualizar" ){
            $inv_inc_cantidad=$_POST['inv_inc_cantidad'];
            $inv_inc_fecha_ingreso=$_POST['inv_inc_fecha_ingreso'];
            $inv_inc_observaciones=$_POST['inv_inc_observaciones'];
            $inv_inc_estado=$_POST['inv_inc_estado'];
            $usuario=$_POST['usuario'];
            $inv_inc_ubicacion=$_POST['inv_inc_ubicacion'];
            $reb_pro_codigo=$_POST['reb_pro_codigo'];
            $inv_inc_codigo=$_POST['inv_inc_codigo'];
            $reb_prv_codigo=$_POST['reb_prv_codigo'];
            $inv_inc_factura=$_POST['inv_inc_factura'];
            $perfaplObj = new IngresoCompra();
            $valor=$perfaplObj->insertarActualizarIngresoxCompra(   $inv_inc_codigo,
                                                                    $inv_inc_cantidad,
                                                                    $inv_inc_fecha_ingreso,
                                                                    $inv_inc_observaciones,
                                                                    $inv_inc_estado,
                                                                    $usuario,
                                                                    $inv_inc_ubicacion,
                                                                    $reb_pro_codigo,
                                                                    $reb_prv_codigo,
                                                                    $accion,
                                                                    $inv_inc_factura
                                                                );
            echo $valor;
        }
        if($accion=="procesar"){
            $inv_inc_codigo=$_POST['inv_inc_codigo'];
            $inv_inc_cantidad=$_POST['inv_inc_cantidad'];
            $reb_pro_codigo=$_POST['reb_pro_codigo'];
            $perfaplObj = new IngresoCompra();
            $valor=$perfaplObj->procesarIngresoCompra($inv_inc_codigo,$inv_inc_cantidad,$reb_pro_codigo);
            echo $valor;
        }
        if($accion=="anular"){
            $inv_inc_codigo=$_POST['inv_inc_codigo'];
            $inv_inc_cantidad=$_POST['inv_inc_cantidad'];
            $reb_pro_codigo=$_POST['reb_pro_codigo'];
            $inv_inc_estado=$_POST['inv_inc_estado'];
            $perfaplObj = new IngresoCompra();
            $valor=$perfaplObj->anularIngresoCompra($inv_inc_codigo,$inv_inc_cantidad,$reb_pro_codigo,$inv_inc_estado);
            echo $valor;
        }
        
    }

