<?php
require_once('ConexionBD.php');

class Cinta {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarCinta($fitroColor, $filtroEstado) {
       /*  global $conn; */
        $sql = "SELECT cse_cin_codigo, cse_cin_color, cse_cin_fecha,cse_cin_estado FROM cse_cinta WHERE 1";

        if ($fitroColor != "") {
            $sql .= " AND cse_cin_color LIKE '%$fitroColor%'";
        }

        if ($filtroEstado != "") {
            $sql .= " AND cse_cin_estado = '$filtroEstado'";
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

    public function insertarCinta($cse_cin_color,$estado,$cse_cin_fecha){
        $codigoautogenerado=0;
        $query = "INSERT INTO cse_cinta (   cse_cin_codigo, 
                                            cse_cin_color, 
                                            cse_cin_fecha, 
                                            cse_cin_estado) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("isss", $codigoautogenerado, $cse_cin_color,$cse_cin_fecha,$estado);

        if ($stmt->execute()) {
            $stmt->close();
            return "Aplicación insertada con éxito.";
            /* return 1;    */
        } else {
            $stmt->close();
            return "Error al insertar la aplicación: " . $stmt->error;
            /* return 0; */
        }   
    }
    public function actualizaCinta($cse_cin_color,$estado,$cse_cin_fecha,$codcinta){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
       
        // Evitar problemas de inyección SQL utilizando declaraciones preparadas
        $stmt = $this->conexion->conexion->prepare("UPDATE cse_cinta SET    cse_cin_color = ?, 
                                                                            seg_per_estado = ?, 
                                                                            cse_cin_fecha = ?, 
                                                                            WHERE cse_cin_codigo = ?");
        $stmt->bind_param("ssisi", $cse_cin_color, $estado, $cse_cin_fecha, $codcinta);

        if ($stmt->execute()) {
            $stmt->close();
            return "Datos Actualizados Satisfactoriamente";
            /* return 1; */
        } else {
            $stmt->close(); 
            return "Error al actualizar el Cinta: " . $stmt->error;
            /* return 0; */
        }
        
    }
    public function consultarComboCinta(){
        $sql = "SELECT 	cse_cin_codigo,
                        cse_cin_color
                FROM 	cse_cinta
                WHERE	cse_cin_estado	=	'A'";
        $result = $this->conexion->query($sql);
        $aplicacion = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }

        return $aplicacion;
    }
    public function eliminarCinta($codigocinta){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM cse_cinta WHERE cse_cin_codigo = ?");
        $stmt->bind_param("i", $codigocinta); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            return "Rol Eliminado Satisfactoriamente";
            /* return 1; */
        } else {
            $stmt->close(); 
            return "Error al Eliminar el Perfil: " . $stmt->error;
            /* return 0; */
        }
       
    }
}
?>
