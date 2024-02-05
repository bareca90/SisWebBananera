<?php
require_once('ConexionBD.php');

class Producto {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarProducto($filtroAplicacion, $filtroEstado) {
       /*  global $conn; */
        $sql = "SELECT 	reb_pro_codigo,
                        reb_pro_descripcion,
                        reb_pro_ubicacion,
                        reb_pro_stock,
                        reb_pro_estado,
                        reb_pro_tipo
                FROM reb_producto
                WHERE 1=1";

        if ($filtroAplicacion != "") {
            $sql .= " AND reb_pro_descripcion LIKE '%$filtroAplicacion%'";
        }

        if ($filtroEstado != "") {
            $sql .= " AND reb_pro_estado = '$filtroEstado'";
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
    public function consultarComboProductoTipo($tipo) {
        $sql = "SELECT reb_pro_codigo, reb_pro_descripcion
                FROM reb_producto
                WHERE 1=1
                AND reb_pro_tipo = ?";
    
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("s", $tipo);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        $roles = [];
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $roles[] = $row;
            }
        }
    
        $stmt->close();
        
        return $roles;
    }
    
    public function insertarProducto($descripcion,$estado,$codusuario,$reb_pro_ubicacion,$reb_pro_stock,$reb_pro_tipo){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        $codigoautogenerado=0;
        
        $query = "INSERT INTO reb_producto   (  reb_pro_codigo, 
                                                reb_pro_descripcion, 
                                                reb_pro_ubicacion, 
                                                reb_pro_stock, 
                                                reb_pro_estado, 
                                                reb_pro_usu_creacion,
                                                reb_pro_usu_fec_hora_creacion,
                                                reb_pro_usu_modificacion,
                                                reb_pro_fec_hora_modificacion,
                                                reb_pro_tipo) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("issisisiss", $codigoautogenerado, $descripcion,$reb_pro_ubicacion,$reb_pro_stock, $estado, $codusuario, $fechaActualEcuador,$codusuario, $fechaActualEcuador,$reb_pro_tipo);

        if ($stmt->execute()) {
            $stmt->close();
            /* return "Producto insertada con éxito."; */
            return 1;
        } else {
            $stmt->close();
            /* return "Error al insertar el producto: " . $stmt->error; */
            return 0;
        }



    }
    public function actualizaProducto($descripcion,$estado,$codusuario,$codaproducto,$reb_pro_ubicacion,$reb_pro_stock,$reb_pro_tipo){
        date_default_timezone_set("America/Guayaquil"); // Establecer la zona horaria de Ecuador
        $fechaActualEcuador = date("Y-m-d H:i:s");
        if (empty($seg_apl_id_padre)) {
            $seg_apl_id_padre = null;
        }
        // Evitar problemas de inyección SQL utilizando declaraciones preparadas
        $stmt = $this->conexion->conexion->prepare("UPDATE reb_producto SET     reb_pro_descripcion=?,
                                                                                reb_pro_ubicacion = ?, 
                                                                                reb_pro_stock = ?, 
                                                                                reb_pro_estado = ?, 
                                                                                reb_pro_usu_modificacion = ?,
                                                                                reb_pro_fec_hora_modificacion=?,
                                                                                reb_pro_tipo=?
                                                                                
                                                                        WHERE reb_pro_codigo = ?");
        $stmt->bind_param("ssisissi",$descripcion,$reb_pro_ubicacion,$reb_pro_stock, $estado, $codusuario, $fechaActualEcuador,$reb_pro_tipo,$codaproducto);

        if ($stmt->execute()) {
            $stmt->close();
            /* return "Datos Actualizados Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al actualizar el Producto: " . $stmt->error; */
            return 0;
        }
        
    }
    public function consultarComboProducto(){
        $sql = "SELECT 	reb_pro_codigo,
                        reb_pro_descripcion
                FROM 	reb_producto
                WHERE	reb_pro_estado	=	'A'";
        $result = $this->conexion->query($sql);
        $aplicacion = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }

        return $aplicacion;
    }
    public function eliminarProducto($codprodcuto){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM reb_producto WHERE reb_pro_codigo = ?");
        $stmt->bind_param("i", $codprodcuto); // "i" indica que se espera un valor entero
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

