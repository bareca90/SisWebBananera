<?php
require_once('ConexionBD.php');

class Usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    public function validarUsuario($usuario, $clave) {
        $sql = "SELECT * FROM seg_usuario WHERE seg_usu_usuario = ? AND seg_usu_clave = ?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            return true; // El usuario y la contraseña son correctos
        } else {
            return false; // Usuario o contraseña incorrectos
        }
    }

    public function consultarUsuarios($filtroUsuario, $filtroEstado) {
       /*  global $conn; */
        $sql = "SELECT seg_usu_codigo, seg_usu_nombres, seg_usu_usuario, seg_usu_estado,seg_usu_clave FROM seg_usuario WHERE 1";

        if ($filtroUsuario != "") {
            $sql .= " AND seg_usu_usuario LIKE '%$filtroUsuario%'";
        }

        if ($filtroEstado != "") {
            $sql .= " AND seg_usu_estado = '$filtroEstado'";
        }

        $result = $this->conexion->query($sql);
        $usuarios = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }

        return $usuarios;
    }

    public function insertarusuarios($descripcion,$usuario,$clave,$estado){
        $sql = "insert into seg_usuario values(0,'$descripcion','$usuario','$clave','$estado')";
        $this->conexion->query($sql);
        return true;
    }
    public function actualizarusuarios($descripcion,$usuario,$clave,$estado,$codigousuario){
        
        // Evitar problemas de inyección SQL utilizando declaraciones preparadas
        $stmt = $this->conexion->conexion->prepare("UPDATE seg_usuario SET seg_usu_nombres = ?, seg_usu_usuario = ?, seg_usu_clave = ?, seg_usu_estado = ? WHERE seg_usu_codigo = ?");
        $stmt->bind_param("ssssi", $descripcion, $usuario, $clave, $estado, $codigousuario);

        if ($stmt->execute()) {
            $stmt->close();
            /* return "Datos Actualizados Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al actualizar el usuario: " . $stmt->error; */
            return 0;
        }
        
    }
    public function eliminarusuarios($codigousuario){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM seg_usuario WHERE seg_usu_codigo = ?");
        $stmt->bind_param("i", $codigousuario); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
            /* return "Usuario Eliminado Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
/*             return "Error al Eliminar el usuario: " . $stmt->error; */
            return 0;
        }
       
    }
}
?>
