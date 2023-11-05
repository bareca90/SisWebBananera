<?php
    require_once("../../Clases/Contrato.php");

    if (isset($_POST["filtroUsuario"]) && isset($_POST["filtroEstado"])) {
        $filtroUsuario = $_POST["filtroUsuario"];
        $filtroEstado = $_POST["filtroEstado"];
        $usuarioObj = new Contrato();

        $usuarios = $usuarioObj->consultarContrato($filtroUsuario, $filtroEstado);

        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["reb_con_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            $estado = $usuario["reb_con_estado"] == "A" ? "Activo" : "Inactivo";
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["reb_con_codigo"]}</td> 
                    <td>{$usuario["reb_descripcion"]}</td>
                    <td>{$usuario["reb_con_fec_inicio"]}</td>
                    <td>{$usuario["reb_con_fec_fin"]}</td>
                    <td>{$usuario["reb_con_pago"]}</td>
                    <td style='display: none;'>{$usuario["reb_prv_codigo"]}</td>
                    <td>{$usuario["reb_prv_razon_social"]}</td>
                    <td>{$usuario["reb_con_firma"]}</td>
                    
                    <td>$estado</td>
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#deleteEmployeeModal' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['combo'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['combo'];
        $usuarioAplicacion= new Contrato();
        $aplicaciones = $usuarioAplicacion->consultarComboProveedor();
        echo "<option value=''>Selecciona una aplicación</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['reb_prv_codigo']."'>".$aplicacion['reb_prv_razon_social']."</option>";
        }
    } 

    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar"){
            $descripcion=$_POST['descripcion'];
            $reb_con_fec_inicio=$_POST['reb_con_fec_inicio'];
            $reb_con_fec_fin=$_POST['reb_con_fec_fin'];
            $estado=$_POST['estado'];
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $reb_con_pago=$_POST['reb_con_pago'];
            $reb_con_firma=$_POST['reb_con_firma'];
            $reb_prv_codigo=$_POST['reb_prv_codigo'];

            
            $usuarioObj = new Contrato();
           
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->insertarContrato($descripcion,$estado,$usuario,$reb_con_fec_inicio,$reb_con_fec_fin,$reb_con_pago,$reb_con_firma,$reb_prv_codigo );
                echo $valor;
            
            }
        }
        if($accion=="actualizar"){
            $descripcion=$_POST['descripcion'];
            $reb_con_fec_inicio=$_POST['reb_con_fec_inicio'];
            $reb_con_fec_fin=$_POST['reb_con_fec_fin'];
            $estado=$_POST['estado'];
            $usuario=$_POST['usuario']; //Usuario q lo modifica
            $reb_con_pago=$_POST['reb_con_pago'];
            $reb_con_firma=$_POST['reb_con_firma'];
            $reb_prv_codigo=$_POST['reb_prv_codigo'];
            $codigo=$_POST['codigo']; //Codigo del contrato
            $usuarioObj = new Contrato();
            if($descripcion=='')
            {
                echo'No ha ingresado una descripcion';
            }
            else
            {  
                $valor=$usuarioObj->actualizaContrato($descripcion,$estado,$usuario,$codigo,$reb_con_fec_inicio,$reb_con_fec_fin,$reb_con_pago,$reb_con_firma,$reb_prv_codigo);
                echo $valor;
            }
        }
        if($accion=="eliminar"){
            $codigo=$_POST['codigo'];
            $usuarioObj = new Contrato();
            $valor=$usuarioObj->eliminarContrato($codigo);
            echo $valor;
        }
        
    }
?>
