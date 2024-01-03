<?php
    require_once("../../Clases/Cinta.php");

    if (isset($_POST["filtroUsuario"]) && isset($_POST["filtroEstado"])) {
        $filtroUsuario = $_POST["filtroUsuario"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new Cinta();

        $usuarios = $usuarioObj->consultarCinta($filtroUsuario, $filtroEstado);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["cse_cin_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            $estado = $usuario["cse_cin_estado"] == "A" ? "Activo" : "Inactivo";
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["cse_cin_codigo"]}</td>
                    <td>{$usuario["cse_cin_color"]}</td>
                    <td>{$usuario["cse_cin_fecha"]}</td>
                    <td style='display: none;'>$estado</td>
                    
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
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
            $fecha=$_POST['fecha'];
            $estado=$_POST['estado'];
            $usuarioObj = new Cinta();
           
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->insertarCinta($descripcion,$estado,$fecha );
                echo $valor;
                
            
            }
        }
        if($accion=="actualizar"){
            $descripcion=$_POST['descripcion']; //Aqui va la descripcion
            $estado=$_POST['estado'];
            $fecha=$_POST['fecha'];
            $codigo=$_POST['codigo']; //Codigo de el Cinta
           
            $usuarioObj = new Cinta();
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->actualizaCinta($descripcion,$estado,$fecha,$codigo);
                echo $valor;
               
            }
        }
        if($accion=="eliminar"){
            $codigo=$_POST['codigo'];
            $usuarioObj = new Cinta();
            $valor=$usuarioObj->eliminarCinta($codigo);
            echo $valor;
        }
        
    }
?>
