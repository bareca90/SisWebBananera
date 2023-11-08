<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ingreso Aplicacion x Perfil</title>
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
.table-subtitle {
	padding-bottom: 15px;
	background: #626463;
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
.table-subtitle h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-subtitle .btn-group {
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
.table-subtitle .btn {
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
.table-subtitle .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
.table-subtitle .btn span {
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
                        <h2>Ingreso <b>Aplicaciones por Perfil </b></h2>
                    </div>
                </div>
				<div class="row">
                    <div class="col form-group">
						<!-- <label>Padre</label> -->
						<select id="cmb_perfil" type="select" class="form-control" required></select>
					</div>
                    
				</div>
                
			</div>
			<div class="table-subtitle">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Ingreso <b>Accesos</b></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
						<!-- <label>Aplicacion</label> -->
						<select id="cmb_aplicacion" type="select" class="form-control" required></select>
					</div>
                    <!-- <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Descripción Aplicación" id="filtroUsuario">
                    </div> -->
                    <!-- <div class="col">
                        <select class="form-control" id="filtroEstado">
                            <option value="">Todos</option>
                            <option value="A">Activo</option>
                            <option value="I">Inactivo</option>
                        </select>
                    </div> -->
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="rbt_nuevo" id="rbt_nuevo" value="1">
                            <label class="form-check-label" for="rbt_nuevo">Nuevo</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="rbt_editar" id="rbt_editar" value="2">
                            <label class="form-check-label" for="rbt_editar">Editar</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="rbt_eliminar" id="rbt_eliminar" value="3">
                            <label class="form-check-label" for="rbt_eliminar">Eliminar</label>
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="rbt_imprimir" id="rbt_imprimir" value="4">
                            <label class="form-check-label" for="rbt_imprimir">Imprimir</label>
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="rbt_consultar" id="rbt_consultar" value="5">
                            <label class="form-check-label" for="rbt_consultar">Consultar</label>
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="rbt_procesar" id="rbt_procesar" value="6">
                            <label class="form-check-label" for="rbt_procesar">Procesar</label>
                            
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="rbt_anular" id="rbt_anular" value="6">
                            <label class="form-check-label" for="rbt_anular">Anular</label>
                            
                        </div>
                    </div>
                    <!-- <div class="col">
                        <button type="button" class="btn btn-primary" id="buscarUsuarios">Buscar</button>
                    </div> -->
					<div class="col-sm-2">
                        <a id="btn_agregar" href="" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar</span></a>
                        <input type="hidden" name="txt_id_perfil_edit" id="txt_id_perfil_edit" value="0"/>
                        <input type="hidden" name="txt_id_aplicacion_edit" id="txt_id_aplicacion_edit" value="0"/>
						<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a> -->
					</div>
				</div>
                
			</div>
            
            <table class="table table-striped table-hover">
				<thead>
                    <tr>
                        <th>Id</th>
                        <th>Aplicacion</th>
                        <th>Nuevo</th>
						<th>Editar</th>
						<th>Eliminar</th>
						<th>Imprimir</th>
						<th>Consultar</th>
                        <th>Procesar</th>
                        <th>Anular</th>   
                        <th>Acciones</th>
                    </tr>
				</thead>
				<tbody id="tablaUsuarios">
                    <!-- Aquí se mostrarán los usuarios -->
				</tbody>
			</table>
            
			<!-- <div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div> -->
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<!-- <div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Aplicaciones</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Descripción</label>
						<input id="txt_descripcion" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Ruta</label>
						<input id="txt_archivo" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Tipo</label>
						<input id="txt_tipo" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Orden</label>
						<input id="txt_orden" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Padre</label>
						<select id="cmb_padre" type="select" class="form-control" required></select>
					</div>
					<div class="form-group">
						<label>Icono</label>
						<input id="txt_icono" type="text" class="form-control" required>
					</div>
					
					
                    <div class="form-group">
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rbt_activo" id="rbt_activo" value="A">
                            <label class="form-check-label" for="rbt_activo">Activo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rbt_inactivo" id="rbt_inactivo" value="I">
                            <label class="form-check-label" for="rbt_inactivo">Inactivo</label>
                            <input type="hidden" name="txt_id" id="txt_id" value="0"/>
                        </div>
                    </div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="button" id ="btn_ingreso" class="btn btn-success" value="Ingresar">
					
				</div>
			</form>
		</div>
	</div>
</div> -->

<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Borrar Aplicaciones</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Esta Seguro de Eliminar Este Registro ?</p>
					<p class="text-warning"><small>Esta Acción No se puede deshacer.</small></p>
					<input type="hidden" name="txt_id_perfil_eli" id="txt_id_perfil_eli" value="0"/>
                    <input type="hidden" name="txt_id_aplicacion_eli" id="txt_id_aplicacion_eli" value="0"/>
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
            /* cargarUsuarios(); */
            cargarcombo();
            cargarcomboaplicacion();
            document.getElementById("cmb_perfil").addEventListener("change", onSelectChange);
            function onSelectChange() {
                // Obtenemos el valor seleccionado del combo box
                cargarUsuarios();
                /* var selectedValue = document.getElementById("mySelect").value; */

            
            }
            $("#buscarUsuarios").click(function() {
                cargarUsuarios();
            });
			function cargarcombo(){
				let combo = 'combo';
				$.ajax({
					type:"post",
					url: "Seguridad/Aplicacion_Perfil_Controlador.php",
					data:{ combo:combo},
					success:function(datos)
					{
						$("#cmb_perfil").html(datos);
					}
					
				});
			}
            function cargarcomboaplicacion(){
				let comboaplicacion = 'comboaplicacion';
				$.ajax({
					type:"post",
					url: "Seguridad/Aplicacion_Perfil_Controlador.php",
					data:{ comboaplicacion:comboaplicacion},
					success:function(datos)
					{
						$("#cmb_aplicacion").html(datos);
					}
					
				});
			}
            function cargarUsuarios() {
                var perfil = $("#cmb_perfil").val();
                $.ajax({
                    url: "Seguridad/Aplicacion_Perfil_Controlador.php",
                    method: "POST",
                    data: { filtroperfil: perfil},
                    success: function(data) {
                        $("#tablaUsuarios").html(data);
                    }
                });
            }
			$(document).on("click", ".edit", function() {
				clearModalFields();
				cargarcombo();
				editUserId = $(this).data("id");
				// Encuentra la fila correspondiente a editUserId
				var $userRow = $(".user-row[data-id='" + editUserId + "']");
				// Obtén los valores de las celdas de la fila
				var id = $userRow.find("td:eq(0)").text(); // ID
				var perfil = $userRow.find("td:eq(1)").text(); // perfil
				var aplicacion = $userRow.find("td:eq(2)").text(); // aplicacion
				var aplicaciondescripcion = $userRow.find("td:eq(3)").text(); // descripcion aplicacion
				var nuevo = $userRow.find("td:eq(4)").text(); // nuevo
				var editar = $userRow.find("td:eq(5)").text(); // editar
				var eliminar = $userRow.find("td:eq(6)").text(); // eliminar
                var imprimir = $userRow.find("td:eq(7)").text(); // imprimir
                var consultar = $userRow.find("td:eq(8)").text(); // consultar
                var procesar = $userRow.find("td:eq(9)").text(); // procesar
                var anular = $userRow.find("td:eq(10)").text(); // anular
                // Llena los campos del modal con los valores obtenidos
				$("#txt_id").val(id);
                $("#txt_id_perfil_edit").val(perfil);
                $("#txt_id_aplicacion_edit").val(aplicacion);
                $("#cmb_perfil").val(perfil);
                $("#cmb_aplicacion").val(aplicacion);
                if (nuevo === "1") {
                    $("#rbt_nuevo").prop("checked", true);
                }else{
                    $("#rbt_nuevo").prop("checked", false);
                }
                if (editar === "1") {
                    $("#rbt_editar").prop("checked", true);
                }else{
                    $("#rbt_editar").prop("checked", false);
                }
                if (eliminar === "1") {
                    $("#rbt_eliminar").prop("checked", true);
                }else{
                    $("#rbt_eliminar").prop("checked", false);
                }
                if (imprimir === "1") {
                    $("#rbt_imprimir").prop("checked", true);
                }else{
                    $("#rbt_imprimir").prop("checked", false);
                }
                if (consultar === "1") {
                    $("#rbt_consultar").prop("checked", true);
                }else{
                    $("#rbt_consultar").prop("checked", false);
                }
                if (procesar === "1") {
                    $("#rbt_procesar").prop("checked", true);
                }else{
                    $("#rbt_procesar").prop("checked", false);
                }
                if (anular === "1") {
                    $("#rbt_anular").prop("checked", true);
                }else{
                    $("#rbt_anular").prop("checked", false);
                }
				
			});
			$(document).on("click", ".delete", function() {
				deleteUserId = $(this).data("id");
				// Encuentra la fila correspondiente a editUserId
				var $userRow = $(".user-row[data-id='" + deleteUserId + "']");
				// Obtén los valores de las celdas de la fila
				var id = $userRow.find("td:eq(0)").text(); // ID
				var perfil = $userRow.find("td:eq(1)").text(); // perfil
				var aplicacion = $userRow.find("td:eq(2)").text(); // aplicacion
				$("#txt_id_perfil_eli").val(perfil);
                $("#txt_id_aplicacion_eli").val(aplicacion);
				
			});
            $("#btn_agregar").click(function(){
                // Personaliza los botones y maneja acciones personalizadas
                let perfil_edit = $("#txt_id_perfil_edit").val();
                let aplicacion_edit = $("#txt_id_aplicacion_edit").val();
                var accion = 'ingresar'
                let perfil=0;
                let aplicacion=0;
                if (perfil_edit != 0 ){
                    accion = 'actualizar'
                    perfil  =   perfil_edit;
                    aplicacion=aplicacion_edit;
                }
                if(accion === 'ingresar'){
                    var selectElement = document.getElementById("cmb_perfil");
                        perfil = selectElement.value;
                    var selectAplicacioon = document.getElementById("cmb_aplicacion");
                        aplicacion = selectAplicacioon.value;
                }

                var nuevo = document.getElementById("rbt_nuevo");
                var isNuevo = nuevo.checked;
                var nuevoNumero = isNuevo ? 1 : 0;
                var editar = document.getElementById("rbt_editar");
                var isEditar = editar.checked;
                var editarNumero = isEditar ? 1 : 0;    
                var eliminar = document.getElementById("rbt_eliminar");
                var isEliminar = eliminar.checked;
                var eliminarNumero = isEliminar ? 1 : 0;    
                var imprimir = document.getElementById("rbt_imprimir");
                var isImprimir = imprimir.checked;
                var imprimirNumero = isImprimir ? 1 : 0;    
                var consultar = document.getElementById("rbt_consultar");
                var isConsultar = consultar.checked;
                var consultarNumero = isConsultar ? 1 : 0;    
                var procesar = document.getElementById("rbt_procesar");
                var isProcesar = procesar.checked;
                var procesarNumero = isProcesar ? 1 : 0;    
                var anular = document.getElementById("rbt_anular");
                var isAnular = anular.checked;
                var anularNumero = isAnular ? 1 : 0;   
                Swal.fire({
                    title: '¿Estás seguro de grabar?',
                    text: 'Se Procedera a realizar este ingreso de información',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, proceder',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        
                         
                        $.ajax({ 
                            type:"Post",
                            url:"Seguridad/Aplicacion_Perfil_Controlador.php",
                            data:{ 
                                    accion:accion,
                                    seg_per_codigo:perfil,
                                    seg_apl_codigo:aplicacion,
                                    seg_acc_det_nuevo:nuevoNumero,
                                    seg_acc_det_editar:editarNumero,
                                    seg_acc_det_eliminar:eliminarNumero,
                                    seg_acc_det_imprimir:imprimirNumero,
                                    seg_acc_det_consultar:consultarNumero,
                                    seg_acc_det_procesar:procesarNumero,
                                    seg_acc_det_anular:anularNumero
                                },
                            success:function(datos){
                                cargarUsuarios();
                                /* if(datos === '1'){
                                    mensaje('Éxito', 'Se Realizó el proceso de forma correcta', 'success');
                                }else{
                                    mensaje('Error', 'No se ConcrRealizó el proceso', 'error');
                                } */
                            }
                        });
                        // Aquí puedes realizar la acción que deseas cuando el usuario confirma.
                        /* Swal.fire('Eliminado', 'El registro ha sido eliminado', 'success'); */
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Aquí puedes manejar la cancelación.
                        Swal.fire('Cancelado', 'La operación ha sido cancelada', 'info');
                    }
                });

                clearModalFields();
				
				
            });
            function mensaje(titulo,contenido,tipo){
				Swal.fire(titulo, contenido, tipo);
			}
			$("#btn_eliminar").click(function(){
                var accion ='eliminar';
				var perfil=$("#txt_id_perfil_eli").val();
                var aplicacion=$("#txt_id_aplicacion_eli").val();
                console.log(perfil);
                console.log(aplicacion);
				$.ajax({ 
					type:"Post",
					url:"Seguridad/Aplicacion_Perfil_Controlador.php",
					data: { accion:accion,seg_per_codigo:perfil,seg_apl_codigo:aplicacion},
					success:function(datos){
						cargarUsuarios();
						/* if(datos === '1'){
							mensaje('Éxito', 'Se Realizó el proceso de forma correcta', 'success');
						}else{
							mensaje('Error', 'No se ConcrRealizó el proceso', 'error');
						} */
					}
				});
			});
			
			/* $("#btn_ingreso").click(function(){
				
				var id=$("#txt_id").val();
				var descripcion= $("#txt_descripcion").val();
				var archivo = $("#txt_archivo").val();
				var tipo = $("#txt_tipo").val();
				var orden = $("#txt_orden").val();
				var icono = $("#txt_icono").val();
				var selectElement = document.getElementById("cmb_padre");
        		var padre = selectElement.value;
				var usuario= 1; 
				
				var estado= $("input[name='rbt_estado']:checked").val();
				if (id==0)
				{
					var accion  =   'ingresar';
					$.ajax({ 
					type:"Post",
					url:"Seguridad/Aplicacion_Controlador.php",
					data: { accion:accion,seg_apl_archivo:archivo,descripcion: descripcion,estado:estado,usuario:usuario,seg_apl_tipo:tipo,seg_apl_orden:orden,seg_apl_id_padre:padre,seg_apl_font_icon:icono},
					success:function(datos){
						
						cargarUsuarios();
						if(datos === '1'){
							mensaje('Éxito', 'Se Realizó el proceso de forma correcta', 'success');
						}else{
							mensaje('Error', 'No se ConcrRealizó el proceso', 'error');
						}
						
						}
					});
				}
				else
				{
					var accion  =   'actualizar';
					var codigo	= id;
					$.ajax({ 
					type:"Post",
					url:"Seguridad/Aplicacion_Controlador.php",
					data: { accion:accion,seg_apl_archivo:archivo,descripcion: descripcion, usuario: usuario ,estado:estado,codigo:codigo,seg_apl_tipo:tipo,seg_apl_orden:orden,seg_apl_id_padre:padre,seg_apl_font_icon:icono},
					
					success:function(datos){
						
						cargarUsuarios();
						if(datos === '1'){
							mensaje('Éxito', 'Se Concretó el proceso correctamente', 'success');
						}else{
							mensaje('Error', 'No se Concretó el proceso', 'error');
						}
						
						}
					});
				
				}
		
			}); */
			// Vaciar los campos del modal
			function clearModalFields() {
				$("#txt_id").val(0);
                $("#rbt_nuevo").prop("checked", false);
                $("#rbt_editar").prop("checked", false);
                $("#rbt_eliminar").prop("checked", false);
                $("#rbt_imprimir").prop("checked", false);
                $("#rbt_consultar").prop("checked", false);
                $("#rbt_procesar").prop("checked", false);
                $("#rbt_anular").prop("checked", false);
                $("#txt_id_perfil_eli").val(0);
                $("#txt_id_aplicacion_eli").val(0);
                $("#txt_id_perfil_edit").val(0);
                $("#txt_id_aplicacion_edit").val(0);
				/* $("#txt_descripcion").val("");
				$("#txt_archivo").val("");
				$("#txt_tipo").val("");
				$("#txt_orden").val("");
				$("#txt_icono").val(""); */
				
				/* $("#txt_usuario").val("");
				$("#txt_clave").val(""); */
				/* $("#rbt_activo").prop("checked", true);  */// Establecer el estado activo por defecto
			}
        });
        
        
		
    </script>
</body>
</html>
