<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Accesos x Usuario</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
	padding-bottom: 15px;
	background: #024221;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}
.modal form label {
	font-weight: normal;
}
#contenedordatos{
    max-width: 100% !important;
}
</style>

</head>
<body>
<div class="container-xl" id="contenedordatos">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Ingreso <b>Accesos por Usuario </b></h2>
                    </div>
                </div>
				<div class="row">
                    <div class="col-sm-3">
                        <select id="cmb_perfil" type="select" class="form-control" required></select>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Usuario" id="filtroUsuario">
                    </div>
                    
                    <div class="col">
                        <button type="button" class="btn btn-primary" id="buscarUsuarios">Buscar</button>
                    </div>
					<div class="col">
                        <a id="btn_agregar" href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar</span></a>
						<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a> -->
					</div>
				</div>
			</div>
			
            
            <table class="table table-striped table-hover">
				<thead>
                    <tr>
                        <th>Secuencia</th>
						<th>Perfil</th>
                        <th>Nombres Usuario</th>
						<th>Usuario</th>
						<!--<th>Rol</th>-->
						<th>Fecha</th>
						<th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
				</thead>
				<tbody id="tablaUsuarios">
                    <!-- Aquí se mostrarán los usuarios -->
				</tbody>
			</table>
            
			
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Accesos x Usuario</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Perfil</label>
                        <select id="cmb_perfil_form" type="select" class="form-control" required></select>
					</div>
					<div class="form-group">
						<label>Usuario</label>
                        <select id="cmb_usuario" type="select" class="form-control" required></select>
					</div>
					<div class="form-group">
						<label>Fecha Inicia Acceso</label>
						<input id="txt_fecha" type="date" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<input id="txt_descripcion" type="text" class="form-control" required>
					</div>
					<div class="form-group" style="display: none">
						<label>Rol</label>
						<select id="cmb_rol" type="select" class="form-control" required></select>
					</div>
					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="button" id ="btn_ingreso" class="btn btn-success" value="Ingresar">
					<!-- <input id ="btn_ingreso"type="submit" class="btn btn-success" value="Ingresar"> -->
				</div>
			</form>
		</div>
	</div>
</div>
	<script>
        $(document).ready(function() {
			let editUserId; 
			let deleteUserId;
            let titulo_error = 'Error, Accesos x Usuario';
			let titulo_succes = 'Éxito, Accesos x Usuario';
			let titulo_aviso = 'Aviso, Accesos x Usuario';
			let titulo_advertencia = 'Advertencia , Accesos x Usuario';
            cargarUsuarios();
            cargarComboPerfil();
            cargarComboUsuario();
            cargarComboRol();
            $("#buscarUsuarios").click(function() {
                cargarUsuarios();
            });
			function cargarComboPerfil(){
				let combo = 'comboperfil';
				$.ajax({
					type:"post",
					url: "Seguridad/Acceso_Controlador.php",
					data:{ comboperfil:combo},
					success:function(datos)
					{
						$("#cmb_perfil").html(datos);
                        $("#cmb_perfil_form").html(datos);
                        
					}
					
				});
			}
            function cargarComboUsuario(){
				let combo = 'combousuario';
				$.ajax({
					type:"post",
					url: "Seguridad/Acceso_Controlador.php",
					data:{ combousuario:combo},
					success:function(datos){
                        $("#cmb_usuario").html(datos);
                        
                        
					}
					
				});
			}
            function cargarComboRol(){
				let combo = 'comborol';
				$.ajax({
					type:"post",
					url: "Seguridad/Acceso_Controlador.php",
					data:{ comborol:combo},
					success:function(datos){
                        $("#cmb_rol").html(datos);
                    }
					
				});
			}
            function cargarUsuarios() {
                var filtroUsuario = $("#filtroUsuario").val();
                var filtroPerfil = $("#cmb_perfil").val();

                $.ajax({
                    url: "Seguridad/Acceso_Controlador.php",
                    method: "POST",
                    data: { filtroUsuario: filtroUsuario, filtroPerfil: filtroPerfil },
                    success: function(data) {
                        $("#tablaUsuarios").html(data);
                    }
                });
            }
			function mensaje(titulo,contenido,tipo){
				Swal.fire(titulo, contenido, tipo);
			}
			$(document).on("click", ".delete", function() {
				deleteUserId = $(this).data("id");
				// Encuentra la fila correspondiente a editUserId
				var $userRow = $(".user-row[data-id='" + deleteUserId + "']");
				// Obtén los valores de las celdas de la fila
				var id = $userRow.find("td:eq(0)").text(); // ID
				var perfil = $userRow.find("td:eq(1)").text(); // perfil
				var usuario = $userRow.find("td:eq(3)").text(); // usuario
                var accion  =   'eliminar';				
                Swal.fire({
                            title: '¿Estás seguro de eliminar?',
                            text: 'Se Procederá a realizar esta eliminació de información',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Sí, proceder',
                            cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({ 
							type:"Post",
							url:"Seguridad/Acceso_Controlador.php",
							data: { accion:accion,seg_per_codigo:perfil,seg_usu_codigo:usuario},
							success:function(datos){
								cargarUsuarios();
								if(datos === '1'){
									mensaje(titulo_succes, 'Se Realizó el proceso de forma correcta', 'success');
								}else{
									mensaje(titulo_error, 'No se Realizó el proceso', 'error');
								}
							}
						});
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Aquí puedes manejar la cancelación.
                        Swal.fire(titulo_aviso, 'La operación ha sido cancelada', 'info');
                    }
                });
			});
			
			$("#btn_ingreso").click(function(){
				var id =0; // se lo pone para insertar
                var selectElement = document.getElementById("cmb_perfil_form");
        		var perfil = selectElement.value;
				var selectElementUser = document.getElementById("cmb_usuario");
        		var usuariocod = selectElementUser.value;
                var selectElementUserRol = document.getElementById("cmb_rol");
        		var rol = selectElementUserRol.value;
                var fecha = $("#txt_fecha").val();
                var descripcion = $("#txt_descripcion").val();
				var usuario= 1; /* Usuario Loggeado */
				var rol = 1;
				if(perfil == 0){
					mensaje(titulo_error, 'No se Ha Seleccionado  el perfil', 'error');
					return;
				}
				if(usuariocod == 0){
					mensaje(titulo_error, 'No se Ha Seleccionado  el usuario', 'error');
					return;
				}
				if(fecha === ''){
					mensaje(titulo_error, 'Debe seleccionar una fecha Inicia Acceso', 'error');
					return;
				}
				if(descripcion === ''){
					mensaje(titulo_error, 'Debe Registrar una descripción del acceso', 'error');
					return;
				}
				/* if(rol == 0){
					mensaje(titulo_error, 'No se Ha Seleccionado  el Rol', 'error');
					return;
				} */
                if (id==0)
				{
					var accion  =   'ingresar';
					$.ajax({ 
                        type:"Post",
                        url:"Seguridad/Acceso_Controlador.php",
                        data: { accion:accion,seg_per_codigo:perfil,seg_usu_codigo: usuariocod,seg_acc_cab_fecha:fecha,seg_acc_cab_descripcion:descripcion,usuario:usuario,seg_rol_codigo:rol},
                        success:function(datos){
                            cargarUsuarios();
                            if(datos === '1'){
                                mensaje(titulo_succes, 'Se Realizó el proceso de forma correcta', 'success');
								clearModalFields();
                            }else{
                                mensaje(titulo_error, 'No se ConcrRealizó el proceso', 'error');
                            }
                        }
					});
				}
			});
			// Vaciar los campos del modal
			function clearModalFields() {
				$("#cmb_perfil_form").val("0");
				$("#cmb_usuario").val("0");
				$("#txt_fecha").val("");
				$("#txt_descripcion").val("");
				$("#cmb_rol").val("");
			}
        });
    </script>
</body>
</html>
