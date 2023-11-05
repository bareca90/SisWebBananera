<?php
    require_once("../../Clases/Producto.php");

    if (isset($_POST["filtroUsuario"]) && isset($_POST["filtroEstado"])) {
        $filtroUsuario = $_POST["filtroUsuario"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new Producto();

        $usuarios = $usuarioObj->consultarProducto($filtroUsuario, $filtroEstado);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["reb_pro_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            $estado = $usuario["reb_pro_estado"] == "A" ? "Activo" : "Inactivo";
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["reb_pro_codigo"]}</td> 
                    <td>{$usuario["reb_pro_descripcion"]}</td>
                    <td>{$usuario["reb_pro_ubicacion"]}</td>
                    <td>{$usuario["reb_pro_stock"]}</td>
                    <td>$estado</td>
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#deleteEmployeeModal' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    

    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar"){
            $descripcion=$_POST['descripcion'];
            $reb_pro_ubicacion=$_POST['reb_pro_ubicacion'];
            $reb_pro_stock=$_POST['reb_pro_stock'];
            $estado=$_POST['estado'];
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $usuarioObj = new Producto();
           
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->insertarProducto($descripcion,$estado,$usuario,$reb_pro_ubicacion,$reb_pro_stock );
                echo $valor;
            
            }
        }
        if($accion=="actualizar"){
            $descripcion=$_POST['descripcion'];
            $reb_pro_ubicacion=$_POST['reb_pro_ubicacion'];
            $reb_pro_stock=$_POST['reb_pro_stock'];
            $estado=$_POST['estado'];
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $codigo=$_POST['codigo']; //Codigo de Producto
           
            $usuarioObj = new Producto();
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->actualizaProducto($descripcion,$estado,$usuario,$codigo,$reb_pro_ubicacion,$reb_pro_stock);
                echo $valor;
                
            
            }
        }
        if($accion=="eliminar"){
            $codigo=$_POST['codigo'];
            $usuarioObj = new Producto();
            $valor=$usuarioObj->eliminarProducto($codigo);
            echo $valor;
        }
        
    }
?>
