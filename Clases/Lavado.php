<?php
require_once('ConexionBD.php');

class LavadoDesinfeccion {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarLavado($filtroFecha,$filtroProducto,$filtroEstado) {
        $sql = "SELECT 	cse_des_codigo, 
                        l.reb_pro_codigo, 
                        p.reb_pro_descripcion,
                        cse_des_cantidad, 
                        l.cse_cos_codigo,
                        c.cse_cos_fecha, 
                        cse_des_fecha_lavado, 
                        cse_des_responsable, 
                        cse_des_estado
                FROM 			cse_lavado_desinfeccion	l
                INNER JOIN 	    reb_producto p
                ON				l.reb_pro_codigo	=	p.reb_pro_codigo
                JOIN			cse_cosecha	c
                ON				c.cse_cos_codigo	=	l.cse_cos_codigo
                WHERE			1=1
                And             cse_des_estado<> 'N'";
        
        if ($filtroProducto != ""   && $filtroProducto !=0) {
            $sql .= " AND  l.reb_pro_codigo = $filtroProducto";
           
        }
        if ($filtroFecha != "") {
            $sql .= " AND cse_des_fecha_lavado >= '$filtroFecha'";
        }
        if ($filtroEstado != "") {
            $sql .= " AND cse_des_estado Like '$filtroEstado'";
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
    
    public function insertarActualizarLavado($cse_des_codigo,$reb_pro_codigo,$cse_des_cantidad,$cse_cos_codigo,$cse_des_fecha_lavado,$cse_des_responsable,$cse_des_estado,$accion){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $valorInsert =0;
        /* if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        } */
        if ($accion == "ingresar") {
            $query = "INSERT INTO cse_lavado_desinfeccion ( cse_des_codigo, 
                                                            reb_pro_codigo, 
                                                            cse_des_cantidad, 
                                                            cse_cos_codigo, 
                                                            cse_des_fecha_lavado, 
                                                            cse_des_responsable,
                                                            cse_des_estado
                                                        ) VALUES (?, ?, ?, ?, ?, ?,?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("iiiisss", $valorInsert,$reb_pro_codigo,$cse_des_cantidad,$cse_cos_codigo,$cse_des_fecha_lavado,$cse_des_responsable,$cse_des_estado);
    
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
            $stmt = $this->conexion->conexion->prepare("UPDATE cse_lavado_desinfeccion SET      reb_pro_codigo=?, 
                                                                                                cse_des_cantidad=?, 
                                                                                                cse_cos_codigo=?, 
                                                                                                cse_des_fecha_lavado=?, 
                                                                                                cse_des_responsable=?,
                                                                                                cse_des_estado=?
                                                                                        WHERE   cse_des_codigo=? ");
            $stmt->bind_param("iiisssi",$reb_pro_codigo,$cse_des_cantidad,$cse_cos_codigo,$cse_des_fecha_lavado,$cse_des_responsable,$cse_des_estado,$cse_des_codigo);

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
    public function procesarLavadoDesinfeccion($cse_des_codigo,$cse_des_cantidad,$reb_pro_codigo){
        // Consulta SQL para actualizar la cantidad de producto en la tabla reb_producto
        $sql = "UPDATE reb_producto SET reb_pro_stock = reb_pro_stock + ? WHERE reb_pro_codigo = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("ii", $cse_des_cantidad,$reb_pro_codigo); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            //$stmt->close();
            /* echo "Se Proceso el Ingreso por Compra Satisfactoriamente"; */
            // Ahora, actualiza el estado en el ingreso por compra
            $sqlic = "UPDATE cse_lavado_desinfeccion SET cse_des_estado = 'P' WHERE cse_des_codigo = ?";
            $stmt = $this->conexion->conexion->prepare($sqlic);

            if ($stmt) {
                
                $stmt->bind_param("i", $cse_des_codigo);

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
    public function anularLavadoDesinfeccion($cse_des_codigo,$cse_des_cantidad,$reb_pro_codigo,$cse_des_estado){
        // Consulta SQL para actualizar la cantidad de producto en la tabla reb_producto
        if($cse_des_estado == "A"){
            $sqlic = "UPDATE cse_lavado_desinfeccion SET cse_des_estado = 'N' WHERE cse_des_codigo = ?";
            $stmt = $this->conexion->conexion->prepare($sqlic);

            if ($stmt) {
                // Enlazar el número de ingreso por compra
                $stmt->bind_param("i", $cse_des_codigo);

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
            $stmt->bind_param("ii", $cse_des_cantidad,$reb_pro_codigo); // "i" indica que se espera un valor entero
            if ($stmt->execute()) {
                //$stmt->close();
                /* echo "Se Anulo el Ingreso por Compra Satisfactoriamente"; */
                // Ahora, actualiza el estado en el ingreso por compra
                $sqlic = "UPDATE cse_lavado_desinfeccion SET cse_des_estado = 'N' WHERE cse_des_codigo = ?";
                $stmt = $this->conexion->conexion->prepare($sqlic);

                if ($stmt) {
                    // Enlazar el número de ingreso por compra
                    $stmt->bind_param("i", $cse_des_codigo);

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

