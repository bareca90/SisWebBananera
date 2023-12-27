<?php
class ConexionBD {
    private $host = "localhost"; // Cambia esto si tu base de datos está en un servidor remoto
    private $usuario_bd = "root";
    private $clave_bd = "Sistemas123456";
    private $nombre_bd = "db_bananera";
    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario_bd, $this->clave_bd, $this->nombre_bd);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }
    // Método para obtener mensajes de error
    public function getError() {
        return $this->conexion->error;
    }
    public function query($sql) {
        return $this->conexion->query($sql);
    }
     // Cerrar la conexión
     public function cerrarConexion()
     {
         if ($this->conexion) {
             $this->conexion->close();
         }
     }
}
?>
