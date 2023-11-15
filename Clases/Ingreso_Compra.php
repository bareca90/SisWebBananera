<?php
require_once('ConexionBD.php');

class IngresoCompra {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarIngresoCompra($filtroFecha,$filtroProducto,$filtroEstado) {
        $sql = "SELECT 	ic.inv_inc_codigo,
                        ic.inv_inc_cantidad,
                        ic.inv_inc_fecha_ingreso,
                        ic.inv_inc_observaciones,
                        ic.inv_inc_estado,
                        ic.reb_pro_codigo,
                        pro.reb_pro_descripcion,
                        ic.reb_prv_codigo,
                        prv.reb_prv_razon_social,
                        inv_inc_ubicacion
                FROM inv_ingreso_compra ic
                INNER JOIN reb_proveedor prv 
                ON	ic.reb_prv_codigo = prv.reb_prv_codigo
                JOIN reb_producto pro
                ON ic.reb_pro_codigo = pro.reb_pro_codigo
                WHERE 1=1";

        if ($filtroProducto != "") {
            $sql .= " AND  ic.reb_pro_codigo = $filtroProducto";
           
        }
        if ($filtroFecha != "") {
            $sql .= " AND ic.inv_inc_fecha_ingreso >= '$filtroFecha'";
        }
        if ($filtroEstado != "") {
            $sql .= " AND ic.inv_inc_estado Like '$filtroEstado'";
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
    
    public function insertarActualizarIngresoxCompra($inv_inc_codigo,$inv_inc_cantidad,$inv_inc_fecha_ingreso,$inv_inc_observaciones,$inv_inc_estado,$usuario,$inv_inc_ubicacion,$reb_pro_codigo,$reb_prv_codigo,$accion){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $valorInsert =0;
        /* if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        } */
        if ($accion == "ingresar") {
            $query = "INSERT INTO inv_ingreso_compra (      inv_inc_codigo, 
                                                            inv_inc_cantidad, 
                                                            inv_inc_fecha_ingreso, 
                                                            inv_inc_observaciones, 
                                                            inv_inc_estado, 
                                                            inv_inc_usu_creacion,
                                                            inv_inc_fec_hora_creacion,
                                                            inv_inc_usu_modificacion,
                                                            inv_inc_fec_hora_modificacion,
                                                            inv_inc_ubicacion,
                                                            reb_pro_codigo,
                                                            reb_prv_codigo
                                                        ) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?,?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("iisssisissii", $valorInsert,$inv_inc_cantidad,$inv_inc_fecha_ingreso,$inv_inc_observaciones,$inv_inc_estado,$usuario,$fechaActualEcuador,$usuario,$fechaActualEcuador,$inv_inc_ubicacion,$reb_pro_codigo,$reb_prv_codigo);
    
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
            $stmt = $this->conexion->conexion->prepare("UPDATE inv_ingreso_compra SET       inv_inc_cantidad=?, 
                                                                                            inv_inc_fecha_ingreso=?, 
                                                                                            inv_inc_observaciones=?, 
                                                                                            inv_inc_usu_modificacion=?,
                                                                                            inv_inc_fec_hora_modificacion=?,
                                                                                            inv_inc_ubicacion=?,
                                                                                            reb_pro_codigo=?,
                                                                                            reb_prv_codigo=?
                                                                                    WHERE   inv_inc_codigo=? ");
            $stmt->bind_param("ississiii",$inv_inc_cantidad,$inv_inc_fecha_ingreso,$inv_inc_observaciones,$usuario,$fechaActualEcuador,$inv_inc_ubicacion,$reb_pro_codigo,$reb_prv_codigo,$inv_inc_codigo);

            if ($stmt->execute()) {
                $stmt->close();
                /* return "Datos Actualizados Satisfactoriamente"; */
                return 1;
            } else {
                $stmt->close(); 
                /* return "Error al actualizar la Aplicacion: " . $stmt->error; */
                return 0;
            }
        }
    }
    public function procesarIngresoCompra($inv_inc_codigo,$inv_inc_cantidad,$reb_pro_codigo){
        // Consulta SQL para actualizar la cantidad de producto en la tabla reb_producto
        $sql = "UPDATE reb_producto SET reb_pro_stock = reb_pro_stock + ? WHERE reb_pro_codigo = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("ii", $inv_inc_cantidad,$reb_pro_codigo); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            //$stmt->close();
            /* echo "Se Proceso el Ingreso por Compra Satisfactoriamente"; */
            // Ahora, actualiza el estado en el ingreso por compra
            $sqlic = "UPDATE inv_ingreso_compra SET inv_inc_estado = 'P' WHERE inv_inc_codigo = ?";
            $stmt = $this->conexion->conexion->prepare($sqlic);

            if ($stmt) {
                // Enlazar el número de ingreso por compra
                $stmt->bind_param("i", $inv_inc_codigo);

                // Ejecutar la segunda consulta para actualizar el estado
                if ($stmt->execute()) {
                    /* echo "Estado de ingreso por compra actualizado con éxito."; */
                    $stmt->close();
                    return 1;
                } else {
                    $stmt->close();
                    /* echo "Error al actualizar el estado de ingreso por compra: " . $stmt->error; */
                    return 1;
                }
                
                // Cerrar la declaración
                
            } 
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al Procesar el Ingreso por Compra: " . $stmt->error; */
            return 0;
        }
       
    }
    public function anularIngresoCompra($inv_inc_codigo,$inv_inc_cantidad,$reb_pro_codigo,$inv_inc_estado){
        // Consulta SQL para actualizar la cantidad de producto en la tabla reb_producto
        if($inv_inc_estado == "A"){
            $sqlic = "UPDATE inv_ingreso_compra SET inv_inc_estado = 'N' WHERE numero_ingreso_compra = ?";
            $stmt = $this->conexion->conexion->prepare($sqlic);

            if ($stmt) {
                // Enlazar el número de ingreso por compra
                $stmt->bind_param("i", $inv_inc_codigo);

                // Ejecutar la segunda consulta para actualizar el estado
                if ($stmt->execute()) {
                    /* echo "Estado de ingreso por compra actualizado con éxito."; */
                    $stmt->close();
                    return 1;
                } else {
                    /* echo "Error al actualizar el estado de ingreso por compra: " . $stmt->error; */
                    $stmt->close();
                    return 0;
                }
                
                // Cerrar la declaración
                
            } 
            return 1;
        }else{
            $sql = "UPDATE reb_producto SET reb_pro_stock = reb_pro_stock - ? WHERE reb_pro_codigo = ?";
            $stmt = $this->conexion->conexion->prepare($sql);
            $stmt->bind_param("ii", $inv_inc_cantidad,$reb_pro_codigo); // "i" indica que se espera un valor entero
            if ($stmt->execute()) {
                //$stmt->close();
                /* echo "Se Anulo el Ingreso por Compra Satisfactoriamente"; */
                // Ahora, actualiza el estado en el ingreso por compra
                $sqlic = "UPDATE inv_ingreso_compra SET inv_inc_estado = 'N' WHERE inv_inc_codigo = ?";
                $stmt = $this->conexion->conexion->prepare($sqlic);

                if ($stmt) {
                    // Enlazar el número de ingreso por compra
                    $stmt->bind_param("i", $inv_inc_codigo);

                    // Ejecutar la segunda consulta para actualizar el estado
                    if ($stmt->execute()) {
                        /* echo "Estado de ingreso por compra actualizado con éxito."; */
                        $stmt->close();
                        return 1;
                    } else {
                        /* echo "Error al actualizar el estado de ingreso por compra: " . $stmt->error; */
                        $stmt->close();
                        return 1;
                    }
                    
                    // Cerrar la declaración
                    
                } 
                return 1;
            } else {
                $stmt->close(); 
                /* return "Error al Procesar el Ingreso por Compra: " . $stmt->error; */
                return 0;
            }
        }
        
       
    }
}
?>
