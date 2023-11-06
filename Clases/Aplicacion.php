<?php
require_once('ConexionBD.php');

class Aplicacion {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarAplicacion($filtroAplicacion, $filtroEstado) {
       /*  global $conn; */
        $sql = "SELECT 	apl.seg_apl_codigo, 
                        apl.seg_apl_descripcion, 
                        apl.seg_apl_archivo,
                        apl.seg_apl_tipo,
                        apl.seg_apl_estado,
                        apl.seg_apl_orden,
                        apl.seg_apl_id_padre,
                        padre.seg_apl_descripcion seg_apl_padre,
                        apl.seg_apl_font_icon 
                FROM seg_aplicacion apl
                left JOIN seg_aplicacion padre
                ON	apl.seg_apl_id_padre	=	padre.seg_apl_codigo
                WHERE 1";

        if ($filtroAplicacion != "") {
            $sql .= " AND apl.seg_apl_descripcion LIKE '%$filtroAplicacion%'";
        }

        if ($filtroEstado != "") {
            $sql .= " AND apl.seg_apl_estado = '$filtroEstado'";
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
    public function consultarComboAplicacion(){
        $sql = "SELECT 	seg_apl_codigo, 
                        seg_apl_descripcion
                FROM    seg_aplicacion 
                WHERE   seg_apl_estado='A'
                And     seg_apl_tipo IN ('MEN','SUB')";
        $result = $this->conexion->query($sql);
        $aplicacion = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }

        return $aplicacion;
    }

    public function insertarAplicacion($descripcion,$estado,$codusuario,$seg_apl_tipo,$seg_apl_archivo,$seg_apl_orden,$seg_apl_id_padre,$seg_apl_font_icon){
       /*  $sql = "insert into seg_aplicacion values(0,'$descripcion','$seg_apl_archivo','$seg_apl_tipo','$estado',$codusuario,NOW(),$codusuario,NOW(),$seg_apl_orden,$seg_apl_id_padre,$seg_apl_font_icon )";
        $this->conexion->query($sql);
        return true; */
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $codigoautogenerado=0;
        // Verificar y asignar valores nulos
        if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        }
        $query = "INSERT INTO seg_aplicacion (  seg_apl_codigo, 
                                                seg_apl_descripcion, 
                                                seg_apl_archivo, 
                                                seg_apl_tipo, 
                                                seg_apl_estado, 
                                                seg_apl_usuario_creacion,
                                                seg_apl_fec_hra_creacion,
                                                seg_apl_usuario_modificacion,
                                                seg_spl_fec_hra_modificacion,
                                                seg_apl_orden,
                                                seg_apl_id_padre,
                                                seg_apl_font_icon) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?,?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("issssisisiis", $codigoautogenerado, $descripcion,$seg_apl_archivo, $seg_apl_tipo, $estado, $codusuario, $fechaActualEcuador,$codusuario, $fechaActualEcuador,$seg_apl_orden,$seg_apl_id_padre,$seg_apl_font_icon);

        if ($stmt->execute()) {
            $stmt->close();
            /* return "Aplicación insertada con éxito."; */
            return 1;   
        } else {
            $stmt->close();
            /* return "Error al insertar la aplicación: " . $stmt->error; */
            return 0;
        }



    }
    public function actualizaAplicacion($descripcion,$estado,$codusuario,$codaplicacion,$seg_apl_archivo,$seg_apl_tipo,$seg_apl_orden,$seg_apl_id_padre,$seg_apl_font_icon){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        }
        // Evitar problemas de inyección SQL utilizando declaraciones preparadas
        $stmt = $this->conexion->conexion->prepare("UPDATE seg_aplicacion SET   seg_apl_descripcion=?,
                                                                                seg_apl_archivo = ?, 
                                                                                seg_apl_tipo = ?, 
                                                                                seg_apl_estado = ?, 
                                                                                seg_apl_usuario_modificacion = ?,
                                                                                seg_spl_fec_hra_modificacion=?,
                                                                                seg_apl_orden=?,
                                                                                seg_apl_id_padre=?,
                                                                                seg_apl_font_icon=? 
                                                                        WHERE seg_apl_codigo = ?");
        $stmt->bind_param("ssssisiisi",$descripcion,$seg_apl_archivo,$seg_apl_tipo, $estado, $codusuario, $fechaActualEcuador,$seg_apl_orden,$seg_apl_id_padre,$seg_apl_font_icon,$codaplicacion);

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
    public function eliminarAplicacion($codaplicacion){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM seg_aplicacion WHERE seg_apl_codigo = ?");
        $stmt->bind_param("i", $codaplicacion); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            /* return "Aplicacion Eliminado Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al Eliminar el Aplicacion: " . $stmt->error; */
            return 0;
        }
       
    }
}
?>
