<?php
require_once('ConexionBD.php');

class CosechaEmpaque {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarCosechaEmpaqye($filtroTipo,$filtroFecha,$filtroCinta,$filtroEstado) {
        $sql = "SELECT	cse.cse_cse_codigo,
                        cse.cse_cse_tipo,
                        cse.cse_cse_num_racimos_procesados,
                        cse.cse_cse_total_cajas,
                        cse.cse_cse_num_racimos_rechazadas,
                        cse.cse_cse_peso,
                        cse.cse_cse_num_manos_rechazadas,
                        cse.cse_cse_merma,
                        cse.cse_cse_num_cajas_procesadas,
                        cse.cse_cse_ratio,
                        cse.cse_cse_num_cajas_enviadas,
                        cse.cse_cse_has,
                        cse.cse_cse_venta,
                        cse.cse_cse_estado,
                        cse.cse_cin_codigo,
                        cin.cse_cin_color,
			            cse.cse_cse_fecha
                        
                FROM cse_cosecha_empaque cse
                INNER JOIN cse_cinta cin
                ON cse.cse_cin_codigo	=	cin.cse_cin_codigo
                WHERE 1=1  ";

        if ($filtroEstado != "") {
            $sql .= " AND cse.cse_cse_estado Like '$filtroEstado'";
        }
        if ($filtroTipo != "") {
            $sql .= " AND cse.cse_cse_tipo Like '$filtroTipo'";
        }
        if ($filtroFecha != "") {
            $sql .= " AND cse.cse_cse_fecha >= '$filtroFecha'";
        }
        if ($filtroCinta != "" && $filtroCinta !=0) {
            $sql .= " AND  cse.cse_cin_codigo = $filtroCinta";
        
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
    
    public function insertarActualizarCosechaEmpaque(   $cse_cse_codigo,
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
                                                        $accion){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $valorInsert =0;
        /* if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        } */
        if ($accion == "ingresar") {
            $query = "INSERT INTO cse_cosecha_empaque (     cse_cse_codigo,
                                                            cse_cse_tipo,
                                                            cse_cse_num_racimos_procesados,
                                                            cse_cse_total_cajas,
                                                            cse_cse_num_racimos_rechazadas,
                                                            cse_cse_peso,
                                                            cse_cse_num_manos_rechazadas,
                                                            cse_cse_merma,
                                                            cse_cse_num_cajas_procesadas,
                                                            cse_cse_ratio,
                                                            cse_cse_num_cajas_enviadas,
                                                            cse_cse_has,
                                                            cse_cse_venta,
                                                            cse_cse_estado,
                                                            cse_cse_usu_creacion,
                                                            cse_cse_fec_hora_creacion,
                                                            cse_cse_usu_modificacion,
                                                            cse_cse_fec_hora_modificacion,
                                                            cse_cin_codigo,
                                                            cse_cse_fecha
                                                        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("isiiidididiidsisisis",   $valorInsert,
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
                                                        $fechaActualEcuador,
                                                        $codusuario,
                                                        $fechaActualEcuador,
                                                        $cse_cin_codigo,
                                                        $cse_cse_fecha);
    
            if ($stmt->execute()) {
                $stmt->close();
                /* return "I/C insertada con éxito."; */
                return 1;   
            } else {
                $stmt->close();
                /* return "Error al insertar la I/C: " . $stmt->error; */
                return 0;
            }

        }else{
            // Evitar problemas de inyección SQL utilizando declaraciones preparadas
            $stmt = $this->conexion->conexion->prepare("UPDATE cse_cosecha_empaque SET      cse_cse_tipo=?,
                                                                                            cse_cse_num_racimos_procesados=?,
                                                                                            cse_cse_total_cajas=?,
                                                                                            cse_cse_num_racimos_rechazadas=?,
                                                                                            cse_cse_peso=?,
                                                                                            cse_cse_num_manos_rechazadas=?,
                                                                                            cse_cse_merma=?,
                                                                                            cse_cse_num_cajas_procesadas=?,
                                                                                            cse_cse_ratio=?,
                                                                                            cse_cse_num_cajas_enviadas=?,
                                                                                            cse_cse_has=?,
                                                                                            cse_cse_venta=?,
                                                                                            cse_cse_estado=?,
                                                                                            cse_cse_usu_modificacion=?,
                                                                                            cse_cse_fec_hora_modificacion=?,
                                                                                            cse_cin_codigo=?,
                                                                                            cse_cse_fecha=?
                                                                                    WHERE   cse_cse_codigo=? ");
            $stmt->bind_param("siiidididiidsisisi", $cse_cse_tipo,
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
                                                    $fechaActualEcuador,
                                                    $cse_cin_codigo,
                                                    $cse_cse_fecha,
                                                    $cse_cse_codigo);

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
    public function procesarAnularCosechaEmpaque($cse_cse_codigo,$estado){
        // Consulta SQL para actualizar la cantidad de producto en la tabla reb_producto
        $sql = "UPDATE cse_cosecha_empaque SET cse_cse_estado = ? WHERE cse_cse_codigo = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("si", $estado,$cse_cse_codigo); // "i" indica que se espera un valor entero
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
