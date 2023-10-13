<?php
    require_once("../../Clases/Usuario.php");

    if (isset($_POST["filtroUsuario"]) && isset($_POST["filtroEstado"])) {
        $filtroUsuario = $_POST["filtroUsuario"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new Usuario();

        $usuarios = $usuarioObj->consultarUsuarios($filtroUsuario, $filtroEstado);

        foreach ($usuarios as $usuario) {
            $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>";
            echo "<tr>
                    <td>{$usuario["seg_usu_codigo"]}</td>
                    <td>{$usuario["seg_usu_usuario"]}</td>
                    <td>{$usuario["seg_usu_nombres"]}</td>
                    <td>$estado</td>
                    <td>
                        <a href='#addEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
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
            $descripcion=$_POST['nombres'];
            $estado=$_POST['estado'];
            /* echo $estado; */
            $usuario=$_POST['usuario'];
            $clave=$_POST['clave'];
            $usuarioObj = new Usuario();
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->insertarusuarios($descripcion,$usuario,$clave, $estado);
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
        
    }
?>
