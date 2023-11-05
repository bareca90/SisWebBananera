<?php
    require_once("../../Clases/Proveedor.php");

    if (isset($_POST["filtroUsuario"]) && isset($_POST["filtroEstado"])) {
        $filtroUsuario = $_POST["filtroUsuario"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new Proveedor();

        $usuarios = $usuarioObj->consultarProveedor($filtroUsuario, $filtroEstado);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["reb_prv_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            $estado = $usuario["reb_prv_estado"] == "A" ? "Activo" : "Inactivo";
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["reb_prv_codigo"]}</td> 
                    <td>{$usuario["reb_prv_razon_social"]}</td>
                    <td>{$usuario["reb_prv_ced_ruc"]}</td>
                    <td>{$usuario["reb_prv_correo"]}</td>
                    <td>{$usuario["reb_prv_contratista"]}</td>
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
            $reb_prv_ced_ruc=$_POST['reb_prv_ced_ruc'];
            $reb_prv_correo=$_POST['reb_prv_correo'];
            $reb_prv_contratista=$_POST['reb_prv_contratista'];
            $estado=$_POST['estado'];
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $usuarioObj = new Proveedor();
           
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->insertarProveedor($descripcion,$estado,$usuario,$reb_prv_ced_ruc,$reb_prv_correo,$reb_prv_contratista );
                echo $valor;
            
            }
        }
        if($accion=="actualizar"){
            $descripcion=$_POST['descripcion'];
            $reb_prv_ced_ruc=$_POST['reb_prv_ced_ruc'];
            $reb_prv_correo=$_POST['reb_prv_correo'];
            $reb_prv_contratista=$_POST['reb_prv_contratista'];
            $estado=$_POST['estado'];
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $codigo=$_POST['codigo']; //Codigo de Proveedor
           
            $usuarioObj = new Proveedor();
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->actualizaProveedor($descripcion,$estado,$usuario,$codigo,$reb_prv_ced_ruc,$reb_prv_correo,$reb_prv_contratista);
                echo $valor;
                
            
            }
        }
        if($accion=="eliminar"){
            $codigo=$_POST['codigo'];
            $usuarioObj = new Proveedor();
            $valor=$usuarioObj->eliminarProveedor($codigo);
            echo $valor;
        }
        
    }
?>
