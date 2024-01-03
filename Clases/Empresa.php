<?php
require_once('ConexionBD.php');

class Empresa {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarEmpresa($filtroRol, $filtroEstado) {
       /*  global $conn; */
        $sql = "SELECT seg_emp_codigo, seg_emp_ruc, seg_emp_razon_social,seg_emp_estado FROM seg_empresa WHERE 1";

        if ($filtroRol != "") {
            $sql .= " AND seg_emp_razon_social LIKE '%$filtroRol%'";
        }

        if ($filtroEstado != "") {
            $sql .= " AND seg_emp_estado = '$filtroEstado'";
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

    public function insertarEmpresas($ruc,$descripcion,$estado,$codusuario){
        $sql = "insert into seg_empresa values(0,'$ruc','$descripcion','$estado',$codusuario,NOW(),$codusuario,NOW() )";
        $this->conexion->query($sql);
        return true;
    }
    public function actualizaEmpresa($ruc,$descripcion,$estado,$codusuario,$codempresa){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
       
        // Evitar problemas de inyección SQL utilizando declaraciones preparadas
        $stmt = $this->conexion->conexion->prepare("UPDATE seg_empresa SET seg_emp_ruc=?,seg_emp_razon_social = ?, seg_emp_estado = ?, seg_emp_usu_modificacion = ?, seg_emp_fec_hra_modificacion = ? WHERE seg_emp_codigo = ?");
        $stmt->bind_param("sssisi",$ruc, $descripcion, $estado, $codusuario, $fechaActualEcuador,$codempresa);

        if ($stmt->execute()) {
            $stmt->close();
            /* return "Datos Actualizados Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al actualizar la Empresa: " . $stmt->error; */
            return 0;
        }
        
    }
    public function eliminarEmpresa($codigoempresa){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM seg_empresa WHERE seg_emp_codigo = ?");
        $stmt->bind_param("i", $codigoempresa); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            return "Rol Eliminado Satisfactoriamente";
        } else {
            $stmt->close(); 
            return "Error al Eliminar el Rol: " . $stmt->error;
            /* return 0; */
        }
       
    }
}
?>
