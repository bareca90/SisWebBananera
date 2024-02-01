<?php
require_once('ConexionBD.php');

class Cosecha {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarCosecha($cse_cos_tipo,$cse_cos_fecha,$cse_cos_cod_encinte,$cse_cos_estado) {
        $sql = "SELECT 	cse_cos_codigo, 
                        cos_lot_codigo,
                        CONCAT(l.cse_lot_lote, '->', l.cse_lot_superficie) 'lote',
                        c.cse_hec_codigo, 
                        h.cse_hec_hectareas,
                        cse_cos_fecha, 
                        cse_cos_responsable, 
                        cse_cos_racimos_cosechados, 
                        cse_cos_racimos_rechazados, 
                        cse_cos_manos_racimo, 
                        cse_cos_manos_rechazadas, 
                        cse_cos_total_racimos, 
                        cse_cos_total_manos, 
                        cse_cos_pmerma, 
                        cse_cos_estado, 
                        cse_cos_tipo,
                        cse_cos_cod_encinte  ,
                        CONCAT(	'Lote -> ',
                                    l.cse_lot_lote, '->', l.cse_lot_superficie,
                                    ' Cinta -> ',	
                                    p.reb_pro_descripcion ,
                                    'F/I ->',
                                    cse_enc_fec_ini,
                                    'F/F ->',
                                    cse_enc_fec_fin
                                ) 'encinte'
                FROM cse_cosecha c 
                INNER JOIN cse_encinte e 
                ON 		c.cse_cos_cod_encinte	=	 e.cse_enc_codigo
                JOIN		reb_producto p
                ON			p.reb_pro_codigo	= e.cse_codigo_prod
                JOIN		cse_lote	l
                ON			l.cse_lot_codigo	= c.cos_lot_codigo
                JOIN		cse_hectarea	h
                ON			h.cse_hec_codigo	=	c.cse_hec_codigo
                WHERE 1=1  ";

        if ($cse_cos_tipo != "") {
            $sql .= " AND cse_cos_tipo Like '$cse_cos_tipo'";
        }
        if ($cse_cos_estado != "") {
            $sql .= " AND cse_cos_estado Like '$cse_cos_estado'";
        }
        if ($cse_cos_fecha != "") {
            $sql .= " AND cse_cos_fecha >= '$cse_cos_fecha'";
        }
        if ($cse_cos_cod_encinte != "" && $cse_cos_cod_encinte !=0) {
            $sql .= " AND  cse_cos_cod_encinte = $cse_cos_cod_encinte";
        
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
    public function insertarActualizarCosecha(  $cse_cos_codigo,
                                                $cos_lot_codigo,
                                                $cse_hec_codigo,
                                                $cse_cos_fecha,
                                                $cse_cos_responsable,
                                                $cse_cos_racimos_cosechados,
                                                $cse_cos_racimos_rechazados,
                                                $cse_cos_manos_racimo,
                                                $cse_cos_manos_rechazadas,
                                                $cse_cos_total_racimos,
                                                $cse_cos_total_manos,
                                                $cse_cos_pmerma,
                                                $cse_cos_estado,
                                                $cse_cos_tipo,
                                                $cse_cos_cod_encinte,
                                                $accion){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $valorInsert =0;
        /* if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        } */
        if ($accion == "ingresar") {
            $query = "INSERT INTO cse_cosecha (     cse_cos_codigo,
                                                    cos_lot_codigo,
                                                    cse_hec_codigo,
                                                    cse_cos_fecha,
                                                    cse_cos_responsable,
                                                    cse_cos_racimos_cosechados,
                                                    cse_cos_racimos_rechazados,
                                                    cse_cos_manos_racimo,
                                                    cse_cos_manos_rechazadas,
                                                    cse_cos_total_racimos,
                                                    cse_cos_total_manos,
                                                    cse_cos_pmerma,
                                                    cse_cos_estado,
                                                    cse_cos_tipo,
                                                    cse_cos_cod_encinte
                                            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("iiissdddddddssi",    $valorInsert,
                                                    $cos_lot_codigo,
                                                    $cse_hec_codigo,
                                                    $cse_cos_fecha,
                                                    $cse_cos_responsable,
                                                    $cse_cos_racimos_cosechados,
                                                    $cse_cos_racimos_rechazados,
                                                    $cse_cos_manos_racimo,
                                                    $cse_cos_manos_rechazadas,
                                                    $cse_cos_total_racimos,
                                                    $cse_cos_total_manos,
                                                    $cse_cos_pmerma,
                                                    $cse_cos_estado,
                                                    $cse_cos_tipo,
                                                    $cse_cos_cod_encinte);
    
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
            $stmt = $this->conexion->conexion->prepare("UPDATE cse_cosecha SET      cos_lot_codigo=?,
                                                                                    cse_hec_codigo=?,
                                                                                    cse_cos_fecha=?,
                                                                                    cse_cos_responsable=?,
                                                                                    cse_cos_racimos_cosechados=?,
                                                                                    cse_cos_racimos_rechazados=?,
                                                                                    cse_cos_manos_racimo=?,
                                                                                    cse_cos_manos_rechazadas=?,
                                                                                    cse_cos_total_racimos=?,
                                                                                    cse_cos_total_manos=?,
                                                                                    cse_cos_pmerma=?,
                                                                                    cse_cos_estado=?,
                                                                                    cse_cos_tipo=?,
                                                                                    cse_cos_cod_encinte=?
                                                                            WHERE   cse_cos_codigo=? ");
            $stmt->bind_param("iissdddddddssii",$cos_lot_codigo,
                                                $cse_hec_codigo,
                                                $cse_cos_fecha,
                                                $cse_cos_responsable,
                                                $cse_cos_racimos_cosechados,
                                                $cse_cos_racimos_rechazados,
                                                $cse_cos_manos_racimo,
                                                $cse_cos_manos_rechazadas,
                                                $cse_cos_total_racimos,
                                                $cse_cos_total_manos,
                                                $cse_cos_pmerma,
                                                $cse_cos_estado,
                                                $cse_cos_tipo,
                                                $cse_cos_cod_encinte);

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
    public function procesarAnularCosecha($cse_cos_codigo,$estado){
        // Consulta SQL para actualizar la cantidad de producto en la tabla reb_producto
        $sql = "UPDATE cse_cosecha SET cse_cos_estado = ? WHERE cse_cos_codigo = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("si", $estado,$cse_cos_codigo); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            /* return "Se Ejecuto el Proces de Manera Stisfactoria"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error Ejecutar el Proceso: " . $stmt->error; */
            return 0;
        }
       
    }

}

