<?php
    require_once("../../Clases/Perfil_Aplicacion.php");

    if (isset($_POST["filtroperfil"])) {
        $filtroPerfil = $_POST["filtroperfil"];
        
        $usuarioObj = new AplicacionPerfil();

        $usuarios = $usuarioObj->consultarAplicacionPerfil($filtroPerfil);
        
        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["secuencia"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            /* $estado = $usuario["seg_apl_estado"] == "A" ? "Activo" : "Inactivo"; */
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["secuencia"]}</td>
                    <td style='display: none;'>{$usuario["seg_per_codigo"]}</td>   
                    <td style='display: none;'>{$usuario["seg_apl_codigo"]}</td>   
                    <td>{$usuario["seg_apl_descripcion"]}</td>
                    <td style='display: none;'>{$usuario["seg_acc_det_nuevo"]}</td>
                    <td style='display: none;'>{$usuario["seg_acc_det_editar"]}</td>
                    <td style='display: none;'>{$usuario["seg_acc_det_eliminar"]}</td>
                    <td style='display: none;'>{$usuario["seg_acc_det_imprimir"]}</td>
                    <td style='display: none;'>{$usuario["seg_acc_det_consultar"]}</td>
                    <td style='display: none;'>{$usuario["seg_acc_det_procesar"]}</td>
                    <td style='display: none;'>{$usuario["seg_acc_det_anular"]}</td>             
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['combo'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['combo'];
        $usuarioAplicacion= new AplicacionPerfil();
        $aplicaciones = $usuarioAplicacion->consultarComboPerfil();
        echo "<option value='0'>Selecciona una Perfil</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['seg_per_codigo']."'>".$aplicacion['seg_per_descripcion']."</option>";
        }
    } 
    if (isset($_POST['comboaplicacion'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['comboaplicacion'];
        $usuarioAplicacion= new AplicacionPerfil();
        $aplicaciones = $usuarioAplicacion->consultarComboAplicacion();
        echo "<option value='0'>Selecciona una Aplicacion</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['seg_apl_codigo']."'>".$aplicacion['seg_apl_descripcion']."</option>";
        }
    } 
    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        /* $seg_acc_det_nuevo=$_POST['seg_acc_det_nuevo']; */
        /* $seg_acc_det_editar=$_POST['seg_acc_det_editar']; */
        /* $seg_acc_det_eliminar=$_POST['seg_acc_det_eliminar'];
        $seg_acc_det_imprimir=$_POST['seg_acc_det_imprimir'];
        $seg_acc_det_consultar=$_POST['seg_acc_det_consultar'];
        $seg_acc_det_procesar=$_POST['seg_acc_det_procesar']; */
        /* $seg_acc_det_anular=$_POST['seg_acc_det_anular']; */
        if($accion=="ingresar" || $accion=="actualizar" ){
            
            $seg_per_codigo=$_POST['seg_per_codigo'];
            $seg_apl_codigo=$_POST['seg_apl_codigo'];
            if (isset($_POST['seg_acc_det_nuevo'])) {
                $seg_acc_det_nuevo = $_POST['seg_acc_det_nuevo'];
            } else {
                echo 0;
                return;
            }
            if (isset($_POST['seg_acc_det_editar'])) {
                $seg_acc_det_editar = $_POST['seg_acc_det_editar'];
            } else {
                echo 0;
                return;
            }
            if (isset($_POST['seg_acc_det_eliminar'])) {
                $seg_acc_det_eliminar = $_POST['seg_acc_det_eliminar'];
            } else {
                echo 0;
                return;
            }
            if (isset($_POST['seg_acc_det_imprimir'])) {
                $seg_acc_det_imprimir = $_POST['seg_acc_det_imprimir'];
            } else {
                echo 0;
                return;
            }
            if (isset($_POST['seg_acc_det_consultar'])) {
                $seg_acc_det_consultar = $_POST['seg_acc_det_consultar'];
            } else {
                echo 0;
                return;
            }
            if (isset($_POST['seg_acc_det_procesar'])) {
                $seg_acc_det_procesar = $_POST['seg_acc_det_procesar'];
            } else {
                echo 0;
                return;
            }
            if (isset($_POST['seg_acc_det_anular'])) {
                $seg_acc_det_anular = $_POST['seg_acc_det_anular'];
            } else {
                echo 0;
                return;
            }
            $perfaplObj = new AplicacionPerfil();
            $valor=$perfaplObj->insertarActualizarAplicacionPerfil($seg_per_codigo,$seg_apl_codigo,$seg_acc_det_nuevo,$seg_acc_det_editar,$seg_acc_det_eliminar,$seg_acc_det_imprimir,$seg_acc_det_consultar,$seg_acc_det_procesar,$seg_acc_det_anular,$accion);
            echo $valor;
        }
        if($accion=="eliminar"){
            $seg_per_codigo=$_POST['seg_per_codigo'];
            $seg_apl_codigo=$_POST['seg_apl_codigo'];
            $perfaplObj = new AplicacionPerfil();
            $valor=$perfaplObj->eliminarAplicacionPerfil($seg_per_codigo,$seg_apl_codigo);
            echo $valor;
        }
        
    }
?>
