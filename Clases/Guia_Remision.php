<?php
require_once('ConexionBD.php');

class GuiaRemision {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarGuiaRemision($filtroMotivo,$filtroFecha,$filtroDespachador,$filtroEstado) {
        $sql = "SELECT	gre_gre_codigo, 
                        gre_gre_fecha_emision, 
                        gre_gre_comprobante_venta, 
                        gre_gre_motivo_traslado, 
                        gre_gre_punto_partida, 
                        gre_gre_punto_llegada, 
                        gre_gre_despachador, 
                        gre_gre_transportista, 
                        gre_gre_ruc_ci, 
                        gre_gre_cat_cajas_transportadas,
                        gre_gre_estado_entrega,
                        gre_gre_estado_ent
                        
                FROM    gre_guia_remision 
                WHERE   1=1
                And     gre_gre_estado_entrega<>'N'";
        if ($filtroMotivo != "") {
            $sql .= " AND gre_gre_motivo_traslado LIKE '%$filtroMotivo%'";
        }
        
        if ($filtroEstado != "") {
            $sql .= " AND gre_gre_estado_entrega Like '$filtroEstado'";
        }
        if ($filtroDespachador != "") {
            $sql .= " AND gre_gre_despachador LIKE '%$filtroDespachador%'";
        }
        if ($filtroFecha != "") {
            $sql .= " AND gre_gre_fecha_emision >= '$filtroFecha'";
        }

        $result = $this->conexion->query($sql);
        $roles = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $roles[] = $row;
            }
        }
        
        return $roles;
    }
    
    public function insertarActualizarGuiaRemision(     $gre_gre_codigo, 
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
                                                        $accion){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $valorInsert =0;
        /* if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        } */
        if ($accion == "ingresar") {
            $query = "INSERT INTO gre_guia_remision (       gre_gre_codigo, 
                                                            gre_gre_fecha_emision, 
                                                            gre_gre_comprobante_venta, 
                                                            gre_gre_motivo_traslado, 
                                                            gre_gre_punto_partida, 
                                                            gre_gre_punto_llegada, 
                                                            gre_gre_despachador, 
                                                            gre_gre_transportista, 
                                                            gre_gre_ruc_ci, 
                                                            gre_gre_cat_cajas_transportadas, 
                                                            gre_gre_estado_entrega, 
                                                            gre_gre_usu_creacion, 
                                                            gre_gre_fec_hora_creacion, 
                                                            gre_gre_usu_modificacion, 
                                                            gre_gre_fec_hora_modificacion,
                                                            gre_gre_estado_ent
                                                        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("issssssssisisiss",$valorInsert,
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
                                                $fechaActualEcuador,
                                                $codigousuario,
                                                $fechaActualEcuador,
                                                $gre_gre_estado_ent );
    
            if ($stmt->execute()) {
                $stmt->close();
                /* return "GRE insertada con éxito."; */
                return 1;   
            } else {
                $stmt->close();
                /* return "Error al insertar la GRE: " . $stmt->error; */
                return 0;
            }

        }else{
            // Evitar problemas de inyección SQL utilizando declaraciones preparadas
            $stmt = $this->conexion->conexion->prepare("UPDATE gre_guia_remision SET        gre_gre_fecha_emision=?, 
                                                                                            gre_gre_comprobante_venta=?, 
                                                                                            gre_gre_motivo_traslado=?, 
                                                                                            gre_gre_punto_partida=?, 
                                                                                            gre_gre_punto_llegada=?, 
                                                                                            gre_gre_despachador=?, 
                                                                                            gre_gre_transportista=?, 
                                                                                            gre_gre_ruc_ci=?, 
                                                                                            gre_gre_cat_cajas_transportadas=?, 
                                                                                            gre_gre_estado_entrega=?, 
                                                                                            gre_gre_usu_modificacion=?, 
                                                                                            gre_gre_fec_hora_modificacion=?,
                                                                                            gre_gre_estado_ent=?
                                                                                    WHERE   gre_gre_codigo=? ");
            $stmt->bind_param("ssssssssisissi",     $gre_gre_fecha_emision, 
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
                                                    $fechaActualEcuador,
                                                    $gre_gre_estado_ent,
                                                    $gre_gre_codigo );

            if ($stmt->execute()) {
                $stmt->close();
                /* return "Datos Actualizados Satisfactoriamente"; */
                return 1;
            } else {
                $stmt->close(); 
                /* return "Error al actualizar la Cosecha Empaque: " . $stmt->error; */
                return 0;
            }
        }
    }
    public function procesarAnularGuiasRemision($gre_gre_codigo,$estado){
        // Consulta SQL para actualizar la cantidad de producto en la tabla reb_producto
        $sql = "UPDATE gre_guia_remision SET gre_gre_estado_entrega = ? WHERE gre_gre_codigo = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("si", $estado,$gre_gre_codigo); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            /* return "Se Ejecuto el Proces de Manera Stisfactoria"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error Ejecutar el Proceso: " . $stmt->error; */
            return 0;
        }
       
    }

}
?>
