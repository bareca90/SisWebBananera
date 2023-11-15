<?php
require_once('ConexionBD.php');

class EvaluacionCampo {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarEvaluacionCampo($filtroFecha,$filtroEstado) {
        $sql = "SELECT 	evc_evc_codigo, 
                        evc_evc_productor, 
                        evc_evc_exportador, 
                        evc_evc_placa_contenedor, 
                        evc_evc_fecha_evaluacion, 
                        evc_evc_sellos_exportador, 
                        evc_evc_destino, 
                        evc_evc_calidad, 
                        evc_evc_tipo_empaque, 
                        evc_evc_num_caja, 
                        evc_evc_marca, 
                        evc_evc_fruta_primera, 
                        evc_evc_calibre, 
                        evc_evc_cargo_dedos, 
                        evc_evc_dedos_cluster, 
                        evc_evc_cluster_caja, 
                        evc_evc_estado, 
                        evc.reb_con_codigo,
                        con.reb_descripcion,
                        con.reb_con_fec_inicio,
                        con.reb_con_fec_fin,
                        prv.reb_prv_razon_social
                        
                FROM evc_evaluacion_campo evc 
                INNER JOIN reb_contrato con
                ON evc.reb_con_codigo = con.reb_con_codigo
                JOIN 	reb_proveedor prv
                ON	con.reb_prv_codigo = prv.reb_prv_codigo";

        if ($filtroEstado != "") {
            $sql .= " AND evc_evc_estado Like '$filtroEstado'";
        }
        
        if ($filtroFecha != "") {
            $sql .= " AND evc_evc_fecha_evaluacion >= '$filtroFecha'";
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
    
    public function insertarActualizarEvaluacionCampo(  $evc_evc_codigo, 
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
                                                        $accion){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $valorInsert =0;
        /* if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        } */
        if ($accion == "ingresar") {
            $query = "INSERT INTO evc_evaluacion_campo (    evc_evc_codigo, 
                                                            evc_evc_productor, 
                                                            evc_evc_exportador, 
                                                            evc_evc_placa_contenedor, 
                                                            evc_evc_fecha_evaluacion, 
                                                            evc_evc_sellos_exportador, 
                                                            evc_evc_destino, 
                                                            evc_evc_calidad, 
                                                            evc_evc_tipo_empaque, 
                                                            evc_evc_num_caja, 
                                                            evc_evc_marca, 
                                                            evc_evc_fruta_primera, 
                                                            evc_evc_calibre, 
                                                            evc_evc_cargo_dedos, 
                                                            evc_evc_dedos_cluster, 
                                                            evc_evc_cluster_caja, 
                                                            evc_evc_estado, 
                                                            evc_evc_usu_creacion, 
                                                            evc_evc_fec_hora_creacion, 
                                                            evc_evc_usu_modificacion, 
                                                            evc_evc_fec_hora_modificacion, 
                                                            reb_con_codigo
                                                        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("issssssssissddiisisisi", $valorInsert,
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
                                                        $fechaActualEcuador,
                                                        $codigousuario,
                                                        $fechaActualEcuador,
                                                        $reb_con_codigo);
    
            if ($stmt->execute()) {
                $stmt->close();
                return "Evaluacion Ingresada insertada con éxito.";
                /* return 1;    */
            } else {
                $stmt->close();
                return "Error al insertar la Evaluacion " . $stmt->error;
                /* return 0; */
            }

        }else{
            // Evitar problemas de inyección SQL utilizando declaraciones preparadas
            $stmt = $this->conexion->conexion->prepare("UPDATE evc_evaluacion_campo SET     evc_evc_productor=?, 
                                                                                            evc_evc_exportador=?, 
                                                                                            evc_evc_placa_contenedor=?, 
                                                                                            evc_evc_fecha_evaluacion=?, 
                                                                                            evc_evc_sellos_exportador=?, 
                                                                                            evc_evc_destino=?, 
                                                                                            evc_evc_calidad=?, 
                                                                                            evc_evc_tipo_empaque=?, 
                                                                                            evc_evc_num_caja=?, 
                                                                                            evc_evc_marca=?, 
                                                                                            evc_evc_fruta_primera=?, 
                                                                                            evc_evc_calibre=?, 
                                                                                            evc_evc_cargo_dedos=?, 
                                                                                            evc_evc_dedos_cluster=?, 
                                                                                            evc_evc_cluster_caja=?, 
                                                                                            evc_evc_estado=?, 
                                                                                            evc_evc_usu_modificacion=?, 
                                                                                            evc_evc_fec_hora_modificacion=?, 
                                                                                            reb_con_codigo=?
                                                                                    WHERE   evc_evc_codigo=?  ");
            $stmt->bind_param("ssssssssissddiisisii",   $evc_evc_productor, 
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
                                                        $fechaActualEcuador,
                                                        $reb_con_codigo,
                                                        $evc_evc_codigo);

            if ($stmt->execute()) {
                $stmt->close();
                return "Datos Actualizados Satisfactoriamente";
                /* return 1; */
            } else {
                $stmt->close(); 
                return "Error al actualizar la Cosecha Empaque: " . $stmt->error;
                /* return 0; */
            }
        }
    }
    public function procesarAnularEvaluacionCampo($evc_evc_codigo,$estado){
        // Consulta SQL para actualizar la cantidad de producto en la tabla reb_producto
        $sql = "UPDATE evc_evaluacion_campo SET evc_evc_estado = ? WHERE evc_evc_codigo = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("si", $estado,$evc_evc_codigo); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            return "Se Ejecuto el Proces de Manera Satisfactoria";
            /* return 1; */
        } else {
            $stmt->close(); 
            return "Error Ejecutar el Proceso: " . $stmt->error;
           /*  return 0; */
        }
       
    }

}
?>
