<?php
require_once('ConexionBD.php');

class Hectarea {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarHectarea($cse_hec_hectareas) {
       /*  global $conn; */
        $sql = "SELECT 	cse_hec_codigo,
                        h.cse_lot_codigo,
                        CONCAT(l.cse_lot_lote, '->', l.cse_lot_superficie) 'lote',
                        cse_hec_hectareas,
                        cse_hec_estado 
                FROM 		cse_hectarea   h
                INNER JOIN  cse_lote l
                ON 		    h.cse_lot_codigo    =	 l.cse_lot_codigo
                WHERE 	    1=1";
        if ($cse_hec_hectareas != ""   && $cse_hec_hectareas !=0) {
            $sql .= " AND  cse_hec_hectareas = $cse_hec_hectareas";
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
    public function consultarComboHectareaLote($cse_lot_codigo){
        $sql = "SELECT cse_hec_codigo, cse_hec_hectareas FROM cse_hectarea WHERE cse_lot_codigo = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("i", $cse_lot_codigo);
        $stmt->execute();
    
        $result = $stmt->get_result();
        $aplicacion = [];
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }
    
        return $aplicacion;
    }
    
    public function insertarActualizarHectareas($cse_hec_codigo,$cse_lot_codigo,$cse_hec_hectareas,$cse_hec_estado,$accion){
        $valorInsert =0;
        if ($accion == "ingresar") {
            $query = "INSERT INTO cse_hectarea  (   cse_hec_codigo, 
                                                    cse_lot_codigo, 
                                                    cse_hec_hectareas, 
                                                    cse_hec_estado
                                                ) VALUES (?, ?, ?, ?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("iiis", $valorInsert,$cse_lot_codigo,$cse_hec_hectareas,$cse_hec_estado);
    
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
            $stmt = $this->conexion->conexion->prepare("UPDATE cse_hectarea SET cse_lot_codigo=?, 
                                                                                cse_hec_hectareas=?, 
                                                                                cse_hec_estado=?
                                                                            WHERE   cse_hec_codigo=? ");
            $stmt->bind_param("iisi",$cse_lot_codigo,$cse_hec_hectareas,$cse_hec_estado,$cse_hec_codigo);

            if ($stmt->execute()) {
                $stmt->close();
               
                return 1;
            } else {
                $stmt->close(); 
                /* return "Error al actualizar la Aplicacion: " . $stmt->error; */
                return 0;
            }
        }
    }
    
    
    public function eliminarHectarea($cse_hec_codigo){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM cse_hectarea WHERE cse_hec_codigo = ?");
        $stmt->bind_param("i", $cse_hec_codigo); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            /* return "Aplicacion Eliminado Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al Eliminar el Producto: " . $stmt->error; */
            return 0;
        }
       
    }
}

