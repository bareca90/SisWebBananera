<?php
    require_once("../../Clases/Accesos.php");
    require_once("../../Clases/Perfil.php");
    require_once("../../Clases/Usuario.php");
    require_once("../../Clases/Rol.php");

    if (isset($_POST["filtroPerfil"]) && isset($_POST["filtroUsuario"])) {
        $filtroPerfil = $_POST["filtroPerfil"];
        $filtroUsuario = $_POST["filtroUsuario"];
        $usuarioObj = new Accesos();

        $usuarios = $usuarioObj->consultarAccesos($filtroPerfil, $filtroUsuario);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["secuencia"];
            /* $estado = $usuario["seg_apl_estado"] == "A" ? "Activo" : "Inactivo"; */
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["secuencia"]}</td> 
                    <td style='display: none;'>{$usuario["seg_per_codigo"]}</td>
                    <td>{$usuario["seg_per_descripcion"]}</td>
                    <td style='display: none;'>{$usuario["seg_usu_codigo"]}</td>
                    <td>{$usuario["seg_usu_nombres"]}</td>
                    <td>{$usuario["seg_usu_usuario"]}</td>
                    <td style='display: none;'>{$usuario["seg_rol_codigo"]}</td>
                    <td>{$usuario["seg_rol_descripcion"]}</td>
                    <td>{$usuario["seg_acc_cab_fecha"]}</td>
                    <td>{$usuario["seg_acc_cab_descripcion"]}</td>
                    
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#deleteEmployeeModal' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['comboperfil'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['comboperfil'];
        $usuarioAplicacion= new Perfil();
        $aplicaciones = $usuarioAplicacion->consultarComboPerfil();
        echo "<option value=''>Selecciona un Perfil</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['seg_per_codigo']."'>".$aplicacion['seg_per_descripcion']."</option>";
        }
    } 
    if (isset($_POST['combousuario'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['combousuario'];
        $usuarioAplicacion= new Usuario();
        $aplicaciones = $usuarioAplicacion->consultarComboUsuarios();
        echo "<option value=''>Selecciona un Usuario</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['seg_usu_codigo']."'>".$aplicacion['seg_usu_usuario']."</option>";
        }
    } 
    if (isset($_POST['comborol'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['comborol'];
        $usuarioAplicacion= new Rol();
        $aplicaciones = $usuarioAplicacion->consultarComboRol();
        echo "<option value=''>Selecciona un Rol</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['seg_rol_codigo']."'>".$aplicacion['seg_rol_descripcion']."</option>";
        }
    } 

    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar"){
            $seg_per_codigo=$_POST['seg_per_codigo'];
            $seg_usu_codigo=$_POST['seg_usu_codigo'];
            $seg_acc_cab_fecha=$_POST['seg_acc_cab_fecha'];
            $seg_acc_cab_descripcion=$_POST['seg_acc_cab_descripcion'];
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $seg_rol_codigo=$_POST['seg_rol_codigo'];
            /* $seg_apl_id_padre=$_POST['seg_apl_id_padre'];
            $seg_apl_font_icon=$_POST['seg_apl_font_icon']; */

            
            $usuarioObj = new Accesos();
           
            if($seg_acc_cab_descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->insertarActualizarAccesos($seg_per_codigo,$seg_usu_codigo,$seg_acc_cab_fecha,$seg_acc_cab_descripcion,$usuario,$seg_rol_codigo,$accion );
                echo $valor;
            
            }
        }
        /* if($accion=="actualizar"){
            $descripcion=$_POST['descripcion'];
            $seg_apl_archivo=$_POST['seg_apl_archivo'];
            $seg_apl_tipo=$_POST['seg_apl_tipo'];
            $estado=$_POST['estado'];
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $seg_apl_orden=$_POST['seg_apl_orden'];
            $seg_apl_id_padre=$_POST['seg_apl_id_padre'];
            $seg_apl_font_icon=$_POST['seg_apl_font_icon'];
            $codigo=$_POST['codigo']; //Codigo de la Aplicacion
           
            $usuarioObj = new Aplicacion();
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->actualizaAplicacion($descripcion,$estado,$usuario,$codigo,$seg_apl_archivo,$seg_apl_tipo,$seg_apl_orden,$seg_apl_id_padre,$seg_apl_font_icon);
                echo $valor;
                
            
            }
        } */
        if($accion=="eliminar"){
            $seg_per_codigo=$_POST['seg_per_codigo'];
            $seg_usu_codigo=$_POST['seg_usu_codigo'];
            $usuarioObj = new Accesos();
            $valor=$usuarioObj->eliminarAccesos($seg_per_codigo,$seg_usu_codigo);
            echo $valor;
        }
        
    }
?>
