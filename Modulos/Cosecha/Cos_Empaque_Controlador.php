<?php
    require_once("../../Clases/Cosecha_Empaque.php");
    require_once("../../Clases/Cinta.php");

    if (isset($_POST["filtroTipo"]) && isset($_POST["filtroFecha"]) && isset($_POST["filtroCinta"]) && isset($_POST["filtroEstado"])) {
        $filtroTipo = $_POST["filtroTipo"];
        $filtroFecha = $_POST["filtroFecha"];
        $filtroCinta = $_POST["filtroCinta"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new CosechaEmpaque();

        $usuarios = $usuarioObj->consultarCosechaEmpaqye($filtroTipo, $filtroFecha,$filtroCinta,$filtroEstado);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["cse_cse_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            if($usuario["cse_cse_estado"] == "A" ){
                $estado="Activo" ;   
            }
            if($usuario["cse_cse_estado"] == "P" ){
                $estado="Procesado" ;   
            }
            if($usuario["cse_cse_estado"] == "N" ){
                $estado="Anulado" ;   
            }
            $tipo = $usuario["cse_cse_tipo"] == "ECS" ? "Ecuasabor":"Kassandra";
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["cse_cse_codigo"]}</td> 
                    <td>$tipo</td>
                    <td style='display: none;'>{$usuario["cse_cse_tipo"]}</td>
                    <td>{$usuario["cse_cse_num_racimos_procesados"]}</td>
                    <td>{$usuario["cse_cse_total_cajas"]}</td>
                    <td style='display: none;'>{$usuario["cse_cse_num_racimos_rechazadas"]}</td>
                    <td>{$usuario["cse_cse_peso"]}</td>
                    <td style='display: none;'>{$usuario["cse_cse_num_manos_rechazadas"]}</td>
                    <td>{$usuario["cse_cse_merma"]}</td>
                    <td style='display: none;'>{$usuario["cse_cse_num_cajas_procesadas"]}</td>
                    <td style='display: none;'>{$usuario["cse_cse_ratio"]}</td>
                    <td style='display: none;'>{$usuario["cse_cse_num_cajas_enviadas"]}</td>
                    <td style='display: none;'>{$usuario["cse_cse_has"]}</td>
                    <td style='display: none;'>{$usuario["cse_cse_venta"]}</td>
                    <td style='display: none;'>{$usuario["cse_cin_codigo"]}</td>
                    <td>{$usuario["cse_cin_color"]}</td>
                    <td>{$usuario["cse_cse_fecha"]}</td>
                    <td>$estado</td>
                    <td style='display: none;'>{$usuario["cse_cse_estado"]}</td>   
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='search search-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Procesar'>&#xE15C;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Anular'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['combocinta'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        /* $accion = $_POST['combocinta']; */
        $usuarioAplicacion= new Cinta();
        $aplicaciones = $usuarioAplicacion->consultarComboCinta();
        echo "<option value='0'>Selecciona un Color Cinta</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['cse_cin_codigo']."'>".$aplicacion['cse_cin_color']."</option>";
        }
    } 

    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar" || $accion=="actualizar" ){
            $cse_cse_codigo=$_POST['cse_cse_codigo'];
            $cse_cse_tipo=$_POST['cse_cse_tipo'];
            $cse_cse_num_racimos_procesados=$_POST['cse_cse_num_racimos_procesados'];
            $cse_cse_total_cajas=$_POST['cse_cse_total_cajas'];
            $cse_cse_num_racimos_rechazadas=$_POST['cse_cse_num_racimos_rechazadas'];
            $cse_cse_peso=$_POST['cse_cse_peso'];
            $cse_cse_num_manos_rechazadas=$_POST['cse_cse_num_manos_rechazadas'];
            $cse_cse_merma=$_POST['cse_cse_merma'];
            $cse_cse_num_cajas_procesadas=$_POST['cse_cse_num_cajas_procesadas'];
            $cse_cse_ratio=$_POST['cse_cse_ratio'];
            $cse_cse_num_cajas_enviadas=$_POST['cse_cse_num_cajas_enviadas'];
            $cse_cse_has=$_POST['cse_cse_has'];
            $cse_cse_venta=$_POST['cse_cse_venta'];
            $cse_cse_estado=$_POST['cse_cse_estado'];
            $codusuario=$_POST['usuario'];
            $cse_cin_codigo=$_POST['cse_cin_codigo'];
            $cse_cse_fecha=$_POST['cse_cse_fecha'];
            $usuarioObj = new CosechaEmpaque();
            $valor=$usuarioObj->insertarActualizarCosechaEmpaque(   $cse_cse_codigo,
                                                                    $cse_cse_tipo,
                                                                    $cse_cse_num_racimos_procesados,
                                                                    $cse_cse_total_cajas,
                                                                    $cse_cse_num_racimos_rechazadas,
                                                                    $cse_cse_peso,
                                                                    $cse_cse_num_manos_rechazadas,
                                                                    $cse_cse_merma,
                                                                    $cse_cse_num_cajas_procesadas,
                                                                    $cse_cse_ratio,
                                                                    $cse_cse_num_cajas_enviadas,
                                                                    $cse_cse_has,
                                                                    $cse_cse_venta,
                                                                    $cse_cse_estado,
                                                                    $codusuario,
                                                                    $cse_cin_codigo,
                                                                    $cse_cse_fecha,
                                                                    $accion );
            echo $valor;
           
            
        }
        
        if($accion=="procesar" || $accion=="anular" ){
            $cse_cse_codigo=$_POST['cse_cse_codigo'];
            $estado=$_POST['estado'];
            $usuarioObj = new CosechaEmpaque();
            $valor=$usuarioObj->procesarAnularCosechaEmpaque($cse_cse_codigo,$estado);
            echo $valor;
        }
        
        
    }

