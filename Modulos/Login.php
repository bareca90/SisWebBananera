<?php 
  session_start();
  require_once('../Clases/Usuario.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
  }
?>
<!doctype html>
<html lang="es">

<head>
    <title>Login 08</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <!-- <form method="post" action="Login.php"> -->
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
                            <!-- <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password</a>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <button name="btningresar" type="submit"
                                    class="btn btn-primary rounded submit p-3 px-5">Iniciar Sesion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- </form> -->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>