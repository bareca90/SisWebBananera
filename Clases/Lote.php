<?php
require_once('ConexionBD.php');

class Lote {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarRoles($filtroRol, $filtroEstado) {
       /*  global $conn; */
        $sql = "SELECT seg_rol_codigo, seg_rol_descripcion, seg_rol_estado FROM seg_rol WHERE 1";

        if ($filtroRol != "") {
            $sql .= " AND seg_rol_descripcion LIKE '%$filtroRol%'";
        }

        if ($filtroEstado != "") {
            $sql .= " AND seg_rol_estado = '$filtroEstado'";
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

    public function insertarRoles($descripcion,$estado,$codusuario){
        $sql = "insert into seg_rol values(0,'$descripcion','$estado',$codusuario,NOW(),$codusuario,NOW() )";
        $this->conexion->query($sql);
        return 1;
    }
    public function actualizaRoles($descripcion,$estado,$codusuario,$codrol){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
       
        // Evitar problemas de inyección SQL utilizando declaraciones preparadas
        $stmt = $this->conexion->conexion->prepare("UPDATE seg_rol SET seg_rol_descripcion = ?, seg_rol_estado = ?, seg_rol_usu_modificacion = ?, seg_rol_fec_hra_modificacion = ? WHERE seg_rol_codigo = ?");
        $stmt->bind_param("ssisi", $descripcion, $estado, $codusuario, $fechaActualEcuador,$codrol);

        if ($stmt->execute()) {
            $stmt->close();
            /* return "Datos Actualizados Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al actualizar el Rol: " . $stmt->error; */
            return 0;
        }
        
    }
    public function consultarComboRol(){
        $sql = "SELECT 	seg_rol_codigo,
                        seg_rol_descripcion
                FROM    seg_rol
                WHERE	seg_rol_estado = 'A'";
        $result = $this->conexion->query($sql);
        $aplicacion = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }

        return $aplicacion;
    }
    public function eliminaruRoles($codigorol){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM seg_rol WHERE seg_rol_codigo = ?");
        $stmt->bind_param("i", $codigorol); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            /* return "Rol Eliminado Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al Eliminar el Rol: " . $stmt->error; */
            return 0;
        }
       
    }
}
?>
