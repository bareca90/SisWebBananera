<?php
    require_once("../../Clases/Lavado.php");
    require_once("../../Clases/Cosecha.php");
    require_once("../../Clases/Producto.php");

    if (isset($_POST["filtroFecha"]) && isset($_POST["filtroProducto"]) && isset($_POST["filtroEstado"])) {
        $filtroFecha = $_POST["filtroFecha"];
        $filtroProducto = $_POST["filtroProducto"];
        $filtroEstado = $_POST["filtroEstado"];
        
        $usuarioObj = new LavadoDesinfeccion();

        $usuarios = $usuarioObj->consultarLavado($filtroFecha,$filtroProducto,$filtroEstado);
        
        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["cse_des_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            if($usuario["cse_des_estado"] == "A" ){
                $estado="Activo" ;   
            }
            if($usuario["cse_des_estado"] == "P" ){
                $estado="Procesado" ;   
            }
            if($usuario["cse_des_estado"] == "N" ){
                $estado="Anulado" ;   
            }
            /* $estado = $usuario["inv_inc_estado"] == "A" ? "Activo" : $usuario["inv_inc_estado"] == "P" ? "Procesado":"Anulado"; */
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["cse_des_codigo"]}</td>
                    <td style='display: none;'>{$usuario["reb_pro_codigo"]}</td>   
                    <td>{$usuario["reb_pro_descripcion"]}</td>
                    <td>{$usuario["cse_des_cantidad"]}</td>
                    <td style='display: none;'>{$usuario["cse_cos_codigo"]}</td>   
                    <td>{$usuario["cse_cos_fecha"]}</td>
                    <td>{$usuario["cse_des_fecha_lavado"]}</td>
                    <td>{$usuario["cse_des_responsable"]}</td>
                    <td>$estado</td>             
                    <td style='display: none;'>{$usuario["cse_des_estado"]}</td>   
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
            $cse_des_codigo=$_POST['cse_des_codigo'];
            $reb_pro_codigo=$_POST['reb_pro_codigo'];
            $cse_des_cantidad=$_POST['cse_des_cantidad'];
            $cse_cos_codigo=$_POST['cse_cos_codigo'];
            $cse_des_fecha_lavado=$_POST['cse_des_fecha_lavado'];
            $cse_des_responsable=$_POST['cse_des_responsable'];
            $cse_des_estado=$_POST['cse_des_estado'];
            
            $perfaplObj = new LavadoDesinfeccion();
            $valor=$perfaplObj->insertarActualizarLavado(   $cse_des_codigo,
                                                            $reb_pro_codigo,
                                                            $cse_des_cantidad,
                                                            $cse_cos_codigo,
                                                            $cse_des_fecha_lavado,
                                                            $cse_des_responsable,
                                                            $cse_des_estado,
                                                            $accion
                                                        );
            echo $valor;
        }
        if($accion=="procesar"){
            $cse_des_codigo=$_POST['cse_des_codigo'];
            $cse_des_cantidad=$_POST['cse_des_cantidad'];
            $reb_pro_codigo=$_POST['reb_pro_codigo'];
            $perfaplObj = new LavadoDesinfeccion();
            $valor=$perfaplObj->procesarLavadoDesinfeccion($cse_des_codigo,$cse_des_cantidad,$reb_pro_codigo);
            echo $valor;
        }
        if($accion=="anular"){
            $cse_des_codigo=$_POST['cse_des_codigo'];
            $cse_des_cantidad=$_POST['cse_des_cantidad'];
            $reb_pro_codigo=$_POST['reb_pro_codigo'];
            $cse_des_estado=$_POST['cse_des_estado'];
            $perfaplObj = new LavadoDesinfeccion();
            $valor=$perfaplObj->anularLavadoDesinfeccion($cse_des_codigo,$cse_des_cantidad,$reb_pro_codigo,$cse_des_estado);
            echo $valor;
        }
        
    }

