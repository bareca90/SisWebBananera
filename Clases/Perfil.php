<?php
require_once('ConexionBD.php');

class Perfil {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarPerfiles($filtroRol, $filtroEstado) {
       /*  global $conn; */
        $sql = "SELECT seg_per_codigo, seg_per_descripcion, seg_per_estado FROM seg_perfil WHERE 1";

        if ($filtroRol != "") {
            $sql .= " AND seg_per_descripcion LIKE '%$filtroRol%'";
        }

        if ($filtroEstado != "") {
            $sql .= " AND seg_per_estado = '$filtroEstado'";
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

    public function insertarPerfiles($descripcion,$estado,$codusuario){
        $sql = "insert into seg_perfil values(0,'$descripcion','$estado',$codusuario,NOW(),$codusuario,NOW() )";
        $this->conexion->query($sql);
        return true;
    }
    public function actualizaPerfiles($descripcion,$estado,$codusuario,$codrol){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
       
        // Evitar problemas de inyección SQL utilizando declaraciones preparadas
        $stmt = $this->conexion->conexion->prepare("UPDATE seg_perfil SET seg_per_descripcion = ?, seg_per_estado = ?, seg_per_usu_modificacion = ?, seg_per_fec_hra_modificacion = ? WHERE seg_per_codigo = ?");
        $stmt->bind_param("ssisi", $descripcion, $estado, $codusuario, $fechaActualEcuador,$codrol);

        if ($stmt->execute()) {
            $stmt->close();
            return "Datos Actualizados Satisfactoriamente";
        } else {
            $stmt->close(); 
            return "Error al actualizar el Perfil: " . $stmt->error;
            /* return 0; */
        }
        
    }
    public function eliminarPerfiles($codigorol){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM seg_perfil WHERE seg_per_codigo = ?");
        $stmt->bind_param("i", $codigorol); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            return "Rol Eliminado Satisfactoriamente";
        } else {
            $stmt->close(); 
            return "Error al Eliminar el Perfil: " . $stmt->error;
            /* return 0; */
        }
       
    }
}
?>
