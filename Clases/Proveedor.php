<?php
require_once('ConexionBD.php');

class Proveedor {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarProveedor($filtroAplicacion, $filtroEstado) {
       /*  global $conn; */
        $sql = "SELECT 	reb_prv_codigo,
                        reb_prv_razon_social,
                        reb_prv_ced_ruc,
                        reb_prv_correo,
                        reb_prv_contratista,
                        reb_prv_estado
                FROM reb_proveedor
                WHERE 1=1";

        if ($filtroAplicacion != "") {
            $sql .= " AND reb_prv_razon_social LIKE '%$filtroAplicacion%'";
        }

        if ($filtroEstado != "") {
            $sql .= " AND reb_prv_estado = '$filtroEstado'";
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
    
    public function insertarProveedor($descripcion,$estado,$codusuario,$reb_prv_ced_ruc,$reb_prv_correo,$reb_prv_contratista){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $codigoautogenerado=0;
        
        $query = "INSERT INTO reb_proveedor  (  reb_prv_codigo, 
                                                reb_prv_razon_social, 
                                                reb_prv_ced_ruc, 
                                                reb_prv_correo, 
                                                reb_prv_contratista, 
                                                reb_prv_estado,
                                                reb_prv_usu_creacion,
                                                reb_prv_fec_hora_creacion,
                                                reb_prv_usu_modificacion,
                                                reb_prv_fec_hora_modificacion) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("isssssisis", $codigoautogenerado, $descripcion,$reb_prv_ced_ruc,$reb_prv_correo,$reb_prv_contratista, $estado, $codusuario, $fechaActualEcuador,$codusuario, $fechaActualEcuador);

        if ($stmt->execute()) {
            $stmt->close();
            /* return "Proveedor insertada con éxito."; */
            return 1;
        } else {
            $stmt->close();
            /* return "Error al insertar el producto: " . $stmt->error; */
            return 0;
        }



    }
    public function actualizaProveedor($descripcion,$estado,$codusuario,$codproveedor,$reb_prv_ced_ruc,$reb_prv_correo,$reb_prv_contratista){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        // Evitar problemas de inyección SQL utilizando declaraciones preparadas
        $stmt = $this->conexion->conexion->prepare("UPDATE reb_proveedor SET    reb_prv_razon_social=?,
                                                                                reb_prv_ced_ruc = ?, 
                                                                                reb_prv_correo = ?, 
                                                                                reb_prv_contratista = ?, 
                                                                                reb_prv_estado=?,
                                                                                reb_prv_usu_modificacion = ?,
                                                                                reb_prv_fec_hora_modificacion=?
                                                                                
                                                                        WHERE reb_prv_codigo = ?");
        $stmt->bind_param("sssssisi",$descripcion,$reb_prv_ced_ruc,$reb_prv_correo,$reb_prv_contratista, $estado, $codusuario, $fechaActualEcuador,$codproveedor);

        if ($stmt->execute()) {
            $stmt->close();
            /* return "Datos Actualizados Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al actualizar el Proveedor: " . $stmt->error; */
            return 0;
        }
        
    }
    public function consultarComboProveedor(){
        $sql = "SELECT 	reb_prv_codigo,
                        reb_prv_razon_social
                FROM 	reb_proveedor
                WHERE	reb_prv_estado	=	'A'
                AND     reb_prv_contratista='NO'";
                
        $result = $this->conexion->query($sql);
        $aplicacion = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }

        return $aplicacion;
    }
    public function eliminarProveedor($codproveedor){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM reb_proveedor WHERE reb_prv_codigo = ?");
        $stmt->bind_param("i", $codproveedor); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            /* return "Proveedor Eliminado Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al Eliminar el Proveedor: " . $stmt->error; */
            return 0;
        }
       
    }
}
?>
