<?php 
    require_once('../Clases/Usuario.php');
    //Se Conectara con la clase para validar y obtener los datos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST["btningresar"])) {
            if(!empty($_POST["usuario"]) and !empty($_POST["password"])){
                $usuario = $_POST['usuario'];
                $clave = $_POST['password'];
    
                $usuarioObj = new Usuario();
    
                if ($usuarioObj->validarUsuario($usuario, $clave)) {
                    $_SESSION['usuario'] = $usuario;
                    header("Location: inicio.php"); // Redirige a la página de inicio después de iniciar sesión
                    exit();
                } else {
                    $mensaje_error = "<div class='alert alert-danger'>Acceso Denegado, Usuario o Clave Incorrectas</div>";
                }

            }else{
                echo "Campos Vacios";
            }
        }
    }

    /* if(!empty($_POST["btningresar"])){
        if(!empty($_POST["usuario"]) and !empty($_POST["password"])){
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];
            $sql=$conexion->query("select * from seg_usuario where seg_usu_usuario='$usuario' and seg_usu_clave = '$password' ;");
            if($datos=$sql->fetch_object()){
                header("location: inicio.php");
            }else{
                echo "<div class='alert alert-danger'>Acceso Denegado</div>";
            }
        }else{
            echo "Campos Vacios";
        }
    } */
?>