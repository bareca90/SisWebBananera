<?php 
  session_start();
  require_once('../Clases/Usuario.php');

  // Función para validar el formato de un correo electrónico
  function validarEmail($email) {
      // Patrón de expresión regular para validar un correo electrónico
      $patronEmail = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
      return preg_match($patronEmail, $email);
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $usuario = $_POST['usuario'];
      $clave = $_POST['password'];
  
      $usuarioObj = new Usuario();
  
      if ($usuarioObj->validarUsuario($usuario, $clave)) {
          
          $codigoUsuario = $usuarioObj->getCodigoUsuario();
          $nombreUsuario = $usuarioObj->getNombreUsuario();
          $mailUsuario = $usuarioObj->getMailUsuario();
  
          // Guardar en variables de sesión
          $_SESSION['usuario'] = $usuario;
          $_SESSION['codigoUsuario'] = $codigoUsuario;
          $_SESSION['nombreUsuario'] = $nombreUsuario;
  
          header("Location: inicio.php"); // Redirige a la página de inicio después de iniciar sesión
          exit();
      } else {
        $mensaje_error = "<div class='alert alert-danger'>Acceso Denegado, Usuario o Clave Incorrectas</div>";
      }
  }

  /* if (isset($_POST['btnRecuperar'])) {
        $emailRecuperacion = $_POST['emailRecuperacion'];
        if (validarEmail($emailRecuperacion)) {
            // Verificar si el correo existe en la tabla seg_usuario y coincide con el usuario validado
            if ($emailRecuperacion === $correoUsuario && $usuarioObj->existeCorreo($emailRecuperacion)) {
                // Aquí puedes enviar el correo de recuperación o realizar las acciones necesarias
                // ...

                $mensajeExitoRecuperacion = "<div class='alert alert-success'>Se ha enviado un correo de recuperación a $emailRecuperacion</div>";
            } else {
                $mensajeErrorRecuperacion = "<div class='alert alert-danger'>El correo electrónico no existe o no coincide con el usuario validado</div>";
            }
        } else {
            $mensajeErrorRecuperacion = "<div class='alert alert-danger'>El formato del correo electrónico es incorrecto</div>";
        }
    } */
?>
<!doctype html>
<html lang="es">

<head>
    <title>Login Sis Web Bananera</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Ingreso al Sistema</h3>
                        <form method="post" action="Login.php" class="login-form">
                            <?php if (isset($mensaje_error)) { ?>
                                <p>
                                    <?php echo $mensaje_error; ?>
                                </p>
                            <?php } ?>
                            <div class="form-group">
                                <input name="usuario" type="text" class="form-control rounded-left"
                                    placeholder="Usuario" required>
                            </div>
                            <div class="form-group d-flex">
                                <input name="password" type="password" class="form-control rounded-left"
                                    placeholder="Clave" required>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-75">
                                    <a href="#" data-toggle="modal" data-target="#recuperarModal">¿Deseas recuperar tu contraseña?</a>
                                </div>
                                <!-- <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password</a>
                                </div> -->
                            </div>
                            <div class="form-group">
                                <button name="btningresar" type="submit"
                                    class="btn btn-primary rounded submit p-3 px-5">Iniciar Sesión</button>
                            </div>

                            <!-- <div class="form-group text-center">
                                <a href="#" data-toggle="modal" data-target="#recuperarModal">¿Deseas recuperar tu contraseña?</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Recuperar Contraseña -->
    <div class="modal fade" id="recuperarModal" tabindex="-1" role="dialog" aria-labelledby="recuperarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recuperarModalLabel">Recuperar Contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if (isset($mensajeExitoRecuperacion)) {
                        echo $mensajeExitoRecuperacion;
                    } elseif (isset($mensajeErrorRecuperacion)) {
                        echo $mensajeErrorRecuperacion;
                    }
                    ?>
                    <form method="post" action="Login.php">
                        <div class="form-group">
                            <label for="emailRecuperacion">Correo Electrónico:</label>
                            <input type="email" name="emailRecuperacion" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnRecuperar" class="btn btn-primary">Enviar al Correo</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>

