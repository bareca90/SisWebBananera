<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #E2E2E2;
        }

        .container {
            background-color: #FDFDFD;
            padding: 5px;
            border-radius: 10px;
            margin-top: 10px;
            max-width: 97%;
        }

        h1 {
            color: #004E35;
        }
        .btn_ingreso{cursor:pointer}
             /*#filas_menu{background-color: grey} */
        .fondo
        { 
            display: none;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.25);
            position: absolute;
            top: 0;
            left: 0;
        }
        .popup
        {
            display: none;
            width: 500px;
            height: 280px;
            background: #ffffff;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left:-250px;
            margin-top: -100px;
            
        }
        .aviso
        {
            color:red;
            
        }
        .new_row.gray
        {
        background: rgb(232,236,237);
        
        }
        .new_row.white
        {
        background: #ffffff;
        
        }
        .new_row:hover
        {
            cursor: pointer;
            background: rgb(135,213,229);
        }
        .input-group {
            position: relative !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -ms-flex-wrap: wrap !important;
            flex-wrap: wrap !important;
            -ms-flex-align: stretch !important;
            align-items: stretch !important;
            width: 100% !important;
            padding: 6px !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Usuarios</h1>
        <form>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nombre de Usuario" id="filtroUsuario">
                </div>
                <div class="col">
                    <select class="form-control" id="filtroEstado">
                        <option value="">Todos</option>
                        <option value="A">Activo</option>
                        <option value="I">Inactivo</option>
                    </select>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary" id="buscarUsuarios">Buscar</button>
                </div>
                <div class="col text-right ">
                    <button class="btn btn-success btn_ingreso" data-toggle="modal" data-target="#nuevoUsuarioModal"><i class="fas fa-plus"></i> Nuevo</button>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#nuevoUsuarioModal" data-editar="true" data-id-usuario="1"><i class="fas fa-edit"></i> Editar</button>
                    <button class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
                </div>
            </div>
        </form>
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Id Usuario</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="tablaUsuarios">
                <!-- Aquí se mostrarán los usuarios -->
            </tbody>
        </table>
    </div>
    <div class="fondo"> </div>
    <div class="popup"> 
        
        <table>
            <tbody id="ingreso_menu">
                <tr text-align: center>
                    <h3 text-align: center>
                        Ingreso de Usuarios
                    </h3>
                </tr>
                <tr> <td colspan="2" class="aviso"> </td> </tr>
                <tr>
                    <div class="input-group">
                        <span class="input-group-text">Nombres</span>
                        <input name="txt_descripcion" id="txt_descripcion" type="text" aria-label="Nombres" class="form-control">
                    </div>  
                </tr>
                <tr>
                    <div class="input-group">
                        <span class="input-group-text">Usuario</span>
                        <input name="txt_usuario" id="txt_usuario" type="text" aria-label="Usuario" class="form-control">
                    </div>  
                </tr>
                <tr>
                    <div class="input-group">
                        <span class="input-group-text">Clave</span>
                        <input name="txt_clave" id="txt_clave" type="password" aria-label="Nombres" class="form-control">
                    </div>  
                </tr>
                <tr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rbt_estado" id="rbt_activo" value="A">
                        <label class="form-check-label" for="rbt_activo">Activo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rbt_estado" id="rbt_inactivo" value="A">
                        <label class="form-check-label" for="rbt_inactivo">Inactivo</label>
                        <input type="hidden" name="txt_id" id="txt_id" value="0"/>
                    </div>
                </tr>
                <tr>
                    <td> 
                        <input class="btn btn-success" type="button" name="btn_ingreso" id="btn_ingreso" value="Ingreso"/>
                    </td>
                    <td>
                        <input class="btn btn-success" type="button" name="btn_cancelar" id="btn_cancelar" value="Cancelar"/>
                    </td>
                </tr>
                
                
            </tbody>
            
        </table>
    
    
    </div>
   
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            cargarUsuarios();

            $("#buscarUsuarios").click(function() {
                cargarUsuarios();
            });

            function cargarUsuarios() {
                var filtroUsuario = $("#filtroUsuario").val();
                var filtroEstado = $("#filtroEstado").val();

                $.ajax({
                    url: "Seguridad/Usuario_Controlador.php",
                    method: "POST",
                    data: { filtroUsuario: filtroUsuario, filtroEstado: filtroEstado },
                    success: function(data) {
                        $("#tablaUsuarios").html(data);
                    }
                });
            }
        });
        $(".btn_ingreso").click(function()
         {
            $("div.fondo").css('display','block');
            $("#rbt_activo").attr("checked",true);            
            $(".popup").fadeIn(2000);
            $("#txt_id").val(0);
         }
        );
        $("#btn_cancelar").click(function(){
            $("input:text").val("");
            $("#rbt_activo").attr("checked",true);
            $(".popup").fadeOut();
            $("div.fondo").fadeOut();
            $('.aviso').html('');
        });

        $("#btn_ingreso").click(function(){
            var id=$("#txt_id").val();
            var descripcion= $("#txt_descripcion").val();
            var usuario= $("#txt_usuario").val();
            var clave= $("#txt_clave").val();
            var estado= $("input[name='rbt_estado']:checked").val();
            if (id==0)
            {
                var accion  =   'ingresar';
                $.ajax({ 
                type:"Post",
                url:"Seguridad/Usuario_Controlador.php",
                data: { accion:accion,nombres: descripcion, usuario: usuario ,clave:clave,estado:estado},
                /* data:'accion='+'ingresar'+'&descripcion='+descripcion+'&estado='+estado,  */
                success:function(datos){
                    $(".aviso").html(datos);
                    cargarUsuarios();
                    /* crear_filas(''); */
                    }
                });
            }
            else
            {
                $.ajax({ 
                type:"Post",
                url:"Seguridad/Usuario_Controlador.php",
                data: { accion:accion,nombres: descripcion, usuario: usuario ,clave:clave,estado:estado},
                /* data:'accion='+'actualizar'+'&id='+id+'&descripcion='+descripcion+'&estado='+estado,  */
                success:function(datos){
                    $(".aviso").html(datos);
                    cargarUsuarios();
                    /* crear_filas(''); */
                    }
                });
            
            }
      
        });
    </script>
</body>
</html>
