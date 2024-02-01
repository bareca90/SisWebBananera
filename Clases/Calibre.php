<?php
require_once('ConexionBD.php');

class Calibrado {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarCalibrado($filtroFecha,$filtroEstado) {
        $sql = "SELECT	cse_cal_codigo,
                        cl.cse_cos_codigo,
                        c.cse_cos_fecha,
                        cse_cal_fecha,
                        cse_cal_responsable,
                        cse_cal_calibre,
                        cse_cal_estado
                FROM  cse_calibrador cl 
                INNER  JOIN cse_cosecha c
                ON 	cl.cse_cos_codigo	=	c.cse_cos_codigo
                WHERE cse_cal_estado <>'N'";

        if ($filtroEstado != "") {
            $sql .= " AND cse_cal_estado Like '$filtroEstado'";
        }
        
        if ($filtroFecha != "") {
            $sql .= " AND cse_cal_fecha >= '$filtroFecha'";
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
    
    public function insertarActualizarCalinrador    (   $cse_cal_codigo, 
                                                        $cse_cos_codigo, 
                                                        $cse_cal_fecha, 
                                                        $cse_cal_responsable, 
                                                        $cse_cal_calibre, 
                                                        $cse_cal_estado,
                                                        $accion){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $valorInsert =0;
        /* if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        } */
        if ($accion == "ingresar") {
            $query = "INSERT INTO cse_calibrador (  cse_cal_codigo, 
                                                    cse_cos_codigo, 
                                                    cse_cal_fecha, 
                                                    cse_cal_responsable, 
                                                    cse_cal_calibre, 
                                                    cse_cal_estado
                                                ) VALUES (?,?,?,?,?,?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("iissds", $valorInsert,
                                        $cse_cos_codigo, 
                                        $cse_cal_fecha, 
                                        $cse_cal_responsable, 
                                        $cse_cal_calibre, 
                                        $cse_cal_estado);
    
            if ($stmt->execute()) {
                $stmt->close();
                /* return "Evaluacion Ingresada insertada con éxito."; */
                return 1;   
            } else {
                $stmt->close();
                /* return "Error al insertar la Evaluacion " . $stmt->error; */
                return 0;
            }

        }else{
            // Evitar problemas de inyección SQL utilizando declaraciones preparadas
            $stmt = $this->conexion->conexion->prepare("UPDATE cse_calibrador SET   cse_cos_codigo=?, 
                                                                                    cse_cal_fecha=?, 
                                                                                    cse_cal_responsable=?, 
                                                                                    cse_cal_calibre=?, 
                                                                                    cse_cal_estado=?
                                                                                    WHERE   cse_cal_codigo=?  ");
            $stmt->bind_param("issdsi", $cse_cos_codigo, 
                                        $cse_cal_fecha, 
                                        $cse_cal_responsable, 
                                        $cse_cal_calibre, 
                                        $cse_cal_estado,
                                        $cse_cal_codigo );

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
    public function procesarAnularCalibrador($cse_cal_codigo,$estado){
        // Consulta SQL para actualizar la cantidad de producto en la tabla reb_producto
        $sql = "UPDATE cse_calibrador SET cse_cal_estado = ? WHERE cse_cal_codigo = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("si", $estado,$cse_cal_codigo); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            /* return "Se Ejecuto el Proces de Manera Satisfactoria"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error Ejecutar el Proceso: " . $stmt->error; */
            return 0;
        }
       
    }

}

