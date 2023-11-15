<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Evaluación Campo</title>
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
</style>

</head>
<body>
<div class="container-xl" id="contenedordatos">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Evaluación de <b>Campo </b></h2>
                    </div>
                </div>
				<div class="row">
                    <div class="col-sm-3">
                        <input type="Date" class="form-control" id="filtroFecha">
                        <!-- <input type="date" class="form-control" placeholder="Color de la Cinta" id="filtroUsuario"> -->
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
					<div class="col-sm-6">
                        <a id="btn_agregar" href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar</span></a>
						<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a> -->
					</div>
				</div>
			</div>
			
            
            <table class="table table-striped table-hover">
				<thead>
                    <tr>
                        <th>Id E/C</th>
                        <th>Productor</th>
                        <th>Exportador</th>
                        <th>Placa Contenedor</th>
                        <th>Fecha Ev.</th>
                        <th>Sellos Exportador</th>
                        <th>Destino</th>
                        <th>Calidad</th>
                        <th>Tipo Empaque</th>
                        <th># Caja</th>
                        <th>Marca</th>
                        <th>Fruta Primera</th>
                        <th>Calibre</th>
                        <th>Cargo Dedos</th>
                        <th>Dedos Clúster</th>
                        <th>Clúster Caja</th>
                        <th>Contrato</th>
                        <th>Fec. Ini</th>
                        <th>Fec. Fin</th>
                        <th>Proveedor</th>
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
        <div class="modal-content modal-lg">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Evaluación/Campo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha Evaluación</label>
                                <input id="txt_fecha" type="Date" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label>Productor</label>
                                <input id="txt_productor" type="Text" class="form-control editable" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Exportador</label>
                                <input id="txt_exportador" type="Text" class="form-control editable" required>
                            </div>
                            

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Placa Contenedor Cajas</label>
                                <input id="txt_placa" type="Text" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label>Sellos Exportador</label>
                                <input id="txt_sellos" type="Text" class="form-control editable" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Destino</label>
                                <input id="txt_destino" type="Text" class="form-control editable" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Calidad</label>
                                <input id="txt_calidad" type="Text" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label>Tipo Empaque</label>
                                <input id="txt_tipo_empaque" type="Text" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label># Caja</label>
                                <input id="txt_caja" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marca</label>
                                <input id="txt_marca" type="Text" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label>Fruta Primera</label>
                                <input id="txt_fruta_primera" type="Text" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label>Calibre</label>
                                <input id="txt_calibre" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cargo Dedos</label>
                                <input id="txt_cargo_Dedos" type="Number" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label>Dedos Clúster</label>
                                <input id="txt_dedos_cluster" type="Number" class="form-control editable" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Clúster Caja</label>
                                <input id="txt_cluster_caja" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label>Contrato</label>
                                <select class="form-control editable" id="cmb_contrato_forma">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control editable" id="cmb_estado_form">
                                    <option value="A">Activo</option>
                                    <option value="P">Procesado</option>
                                    <option value="N">Anulado</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input id ="btn_ingreso" type="button" class="btn btn-success editable" value="Ingresar">
                </div>
            </form>
        </div>
    </div>
</div>


<script src="../js/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
			let editUserId; 
			let deleteUserId;
            cargarUsuarios();
            cargarcombo();
            
			let titulo_error = 'Error, Registro Evalaucación Campo';
			let titulo_succes = 'Éxito, Registro Evalaucación Campo';
			let titulo_aviso = 'Aviso, Registro Evalaucación Campo';
			let titulo_advertencia = 'Advertencia , Registro Evalaucación Campo';
			function mensaje(titulo,contenido,tipo){
				Swal.fire(titulo, contenido, tipo);
			}
            function cargarcombo(){
				let combo = 'combocontrato';
				$.ajax({
					type:"post",
					url: "Evaluacion_Campo/Ev_Campo_Controlador.php",
					data:{ combocontrato:combo},
					success:function(datos)
					{
						$("#cmb_contrato_forma").html(datos);
					}
					
				});
			}
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
                /* var filtroTipo = $("#filtroTipo").val(); */
                var filtroFecha = $("#filtroFecha").val();
                /* var filtroCinta = $("#filtroCinta").val(); */
                var filtroEstado = $("#filtroEstado").val();
                
                $.ajax({
                    url: "Evaluacion_Campo/Ev_Campo_Controlador.php",
                    method: "POST",
                    data:   {   /* filtroTipo: filtroTipo,  */
                                filtroFecha: filtroFecha,
                                /* filtroCinta:filtroCinta, */
                                filtroEstado:filtroEstado
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
                var productor = $userRow.find("td:eq(1)").text(); 
                var exportador = $userRow.find("td:eq(2)").text(); 
				var placa = $userRow.find("td:eq(3)").text(); 
                var fecha = $userRow.find("td:eq(4)").text(); 
                var sellos = $userRow.find("td:eq(5)").text(); // Observacion
                var destino = $userRow.find("td:eq(6)").text(); // COd Producto
                var caliodad = $userRow.find("td:eq(7)").text(); // COd Producto
                var tipoempaque = $userRow.find("td:eq(8)").text(); // COd Producto
                var numcajas = $userRow.find("td:eq(9)").text(); // COd Producto
                var marca = $userRow.find("td:eq(10)").text(); // COd Producto
                var frutaprimera = $userRow.find("td:eq(11)").text(); // COd Producto
                var calibre = $userRow.find("td:eq(12)").text(); // COd Producto
                var cargodedos = $userRow.find("td:eq(13)").text(); // COd Producto
                var dedoscluster = $userRow.find("td:eq(14)").text(); // COd Producto
                var clustercaja = $userRow.find("td:eq(15)").text(); // COd Producto
                var codigocontrato = $userRow.find("td:eq(16)").text(); // COd Producto
                /* var estado = $userRow.find("td:eq(8)").text(); // Estado */
                var estadoval = $userRow.find("td:eq(22)").text(); // Estado
				// Llena los campos del modal con los valores obtenidos
				$("#txt_id").val(id);
                $("#txt_fecha").val(fecha);
                $("#txt_productor").val(productor);
                $("#txt_exportador").val(exportador);
                $("#txt_placa").val(placa);
                $("#txt_sellos").val(sellos);
                $("#txt_destino").val(destino);
                $("#txt_calidad").val(caliodad);
                $("#txt_tipo_empaque").val(tipoempaque);
                $("#txt_caja").val(numcajas);
                $("#txt_marca").val(marca);
                $("#txt_fruta_primera").val(frutaprimera);
                $("#txt_calibre").val(calibre);
                $("#txt_cargo_Dedos").val(cargodedos);
                $("#txt_cluster_caja").val(clustercaja);                
                $("#cmb_contrato_forma").val(codigocontrato);                
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
                var estadoval = $userRow.find("td:eq(18)").text(); // Estado
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
							url:"Evaluacion_Campo/Ev_Campo_Controlador.php",
							data:   {   accion:accion,
                                        evc_evc_codigo:id,
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
                var estadoval = $userRow.find("td:eq(18)").text(); // Estado
				var estado = 'N';
				$("#txt_ideli").val(id);
                if (estadoval === 'N'){
                    mensaje(titulo_error, 'Este Registro ya se encuentra Anulado', 'error');
                    return;
                }
                var accion ='anular';

                Swal.fire({
                    title: '¿Estás seguro de anular este registro?',
                    text: 'Se Procederá a realizar esta anulacion de información',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, proceder',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                       
						$.ajax({ 
							type:"Post",
							url:"Evaluacion_Campo/Ev_Campo_Controlador.php",
							data:   {   accion:accion,
                                        evc_evc_codigo:id,
                                        estado:estado
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
                var productor = $("#txt_productor").val();
                var exportador = $("#txt_exportador").val();
                var placa = $("#txt_placa").val();
                var sellos = $("#txt_sellos").val();
                var destino = $("#txt_destino").val();
                var caliodad = $("#txt_calidad").val();
                var tipoempaque = $("#txt_tipo_empaque").val();
                var numcajas = $("#txt_caja").val();
                var marca = $("#txt_marca").val();
                var frutaprimera = $("#txt_fruta_primera").val();
                var calibre = $("#txt_calibre").val();
                var cargodedos = $("#txt_cargo_Dedos").val();
                var clustercaja = $("#txt_cluster_caja").val();                
                var codigocontrato = $("#cmb_contrato_forma").val();                
                var estadoval = $("#cmb_estado_form").val();      
                var usuario = 1;


				
				/* if(descripcion === ''){
					mensaje(titulo_error, 'Debe Digitar Color', 'error');
					return;
				}
                if(fecha === ''){
					mensaje(titulo_error, 'Debe Seleccionar Fecha', 'error');
					return;
				} */
                if (id==0){
                    var accion  =   'ingresar';

                }else{
                    var accion  =   'actualizar';
                }
                $.ajax({ 
                    type:"Post",
                    url:"Evaluacion_Campo/Ev_Campo_Controlador.php",
                    data:   {   accion:accion,
                                evc_evc_codigo:id,
                                evc_evc_productor:productor,
                                evc_evc_exportador:exportador,
                                evc_evc_placa_contenedor:placa,
                                evc_evc_fecha_evaluacion:fecha,
                                evc_evc_sellos_exportador:sellos,
                                evc_evc_destino:destino,
                                evc_evc_calidad:caliodad,
                                evc_evc_tipo_empaque:tipoempaque,
                                evc_evc_num_caja:numcajas,
                                evc_evc_marca:marca,
                                evc_evc_fruta_primera:frutaprimera ,
                                evc_evc_calibre:calibre,
                                evc_evc_cargo_dedos:cargodedos,
                                evc_evc_dedos_cluster:dedoscluster,
                                evc_evc_cluster_caja:clustercaja,
                                evc_evc_estado:estado,
                                codigousuario:usuario,
                                reb_con_codigo:codigocontrato
                                
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
                $("#txt_productor").val("");
                $("#txt_exportador").val("");
                $("#txt_placa").val("");
                $("#txt_sellos").val("");
                $("#txt_destino").val("");
                $("#txt_calidad").val("");
                $("#txt_tipo_empaque").val("");
                $("#txt_caja").val(0);
                $("#txt_marca").val("");
                $("#txt_fruta_primera").val("");
                $("#txt_calibre").val(0);
                $("#txt_cargo_Dedos").val(0);
                $("#txt_cluster_caja").val(0);                
                $("#cmb_contrato_forma").val("0");                
                $("#cmb_estado_form").val("");  
			}
        });
        
        
		
    </script>
</body>
</html>
