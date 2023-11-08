<?php
require_once('ConexionBD.php');

class AplicacionPerfil {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionBD();
    }

    
    public function consultarAplicacionPerfil($filtroperfil) {
       
        $sql = "SELECT 		ROW_NUMBER() OVER(PARTITION BY perapl.seg_per_codigo) AS secuencia  ,
                            perapl.seg_per_codigo			,
                            perapl.seg_apl_codigo			,
                            apl.seg_apl_descripcion			,
                            perapl.seg_acc_det_nuevo		,
                            perapl.seg_acc_det_editar		,
                            perapl.seg_acc_det_eliminar	    ,
                            perapl.seg_acc_det_imprimir	    ,
                            perapl.seg_acc_det_consultar	,
                            perapl.seg_acc_det_procesar	    ,
                            perapl.seg_acc_det_anular
                FROM 		seg_perfil_aplicacion 	perapl
                INNER JOIN	seg_perfil				perf
                ON			perapl.seg_per_codigo	=	perf.seg_per_codigo
                JOIN		seg_aplicacion			apl
                ON			apl.seg_apl_codigo		=	perapl.seg_apl_codigo
                WHERE		1	                    =	1
                AND         perapl.seg_per_codigo   =   $filtroperfil";

        /* if ($filtroperfil != 0) {
            $sql .= " AND  perapl.seg_per_codigo = $filtroperfil";
           
        } */

        $result = $this->conexion->query($sql);
        $roles = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $roles[] = $row;
            }
        }
        
        return $roles;
    }
    public function consultarComboPerfil(){
        $sql = "SELECT 	seg_per_codigo,
                        seg_per_descripcion
                FROM 	seg_perfil
                WHERE	seg_per_estado	=	'A'";
        $result = $this->conexion->query($sql);
        $aplicacion = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }

        return $aplicacion;
    }
    public function consultarComboAplicacion(){
        $sql = "SELECT 	seg_apl_codigo,
                        seg_apl_descripcion
                FROM 	seg_aplicacion
                WHERE	seg_apl_estado	=	'A'";
        $result = $this->conexion->query($sql);
        $aplicacion = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aplicacion[] = $row;
            }
        }

        return $aplicacion;
    }
    public function insertarActualizarAplicacionPerfil($seg_per_codigo,$seg_apl_codigo,$seg_acc_det_nuevo,$seg_acc_det_editar,$seg_acc_det_eliminar,$seg_acc_det_imprimir,$seg_acc_det_consultar,$seg_acc_det_procesar,$seg_acc_det_anular,$accion){
        if ($accion == "ingresar") {
            $query = "INSERT INTO seg_perfil_aplicacion (   seg_per_codigo, 
                                                            seg_apl_codigo, 
                                                            seg_acc_det_nuevo, 
                                                            seg_acc_det_editar, 
                                                            seg_acc_det_eliminar, 
                                                            seg_acc_det_imprimir,
                                                            seg_acc_det_consultar,
                                                            seg_acc_det_procesar,
                                                            seg_acc_det_anular
                                                        ) VALUES (?, ?, ?, ?, ?, ?,?,?,?)";
            $stmt = $this->conexion->conexion->prepare($query);
            $stmt->bind_param("iiiiiiiii", $seg_per_codigo,$seg_apl_codigo,$seg_acc_det_nuevo,$seg_acc_det_editar,$seg_acc_det_eliminar,$seg_acc_det_imprimir,$seg_acc_det_consultar,$seg_acc_det_procesar,$seg_acc_det_anular);
    
            if ($stmt->execute()) {
                $stmt->close();
               /*  return "Aplicación insertada con éxito."; */
                return 1;   
            } else {
                $stmt->close();
                /* return "Error al insertar la aplicación: " . $stmt->error; */
                return 0;
            }

        }else{
            // Evitar problemas de inyección SQL utilizando declaraciones preparadas
            $stmt = $this->conexion->conexion->prepare("UPDATE seg_perfil_aplicacion SET    seg_acc_det_nuevo=?, 
                                                                                            seg_acc_det_editar=?, 
                                                                                            seg_acc_det_eliminar=?, 
                                                                                            seg_acc_det_imprimir=?,
                                                                                            seg_acc_det_consultar=?,
                                                                                            seg_acc_det_procesar=?,
                                                                                            seg_acc_det_anular=?
                                                                                    WHERE   seg_per_codigo=? 
                                                                                    AND     seg_apl_codigo=?");
            $stmt->bind_param("iiiiiiiii",$seg_acc_det_nuevo,$seg_acc_det_editar,$seg_acc_det_eliminar,$seg_acc_det_imprimir,$seg_acc_det_consultar,$seg_acc_det_procesar,$seg_acc_det_anular,$seg_per_codigo,$seg_apl_codigo);

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
    public function eliminarAplicacionPerfil($seg_per_codigo,$seg_apl_codigo){
        $stmt = $this->conexion->conexion->prepare("DELETE FROM seg_perfil_aplicacion WHERE seg_per_codigo=? And seg_apl_codigo = ?");
        $stmt->bind_param("ii", $seg_per_codigo,$seg_apl_codigo); // "i" indica que se espera un valor entero
        if ($stmt->execute()) {
            $stmt->close();
           /*  return "Aplicacion Eliminado Satisfactoriamente"; */
            return 1;
        } else {
            $stmt->close(); 
            /* return "Error al Eliminar el Aplicacion: " . $stmt->error; */
            return 0;
        }
       
    }
}
?>
