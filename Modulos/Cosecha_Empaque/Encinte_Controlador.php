<?php
    require_once("../../Clases/Encinte.php");
    require_once("../../Clases/Lote.php");
    require_once("../../Clases/Producto.php");

    if (isset($_POST["buscar"]) && isset($_POST["cse_lot_codigo"]) && isset($_POST["cse_codigo_prod"]) && isset($_POST["cse_enc_fec_ini"])) {
        $cse_lot_codigo = $_POST["cse_lot_codigo"];
        $cse_codigo_prod = $_POST["cse_codigo_prod"];
        $cse_enc_fec_ini = $_POST["cse_enc_fec_ini"];
        
        $usuarioObj = new Encinte();

        $usuarios = $usuarioObj->consultarEncinte($cse_lot_codigo,$cse_codigo_prod,$cse_enc_fec_ini);
        
        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["cse_enc_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            if($usuario["cse_enc_estado"] == "A" ){
                $estado="Activo" ;   
            }
            if($usuario["cse_enc_estado"] == "P" ){
                $estado="Procesado" ;   
            }
            if($usuario["cse_enc_estado"] == "N" ){
                $estado="Anulado" ;   
            }
            /* $estado = $usuario["inv_inc_estado"] == "A" ? "Activo" : $usuario["inv_inc_estado"] == "P" ? "Procesado":"Anulado"; */
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["cse_enc_codigo"]}</td>
                    <td style='display: none;'>{$usuario["cse_lot_codigo"]}</td>   
                    <td>{$usuario["lote"]}</td>
                    <td style='display: none;'>{$usuario["cse_codigo_prod"]}</td>   
                    <td>{$usuario["reb_pro_descripcion"]}</td>
                    <td style='display: none;'>{$usuario["cse_enc_cantidad"]}</td>
                    <td>{$usuario["cse_enc_fec_ini"]}</td>
                    <td>{$usuario["cse_enc_fec_fin"]}</td>
                    <td>{$usuario["cse_enc_responsable"]}</td>
                    <td>{$usuario["cse_enc_semana"]}</td>
                    <td>{$usuario["cse_enc_nota"]}</td>                    
                    <td style='display: none;'>$estado</td>             
                    <td style='display: none;'>{$usuario["cse_enc_estado"]}</td>   
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
            $cse_enc_codigo=$_POST['cse_enc_codigo'];
            $cse_lot_codigo=$_POST['cse_lot_codigo'];
            $cse_codigo_prod=$_POST['cse_codigo_prod'];
            $cse_enc_cantidad=$_POST['cse_enc_cantidad'];
            $cse_enc_fec_ini=$_POST['cse_enc_fec_ini'];
            $cse_enc_fec_fin=$_POST['cse_enc_fec_fin'];
            $cse_enc_responsable=$_POST['cse_enc_responsable'];
            $cse_enc_semana=$_POST['cse_enc_semana'];
            $cse_enc_nota=$_POST['cse_enc_nota'];
            $cse_enc_estado=$_POST['cse_enc_estado'];
            $perfaplObj = new Encinte();
            $valor=$perfaplObj->insertarActualizarEncinte(  $cse_enc_codigo,
                                                            $cse_lot_codigo,
                                                            $cse_codigo_prod,
                                                            $cse_enc_cantidad,
                                                            $cse_enc_fec_ini,
                                                            $cse_enc_fec_fin,
                                                            $cse_enc_responsable,
                                                            $cse_enc_semana,
                                                            $cse_enc_nota,
                                                            $cse_enc_estado,
                                                            $accion
                                                                );
            echo $valor;
        }
        if($accion=="eliminar"){
            $cse_enc_codigo=$_POST['cse_enc_codigo'];
            
            $perfaplObj = new Encinte();
            $valor=$perfaplObj->eliminarEncinte($cse_enc_codigo);
            echo $valor;
        }
        /* if($accion=="anular"){
            $inv_inc_codigo=$_POST['inv_inc_codigo'];
            $inv_inc_cantidad=$_POST['inv_inc_cantidad'];
            $reb_pro_codigo=$_POST['reb_pro_codigo'];
            $inv_inc_estado=$_POST['inv_inc_estado'];
            $perfaplObj = new IngresoCompra();
            $valor=$perfaplObj->anularIngresoCompra($inv_inc_codigo,$inv_inc_cantidad,$reb_pro_codigo,$inv_inc_estado);
            echo $valor;
        } */
        
    }

