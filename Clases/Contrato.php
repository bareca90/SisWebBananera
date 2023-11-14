<?php
require_once('ConexionBD.php');

class Contrato {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarContrato($filtroAplicacion, $filtroEstado) {
       /*  global $conn; */
        $sql = "SELECT 	con.reb_con_codigo,
                        con.reb_descripcion,
                        con.reb_prv_codigo,
                        prv.reb_prv_razon_social,
                        con.reb_con_fec_inicio,
                        con.reb_con_fec_fin,
                        con.reb_con_pago,
                        con.reb_con_firma,
                        con.reb_con_estado
                FROM reb_contrato con
                INNER JOIN 	reb_proveedor prv 
                ON 	con.reb_prv_codigo = prv.reb_prv_codigo
                WHERE 1=1";

        if ($filtroAplicacion != "") {
            $sql .= " AND con.reb_descripcion LIKE '%$filtroAplicacion%'";
        }

        if ($filtroEstado != "") {
            $sql .= " AND con.reb_con_estado= '$filtroEstado'";
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
    public function consultarComboProveedor(){
        $sql = "SELECT 	reb_prv_codigo,
                        reb_prv_razon_social
                FROM    reb_proveedor
                WHERE	reb_prv_contratista = 'SI' 
                AND	    reb_prv_estado = 'A'";
        $result = $this->conexion->query($sql);
        $aplicacion = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }

        return $aplicacion;
    }

    public function insertarContrato($descripcion,$estado,$codusuario,$reb_con_fec_inicio,$reb_con_fec_fin,$reb_con_pago,$reb_con_firma,$reb_prv_codigo){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $codigoautogenerado=0;
        // Verificar y asignar valores nulos
        $query = "INSERT INTO reb_contrato  (   reb_con_codigo, 
                                                reb_con_fec_inicio, 
                                                reb_con_fec_fin, 
                                                reb_con_pago, 
                                                reb_con_firma, 
                                                reb_descripcion,
                                                reb_con_estado,
                                                reb_con_usu_creacion,
                                                reb_con_usu_fec_hora_creacion,
                                                reb_con_usu_modificacion,
                                                reb_con_usu_fec_hora_modificacion,
                                                reb_prv_codigo) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?,?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("issdsssisisi", $codigoautogenerado,$reb_con_fec_inicio,$reb_con_fec_fin,$reb_con_pago,$reb_con_firma,$descripcion, $estado, $codusuario, $fechaActualEcuador,$codusuario, $fechaActualEcuador,$reb_prv_codigo);

        if ($stmt->execute()) {
            $stmt->close();
            /* return "Contrato insertada con éxito."; */
            return 1;
        } else {
            $stmt->close();
            /* return "Error al insertar la contrato: " . $stmt->error; */
            return 0;
        }



    }
    public function actualizaContrato($descripcion,$estado,$codusuario,$codcontrato,$reb_con_fec_inicio,$reb_con_fec_fin,$reb_con_pago,$reb_con_firma,$reb_prv_codigo){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        // Evitar problemas de inyección SQL utilizando declaraciones preparadas
        $stmt = $this->conexion->conexion->prepare("UPDATE reb_contrato SET     reb_descripcion = ?,
                                                                                reb_con_fec_inicio=?,
                                                                                reb_con_fec_fin = ?, 
                                                                                reb_con_estado=?,
                                                                                reb_con_usu_modificacion=?,
                                                                                reb_con_usu_fec_hora_modificacion=?,
                                                                                reb_con_pago = ?, 
                                                                                reb_con_firma = ?, 
                                                                                reb_prv_codigo=? 
                                                                        WHERE reb_con_codigo = ?");
        $stmt->bind_param("ssssisdsii",$descripcion,$reb_con_fec_inicio,$reb_con_fec_fin, $estado, $codusuario, $fechaActualEcuador,$reb_con_pago,$reb_con_firma,$reb_prv_codigo,$reb_prv_codigo);

        if ($stmt->execute()) {
            $stmt->close();
            /* return "Datos Actualizados Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al actualizar la Contrato: " . $stmt->error; */
            return 0;
        }
        
    }
    public function consultarComboContrato(){
        $sql = "SELECT 	reb_con_codigo,
                        reb_descripcion
                FROM 	reb_contrato
                WHERE	reb_con_estado	=	'A'";
        $result = $this->conexion->query($sql);
        $aplicacion = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }

        return $aplicacion;
    }
    public function eliminarContrato($codcontrato){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM reb_contrato WHERE reb_con_codigo = ?");
        $stmt->bind_param("i", $codcontrato); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            /* return "Contrato Eliminado Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al Eliminar el Contrato: " . $stmt->error; */
            return 0;
        }
       
    }
}
?>
