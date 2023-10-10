<?php
    require_once("../../Clases/Usuario.php");

    if (isset($_POST["filtroUsuario"]) && isset($_POST["filtroEstado"])) {
        $filtroUsuario = $_POST["filtroUsuario"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new Usuario();

        $usuarios = $usuarioObj->consultarUsuarios($filtroUsuario, $filtroEstado);

        foreach ($usuarios as $usuario) {
            $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check'></i>" : "<i class='fas fa-times'></i>";
            echo "<tr>
                    <td>{$usuario["seg_usu_codigo"]}</td>
                    <td>{$usuario["seg_usu_usuario"]}</td>
                    <td>{$usuario["seg_usu_nombres"]}</td>
                    <td>$estado</td>
                </tr>";
        }
    }

    if($_POST['accion']=="ingresar")
    {
        $descripcion=$_POST['nombres'];
        $estado=$_POST['estado'];
        echo $estado;
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
?>
