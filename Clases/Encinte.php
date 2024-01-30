<?php
require_once('ConexionBD.php');

class Encinte {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarIngresoCompra($cse_lot_codigo,$cse_codigo_prod,$cse_enc_fec_ini) {
        $sql = "SELECT 	cse_enc_codigo, 
                        c.cse_lot_codigo, 
                        CONCAT(l.cse_lot_lote, '->', l.cse_lot_superficie) 'lote',
                        c.cse_codigo_prod, 
                        p.reb_pro_descripcion
                        cse_enc_cantidad, 
                        cse_enc_fec_ini, 
                        cse_enc_fec_fin, 
                        cse_enc_responsable, 
                        cse_enc_semana,
                        cse_enc_nota, 
                        cse_enc_estado

                FROM 			cse_encinte c
                INNER JOIN	    cse_lote l 
                ON				c.cse_lot_codigo	=	l.cse_lot_codigo
                JOIN			reb_producto	p
                ON				p.reb_pro_codigo	=	c.cse_codigo_prod
                WHERE 		    1=	1";
        
        if ($cse_lot_codigo != ""   && $cse_lot_codigo !=0) {
            $sql .= " AND  c.cse_lot_codigo = $cse_lot_codigo";
           
        }
        if ($cse_codigo_prod != ""   && $cse_codigo_prod !=0) {
            $sql .= " AND  c.cse_codigo_prod = $cse_codigo_prod";
           
        }
        if ($cse_enc_fec_ini != "") {
            $sql .= " AND cse_enc_fec_ini >= '$cse_enc_fec_ini'";
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
    
    public function insertarActualizarEncinte(  $cse_enc_codigo,
                                                $cse_lot_codigo,
                                                $cse_codigo_prod,
                                                $cse_enc_cantidad,
                                                $cse_enc_fec_ini,
                                                $cse_enc_fec_fin,
                                                $cse_enc_responsable,
                                                $cse_enc_semana,
                                                $cse_enc_nota,
                                                $cse_enc_estado,
                                                $accion){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $valorInsert =0;
        /* if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        } */
        if ($accion == "ingresar") {
            $query = "INSERT INTO cse_encinte (     cse_enc_codigo, 
                                                    cse_lot_codigo, 
                                                    cse_codigo_prod, 
                                                    cse_enc_cantidad, 
                                                    cse_enc_fec_ini, 
                                                    cse_enc_fec_fin,
                                                    cse_enc_responsable,
                                                    cse_enc_semana,
                                                    cse_enc_nota,
                                                    cse_enc_estado
                                                ) VALUES (?, ?, ?, ?, ?, ?,?,?,?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("iiiisssiss", $valorInsert,$cse_lot_codigo,$cse_codigo_prod,$cse_enc_cantidad,$cse_enc_fec_ini,$cse_enc_fec_fin,$cse_enc_responsable,$cse_enc_semana,$cse_enc_nota,$cse_enc_estado);
    
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
            $stmt = $this->conexion->conexion->prepare("UPDATE cse_encinte SET      cse_lot_codigo=?, 
                                                                                    cse_codigo_prod=?, 
                                                                                    cse_enc_cantidad=?, 
                                                                                    cse_enc_fec_ini=?, 
                                                                                    cse_enc_fec_fin=?,
                                                                                    cse_enc_responsable=?,
                                                                                    cse_enc_semana=?,
                                                                                    cse_enc_nota=?,
                                                                                    cse_enc_estado=?
                                                                                    WHERE   cse_enc_codigo=? ");
            $stmt->bind_param("iiisssissi",$cse_lot_codigo,$cse_codigo_prod,$cse_enc_cantidad,$cse_enc_fec_ini,$cse_enc_fec_fin,$cse_enc_responsable,$cse_enc_semana,$cse_enc_nota,$cse_enc_estado,$cse_enc_codigo);

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
    public function eliminarEncinte($cse_enc_codigo){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM cse_encinte WHERE cse_enc_codigo = ?");
        $stmt->bind_param("i", $cse_enc_codigo); // "i" indica que se espera un valor entero
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

