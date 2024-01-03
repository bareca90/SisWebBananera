<?php
    require_once("../../Clases/Evaluacion_Campo.php");
    require_once("../../Clases/Contrato.php");

    if (isset($_POST["filtroFecha"]) && isset($_POST["filtroEstado"])) {
        $filtroFecha = $_POST["filtroFecha"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new EvaluacionCampo();

        $usuarios = $usuarioObj->consultarEvaluacionCampo($filtroFecha, $filtroEstado);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["evc_evc_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            /* $estado = $usuario["evc_evc_estado"] == "A" ? "Activo" : $usuario["evc_evc_estado"] == "P" ? "Procesado":"Anulado" ; */
            if($usuario["evc_evc_estado"] == "A" ){
                $estado="Activo" ;   
            }
            if($usuario["evc_evc_estado"] == "P" ){
                $estado="Procesado" ;   
            }
            if($usuario["evc_evc_estado"] == "N" ){
                $estado="Anulado" ;   
            }
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["evc_evc_codigo"]}</td> 
                    <td>{$usuario["evc_evc_productor"]}</td>
                    <td>{$usuario["evc_evc_exportador"]}</td>
                    <td>{$usuario["evc_evc_placa_contenedor"]}</td>
                    <td>{$usuario["evc_evc_fecha_evaluacion"]}</td>
                    <td>{$usuario["evc_evc_sellos_exportador"]}</td>
                    <td style='display: none;'>{$usuario["evc_evc_destino"]}</td>
                    <td style='display: none;'>{$usuario["evc_evc_calidad"]}</td>
                    <td style='display: none;'>{$usuario["evc_evc_tipo_empaque"]}</td>
                    <td style='display: none;'>{$usuario["evc_evc_num_caja"]}</td>
                    <td style='display: none;'>{$usuario["evc_evc_marca"]}</td>
                    <td style='display: none;'>{$usuario["evc_evc_fruta_primera"]}</td>
                    <td style='display: none;'>{$usuario["evc_evc_calibre"]}</td>
                    <td style='display: none;'>{$usuario["evc_evc_cargo_dedos"]}</td>
                    <td style='display: none;'>{$usuario["evc_evc_dedos_cluster"]}</td>
                    <td style='display: none;'>{$usuario["evc_evc_cluster_caja"]}</td>
                    <td style='display: none;'>{$usuario["reb_con_codigo"]}</td>
                    <td>{$usuario["reb_descripcion"]}</td>
                    <td>{$usuario["reb_con_fec_inicio"]}</td>
                    <td>{$usuario["reb_con_fec_fin"]}</td>
                    <td>{$usuario["reb_prv_razon_social"]}</td>
                    <td>$estado</td>
                    <td style='display: none;'>{$usuario["evc_evc_estado"]}</td>
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='search search-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Procesar'>&#xE15C;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Anular'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['combocontrato'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['combocontrato'];
        $usuarioAplicacion= new Contrato();
        $aplicaciones = $usuarioAplicacion->consultarComboContrato();
        echo "<option value=''>Selecciona un Contrato</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['reb_con_codigo']."'>".$aplicacion['reb_descripcion']."</option>";
        }
    } 

    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar" || $accion=="actualizar" ){
            $evc_evc_codigo=$_POST['evc_evc_codigo']; 
            $evc_evc_productor=$_POST['evc_evc_productor']; 
            $evc_evc_exportador=$_POST['evc_evc_exportador']; 
            $evc_evc_placa_contenedor=$_POST['evc_evc_placa_contenedor']; 
            $evc_evc_fecha_evaluacion=$_POST['evc_evc_fecha_evaluacion']; 
            $evc_evc_sellos_exportador=$_POST['evc_evc_sellos_exportador']; 
            $evc_evc_destino=$_POST['evc_evc_destino']; 
            $evc_evc_calidad=$_POST['evc_evc_calidad']; 
            $evc_evc_tipo_empaque=$_POST['evc_evc_tipo_empaque']; 
            $evc_evc_num_caja=$_POST['evc_evc_num_caja']; 
            $evc_evc_marca=$_POST['evc_evc_marca']; 
            $evc_evc_fruta_primera=$_POST['evc_evc_fruta_primera']; 
            $evc_evc_calibre=$_POST['evc_evc_calibre']; 
            $evc_evc_cargo_dedos=$_POST['evc_evc_cargo_dedos']; 
            $evc_evc_dedos_cluster=$_POST['evc_evc_dedos_cluster']; 
            $evc_evc_cluster_caja=$_POST['evc_evc_cluster_caja']; 
            $evc_evc_estado=$_POST['evc_evc_estado']; 
            $codigousuario=$_POST['codigousuario'];
            $reb_con_codigo=$_POST['reb_con_codigo'];
                        
            $usuarioObj = new EvaluacionCampo();
            $valor=$usuarioObj->insertarActualizarEvaluacionCampo(  $evc_evc_codigo, 
                                                                    $evc_evc_productor, 
                                                                    $evc_evc_exportador, 
                                                                    $evc_evc_placa_contenedor, 
                                                                    $evc_evc_fecha_evaluacion, 
                                                                    $evc_evc_sellos_exportador, 
                                                                    $evc_evc_destino, 
                                                                    $evc_evc_calidad, 
                                                                    $evc_evc_tipo_empaque, 
                                                                    $evc_evc_num_caja, 
                                                                    $evc_evc_marca, 
                                                                    $evc_evc_fruta_primera, 
                                                                    $evc_evc_calibre, 
                                                                    $evc_evc_cargo_dedos, 
                                                                    $evc_evc_dedos_cluster, 
                                                                    $evc_evc_cluster_caja, 
                                                                    $evc_evc_estado, 
                                                                    $codigousuario,
                                                                    $reb_con_codigo,
                                                                    $accion );
            echo $valor;
           
            
        }
        
        if($accion=="procesar" || $accion=="anular"){
            $evc_evc_codigo=$_POST['evc_evc_codigo'];
            $estado=$_POST['estado'];
            $usuarioObj = new EvaluacionCampo();
            $valor=$usuarioObj->procesarAnularEvaluacionCampo($evc_evc_codigo,$estado);
            echo $valor;
        }
        
    }
?>
