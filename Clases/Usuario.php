<?php
require_once('ConexionBD.php');

class Usuario {
    private $conexion;
    private $codigoUsuario;
    private $nombreUsuario;
    private $mailUsuario;
    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    public function validarUsuarioIng($usuario) {
        $sql = "SELECT seg_usu_codigo,seg_usu_nombres,seg_usu_email FROM seg_usuario WHERE seg_usu_usuario = ? ";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($codigoUsuario, $nombreUsuario,$mailUsuario);

        if ($stmt->fetch()) {
            // Usuario válido, almacenar información en propiedades de la clase si es necesario
            return true;
        } else {
            return false;
        }
        
        
    }
    public function validarUsuario($usuario, $clave) {
        $estado='A';
        $sql = "SELECT seg_usu_codigo,seg_usu_nombres,seg_usu_email FROM seg_usuario WHERE seg_usu_usuario = ? AND seg_usu_clave = ? AND seg_usu_estado=?";
        $stmt = $this->conexion->conexion->prepare($sql);
        $stmt->bind_param("sss", $usuario, $clave,$estado);
        $stmt->execute();
        $stmt->bind_result($codigoUsuario, $nombreUsuario,$mailUsuario);

        if ($stmt->fetch()) {
            // Usuario válido, almacenar información en propiedades de la clase si es necesario
            $this->codigoUsuario = $codigoUsuario;
            $this->nombreUsuario = $nombreUsuario;
            $this->mailUsuario   = $mailUsuario;
            return true;
        } else {
            return false;
        }
        
       
    }
    // Método para obtener el código del usuario
    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

    // Método para obtener el nombre del usuario
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }
    public function getMailUsuario() {
        return $this->mailUsuario;
    }
    public function consultarUsuarios($filtroUsuario, $filtroEstado) {
       /*  global $conn; */
        $sql = "SELECT seg_usu_codigo, seg_usu_nombres, seg_usu_usuario, seg_usu_estado,seg_usu_clave,seg_usu_email FROM seg_usuario WHERE 1";

        if ($filtroUsuario != "") {
            $sql .= " AND seg_usu_nombres LIKE '%$filtroUsuario%'";
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

    public function insertarusuarios($descripcion,$usuario,$clave,$estado,$email){
        $resp = $this->validarUsuarioIng($usuario);
        if($resp == false) {
            $sql = "insert into seg_usuario values(0,'$descripcion','$usuario','$clave','$estado','$email')";
            $this->conexion->query($sql);
            return 1;
        }else{
            return 2;
        }

    }
    public function actualizarusuarios($descripcion,$usuario,$clave,$estado,$codigousuario,$email){
        // Evitar problemas de inyección SQL utilizando declaraciones preparadas
        $stmt = $this->conexion->conexion->prepare("UPDATE seg_usuario SET seg_usu_nombres = ?, seg_usu_usuario = ?, seg_usu_clave = ?, seg_usu_estado = ?,seg_usu_email=? WHERE seg_usu_codigo = ?");
        $stmt->bind_param("sssssi", $descripcion, $usuario, $clave, $estado,$email ,$codigousuario);

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
    public function consultarComboUsuarios(){
        $sql = "SELECT 	seg_usu_codigo,
                        seg_usu_usuario
                FROM    seg_usuario
                WHERE	seg_usu_estado = 'A'";
        $result = $this->conexion->query($sql);
        $aplicacion = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }

        return $aplicacion;
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
    public function existeCorreo($correo) {
        // Consulta SQL para verificar la existencia del correo en la tabla seg_usuario
        $consulta = "SELECT COUNT(*) as cantidad FROM seg_usuario WHERE seg_usu_mail = '$correo'";
        $resultado = $this->conexion->query($consulta);

        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            $cantidad = $fila['cantidad'];
            return $cantidad > 0;
        } else {
            // Manejar el error en caso de que la consulta no se ejecute correctamente
            // Puedes registrar el error o devolver false, según tus necesidades
            return false;
        }
    }
}
?>
