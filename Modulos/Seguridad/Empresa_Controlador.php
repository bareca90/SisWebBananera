<?php
    require_once("../../Clases/Empresa.php");

    if (isset($_POST["filtroUsuario"]) && isset($_POST["filtroEstado"])) {
        $filtroUsuario = $_POST["filtroUsuario"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new Empresa();

        $usuarios = $usuarioObj->consultarEmpresa($filtroUsuario, $filtroEstado);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["seg_emp_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            $estado = $usuario["seg_emp_estado"] == "A" ? "Activo" : "Inactivo";
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["seg_emp_codigo"]}</td>
                    <td>{$usuario["seg_emp_ruc"]}</td>
                    <td>{$usuario["seg_emp_razon_social"]}</td>
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
            $ruc=$_POST['ruc'];
            $descripcion=$_POST['descripcion'];
            $estado=$_POST['estado'];
            /* echo $estado; */
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $usuarioObj = new Empresa();
           
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->insertarEmpresas($ruc,$descripcion,$estado,$usuario );
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
            $ruc=$_POST['ruc'];
            $descripcion=$_POST['descripcion']; //Aqui va la descripcion
            $estado=$_POST['estado'];
            $usuario=$_POST['usuario'];
            $codigo=$_POST['codigo']; //Codigo de el rol
           
            $usuarioObj = new Empresa();
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->actualizaEmpresa($ruc,$descripcion,$estado,$usuario,$codigo);
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
            $usuarioObj = new Empresa();
            $valor=$usuarioObj->eliminarEmpresa($codigo);
        }
        
    }
?>
