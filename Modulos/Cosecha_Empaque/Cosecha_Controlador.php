<?php
    require_once("../../Clases/Cosecha.php");
    require_once("../../Clases/Lote.php");
    require_once("../../Clases/Hectarea.php");

    if (isset($_POST["cse_cos_tipo"]) && isset($_POST["cse_cos_fecha"]) && isset($_POST["cse_cos_cod_encinte"]) && isset($_POST["cse_cos_estado"])) {
        $cse_cos_tipo = $_POST["cse_cos_tipo"];
        $cse_cos_fecha = $_POST["cse_cos_fecha"];
        $cse_cos_cod_encinte = $_POST["cse_cos_cod_encinte"];
        $cse_cos_estado = $_POST["cse_cos_estado"];
        
        $usuarioObj = new Cosecha();

        $usuarios = $usuarioObj->consultarCosecha($cse_cos_tipo,$cse_cos_fecha,$cse_cos_cod_encinte,$cse_cos_estado);
        
        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["cse_cos_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            if($usuario["cse_cos_estado"] == "A" ){
                $estado="Activo" ;   
            }
            if($usuario["cse_cos_estado"] == "P" ){
                $estado="Procesado" ;   
            }
            if($usuario["cse_cos_estado"] == "N" ){
                $estado="Anulado" ;   
            }
            $tipo = $usuario["cse_cos_tipo"] == "ECS" ? "Ecuasabor":"Kassandra";
            /* $estado = $usuario["inv_inc_estado"] == "A" ? "Activo" : $usuario["inv_inc_estado"] == "P" ? "Procesado":"Anulado"; */
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["cse_cos_codigo"]}</td>
                    <td style='display: none;'>{$usuario["cos_lot_codigo"]}</td>   
                    <td>{$usuario["lote"]}</td>
                    <td style='display: none;'>{$usuario["cse_hec_codigo"]}</td>   
                    <td>{$usuario["cse_hec_hectareas"]}</td>
                    <td>{$usuario["cse_cos_fecha"]}</td>
                    <td>{$usuario["cse_cos_responsable"]}</td>
                    <td style='display: none;'>{$usuario["cse_cos_racimos_cosechados"]}</td>   
                    <td style='display: none;'>{$usuario["cse_cos_racimos_rechazados"]}</td>   
                    <td style='display: none;'>{$usuario["cse_cos_manos_racimo"]}</td>   
                    <td style='display: none;'>{$usuario["cse_cos_manos_rechazadas"]}</td>   
                    <td style='display: none;'>{$usuario["cse_cos_total_racimos"]}</td>   
                    <td style='display: none;'>{$usuario["cse_cos_total_manos"]}</td>   
                    <td style='display: none;'>{$usuario["cse_cos_pmerma"]}</td>   
                    <td>$tipo</td>             
                    <td style='display: none;'>{$usuario["cse_cos_tipo"]}</td>   
                    <td style='display: none;'>{$usuario["cse_cos_cod_encinte"]}</td>   
                    <td>{$usuario["encinte"]}</td>
                    <td>$estado</td>             
                    <td style='display: none;'>{$usuario["cse_cos_estado"]}</td>   
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='search search-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Procesar'>&#xE15C;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Anular'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['combolote'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['combolote'];
        $usuarioAplicacion= new Lote();
        $aplicaciones = $usuarioAplicacion->consultarComboLote();
        echo "<option value='0'>Selecciona un Lote</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['cos_lot_codigo']."'>".$aplicacion['lote']."</option>";
        }
    } 
    if (isset($_POST['combohectareas']) && isset($_POST['cse_lot_codigo ']) ) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['combohectareas'];
        $cse_lot_codigo = $_POST['cse_lot_codigo'];
        $usuarioAplicacion= new Hectarea();
        $aplicaciones = $usuarioAplicacion->consultarComboHectareaLote($cse_lot_codigo);
        echo "<option value='0'>Selecciona Hectarea </option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['cse_hec_codigo']."'>".$aplicacion['cse_hec_hectareas']."</option>";
        }
    } 
    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar" || $accion=="actualizar" ){
            $cse_cos_codigo=$_POST['cse_cos_codigo'];
            $cos_lot_codigo=$_POST['cos_lot_codigo'];
            $cse_hec_codigo=$_POST['cse_hec_codigo'];
            $cse_cos_fecha=$_POST['cse_cos_fecha'];
            $cse_cos_responsable=$_POST['cse_cos_responsable'];
            $cse_cos_racimos_cosechados=$_POST['cse_cos_racimos_cosechados'];
            $cse_cos_racimos_rechazados=$_POST['cse_cos_racimos_rechazados'];
            $cse_cos_manos_racimo=$_POST['cse_cos_manos_racimo'];
            $cse_cos_manos_rechazadas=$_POST['cse_cos_manos_rechazadas'];
            $cse_cos_total_racimos=$_POST['cse_cos_total_racimos'];
            $cse_cos_total_manos=$_POST['cse_cos_total_manos'];
            $cse_cos_pmerma=$_POST['cse_cos_pmerma'];
            $cse_cos_estado=$_POST['cse_cos_estado'];
            $cse_cos_tipo=$_POST['cse_cos_tipo'];
            $cse_cos_cod_encinte=$_POST['cse_cos_cod_encinte'];
            $perfaplObj = new Cosecha();
            $valor=$perfaplObj->insertarActualizarCosecha(  $cse_cos_codigo,
                                                            $cos_lot_codigo,
                                                            $cse_hec_codigo,
                                                            $cse_cos_fecha,
                                                            $cse_cos_responsable,
                                                            $cse_cos_racimos_cosechados,
                                                            $cse_cos_racimos_rechazados,
                                                            $cse_cos_manos_racimo,
                                                            $cse_cos_manos_rechazadas,
                                                            $cse_cos_total_racimos,
                                                            $cse_cos_total_manos,
                                                            $cse_cos_pmerma,
                                                            $cse_cos_estado,
                                                            $cse_cos_tipo,
                                                            $cse_cos_cod_encinte,
                                                            $accion
                                                                );
            echo $valor;
        }
        if($accion=="procesar" || $accion=="anular" ){
            $cse_cos_codigo=$_POST['cse_cos_codigo'];
            $estado=$_POST['estado'];
            $usuarioObj = new Cosecha();
            $valor=$usuarioObj->procesarAnularCosecha($cse_cos_codigo,$estado);
            echo $valor;
        }
        
    }

