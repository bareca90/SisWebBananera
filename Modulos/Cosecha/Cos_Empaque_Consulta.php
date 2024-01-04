<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Cosecha/Empaque</title>
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
                        <h2>Cosecha/<b>Empaque </b></h2>
                    </div>
                </div>
				<div class="row">
                    <div class="col">
                        <input type="Date" class="form-control" id="filtroFecha">
                        <!-- <input type="date" class="form-control" placeholder="Color de la Cinta" id="filtroUsuario"> -->
                    </div>
                    <div class="col">
                        <select class="form-control" id="filtroCinta"></select>
                    </div>
                    <div class="col">
                        <select class="form-control" id="filtroTipo">
                            <option value="">Todos</option>
                            <option value="ECS">Ecuasabor</option>
                            <option value="KAS">Kassandra</option>
                        </select>
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
                        <th>Id C/E</th>
                        <th>Tipo</th>
                        <th>Racimos Procesados</th>
                        <th>Total Cajas</th>
                        <!-- <th>Racimos Rechazados</th> -->
                        <th>Peso</th>
                       <!--  <th>Manos Rechazadas</th> -->
                        <th>Merma</th>
                        <!-- <th>Cajas Procesadas</th> -->
                       <!--  <th>Ratio</th> -->
                        <!-- <th>Cajas Enviadas</th> -->
                        <!-- <th>Has</th>
                        <th>Venta</th> -->
                        <th>Color</th>
                        <th>Fecha</th>
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
                    <h4 class="modal-title">Cosecha/Empaque</h4>
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
                                <label>Tipo</label>
                                <select class="form-control editable" id="cmb_tipo_form" required>
                                    <option value="ECS">Ecuasabor</option>
                                    <option value="KAS">Kassandra</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label># Racimos Procesados</label>
                                <input id="txt_racimos_procesados" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Total Cajas</label>
                                <input id="txt_total_cajas" oninput="calcularRatio()" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label>Total Cajas</label>
                                <input id="txt_total_cajas" type="Number" class="form-control editable" required>
                            </div>
                        </div> -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label># Racimos Rechazados</label>
                                <input id="txt_racimos_rechazados" type="Number" class="form-control editable" required>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Peso</label>
                                <input id="txt_peso" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label># Manos Rechazadas</label>
                                <input id="txt_manos_rechazadas" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label># Manos Rechazadas</label>
                                <input id="txt_manos_rechazadas" type="Number" class="form-control editable" required>
                            </div>
                        </div> -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Merma</label>
                                <input id="txt_merma" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label># Cajas Procesadas</label>
                                <input id="txt_cajas_procesadas" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ratio</label>
                                <input id="txt_ratio" type="Number" class="form-control " required disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label># Cajas Enviadas</label>
                                <input id="txt_cajas_enviadas" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Héctareas</label>
                                <input id="txt_hectareas" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cinta</label>
                                <select id="cmb_color" type="select" class="form-control editable" required></select> 
                                
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input id="txt_fecha" type="Date" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control editable" id="cmb_tipo_form" required>
                                    <option value="ECS">Ecuasabor</option>
                                    <option value="KAS">Kassandra</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label># Racimos Procesado</label>
                                <input id="txt_racimos_procesados" type="Number" class="form-control editable" required>
                            </div>
                            

                        </div> -->
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Total Cajas</label>
                                <input id="txt_total_cajas" type="Number" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label># Racimos Rechazados</label>
                                <input id="txt_racimos_rechazados" type="Number" class="form-control editable" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Peso</label>
                                <input id="txt_peso" type="Number" class="form-control editable" required>
                            </div>
                        </div> -->
                       <!--  <div class="col-md-6">
                            <div class="form-group">
                                <label># Manos Rechazadas</label>
                                <input id="txt_manos_rechazadas" type="Number" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label>Merma</label>
                                <input id="txt_merma" type="Number" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label># Cajas Procesadas</label>
                                <input id="txt_cajas_procesadas" type="Number" class="form-control editable" required>
                            </div>
                        </div> -->
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Ratio</label>
                                <input id="txt_ratio" type="Number" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label># Cajas Enviadas</label>
                                <input id="txt_cajas_enviadas" type="Number" class="form-control editable" required>
                            </div>
                            <div class="form-group">
                                <label>Héctareas</label>
                                <input id="txt_hectareas" type="Number" class="form-control editable" required>
                            </div>
                        </div> -->
                        <div class="col-md-6" style="display: none;">
                            <div class="form-group">
                                <label>Venta</label>
                                <input id="txt_venta" type="Number" class="form-control editable" required>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label>Cinta</label>
                            <select id="cmb_color" type="select" class="form-control editable" required></select> 
                            
                        </div> -->
                        <div class="form-group">
                            <label>Estado</label>
                            <select class="form-control " id="cmb_estado_form" required disabled>
                                <option value="A">Activo</option>
                                <option value="P">Procesado</option>
                                <option value="N">Anulado</option>
                            </select>
                            <input type="hidden" name="txt_id" id="txt_id" value="0"/>
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
        function calcularRatio() {
            // Obtener los valores de los campos de entrada
            var totalCajas = parseFloat(document.getElementById("txt_total_cajas").value);
            var racimosProcesados = parseFloat(document.getElementById("txt_racimos_procesados").value);

            // Verificar si los valores son válidos
            if (isNaN(totalCajas) || isNaN(racimosProcesados)) {
                alert("Por favor, ingrese números válidos.");
                return;
            }

            // Calcular el ratio
            var ratio = totalCajas / racimosProcesados;

            // Mostrar el resultado en el campo de texto
            document.getElementById("txt_ratio").value = ratio.toFixed(2);
        }
        $(document).ready(function() {
			let editUserId; 
			let deleteUserId;
            cargarUsuarios();
            cargarcombo();
            
			let titulo_error = 'Error, Registro Cosecha/Empaque';
			let titulo_succes = 'Éxito, Registro Cosecha/Empaque';
			let titulo_aviso = 'Aviso, Registro Cosecha/Empaque';
			let titulo_advertencia = 'Advertencia , Registro Cosecha/Empaque';
			function mensaje(titulo,contenido,tipo){
				Swal.fire(titulo, contenido, tipo);
			}
            
            function cargarcombo(){
				let combo = 'combocinta';
				$.ajax({
					type:"post",
					url: "Cosecha/Cos_Empaque_Controlador.php",
					data:{ combocinta:combo},
					success:function(datos)
					{
						$("#filtroCinta").html(datos);
                        $("#cmb_color").html(datos);
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
                var filtroTipo = $("#filtroTipo").val();
                var filtroFecha = $("#filtroFecha").val();
                var filtroCinta = $("#filtroCinta").val();
                var filtroEstado = $("#filtroEstado").val();
                
                $.ajax({
                    url: "Cosecha/Cos_Empaque_Controlador.php",
                    method: "POST",
                    data:   {   filtroTipo: filtroTipo, 
                                filtroFecha: filtroFecha,
                                filtroCinta:filtroCinta,
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
                var tipoval = $userRow.find("td:eq(2)").text(); 
                var racimosprocesados = $userRow.find("td:eq(3)").text(); 
				var totalcajas = $userRow.find("td:eq(4)").text(); 
                var racimosrechazados = $userRow.find("td:eq(5)").text(); 
                var peso = $userRow.find("td:eq(6)").text(); // Observacion
                var manosrechazadas = $userRow.find("td:eq(7)").text(); // COd Producto
                var merma = $userRow.find("td:eq(8)").text(); // COd Producto
                var cajasprocesadas = $userRow.find("td:eq(9)").text(); // COd Producto
                var ratio = $userRow.find("td:eq(10)").text(); // COd Producto
                var cajasenviadas = $userRow.find("td:eq(11)").text(); // COd Producto
                var has = $userRow.find("td:eq(12)").text(); // COd Producto
                var venta = $userRow.find("td:eq(13)").text(); // COd Producto
                var cinta = $userRow.find("td:eq(14)").text(); // COd Producto
                var fecha = $userRow.find("td:eq(16)").text(); // COd Producto
                /* var estado = $userRow.find("td:eq(8)").text(); // Estado */
                var estadoval = $userRow.find("td:eq(18)").text(); // Estado
				// Llena los campos del modal con los valores obtenidos
				$("#txt_id").val(id);
                $("#txt_fecha").val(fecha);
                $("#cmb_tipo_form").val(tipoval);
                $("#txt_racimos_procesados").val(racimosprocesados);
                $("#txt_total_cajas").val(totalcajas);
                $("#txt_racimos_rechazados").val(racimosrechazados);
                $("#txt_peso").val(peso);
                $("#txt_manos_rechazadas").val(manosrechazadas);
                $("#txt_merma").val(merma);
                $("#txt_cajas_procesadas").val(cajasprocesadas);
                $("#txt_ratio").val(ratio);
                $("#txt_cajas_enviadas").val(cajasenviadas);
                $("#txt_hectareas").val(has);
                $("#txt_venta").val(venta);
                $("#cmb_color").val(cinta);                
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
							url:"Cosecha/Cos_Empaque_Controlador.php",
							data:   {   accion:accion,
                                        cse_cse_codigo:id,
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
							url:"Cosecha/Cos_Empaque_Controlador.php",
							data:   {   accion:accion,
                                        cse_cse_codigo:id,
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
                calcularRatio();
				var id=$("#txt_id").val();
                var fecha=$("#txt_fecha").val();
                var tipoval = $("#cmb_tipo_form").val();
                var racimosprocesados=$("#txt_racimos_procesados").val();
                var totalcajas = $("#txt_total_cajas").val();
                var racimosrechazados= $("#txt_racimos_rechazados").val();
                var peso = $("#txt_peso").val();
                var manosrechazadas = $("#txt_manos_rechazadas").val();
                var merma = $("#txt_merma").val();
                var cajasprocesadas = $("#txt_cajas_procesadas").val();
                var ratio = $("#txt_ratio").val();
                var cajasenviadas = $("#txt_cajas_enviadas").val();
                var has = $("#txt_hectareas").val();
                var venta = $("#txt_venta").val();
                var cinta = $("#cmb_color").val();                
                var estadoval = $("#cmb_estado_form").val();      
                var usuario = 1;


				
				/* if(fecha === ''){
					mensaje(titulo_error, 'Debe Digitar Fecha', 'error');
					return;
				}*/
                if(fecha === ''){
					mensaje(titulo_error, 'Debe Seleccionar Fecha', 'error');
					return;
				} 
                if (id==0){
                    var accion  =   'ingresar';

                }else{
                    var accion  =   'actualizar';
                }
                $.ajax({ 
                    type:"Post",
                    url:"Cosecha/Cos_Empaque_Controlador.php",
                    data:   {   accion:accion,
                                cse_cse_codigo:id,
                                cse_cse_tipo:tipoval,
                                cse_cse_num_racimos_procesados:racimosprocesados,
                                cse_cse_total_cajas:totalcajas,
                                cse_cse_num_racimos_rechazadas:racimosrechazados,
                                cse_cse_peso:peso,
                                cse_cse_num_manos_rechazadas:manosrechazadas,
                                cse_cse_merma:merma,
                                cse_cse_num_cajas_procesadas:cajasprocesadas,
                                cse_cse_ratio:ratio,
                                cse_cse_num_cajas_enviadas:cajasenviadas,
                                cse_cse_has:has,
                                cse_cse_venta:venta,
                                cse_cse_estado:estadoval,
                                usuario:usuario,
                                cse_cin_codigo:cinta,
                                cse_cse_fecha:fecha
                                
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
                $("#cmb_tipo_form").val("ECS");
                $("#txt_racimos_procesados").val(0);
                $("#txt_total_cajas").val(0);
                $("#txt_racimos_rechazados").val(0);
                $("#txt_peso").val(0);
                $("#txt_manos_rechazadas").val(0);
                $("#txt_merma").val(0);
                $("#txt_cajas_procesadas").val(0);
                $("#txt_ratio").val(0);
                $("#txt_cajas_enviadas").val(0);
                $("#txt_hectareas").val(0);
                $("#txt_venta").val(0);
                $("#cmb_color").val('0');                
                $("#cmb_estado_form").val("A");      
			}
        });
        
        
		
    </script>
</body>
</html>
