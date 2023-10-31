<?php
    require_once("../../Clases/Aplicacion.php");

    if (isset($_POST["filtroUsuario"]) && isset($_POST["filtroEstado"])) {
        $filtroUsuario = $_POST["filtroUsuario"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new Aplicacion();

        $usuarios = $usuarioObj->consultarAplicacion($filtroUsuario, $filtroEstado);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["seg_apl_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            $estado = $usuario["seg_apl_estado"] == "A" ? "Activo" : "Inactivo";
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["seg_apl_codigo"]}</td> 
                    <td>{$usuario["seg_apl_descripcion"]}</td>
                    <td>{$usuario["seg_apl_archivo"]}</td>
                    <td>{$usuario["seg_apl_tipo"]}</td>
                    <td>{$usuario["seg_apl_orden"]}</td>
                    <td style='display: none;'>{$usuario["seg_apl_id_padre"]}</td>
                    <td>{$usuario["seg_apl_padre"]}</td>
                    <td>{$usuario["seg_apl_font_icon"]}</td>
                    
                    <td>$estado</td>
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#deleteEmployeeModal' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['combo'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['combo'];
        $usuarioAplicacion= new Aplicacion();
        $aplicaciones = $usuarioAplicacion->consultarComboAplicacion();
        echo "<option value=''>Selecciona una aplicación</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['seg_apl_codigo']."'>".$aplicacion['seg_apl_descripcion']."</option>";
        }
    } 

    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar"){
            $descripcion=$_POST['descripcion'];
            $seg_apl_archivo=$_POST['seg_apl_archivo'];
            $seg_apl_tipo=$_POST['seg_apl_tipo'];
            $estado=$_POST['estado'];
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $seg_apl_orden=$_POST['seg_apl_orden'];
            $seg_apl_id_padre=$_POST['seg_apl_id_padre'];
            $seg_apl_font_icon=$_POST['seg_apl_font_icon'];

            
            $usuarioObj = new Aplicacion();
           
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->insertarAplicacion($descripcion,$estado,$usuario,$seg_apl_tipo,$seg_apl_archivo,$seg_apl_orden,$seg_apl_id_padre,$seg_apl_font_icon );
                echo $valor;
            
            }
        }
        if($accion=="actualizar"){
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
        }
        if($accion=="eliminar"){
            $codigo=$_POST['codigo'];
            $usuarioObj = new Aplicacion();
            $valor=$usuarioObj->eliminarAplicacion($codigo);
        }
        
    }
?>
