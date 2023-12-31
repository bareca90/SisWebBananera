<?php 
    session_start();
    require_once('../Clases/Menu.php');
    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
        exit();
    }

    // Obtener el usuario de la sesión
    $usuario = $_SESSION['usuario'];
    $codigoUsuario= $_SESSION['codigoUsuario'] ;
    $nombreUsuario= $_SESSION['nombreUsuario'] ;
    // Instancia de la clase Menu
    $menu = new Menu();
    // Obtener el menú HTML
    $menuHTML = $menu->obtenerMenu($codigoUsuario);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SisWebBan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="../img/favicon.ico">
        <style>
        body {
            background-image: url('https://res.cloudinary.com/daenysooa/image/upload/v1700356924/po0v767amrbdq8p2nft0.jpg');
            background-size: 100% auto; /* Ajusta la imagen de fondo al tamaño de la ventana del navegador */
            background-repeat: no-repeat; /* Evita que la imagen de fondo se repita */
        }
       
    </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Sistema Web Bananera</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- Se lo deja Habilitado para que se posicione a la derecha -->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="Logout.php">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" >
                        <div class="sb-sidenav-menu-heading">Sistema Principal</div>
                        <!-- Aqui van los Menu -->
                        <?php
                           
                            // Muestra el menú HTML generado por la clase Menu
                            echo $menuHTML; 
                        ?>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Inciaste Sesion Como:</div>
                        <?php echo $nombreUsuario?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <!-- Aqui se Cargaran las Pantallas -->
                    <div class="container-fluid px-4">
                        <!-- <h1 class="mt-4">Principal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Principal</li>
                        </ol> -->
                        <div id="contenido">
                            <!-- <h1>Aqui Va el contenido</h1> -->
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sistema Web Bananera 2023 Judie Asencio</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- <script src="crud.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="../assets/demo/chart-area-demo.js"></script> -->
        <!-- <script src="../assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Función para cargar y mostrar el contenido de una aplicación en el div "contenido"
            function cargarAplicacion(id, url) {
                // Realiza una petición AJAX para obtener el contenido de la aplicación seleccionada
                // Luego, muestra el contenido en el div con id "contenido"
                // Puedes usar jQuery o la API Fetch para hacer la solicitud AJAX
                // Aquí te doy un ejemplo utilizando jQuery:

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $('#contenido').html(data);
                    }
                });
            }

            // Manejador de eventos para hacer clic en un elemento del menú
            $('#menu').on('click', 'a', function(e) {
                e.preventDefault(); // Evita la navegación estándar al hacer clic en un enlace
                var tipo = $(this).data('tipo'); // Obtiene el tipo de elemento (menú, submenú o aplicación)
                var id = $(this).data('id'); // Obtiene el ID del elemento
                var url = $(this).data('url'); // Obtiene la URL de la aplicación

                if (tipo === 'aplicacion') {
                    cargarAplicacion(id, url); // Carga la aplicación seleccionada
                }
            });
        </script>
        
    </body>
</html>
