<?php
require_once('ConexionBD.php');

class Lote {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarLotes($filtroRol, $filtroEstado) {
       /*  global $conn; */
        $sql = "SELECT cse_lot_codigo, cse_lot_lote, cse_lot_superficie FROM cse_lote WHERE 1";
        
        if ($filtroRol != "" && $filtroRol != 0 ) {
            $sql .= " AND  cse_lot_lote = $filtroRol";
        }

        if ($filtroEstado != "" && $filtroEstado  != 0 ) {
            $sql .= " AND  cse_lot_superficie = $filtroEstado";
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

    public function insertarLotes($cse_lot_lote,$cse_lot_superficie){
        $sql = "insert into cse_lote values(0,$cse_lot_lote,$cse_lot_superficie )";
        $this->conexion->query($sql);
        return 1;
    }
    public function actualizaLotes($cse_lot_lote,$cse_lot_superficie,$cse_lot_codigo){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
       
        // Evitar problemas de inyección SQL utilizando declaraciones preparadas
        $stmt = $this->conexion->conexion->prepare("UPDATE cse_lote SET cse_lot_lote = ?, cse_lot_superficie = ? WHERE cse_lot_codigo = ?");
        $stmt->bind_param("iii", $cse_lot_lote, $cse_lot_superficie,$cse_lot_codigo);

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
    public function consultarComboLote(){
        $sql = "SELECT 	cse_lot_codigo,
                        CONCAT(cse_lot_lote, '->', cse_lot_superficie) 'lote'
                FROM    cse_lote
                ";
        $result = $this->conexion->query($sql);
        $aplicacion = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }

        return $aplicacion;
    }
    public function eliminarLotes($codigorol){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM cse_lote WHERE cse_lot_codigo = ?");
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

