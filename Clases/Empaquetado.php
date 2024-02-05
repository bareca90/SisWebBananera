<?php
require_once('ConexionBD.php');

class Empaquetado {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarEmpaquetado($filtroFecha,$filtroProducto,$filtroEstado) {
        $sql = "SELECT 	cse_emp_codigo, 
                        e.cse_cos_codigo, 
                        c.cse_cos_fecha,
                        cse_emp_fecha, 
                        cse_emp_responsable, 
                        cse_emp_manos_caja, 
                        cse_emp_real_manos_caja, 
                        cse_emp_rango_cajas, 
                        cse_emp_real_cajas, 
                        cse_emp_estado,
                        cse_emp_cod_producto,
                        p.reb_pro_descripcion,
                        cse_emp_cantidad
                FROM 			cse_empaquetado e
                INNER JOIN 	reb_producto p
                ON				e.cse_emp_cod_producto	=	p.reb_pro_codigo
                JOIN			cse_cosecha	c
                ON				c.cse_cos_codigo	=	e.cse_cos_codigo
                WHERE           1=1
                And             cse_emp_estado<> 'N'";
        
        if ($filtroProducto != ""   && $filtroProducto !=0) {
            $sql .= " AND  cse_emp_cod_producto = $filtroProducto";
           
        }
        if ($filtroFecha != "") {
            $sql .= " AND cse_emp_fecha >= '$filtroFecha'";
        }
        if ($filtroEstado != "") {
            $sql .= " AND cse_emp_estado Like '$filtroEstado'";
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
    
    public function insertarActualizarEmpaquetado(  $cse_emp_codigo,
                                                    $cse_cos_codigo,
                                                    $cse_emp_fecha,
                                                    $cse_emp_responsable,
                                                    $cse_emp_manos_caja,
                                                    $cse_emp_real_manos_caja,
                                                    $cse_emp_rango_cajas,
                                                    $cse_emp_real_cajas,
                                                    $cse_emp_estado,
                                                    $accion,
                                                    $cse_emp_cod_producto,
                                                    $cse_emp_cantidad){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $valorInsert =0;
        /* if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        } */
        if ($accion == "ingresar") {
        $query = "INSERT INTO cse_empaquetado   (   cse_emp_codigo, 
                                                    cse_cos_codigo, 
                                                    cse_emp_fecha, 
                                                    cse_emp_responsable, 
                                                    cse_emp_manos_caja, 
                                                    cse_emp_real_manos_caja,
                                                    cse_emp_rango_cajas,
                                                    cse_emp_real_cajas,
                                                    cse_emp_estado,
                                                    cse_emp_cod_producto,
                                                    cse_emp_cantidad
                                                ) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("iissiiddsii",    $valorInsert,
                                                $cse_cos_codigo,
                                                $cse_emp_fecha,
                                                $cse_emp_responsable,
                                                $cse_emp_manos_caja,
                                                $cse_emp_real_manos_caja,
                                                $cse_emp_rango_cajas,
                                                $cse_emp_real_cajas,
                                                $cse_emp_estado,
                                                $cse_emp_cod_producto,
                                                $cse_emp_cantidad);
    
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
            $stmt = $this->conexion->conexion->prepare("UPDATE cse_empaquetado SET      cse_cos_codigo=?, 
                                                                                        cse_emp_fecha=?, 
                                                                                        cse_emp_responsable=?, 
                                                                                        cse_emp_manos_caja=?, 
                                                                                        cse_emp_real_manos_caja=?,
                                                                                        cse_emp_rango_cajas=?,
                                                                                        cse_emp_real_cajas=?,
                                                                                        cse_emp_estado=?,
                                                                                        cse_emp_cod_producto=?,
                                                                                        cse_emp_cantidad=?
                                                                                WHERE   cse_emp_codigo=? ");
            $stmt->bind_param("issiiddsiii", $cse_cos_codigo,
                                            $cse_emp_fecha,
                                            $cse_emp_responsable,
                                            $cse_emp_manos_caja,
                                            $cse_emp_real_manos_caja,
                                            $cse_emp_rango_cajas,
                                            $cse_emp_real_cajas,
                                            $cse_emp_estado,
                                            $cse_emp_cod_producto,
                                            $cse_emp_cantidad,
                                            $cse_emp_codigo);

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
    public function procesarEmpaquetado($cse_emp_codigo,$cse_emp_cantidad,$cse_emp_cod_producto){
        // Consulta SQL para actualizar la cantidad de producto en la tabla reb_producto
        $sql = "UPDATE reb_producto SET reb_pro_stock = reb_pro_stock + ? WHERE reb_pro_codigo = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("ii", $cse_emp_cantidad,$cse_emp_cod_producto); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            //$stmt->close();
            /* echo "Se Proceso el Ingreso por Compra Satisfactoriamente"; */
            // Ahora, actualiza el estado en el ingreso por compra
            $sqlic = "UPDATE cse_empaquetado SET cse_emp_estado = 'P' WHERE cse_emp_codigo = ?";
            $stmt = $this->conexion->conexion->prepare($sqlic);

            if ($stmt) {
                // Enlazar el número de ingreso por compra
                $stmt->bind_param("i", $cse_emp_codigo);

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
    public function calcularRangoCaja($cosechaCodigo, $manosCaja) {
        $result = [
            'success' => false,
            'valorRangoCaja' => 0
        ];
    
        // Consulta SQL para obtener el valor de cse_cos_racimos_procesados
        $sql = "SELECT cse_cos_racimos_cosechados FROM cse_cosecha WHERE cse_cos_codigo = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("i", $cosechaCodigo);
    
        if ($stmt->execute()) {
            $stmt->bind_result($racimosProcesados);
    
            if ($stmt->fetch()) {
                // Calcular el nuevo valor de rango de cajas
                $nuevoValorRangoCaja = $racimosProcesados / $manosCaja;
                
                $result['success'] = true;
                $result['valorRangoCaja'] = $nuevoValorRangoCaja;
            }
        }
    
        $stmt->close();
        return $result;
    }
    public function anularEmpaquetado($cse_emp_codigo,$cse_emp_cantidad,$cse_emp_cod_producto,$cse_emp_estado){
        // Consulta SQL para actualizar la cantidad de producto en la tabla reb_producto
        if($cse_emp_estado == "A"){
            $sqlic = "UPDATE cse_empaquetado SET cse_emp_estado = 'N' WHERE cse_emp_codigo = ?";
            $stmt = $this->conexion->conexion->prepare($sqlic);

            if ($stmt) {
                // Enlazar el número de ingreso por compra
                $stmt->bind_param("i", $cse_emp_codigo);

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
            $stmt->bind_param("ii", $cse_emp_cantidad,$cse_emp_cod_producto); // "i" indica que se espera un valor entero
            if ($stmt->execute()) {
                //$stmt->close();
                /* echo "Se Anulo el Ingreso por Compra Satisfactoriamente"; */
                // Ahora, actualiza el estado en el ingreso por compra
                $sqlic = "UPDATE cse_empaquetado SET cse_emp_estado = 'N' WHERE cse_emp_codigo = ?";
                $stmt = $this->conexion->conexion->prepare($sqlic);

                if ($stmt) {
                    // Enlazar el número de ingreso por compra
                    $stmt->bind_param("i", $cse_emp_codigo);

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

