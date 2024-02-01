<?php
    require_once("../../Clases/Lote.php");

    if (isset($_POST["filtroUsuario"]) && isset($_POST["filtroEstado"])) {
        $filtroUsuario = $_POST["filtroUsuario"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new Lote();

        $usuarios = $usuarioObj->consultarLotes($filtroUsuario, $filtroEstado);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["cse_lot_codigo"];
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["cse_lot_lote"]}</td>
                    <td>{$usuario["cse_lot_superficie"]}</td>
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
            $cse_lot_lote=$_POST['cse_lot_lote'];
            $cse_lot_superficie=$_POST['cse_lot_superficie'];
            /* echo $estado; */
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $usuarioObj = new Lote();
            $valor=$usuarioObj->insertarLotes($cse_lot_lote,$cse_lot_superficie );
            echo $valor;
           
            
        }
        if($accion=="actualizar"){
            $cse_lot_lote=$_POST['cse_lot_lote']; //Aqui va la descripcion
            $cse_lot_superficie=$_POST['cse_lot_superficie'];
            $cse_lot_codigo=$_POST['cse_lot_codigo'];
            $usuarioObj = new Lote();
            $valor=$usuarioObj->actualizaLotes($cse_lot_lote,$cse_lot_superficie,$cse_lot_codigo);
            echo $valor;
            
        }
        if($accion=="eliminar"){
            $codigo=$_POST['codigo'];
            $usuarioObj = new Lote();
            $valor=$usuarioObj->eliminarLotes($codigo);
            echo $valor;
        }
        
    }

