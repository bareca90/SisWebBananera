<?php
    require_once("../../Clases/Rol.php");

    if (isset($_POST["filtroUsuario"]) && isset($_POST["filtroEstado"])) {
        $filtroUsuario = $_POST["filtroUsuario"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new Rol();

        $usuarios = $usuarioObj->consultarRoles($filtroUsuario, $filtroEstado);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["seg_rol_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            $estado = $usuario["seg_rol_estado"] == "A" ? "Activo" : "Inactivo";
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["seg_rol_codigo"]}</td>
                    <td>{$usuario["seg_rol_descripcion"]}</td>
                    <td>$estado</td>
                    
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#deleteEmployeeModal' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['accion'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['accion'];
    } /* else {
        // La clave 'accion' no existe en el array $_POST.
        // Puedes manejar esta situación de alguna manera apropiada.
        // Por ejemplo, establecer un valor predeterminado o mostrar un mensaje de error.
    } */

    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar"){
            $descripcion=$_POST['descripcion'];
            $estado=$_POST['estado'];
            /* echo $estado; */
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $usuarioObj = new Rol();
           
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->insertarRoles($descripcion,$estado,$usuario );
                if($valor)
                {
                    echo"Datos Ingresados con exito";
                }
                else
                {
                    echo"Ingreso de Datos Fallo";
                } 
            
            }
        }
        if($accion=="actualizar"){
            $descripcion=$_POST['descripcion']; //Aqui va la descripcion
            $estado=$_POST['estado'];
            $usuario=$_POST['usuario'];
            $codigo=$_POST['codigo']; //Codigo de el rol
           
            $usuarioObj = new Rol();
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->actualizaRoles($descripcion,$estado,$usuario,$codigo);
                echo $valor;
                /* if($valor)
                {
                    echo"Datos Actualizado con exito";
                }
                else
                {
                    echo"Ingreso de Datos Fallo";
                }  */
            
            }
        }
        if($accion=="eliminar"){
            $codigo=$_POST['codigo'];
            $usuarioObj = new Rol();
            $valor=$usuarioObj->eliminaruRoles($codigo);
        }
        
    }
?>
