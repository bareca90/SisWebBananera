<?php
    require_once("../../Clases/Guia_Remision.php");
    

    if (isset($_POST["filtroMotivo"]) && isset($_POST["filtroFecha"]) && isset($_POST["filtroDespachador"]) && isset($_POST["filtroEstado"])) {
        $filtroMotivo = $_POST["filtroMotivo"];
        $filtroFecha = $_POST["filtroFecha"];
        $filtroDespachador = $_POST["filtroDespachador"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new GuiaRemision();

        $usuarios = $usuarioObj->consultarGuiaRemision($filtroMotivo, $filtroFecha,$filtroDespachador,$filtroEstado);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["gre_gre_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            if($usuario["gre_gre_estado_entrega"] == "A" ){
                $estado="Activo" ;   
            }
            if($usuario["gre_gre_estado_entrega"] == "P" ){
                $estado="Procesado" ;   
            }
            if($usuario["gre_gre_estado_entrega"] == "N" ){
                $estado="Anulado" ;   
            }
            
            /* $estado = $usuario["gre_gre_estado_entrega"] == "A" ? "Activo" : $usuario["gre_gre_estado_entrega"] == "P" ? "Procesado" : "Anulado"; */
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["gre_gre_codigo"]}</td> 
                    <td>{$usuario["gre_gre_fecha_emision"]}</td>
                    <td>{$usuario["gre_gre_comprobante_venta"]}</td>
                    <td>{$usuario["gre_gre_motivo_traslado"]}</td>
                    <td>{$usuario["gre_gre_punto_partida"]}</td>
                    <td>{$usuario["gre_gre_punto_llegada"]}</td>
                    <td>{$usuario["gre_gre_despachador"]}</td>
                    <td>{$usuario["gre_gre_transportista"]}</td>
                    <td>{$usuario["gre_gre_ruc_ci"]}</td>
                    <td>{$usuario["gre_gre_cat_cajas_transportadas"]}</td>
                    <td>{$usuario["gre_gre_estado_ent"]}</td>
                    <td style='display: none;'>{$usuario["gre_gre_estado_entrega"]}</td>
                    <td>$estado</td>
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='search search-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Procesar'>&#xE15C;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Anular'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar" || $accion=="actualizar" ){
            $gre_gre_codigo=$_POST['gre_gre_codigo']; 
            $gre_gre_fecha_emision=$_POST['gre_gre_fecha_emision']; 
            $gre_gre_comprobante_venta=$_POST['gre_gre_comprobante_venta']; 
            $gre_gre_motivo_traslado=$_POST['gre_gre_motivo_traslado']; 
            $gre_gre_punto_partida=$_POST['gre_gre_punto_partida']; 
            $gre_gre_punto_llegada=$_POST['gre_gre_punto_llegada']; 
            $gre_gre_despachador=$_POST['gre_gre_despachador']; 
            $gre_gre_transportista=$_POST['gre_gre_transportista'];  
            $gre_gre_ruc_ci=$_POST['gre_gre_ruc_ci']; 
            $gre_gre_cat_cajas_transportadas=$_POST['gre_gre_cat_cajas_transportadas']; 
            $gre_gre_estado_entrega=$_POST['gre_gre_estado_entrega']; 
            $codigousuario=$_POST['codigousuario']; 
            $gre_gre_estado_ent=$_POST['gre_gre_estado_ent'];     

            
            $usuarioObj = new GuiaRemision();
            $valor=$usuarioObj->insertarActualizarGuiaRemision(     $gre_gre_codigo, 
                                                                    $gre_gre_fecha_emision, 
                                                                    $gre_gre_comprobante_venta, 
                                                                    $gre_gre_motivo_traslado, 
                                                                    $gre_gre_punto_partida, 
                                                                    $gre_gre_punto_llegada, 
                                                                    $gre_gre_despachador, 
                                                                    $gre_gre_transportista, 
                                                                    $gre_gre_ruc_ci, 
                                                                    $gre_gre_cat_cajas_transportadas, 
                                                                    $gre_gre_estado_entrega, 
                                                                    $codigousuario, 
                                                                    $gre_gre_estado_ent,
                                                                    $accion);
            echo $valor;
           
            
        }
        
        if($accion=="procesar" || $accion=="anular" ){
            $gre_gre_codigo=$_POST['gre_gre_codigo'];
            $estado=$_POST['estado'];
            $usuarioObj = new GuiaRemision();
            $valor=$usuarioObj->procesarAnularGuiasRemision($gre_gre_codigo,$estado);
            echo $valor;
        }
        
        
    }
?>
