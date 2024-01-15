<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Guia</title>
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
	.modal .modal-body .row {
		margin-bottom: 15px;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 800px;
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
	.error-message {
		color: red;
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
                        <h2>Guía <b>Remisión </b></h2>
                    </div>
                </div>
				<div class="row">
                    <div class="col">
                        <input type="Date" class="form-control" id="filtroFecha">
                        <!-- <input type="date" class="form-control" placeholder="Color de la Cinta" id="filtroUsuario"> -->
                    </div>
                    <div class="col">
                        <input type="Text" class="form-control" placeholder="Motivo" id="filtroMotivo"> 
                    </div>
                    <div class="col">
                        <input type="Text" class="form-control" placeholder="Despachador" id="filtroDespachador"> 
                    </div>
                    <div class="col">
                        <select class="form-control" id="filtroEstado">
                            <option value="">Todos</option>
                            <option value="A">Activo</option>
                            <option value="P">Procesado</option>
                            <option value="N">Anulado</option>
                        </select>
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
                        <th>Id Gre</th>
                        <th>Fecha</th>
                        <th>Comp. Venta</th>
                        <!-- <th>Motivo</th>
                        <th>Partida</th>
                        <th>Llegada</th>
                        <th>Despachador</th>
                        <th>Transportista</th>
                        <th>Ruc</th> -->
                        <th>Cant. Cajas Transp.</th>
                        <th>Estado Entrega</th>
                        <th>Estado</th>
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
        <div class="modal-content modal-xl">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Guía Remisión</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Fecha</label>
								<input id="txt_fecha" type="Date" class="form-control editable" required>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label># Comprobante Venta</label>
								<input id="txt_comprobante" type="text" class="form-control editable" required>
								<!-- <input id="txt_descripcion" type="text" class="form-control" required> -->
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Motivo Traslado</label>
								<input id="txt_motivo" type="text" class="form-control editable" required>
								<!-- <input id="txt_descripcion" type="text" class="form-control" required> -->
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Punto de Partida</label>
								<input id="txt_partida" type="Text" class="form-control editable" required>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Punto Llegada</label>
								<input id="txt_llegada" type="Text" class="form-control editable" required>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Despachador</label>
								<input id="txt_despachador" type="Text" class="form-control editable" required>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Transportista</label>
								<input id="txt_transportista" type="Text" class="form-control editable" required>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label>Ruc/CI</label>
								<input id="txt_ruc" type="Number" class="form-control editable" required>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group">
								<label># Cajas</label>
								<input id="txt_cajas" type="Number" class="form-control editable" required>
								<p id="txt_cajas1" class="error-message"></p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Estado Entrega</label>
								<input id="txt_estado_entrega" type="Text" class="form-control editable" required>
							</div>
						</div>	
						<div class="col">
							<div class="form-group">
								<label>Estado</label>
								<select class="form-control" id="cmb_estado_form" required disabled>
									<option value="A">Activo</option>
									<option value="P">Procesado</option>
									<option value="N">Anulado</option>
								</select>
								<!-- <div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="rbt_estado" id="rbt_activo" value="A">
									<label class="form-check-label" for="rbt_activo">Activo</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="rbt_estado" id="rbt_inactivo" value="I">
									<label class="form-check-label" for="rbt_inactivo">Inactivo</label>
									
								</div> -->
								<input type="hidden" name="txt_id" id="txt_id" value="0"/>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input id ="btn_ingreso"type="button" class="btn btn-success editable" value="Ingresar">
                    <!-- <input id ="btn_procesar"type="button" class="btn btn-info" value="Procesar">
                    <input id ="btn_procesar"type="button" class="btn btn-danger" value="Anular"> -->
				</div>
			</form>
		</div>
	</div>
</div>


<script src="../js/jquery-3.5.1.min.js"></script>
    <script>
		function validarNumerosPositivos(inputId, errorMessageId) {
            var inputValue = document.getElementById(inputId).value;
            var errorMessageElement = document.getElementById(errorMessageId);

            if (inputValue < 0) {
                errorMessageElement.textContent = 'Solo se permiten números positivos';
            } else {
                errorMessageElement.textContent = '';
            }
        }
        document.getElementById('txt_cajas').addEventListener('input', function() {
            validarNumerosPositivos('txt_cajas', 'txt_cajas1');
        });
        $(document).ready(function() {
			let editUserId; 
			let deleteUserId;
            let url="Guias/Gre_Controlador.php";
            cargarUsuarios();
            /* cargarcombo();
            cargarcomboproveedor(); */
			let titulo_error = 'Error, Ingreso por Compra';
			let titulo_succes = 'Éxito, Ingreso por Compra';
			let titulo_aviso = 'Aviso, Ingreso por Compra';
			let titulo_advertencia = 'Advertencia , Ingreso por Compra';
			function mensaje(titulo,contenido,tipo){
				Swal.fire(titulo, contenido, tipo);
			}
            /* function cargarcombo(){
				let combo = 'comboproducto';
				$.ajax({
					type:"post",
					url: url,
					data:{ comboproducto:combo},
					success:function(datos)
					{
						$("#cmb_producto_consulta").html(datos);
                        $("#cmb_prodcuto_form").html(datos);
					}
					
				});
			} */
            /* function cargarcomboproveedor(){
				let combo = 'comboproveedor';
				$.ajax({
					type:"post",
					url: "Inventario/Ic_Controlador.php",
					data:{ comboproveedor:combo},
					success:function(datos)
					{
						$("#cmb_proveedor_form").html(datos);
                        
					}
					
				});
			} */
            $("#buscarUsuarios").click(function() {
                cargarUsuarios();
            });
			
            function cargarUsuarios() {
                var filtroMotivo = $("#filtroMotivo").val();
                var filtroEstado = $("#filtroEstado").val();
                var filtroFecha = $("#filtroFecha").val();
                var filtroDespachador = $("#filtroDespachador").val();

                $.ajax({
                    url: url,
                    method: "POST",
                    data:   {   filtroFecha: filtroFecha, 
                                filtroDespachador: filtroDespachador,
                                filtroEstado:filtroEstado ,
                                filtroMotivo:filtroMotivo
                            },
                    success: function(data) {
                        $("#tablaUsuarios").html(data);
                    }
                });
            }
            // También puedes agregar un evento para cuando se cierre el modal
            $('#addEmployeeModal').on('hidden.bs.modal', function () {
                // Habilitar los campos editables
                $(".editable").prop("disabled", false);
            });
			$(document).on("click", ".edit", function() {
				clearModalFields();
				editUserId = $(this).data("id");
				// Encuentra la fila correspondiente a editUserId
				var $userRow = $(".user-row[data-id='" + editUserId + "']");
				// Obtén los valores de las celdas de la fila
				var id = $userRow.find("td:eq(0)").text(); // ID
                var fecha = $userRow.find("td:eq(1)").text(); // Codigo Proveedor
				var comprobante = $userRow.find("td:eq(2)").text(); // Cantidad
                var motivo = $userRow.find("td:eq(3)").text(); // Fecha
                var puntopartida = $userRow.find("td:eq(4)").text(); // Observacion
                var puntollegada = $userRow.find("td:eq(5)").text(); // COd Producto
                var despachador = $userRow.find("td:eq(6)").text(); // COd Producto
                var transportista = $userRow.find("td:eq(7)").text(); // COd Producto
                var cedularuc = $userRow.find("td:eq(8)").text(); // COd Producto
                var cantcajas = $userRow.find("td:eq(9)").text(); // COd Producto
                var estadoentrega = $userRow.find("td:eq(10)").text(); // COd Producto
                var estadoval = $userRow.find("td:eq(11)").text(); // Estado
                var estado = $userRow.find("td:eq(12)").text(); // Estado
				// Llena los campos del modal con los valores obtenidos
				$("#txt_id").val(id);
                $("#txt_fecha").val(fecha);
                $("#txt_comprobante").val(comprobante);
                $("#txt_motivo").val(motivo);
                $("#txt_partida").val(puntopartida);
                $("#txt_llegada").val(puntollegada);
                $("#txt_despachador").val(despachador);
                $("#txt_transportista").val(transportista);
                $("#txt_ruc").val(cedularuc);
                $("#txt_cajas").val(cantcajas);
                $("#txt_estado_entrega").val(estadoentrega);
                $("#cmb_estado_form").val(estadoval);        
                
                if (estadoval !== 'A'){
                    // Deshabilita los campos editables
                    $(".editable").prop("disabled", true);
                }else{
                    // Deshabilita los campos editables
                    $(".editable").prop("disabled", false);
                }
				
			});
			$(document).on("click", ".search", function() {
				deleteUserId = $(this).data("id");
				// Encuentra la fila correspondiente a editUserId
				var $userRow = $(".user-row[data-id='" + deleteUserId + "']");
				// Obtén los valores de las celdas de la fila
				var id = $userRow.find("td:eq(0)").text(); // ID
                var estadoval = $userRow.find("td:eq(11)").text(); // Estado
				var estado = 'P';
                if (estadoval !== 'A'){
                    mensaje(titulo_error, 'Este Registro ya se encuentra Procesado o Anulado', 'error');
                    return;
                }
                var accion ='procesar';

                Swal.fire({
                    title: '¿Estás seguro de procesar este registro?',
                    text: 'Se Procederá a realizar este procesamiento de información',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, proceder',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                       
						$.ajax({ 
							type:"Post",
							url:url,
							data:   {   accion:accion,
                                        gre_gre_codigo:id,
                                        estado:estado
                                    },
							success:function(datos){
								cargarUsuarios();
								if(datos === '1'){
									mensaje(titulo_succes, 'Se Realizó el proceso de forma correcta', 'success');
								}else{
									mensaje(titulo_error, 'No se Concreto el proceso', 'error');
								}
							}
						});
                         
                        
                        
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Aquí puedes manejar la cancelación.
                        Swal.fire(titulo_aviso, 'La operación ha sido cancelada', 'info');
                    }
                });
				
			});
			$(document).on("click", ".delete", function() {
				deleteUserId = $(this).data("id");
				// Encuentra la fila correspondiente a editUserId
				var $userRow = $(".user-row[data-id='" + deleteUserId + "']");
				// Obtén los valores de las celdas de la fila
				var id = $userRow.find("td:eq(0)").text(); // ID
                var estadoval = $userRow.find("td:eq(11)").text(); // Estado
				var estado = 'N';
				if (estadoval === 'N'){
                    mensaje(titulo_error, 'Este Registro ya se encuentra Anulado', 'error');
                    return;
                }
                var accion ='anular';

                Swal.fire({
                    title: '¿Estás seguro de procesar este registro?',
                    text: 'Se Procederá a realizar este procesamiento de información',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, proceder',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                       
						$.ajax({ 
							type:"Post",
							url:url,
							data:   {   accion:accion,
                                        gre_gre_codigo:id,
                                        estado:estado
                                    },
							success:function(datos){
								cargarUsuarios();
								if(datos === '1'){
									mensaje(titulo_succes, 'Se Realizó el proceso de forma correcta', 'success');
								}else{
									mensaje(titulo_error, 'No se Concreto el proceso', 'error');
								}
							}
						});
                         
                        
                        
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Aquí puedes manejar la cancelación.
                        Swal.fire(titulo_aviso, 'La operación ha sido cancelada', 'info');
                    }
                });
				
			});
            $("#btn_agregar").click(function(){
                clearModalFields();
            });
            
			/* $("#btn_eliminar").click(function(){
				var id=$("#txt_ideli").val();
				var codigo=id;
				var accion  =   'eliminar';
				$.ajax({ 
					type:"Post",
					url:"Seguridad/Rol_Controlador.php",
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
			}); */
			
			$("#btn_ingreso").click(function(){
				var id=$("#txt_id").val();
                var fecha = $("#txt_fecha").val();
                var comprobante = $("#txt_comprobante").val();
                var motivo = $("#txt_motivo").val();
                var puntopartida = $("#txt_partida").val();
                var puntollegada = $("#txt_llegada").val();
                var despachador = $("#txt_despachador").val();
                var transportista = $("#txt_transportista").val();
                var cedularuc = $("#txt_ruc").val();
                var cantcajas = $("#txt_cajas").val();
                var estadoentrega = $("#txt_estado_entrega").val();
                var estadoval = $("#cmb_estado_form").val();        
                var usuario = 1;
                /* if(descripcion === ''){
					mensaje(titulo_error, 'Debe Digitar Color', 'error');
					return;
				}
				*/
				if(fecha === ''){
					mensaje(titulo_error, 'Debe Seleccionar Fecha', 'error');
					return;
				} 
				if(comprobante === ''){
					mensaje(titulo_error, 'Debe Registrar el Comprobante de Venta', 'error');
					return;
				} 
				if(cantcajas<0){
					mensaje(titulo_error, 'El # de Cajas debe ser positivo', 'error');
					return;
				}
				
                if (id==0){
					var accion  =   'ingresar';

                }else{
                    var accion  =   'actualizar';
                }
                $.ajax({ 
                    type:"Post",
                    url:url,
                    data:   {   accion:accion,
                                gre_gre_codigo: id,
                                gre_gre_fecha_emision:fecha,
                                gre_gre_comprobante_venta:comprobante,
                                gre_gre_motivo_traslado:motivo,
                                gre_gre_punto_partida:puntopartida,
                                gre_gre_punto_llegada:puntollegada,
                                codigousuario:usuario,
                                gre_gre_despachador:despachador,
                                gre_gre_transportista:transportista,
                                gre_gre_cat_cajas_transportadas:cantcajas,
                                gre_gre_estado_entrega:estadoval,
                                gre_gre_estado_ent:estadoentrega,
                                gre_gre_ruc_ci:cedularuc
                            },
                    success:function(datos){
                        cargarUsuarios();
                        if(datos === '1'){
                            mensaje(titulo_succes, 'Se Realizó el proceso de forma correcta', 'success');
                            
                        }else{
                            mensaje(titulo_error, 'No se ConcrRealizó el proceso', 'error');
                        }
                        
                    }
            });
				/* if (id==0)
				{
					
				}
				else
				{
					var accion  =   'actualizar';
					var codigo	= id;
					$.ajax({ 
						type:"Post",
						url:"Cosecha_Empaque/Cinta_Controlador.php",
						data: { accion:accion,descripcion: descripcion, fecha: fecha ,estado:estado,codigo:codigo},
						success:function(datos){
							cargarUsuarios();
							if(datos === '1'){
                                mensaje(titulo_succes, 'Se Realizó el proceso de forma correcta', 'success');
								
                            }else{
                                mensaje(titulo_error, 'No se ConcrRealizó el proceso', 'error');
                            }
						}
					});
				
				} */
		
			});
			// Vaciar los campos del modal
			function clearModalFields() {
				$("#txt_id").val(0);
				$("#txt_fecha").val("");
                $("#txt_comprobante").val("");
                $("#txt_motivo").val("");
                $("#txt_partida").val("");
                $("#txt_llegada").val("");
                $("#txt_despachador").val("");
                $("#txt_transportista").val("");
                $("#txt_ruc").val(0);
                $("#txt_cajas").val(0);
                $("#txt_estado_entrega").val("");
                $("#cmb_estado_form").val("A");   
			}
        });
        
        
		
    </script>
</body>
</html>
