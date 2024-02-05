<?php
    require_once("../../Clases/Empaquetado.php");
    require_once("../../Clases/Cosecha.php");
    require_once("../../Clases/Producto.php");

    if (isset($_POST["filtroFecha"]) && isset($_POST["filtroProducto"]) && isset($_POST["filtroEstado"])) {
        $filtroFecha = $_POST["filtroFecha"];
        $filtroProducto = $_POST["filtroProducto"];
        $filtroEstado = $_POST["filtroEstado"];
        
        $usuarioObj = new Empaquetado();

        $usuarios = $usuarioObj->consultarEmpaquetado($filtroFecha,$filtroProducto,$filtroEstado);
        
        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["cse_emp_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            if($usuario["cse_emp_estado"] == "A" ){
                $estado="Activo" ;   
            }
            if($usuario["cse_emp_estado"] == "P" ){
                $estado="Procesado" ;   
            }
            if($usuario["cse_emp_estado"] == "N" ){
                $estado="Anulado" ;   
            }
            /* $estado = $usuario["inv_inc_estado"] == "A" ? "Activo" : $usuario["inv_inc_estado"] == "P" ? "Procesado":"Anulado"; */
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["cse_emp_codigo"]}</td>
                    <td style='display: none;'>{$usuario["cse_cos_codigo"]}</td>   
                    <td>{$usuario["cse_cos_fecha"]}</td>
                    <td>{$usuario["cse_emp_fecha"]}</td>
                    <td>{$usuario["cse_emp_responsable"]}</td>
                    <td style='display: none;'>{$usuario["cse_emp_manos_caja"]}</td>   
                    <td style='display: none;'>{$usuario["cse_emp_real_manos_caja"]}</td>   
                    <td style='display: none;'>{$usuario["cse_emp_rango_cajas"]}</td>   
                    <td style='display: none;'>{$usuario["cse_emp_real_cajas"]}</td>   
                    <td style='display: none;'>{$usuario["cse_emp_cod_producto"]}</td>   
                    <td>{$usuario["reb_pro_descripcion"]}</td>
                    <td>{$usuario["cse_emp_cantidad"]}</td>
                    <td>$estado</td>             
                    <td style='display: none;'>{$usuario["cse_emp_estado"]}</td>   
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='search search-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Procesar'>&#xE15C;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Anular'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['combocosecha'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['combocosecha'];
        $usuarioAplicacion= new Cosecha();
        $aplicaciones = $usuarioAplicacion->consultarComboCosecha();
        echo "<option value='0'>Selecciona una Cosecha </option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['cse_cos_codigo']."'>".$aplicacion['cse_cos_fecha']."</option>";
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
    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar" || $accion=="actualizar" ){
            $cse_emp_codigo=$_POST['cse_emp_codigo'];
            $cse_cos_codigo=$_POST['cse_cos_codigo'];
            $cse_emp_fecha=$_POST['cse_emp_fecha'];
            $cse_emp_responsable=$_POST['cse_emp_responsable'];
            $cse_emp_manos_caja=$_POST['cse_emp_manos_caja'];
            $cse_emp_real_manos_caja=$_POST['cse_emp_real_manos_caja'];
            $cse_emp_rango_cajas=$_POST['cse_emp_rango_cajas'];
            $cse_emp_real_cajas=$_POST['cse_emp_real_cajas'];
            $cse_emp_estado=$_POST['cse_emp_estado'];
            $cse_emp_cod_producto=$_POST['cse_emp_cod_producto'];
            $cse_emp_cantidad=$_POST['cse_emp_cantidad'];
           
            $perfaplObj = new Empaquetado();
            $valor=$perfaplObj->insertarActualizarEmpaquetado(  $cse_emp_codigo,
                                                                $cse_cos_codigo,
                                                                $cse_emp_fecha,
                                                                $cse_emp_responsable,
                                                                $cse_emp_manos_caja,
                                                                $cse_emp_real_manos_caja,
                                                                $cse_emp_rango_cajas,
                                                                $cse_emp_real_cajas,
                                                                $cse_emp_estado,
                                                                $accion,
                                                                $cse_emp_cod_producto,
                                                                $cse_emp_cantidad
                                                            );
            echo $valor;
        }
        if ($accion == "calcularRangoCaja") {
            $cosechaCodigo = $_POST['cosechaCodigo'];
            $manosCaja = $_POST['manosCaja'];
    
            $empaquetadoObj = new Empaquetado();
            $result = $empaquetadoObj->calcularRangoCaja($cosechaCodigo, $manosCaja);
    
            echo json_encode($result);
        }
        if($accion=="procesar"){
            $cse_emp_codigo=$_POST['cse_emp_codigo'];
            $cse_emp_cantidad=$_POST['cse_emp_cantidad'];
            $cse_emp_cod_producto=$_POST['cse_emp_cod_producto'];
            $perfaplObj = new Empaquetado();
            $valor=$perfaplObj->procesarEmpaquetado($cse_emp_codigo,$cse_emp_cantidad,$cse_emp_cod_producto);
            echo $valor;
        }
        if($accion=="anular"){
            $cse_emp_codigo=$_POST['cse_emp_codigo'];
            $cse_emp_cantidad=$_POST['cse_emp_cantidad'];
            $cse_emp_cod_producto=$_POST['cse_emp_cod_producto'];
            $cse_emp_estado=$_POST['cse_emp_estado'];
            $perfaplObj = new Empaquetado();
            $valor=$perfaplObj->anularEmpaquetado($cse_emp_codigo,$cse_emp_cantidad,$cse_emp_cod_producto,$cse_emp_estado);
            echo $valor;
        }
        
    }

