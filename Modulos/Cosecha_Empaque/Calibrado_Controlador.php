<?php
    require_once("../../Clases/Empaquetado.php");
    require_once("../../Clases/Cosecha.php");
    require_once("../../Clases/Calibre.php");
    
    if (isset($_POST["filtroFecha"]) && isset($_POST["filtroEstado"])) {
        $filtroFecha = $_POST["filtroFecha"];
        $filtroEstado = $_POST["filtroEstado"];
        
        $usuarioObj = new Calibrado();

        $usuarios = $usuarioObj->consultarCalibrado($filtroFecha,$filtroEstado);
        
        foreach ($usuarios as $usuario) {
            $codigousuario=$usuario["cse_cal_codigo"];
            /* $estado = $usuario["seg_usu_estado"] == "A" ? "<i class='fas fa-check fa-2x text-success'></i>" : "<i class='fas fa-times fa-2x text-danger'></i>"; */
            if($usuario["cse_cal_estado"] == "A" ){
                $estado="Activo" ;   
            }
            if($usuario["cse_cal_estado"] == "P" ){
                $estado="Procesado" ;   
            }
            if($usuario["cse_cal_estado"] == "N" ){
                $estado="Anulado" ;   
            }
            /* $estado = $usuario["inv_inc_estado"] == "A" ? "Activo" : $usuario["inv_inc_estado"] == "P" ? "Procesado":"Anulado"; */
            echo "<tr class='user-row' data-id='{$codigousuario}'>
                    <td>{$usuario["cse_cal_codigo"]}</td>
                    <td style='display: none;'>{$usuario["cse_cos_codigo"]}</td>   
                    <td>{$usuario["cse_cos_fecha"]}</td>
                    <td>{$usuario["cse_cal_fecha"]}</td>
                    <td>{$usuario["cse_cal_responsable"]}</td>
                    <td>{$usuario["cse_cal_calibre"]}</td>
                    <td>$estado</td>             
                    <td style='display: none;'>{$usuario["cse_cal_estado"]}</td>   
                    <td>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='#addEmployeeModal' class='edit edit-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='search search-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Procesar'>&#xE15C;</i></a>
                        <a data-id='{$codigousuario}' id='{$codigousuario}' href='' class='delete delete-btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Anular'>&#xE872;</i></a>
                    </td>
                </tr>";
        }
    }
    if (isset($_POST['combocosecha'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['combocosecha'];
        $usuarioAplicacion= new Cosecha();
        $aplicaciones = $usuarioAplicacion->consultarComboCosecha();
        echo "<option value='0'>Selecciona una Cosecha </option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['cse_cos_codigo']."'>".$aplicacion['cse_cos_fecha']."</option>";
        }
    } 
    if (isset($_POST['comboproducto'])) {
        // La clave 'accion' existe en el array $_POST, puedes acceder a su valor de forma segura.
        $accion = $_POST['comboproducto'];
        $usuarioAplicacion= new Producto();
        $aplicaciones = $usuarioAplicacion->consultarComboProducto();
        echo "<option value='0'>Selecciona un Producto</option>";
        foreach ($aplicaciones as $aplicacion) {
            echo "<option value='".$aplicacion['reb_pro_codigo']."'>".$aplicacion['reb_pro_descripcion']."</option>";
        }
    } 
    if(isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if($accion=="ingresar" || $accion=="actualizar" ){
            $cse_cal_codigo=$_POST['cse_cal_codigo'];
            $cse_cos_codigo=$_POST['cse_cos_codigo'];
            $cse_cal_fecha=$_POST['cse_cal_fecha'];
            $cse_cal_responsable=$_POST['cse_cal_responsable'];
            $cse_cal_calibre=$_POST['cse_cal_calibre'];
            $cse_cal_estado=$_POST['cse_cal_estado'];
            
           
            $perfaplObj = new Calibrado();
            $valor=$perfaplObj->insertarActualizarCalinrador(   $cse_cal_codigo, 
                                                                $cse_cos_codigo, 
                                                                $cse_cal_fecha, 
                                                                $cse_cal_responsable, 
                                                                $cse_cal_calibre, 
                                                                $cse_cal_estado,
                                                                $accion
                                                            );
            echo $valor;
        }
        if($accion=="procesar"){
            $cse_cal_codigo=$_POST['cse_cal_codigo'];
            $estado=$_POST['estado'];
            $perfaplObj = new Calibrado();
            $valor=$perfaplObj->procesarAnularCalibrador($cse_cal_codigo,$estado);
            echo $valor;
        }
        if($accion=="anular"){
            $cse_cal_codigo=$_POST['cse_cal_codigo'];
            $estado=$_POST['estado'];
            $perfaplObj = new Calibrado();
            $valor=$perfaplObj->procesarAnularCalibrador($cse_cal_codigo,$estado);
            echo $valor;
        }
        
    }

