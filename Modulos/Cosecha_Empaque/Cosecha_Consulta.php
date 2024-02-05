<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Cosecha</title>
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
                        <h2>Registro Cosecha</h2>
                    </div>
                </div>
				<div class="row">
                    <div class="col">
                        <input type="Date" class="form-control" id="filtroFecha">
                        <!-- <input type="date" class="form-control" placeholder="Color de la Cinta" id="filtroUsuario"> -->
                    </div>
                    <div class="col" style='display: none;'>
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
                            <!-- <option value="N">Anulado</option> -->
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
                        <th>Id </th>
                        <th>Lote</th>
                        <th>Hectareas</th>
                        <th>Fecha</th>
                        <th>Responsable</th>
                        <th>Tipo</th>
                        <th>Encinte</th>
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
                    <h4 class="modal-title">Registro Cosecha</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="form-group">
                            <label>Lote</label>
                            <select id="cmb_lote_form" type="select" class="form-control editable" required></select>
                            <!-- <input id="txt_descripcion" type="text" class="form-control" required> -->
                        </div>
                        <div class="form-group">
                            <label>Hectarea</label>
                            <select id="cmb_hectarea" type="select" class="form-control editable" required></select>
                            <!-- <input id="txt_descripcion" type="text" class="form-control" required> -->
                        </div>    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Encinte</label>
                                <select id="cmb_encinte" type="select" class="form-control editable" required></select>
                                <!-- <input id="txt_descripcion" type="text" class="form-control" required> -->
                            </div>    
                        </div>
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
                                <label>Responsable</label>
                                <input id="txt_responsable" type="text" class="form-control editable" required>
                                <p id="error_responsable" class="error-message"></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Manos Racimos</label>
                                <input id="txt_manos_racimo" type="Number" class="form-control editable" required>
                                <p id="txt_manos_racimo1" class="error-message"></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label># Racimos Cosechados</label>
                                <input id="txt_racimos_procesados" type="Number" class="form-control editable" required>
                                <p id="error_racimos" class="error-message"></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label># Racimos Rechazados</label>
                                <input id="txt_racimos_rechazados" type="Number" class="form-control editable" required cmb_estado_form>
                                <p id="txt_racimos_rechazados1" class="error-message"></p>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label># Manos Rechazadas</label>
                                <input id="txt_manos_rechazadas" type="Number" class="form-control" required disabled>
                                <p id="txt_manos_rechazadas1" class="error-message"></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Total Racimos</label>
                                <input id="txt_total_racimos" type="Number" class="form-control" required disabled>
                                <p id="txt_total_racimos1" class="error-message"></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Total Manos</label>
                                <input id="txt_total_manos" type="Number" class="form-control" required disabled>
                                <p id="txt_total_manos1" class="error-message"></p>
                            </div>
                        </div>      
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Merma</label>
                                <input id="txt_merma" type="Number" class="form-control " required disabled>
                                <p id="txt_merma1" class="error-message"></p>
                            </div>
                        </div>      
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
        function validarNumeroDecimal(numero) {
            var regex = /^\d+(\.\d{1,2})?$/;
            return regex.test(numero);
        }
        function validarNumerosPositivos(inputId, errorMessageId) {
            var inputValue = document.getElementById(inputId).value;
            var errorMessageElement = document.getElementById(errorMessageId);

            if(!validarNumeroDecimal(inputValue) || parseFloat(inputValue) <= 0 )
            {
                errorMessageElement.textContent = 'Solo se permiten números positivos';
            } else {
                errorMessageElement.textContent = '';
            }
        }
        document.getElementById('txt_racimos_procesados').addEventListener('input', function() {
            validarNumerosPositivos('txt_racimos_procesados', 'error_racimos');
        });
        document.getElementById("txt_racimos_rechazados").addEventListener('input', function() {
            validarNumerosPositivos("txt_racimos_rechazados", 'txt_racimos_rechazados1');
        });
        document.getElementById('txt_manos_racimo').addEventListener('input', function() {
            validarNumerosPositivos('txt_manos_racimo', 'txt_manos_racimo1');
        });
        
        document.getElementById('txt_manos_rechazadas').addEventListener('input', function() {
            validarNumerosPositivos('txt_manos_rechazadas', 'txt_manos_rechazadas1');
        });
        document.getElementById('txt_total_racimos').addEventListener('input', function() {
            validarNumerosPositivos('txt_total_racimos', 'txt_total_racimos');
        });
        document.getElementById('txt_total_manos').addEventListener('input', function() {
            validarNumerosPositivos('txt_total_manos', 'txt_total_manos1');
        });
        document.getElementById('txt_merma').addEventListener('input', function() {
            validarNumerosPositivos('txt_merma', 'txt_merma1');
        });
        $("#txt_responsable").on('input', function () {
            $(this).val(function (_, val) {
                return val.toUpperCase();
            });

            /* validarLetrasMayusculas('txt_responsable', 'error_responsable'); */
        });
        function calcularManosRechazadas() {
            var manosRacimo = parseFloat($("#txt_manos_racimo").val()) || 0;
            var racimosRechazados = parseFloat($("#txt_racimos_rechazados").val()) || 0;
            var manosRechazadas = manosRacimo * racimosRechazados;

            $("#txt_manos_rechazadas").val(manosRechazadas);
        }
        function calcularTotalRacimos() {
            var racimosProcesados = parseFloat($("#txt_racimos_procesados").val()) || 0;
            var racimosRechazados = parseFloat($("#txt_racimos_rechazados").val()) || 0;
            var totalRacimos = racimosProcesados - racimosRechazados;

            $("#txt_total_racimos").val(totalRacimos);
        }
        function calcularMerma() {
            var racimosProcesados = parseFloat($("#txt_racimos_procesados").val()) || 0;
            var totalRacimos = parseFloat($("#txt_total_racimos").val()) || 0;
            
            // Calcular la merma
            var merma = ((racimosProcesados - totalRacimos) / racimosProcesados) * 100;

            // Actualizar el campo txt_merma
            $("#txt_merma").val(merma.toFixed(2));
        }

        $("#txt_manos_racimo").on('input', function () {
            validarNumerosManosRacimo('txt_manos_racimo', 'txt_manos_racimo1');
            calcularManosRechazadas();
        });
        
        $("#txt_racimos_rechazados").on('input', function () {
            calcularManosRechazadas();
            calcularTotalRacimos();
            calcularTotalManos() ;
            calcularMerma();
        });
        $("#txt_racimos_procesados").on('input', function () {
            calcularTotalRacimos();
        });
        function calcularTotalManos() {
            var manosRacimo = parseFloat($("#txt_manos_racimo").val()) || 0;
            var totalRacimos = parseFloat($("#txt_total_racimos").val()) || 0;
            var totalManos = manosRacimo * totalRacimos;

            $("#txt_total_manos").val(totalManos);
        }

        // Agregar el evento input para el campo txt_total_racimos
        $("#txt_total_racimos").on('input', function () {
            calcularTotalManos();
            // Visualizar inmediatamente después de calcular el total de racimos
            $("#txt_total_manos").trigger('input');
        });
        function calcularRatio() {
            // Obtener los valores de los campos de entrada
           /*  var totalCajas = parseFloat(document.getElementById("txt_total_cajas").value);
            var racimosProcesados = parseFloat(document.getElementById("txt_racimos_procesados").value);

            // Verificar si los valores son válidos
            if (isNaN(totalCajas) || isNaN(racimosProcesados)) {
                alert("Por favor, ingrese números válidos.");
                return;
            } */

            // Calcular el ratio
           /*  var ratio = totalCajas / racimosProcesados;

            // Mostrar el resultado en el campo de texto
            document.getElementById("txt_ratio").value = ratio.toFixed(2); */
        }
        function validarNumerosManosRacimo(inputId, errorMessageId) {
            var inputValue = $("#" + inputId).val();
            var errorMessageElement = $("#" + errorMessageId);

            if (!/^\d+$/.test(inputValue) || inputValue < 15.00 || inputValue > 20.00) {
                errorMessageElement.text('Ingrese un número entre 15 y 20');
            } else {
                errorMessageElement.text('');
            }
        }
        
        function validarLetrasMayusculas(inputId, errorMessageId) {
            var inputValue = document.getElementById(inputId).value;
            var errorMessageElement = document.getElementById(errorMessageId);

            var regex = /^[A-Z]+$/;
            if (!regex.test(inputValue)) {
                errorMessageElement.textContent = 'Solo se permiten letras mayúsculas';
                return false;
            } else {
                errorMessageElement.textContent = '';
                return true;
            }
        }
        

        $(document).ready(function() {
			let editUserId; 
			let deleteUserId;
            cargarUsuarios();
            cargarcombo();
            cargarcomboEncinte();
            cargarComboHectareas();
			let titulo_error = 'Error, Registro Cosecha';
			let titulo_succes = 'Éxito, Registro Cosecha';
			let titulo_aviso = 'Aviso, Registro Cosecha';
			let titulo_advertencia = 'Advertencia , Registro Cosecha';
			function mensaje(titulo,contenido,tipo){
				Swal.fire(titulo, contenido, tipo);
			}
            
            function cargarcombo(){
				let combo = 'combolote';
				$.ajax({
					type:"post",
					url: "Cosecha_Empaque/Cosecha_Controlador.php",
					data:{ combolote:combo},
					success:function(datos)
					{
						/* $("#filtroCinta").html(datos); */
                        $("#cmb_lote_form").html(datos);
					}
					
				});
			}
            function cargarcomboEncinte(){
				let comboencinte = 'comboencinte';
				$.ajax({
					type:"post",
					url: "Cosecha_Empaque/Cosecha_Controlador.php",
					data:{ comboencinte:comboencinte},
					success:function(datos)
					{
						/* $("#filtroCinta").html(datos); */
                        $("#cmb_encinte").html(datos);
					}
					
				});
			}
            function cargarComboHectareas(){
                var selectedLote = $("#cmb_lote_form option:selected").val();
                var combohectareas ='combohectareas';
                console.log(selectedLote);
                // Realizar una solicitud AJAX para obtener las opciones del combo de hectáreas
                $.ajax({
                    type:"post",
					url: "Cosecha_Empaque/Cosecha_Controlador.php",
                    data: { cse_lot_codigo: selectedLote ,
                            combohectareas:combohectareas
                          },
                    success: function(response) {
                        // Actualizar el combo de hectáreas con las opciones obtenidas
                        $("#cmb_hectarea").html(response);
                    }
                });
            }
            $("#cmb_lote_form").change(function() {
                // Obtener el valor seleccionado en el combo de lotes
                cargarComboHectareas()
            });
            $("#buscarUsuarios").click(function() {
                cargarUsuarios();
            });
			
            function cargarUsuarios() {
                var filtroTipo = $("#filtroTipo").val();
                var filtroFecha = $("#filtroFecha").val();
                var filtroCinta = $("#filtroCinta").val();
                var filtroEstado = $("#filtroEstado").val();
                var buscar = 'buscar';
                
                $.ajax({
                    url: "Cosecha_Empaque/Cosecha_Controlador.php",
                    method: "POST",
                    data:   {   cse_cos_tipo: filtroTipo, 
                                cse_cos_fecha: filtroFecha,
                                cse_cos_cod_encinte:filtroCinta,
                                cse_cos_estado:filtroEstado,
                                buscar:buscar
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
                var lote = $userRow.find("td:eq(1)").text(); // ID
                var hectareacod = $userRow.find("td:eq(3)").text(); // ID
                var fecha = $userRow.find("td:eq(5)").text(); // ID
                var responsable = $userRow.find("td:eq(6)").text(); // ID
                var recimoscosechados = $userRow.find("td:eq(7)").text(); // ID
                var racimosrechazados = $userRow.find("td:eq(8)").text(); // ID
                var manosracimo = $userRow.find("td:eq(9)").text(); // ID
                var manosrechazadas = $userRow.find("td:eq(10)").text(); // ID
                var totalracimos = $userRow.find("td:eq(11)").text(); // ID
                var totalmanos = $userRow.find("td:eq(12)").text(); // ID
                var merma = $userRow.find("td:eq(13)").text(); // ID
                var tipoval = $userRow.find("td:eq(15)").text(); // ID
                var encinte = $userRow.find("td:eq(16)").text(); // ID
                var estado = $userRow.find("td:eq(19)").text(); // ID


                
				// Llena los campos del modal con los valores obtenidos
				$("#txt_id").val(id);
                $("#cmb_lote_form").val(lote);
                $("#cmb_hectarea").val(hectareacod);
                $("#cmb_encinte").val(encinte);
                $("#txt_fecha").val(fecha);
                $("#cmb_tipo_form").val(tipoval);
                $("#txt_merma").val(merma);
                $("#txt_responsable").val(responsable);
                $("#txt_racimos_procesados").val(recimoscosechados);
                $("#txt_racimos_rechazados").val(racimosrechazados);
                $("#txt_manos_racimo").val(manosracimo);
                $("#txt_manos_rechazadas").val(manosrechazadas);
                $("#txt_total_racimos").val(totalracimos);
                $("#txt_total_manos").val(totalmanos);
                $("#cmb_estado_form").val(estado);
                
                if (estado !== 'A'){
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
                var estadoval = $userRow.find("td:eq(19)").text(); // Estado
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
							url:"Cosecha_Empaque/Cosecha_Controlador.php",
							data:   {   accion:accion,
                                        cse_cos_codigo:id,
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
                var estadoval = $userRow.find("td:eq(19)").text(); // Estado
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
							url:"Cosecha_Empaque/Cosecha_Controlador.php",
							data:   {   accion:accion,
                                        cse_cos_codigo:id,
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
            
			
			
			$("#btn_ingreso").click(function(){
                calcularManosRechazadas();
                calcularTotalRacimos();
                calcularTotalManos() ;
                calcularMerma();
				var id=$("#txt_id").val();
                var lote = $("#cmb_lote_form").val();
                var hectareacod = $("#cmb_hectarea").val();
                var encinte = $("#cmb_encinte").val();
                var fecha = $("#txt_fecha").val();
                var tipo = $("#cmb_tipo_form").val();
                var merma =$("#txt_merma").val();
                var responsable=$("#txt_responsable").val();
                var racimosprocesados=$("#txt_racimos_procesados").val();
                var racimosrechazados= $("#txt_racimos_rechazados").val();
                var manosracimo=$("#txt_manos_racimo").val();
                var manosrechazadas=$("#txt_manos_rechazadas").val();
                var totalracimos=$("#txt_total_racimos").val();
                var totalmanos=$("#txt_total_manos").val();
                var estado=$("#cmb_estado_form").val();


			
                if(fecha === ''){
					mensaje(titulo_error, 'Debe Seleccionar Fecha', 'error');
					return;
				} 
                // Validar letras mayúsculas en el campo responsable
                if (!validarLetrasMayusculas('txt_responsable', 'error_responsable')) {
                    mensaje(titulo_error, 'Ingrese letras y que sean solo mayusculas', 'error');
                    return;
                }
                if(!validarNumeroDecimal(racimosprocesados) || parseFloat(racimosprocesados) < 0 ){
                    mensaje(titulo_error, 'Ingrese Valores Positivos en Racimos Procesados', 'error');
                    return;
                }
                if(!validarNumeroDecimal(manosracimo) || parseFloat(manosracimo) < 0 ){
                    mensaje(titulo_error, 'Ingrese Valores Positivos en Manos Rzimos', 'error');
                    return;
                }
                if(manosracimo <15 ){
                    mensaje(titulo_error, 'Ingrese Manos de Racimo mayores a 15 y menores a 20', 'error');
                    return;
                }
                if(manosracimo >20 ){
                    mensaje(titulo_error, 'Ingrese Manos de Racimo mayores a 15 y menores a 20', 'error');
                    return;
                }
                if(!validarNumeroDecimal(racimosrechazados) || parseFloat(racimosrechazados) < 0 ){
                    mensaje(titulo_error, 'Ingrese Valores Positivos en Racimos Rechazados', 'error');
                    return;
                }
                if(!validarNumeroDecimal(manosrechazadas) || parseFloat(manosrechazadas) < 0 ){
                    mensaje(titulo_error, 'Ingrese Valores Positivos en Manos Rechazados', 'error');
                    return;
                }
                if(!validarNumeroDecimal(totalmanos) || parseFloat(totalmanos) < 0 ){
                    mensaje(titulo_error, 'Ingrese Valores Positivos en Total Manos', 'error');
                    return;
                }
                if(!validarNumeroDecimal(merma) || parseFloat(merma) < 0 ){
                    mensaje(titulo_error, 'Ingrese Valores Positivos en Merma', 'error');
                    return;
                }
               
                if (id==0){
                    var accion  =   'ingresar';

                }else{
                    var accion  =   'actualizar';
                }
                $.ajax({ 
                    type:"Post",
                    url:"Cosecha_Empaque/Cosecha_Controlador.php",
                    data:   {   accion:accion,
                                cse_cos_codigo:id,
                                cos_lot_codigo:lote,
                                cse_hec_codigo:hectareacod,
                                cse_cos_fecha:fecha,
                                cse_cos_responsable:responsable,
                                cse_cos_racimos_cosechados:racimosprocesados,
                                cse_cos_racimos_rechazados:racimosrechazados,
                                cse_cos_manos_racimo:manosracimo,
                                cse_cos_manos_rechazadas:manosrechazadas,
                                cse_cos_total_racimos:totalracimos,
                                cse_cos_total_manos:totalmanos,
                                cse_cos_pmerma:merma,
                                cse_cos_estado:estado,
                                cse_cos_tipo:tipo,
                                cse_cos_cod_encinte:encinte
                                
                            },
                    success:function(datos){
                        cargarUsuarios();
                        if(datos === '1'){
                            mensaje(titulo_succes, 'Se Realizó el proceso de forma correcta', 'success');
                            clearModalFields()
                        }else{
                            mensaje(titulo_error, 'No se Realizó  el proceso', 'error');
                        }
                        
                    }
            });
				
		
			});
			// Vaciar los campos del modal
			function clearModalFields() {
				$("#txt_id").val(0);
				$("#cmb_lote_form").val("0");
                $("#cmb_hectarea").val("0");
                $("#cmb_encinte").val("0");
                $("#txt_fecha").val("");
                $("#cmb_tipo_form").val("ECS");
                $("#txt_responsable").val("");
                $("#txt_racimos_procesados").val(0);
                $("#txt_racimos_rechazados").val(0);
                $("#txt_manos_racimo").val(0);
                $("#txt_manos_rechazadas").val(0);
                $("#txt_total_racimos").val(0);
                $("#txt_merma").val(0);
                $("#txt_total_manos").val(0);
                $("#cmb_estado_form").val("A");
			}
        });
        
        
		
    </script>
</body>
</html>
