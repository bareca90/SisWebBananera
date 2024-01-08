<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ingreso de Roles</title>
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
 /* Ocultar flechas en el campo de número */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
	-webkit-appearance: none;
	margin: 0;
}
input[type="number"] {
	-moz-appearance: textfield;
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
                        <h2>Ingreso <b>Registro de Productos </b></h2>
                    </div>
                </div>
				<div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Descripción Producto" id="filtroUsuario">
                    </div>
                    <div class="col" style="display: none;">
                        <select class="form-control" id="filtroEstado">
                            <option value="">Todos</option>
                            <option value="A">Activo</option>
                            <option value="I">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary" id="buscarUsuarios">Buscar</button>
                    </div>
					<div class="col-sm-2">
                        <a id="btn_agregar" href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar</span></a>
						<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a> -->
					</div>
				</div>
			</div>
			
            
            <table class="table table-striped table-hover">
				<thead>
                    <tr>
                        <th>Id Producto</th>
						<th>Descripción</th>
                        <th>Ubicacion</th>
						<th>Stock</th>
						<!-- <th>Estado</th> -->
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
					<h4 class="modal-title">Productos</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Descripción</label>
						<input id="txt_descripcion" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Ubicacion</label>
						<input id="txt_ubicacion" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Stock</label>
						<input id="txt_stock" type="number" disabled value="000" class="form-control" required>
					</div>
					<div class="form-group" style="display: none;">
                        <!-- <label>Estado</label> -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rbt_estado" id="rbt_activo" value="A">
                            <label class="form-check-label" for="rbt_activo">Activo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rbt_estado" id="rbt_inactivo" value="I">
                            <label class="form-check-label" for="rbt_inactivo">Inactivo</label>
                            <input type="hidden" name="txt_id" id="txt_id" value="0"/>
                        </div>
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

<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Borrar Producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Esta Seguro de Eliminar Este Registro ?</p>
					<p class="text-warning"><small>Esta Acción No se puede deshacer.</small></p>
					<input type="hidden" name="txt_ideli" id="txt_ideli" value="0"/>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<!-- <input type="submit" class="btn btn-danger" value="Confirmar" id="btn_eliminar"> -->
					<input type="button" class="btn btn-danger" value="Confirmar" id="btn_eliminar">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- <script src="../js/jquery-3.5.1.min.js"></script> -->

    <script>
        $(document).ready(function() {
			let editUserId; 
			let deleteUserId;
            cargarUsuarios();
			let titulo_error = 'Error, Productos ';
			let titulo_succes = 'Éxito, Productos ';
			let titulo_aviso = 'Aviso, Productos ';
			let titulo_advertencia = 'Advertencia , Productos ';

            $("#buscarUsuarios").click(function() {
                cargarUsuarios();
            });
			function cargarUsuarios() {
                var filtroUsuario = $("#filtroUsuario").val();
                var filtroEstado = $("#filtroEstado").val();

                $.ajax({
                    url: "RegistrosBasicos/Producto_Controlador.php",
                    method: "POST",
                    data: { filtroUsuario: filtroUsuario, filtroEstado: filtroEstado },
                    success: function(data) {
                        $("#tablaUsuarios").html(data);
                    }
                });
            }
			function mensaje(titulo,contenido,tipo){
				Swal.fire(titulo, contenido, tipo);
			}
			$(document).on("click", ".edit", function() {
				clearModalFields();
				editUserId = $(this).data("id");
				// Encuentra la fila correspondiente a editUserId
				var $userRow = $(".user-row[data-id='" + editUserId + "']");
				// Obtén los valores de las celdas de la fila
				var id = $userRow.find("td:eq(0)").text(); // ID
				var nombre = $userRow.find("td:eq(1)").text(); // Descripcion
				var ubicacion = $userRow.find("td:eq(2)").text(); // Ubicacion
				var stock = $userRow.find("td:eq(3)").text(); // stock
				/* var estado = $userRow.find("td:eq(4)").text(); // Estado */
				var estado = "Activo"; // Estado
				/*var clave = $userRow.find("td:eq(4)").text(); // La columna oculta es la quinta (índice 4) */
				// Llena los campos del modal con los valores obtenidos
				$("#txt_id").val(id);
				$("#txt_descripcion").val(nombre);
				$("#txt_ubicacion").val(ubicacion);
				$("#txt_stock").val(stock);
				// Verifica y selecciona el estado correcto
				if (estado === "Activo") {
					$("#rbt_activo").prop("checked", true);
				} else {
					$("#rbt_inactivo").prop("checked", true);
				}
			});
			$(document).on("click", ".delete", function() {
				deleteUserId = $(this).data("id");
				// Encuentra la fila correspondiente a editUserId
				var $userRow = $(".user-row[data-id='" + deleteUserId + "']");
				// Obtén los valores de las celdas de la fila
				var id = $userRow.find("td:eq(0)").text(); // ID
				$("#txt_ideli").val(id);
				
			});
            $("#btn_agregar").click(function(){
                clearModalFields();
				
				
            });
            
			$("#btn_eliminar").click(function(){
				var id=$("#txt_ideli").val();
				var codigo=id;
				var accion  =   'eliminar';
				console.log(id);
				$.ajax({ 
					type:"Post",
					url:"RegistrosBasicos/Producto_Controlador.php",
					data: { accion:accion,codigo:codigo},
					success:function(datos){
						cargarUsuarios();
						if(datos === '1'){
							mensaje(titulo_succes, 'Se Realizó el proceso de forma correcta', 'success');
						}else{
							mensaje(titulo_error, 'No se ConcrRealizó el proceso', 'error');
						}
					}
				});
			});
			
			$("#btn_ingreso").click(function(){
				/* clearModalFields(); */
				var id=$("#txt_id").val();
				var descripcion= $("#txt_descripcion").val();
				var ubicacion = $("#txt_ubicacion").val();
				var stock = $("#txt_stock").val();
				var usuario= 1; /* Usuario Loggeado */
				/* var clave= $("#txt_clave").val(); */
				/* var estado= $("input[name='rbt_estado']:checked").val(); */
				var estado= "A";
				if(descripcion === ''){
					mensaje(titulo_error, 'Debe digitar la descripción del producto', 'error');
					return;
				}
				if(ubicacion === ''){
					mensaje(titulo_error, 'Debe digitar la ubicació del producto', 'error');
					return;
				}
				if (id==0)
				{
					var accion  =   'ingresar';
					$.ajax({ 
						type:"Post",
						url:"RegistrosBasicos/Producto_Controlador.php",
						data: { accion:accion,reb_pro_ubicacion:ubicacion,descripcion: descripcion,estado:estado,usuario:usuario,reb_pro_stock:stock},
						success:function(datos){
							cargarUsuarios();
							if(datos === '1'){
								mensaje(titulo_succes, 'Se Realizó el proceso de forma correcta', 'success');
							}else{
								mensaje(titulo_error, 'No se ConcrRealizó el proceso', 'error');
							}
							/* crear_filas(''); */
						}
					});
				}
				else
				{
					var accion  =   'actualizar';
					var codigo	= id;
					$.ajax({ 
						type:"Post",
						url:"RegistrosBasicos/Producto_Controlador.php",
						data: { accion:accion,reb_pro_ubicacion:ubicacion,descripcion: descripcion, usuario: usuario ,estado:estado,codigo:codigo,reb_pro_stock:stock},
						/* data:'accion='+'actualizar'+'&id='+id+'&descripcion='+descripcion+'&estado='+estado,  */
						success:function(datos){
							/* $(".aviso").html(datos); */
							cargarUsuarios();
							/* crear_filas(''); */
							if(datos === '1'){
								mensaje(titulo_succes, 'Se Realizó el proceso de forma correcta', 'success');
							}else{
								mensaje(titulo_error, 'No se ConcrRealizó el proceso', 'error');
							}
						}
					});
				
				}
		
			});
			// Vaciar los campos del modal
			function clearModalFields() {
				$("#txt_id").val(0);
				$("#txt_descripcion").val("");
				$("#txt_ubicacion").val("");
				$("#txt_stock").val("");
				$("#rbt_activo").prop("checked", true); // Establecer el estado activo por defecto
			}
        });
        
        
		
    </script>
</body>
</html>
