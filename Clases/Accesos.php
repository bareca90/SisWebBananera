<?php
require_once('ConexionBD.php');

class Accesos {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarAccesos($filtroperfil,$filtrousuario) {
       /*  global $conn; */
        $sql = "SELECT 	ROW_NUMBER() OVER(PARTITION BY acc.seg_per_codigo) AS secuencia  ,
                        acc.seg_per_codigo,
                        per.seg_per_descripcion,
                        acc.seg_usu_codigo,
                        usu.seg_usu_nombres,
                        usu.seg_usu_usuario,
                        acc.seg_rol_codigo,
                        rol.seg_rol_descripcion,
                        acc.seg_acc_cab_fecha,
                        acc.seg_acc_cab_descripcion
                FROM 			seg_accesos acc
                INNER JOIN	seg_perfil per 
                ON				acc.seg_per_codigo 	= 	per.seg_per_codigo
                JOIN			seg_usuario usu
                ON				acc.seg_usu_codigo	=	usu.seg_usu_codigo
                JOIN			seg_rol rol 
                ON				acc.seg_rol_codigo	=	rol.seg_rol_codigo
                WHERE           1=1";

        if($filtroperfil > 0) {
            $sql .= " AND acc.seg_per_codigo = $filtroperfil";
        }
        if ($filtrousuario != "") {
            $sql .= " AND usu.seg_usu_nombres LIKE '%$filtrousuario%'";
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
    
    

    public function insertarActualizarAccesos($seg_per_codigo,$seg_usu_codigo,$seg_acc_cab_fecha,$seg_acc_cab_descripcion,$codusuario,$seg_rol_codigo,$accion){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        if($accion=="ingresar"){
            $query = "INSERT INTO seg_accesos  (    seg_per_codigo, 
                                                    seg_usu_codigo, 
                                                    seg_acc_cab_fecha,
                                                    seg_acc_cab_descripcion,
                                                    seg_acc_cab_usu_creacion,
                                                    seg_acc_cab_fec_hra_creacion,
                                                    seg_acc_cab_usu_modificacion,
                                                    seg_acc_cab_fec_hra_modificacion,                                                    
                                                    seg_rol_codigo) VALUES (?, ?, ?, ?, ?, ?,?,?,?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("iissisisi", $seg_per_codigo,$seg_usu_codigo,$seg_acc_cab_fecha,$seg_acc_cab_descripcion,$codusuario,$fechaActualEcuador,$codusuario,$fechaActualEcuador,$seg_rol_codigo);

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
        /* if($accion=="actualizar"){
            $stmt = $this->conexion->conexion->prepare("UPDATE seg_accesos SET      seg_acc_cab_fecha=?,
                                                                                    seg_acc_cab_descripcion=?,
                                                                                    seg_acc_cab_usu_modificacion=?,
                                                                                    seg_acc_cab_fec_hra_modificacion=?,                                                    
                                                                                    seg_rol_codigo
                                                                            WHERE   seg_per_codigo = ?
                                                                            AND     seg_usu_codigo=?");
            $stmt->bind_param("ssii",$seg_acc_cab_fecha,$seg_acc_cab_descripcion,$codusuario,$fechaActualEcuador,$codusuario,$fechaActualEcuador,$seg_rol_codigo);

            if ($stmt->execute()) {
                $stmt->close();
                return 1;
            } else {
                $stmt->close(); 
                return 0;
            }

        } */
    }
    
    public function eliminarAccesos($seg_per_codigo,$seg_usu_codigo){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM seg_accesos WHERE seg_per_codigo = ? AND seg_usu_codigo=?");
        $stmt->bind_param("ii", $seg_per_codigo,$seg_usu_codigo); // "i" indica que se espera un valor entero
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
