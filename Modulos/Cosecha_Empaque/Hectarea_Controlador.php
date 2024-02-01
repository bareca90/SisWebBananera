<?php
    require_once("../../Clases/Hectarea.php");
    require_once("../../Clases/Lote.php");
    

    if (isset($_POST["cse_hec_hectareas"])  ) {
        $cse_hec_hectareas = $_POST["cse_hec_hectareas"];
        
        
        $usuarioObj = new Hectarea();

        $usuarios = $usuarioObj->consultarHectarea($cse_hec_hectareas);
        
        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["cse_hec_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            if($usuario["cse_hec_estado"] == "B" ){
                $estado="Buena" ;   
            }
            if($usuario["cse_hec_estado"] == "R" ){
                $estado="Regular" ;   
            }
            if($usuario["cse_hec_estado"] == "M" ){
                $estado="Mala" ;   
            }
            /* $estado = $usuario["inv_inc_estado"] == "A" ? "Activo" : $usuario["inv_inc_estado"] == "P" ? "Procesado":"Anulado"; */
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["cse_hec_codigo"]}</td>
                    <td style='display: none;'>{$usuario["cse_lot_codigo"]}</td>   
                    <td>{$usuario["lote"]}</td>
                    <td>{$usuario["cse_hec_hectareas"]}</td>
                    <td>$estado</td>             
                    <td style='display: none;'>{$usuario["cse_hec_estado"]}</td>   
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['combolote'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['combolote'];
        $usuarioAplicacion= new Lote();
        $aplicaciones = $usuarioAplicacion->consultarComboLote();
        echo "<option value='0'>Selecciona un Lote</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['cse_lot_codigo']."'>".$aplicacion['lote']."</option>";
        }
    } 
    /* if (isset($_POST['comboproducto'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['comboproducto'];
        $usuarioAplicacion= new Producto();
        $aplicaciones = $usuarioAplicacion->consultarComboProducto();
        echo "<option value='0'>Selecciona un Producto</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['reb_pro_codigo']."'>".$aplicacion['reb_pro_descripcion']."</option>";
        }
    }  */
    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar" || $accion=="actualizar" ){
            $cse_hec_codigo=$_POST['cse_hec_codigo'];
            $cse_lot_codigo=$_POST['cse_lot_codigo'];
            $cse_hec_hectareas=$_POST['cse_hec_hectareas'];
            $cse_hec_estado=$_POST['cse_hec_estado'];
           
            $perfaplObj = new Hectarea();
            $valor=$perfaplObj->insertarActualizarHectareas (   $cse_hec_codigo,
                                                                $cse_lot_codigo,
                                                                $cse_hec_hectareas,
                                                                $cse_hec_estado,
                                                                $accion
                                                            );
            echo $valor;
        }
       
        if($accion=="eliminar"){
            $cse_hec_codigo=$_POST['cse_hec_codigo'];
           
            $perfaplObj = new Hectarea();
            $valor=$perfaplObj->eliminarHectarea($inv_inc_codigo);
            echo $valor;
        }
        
    }

