<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Compra</title>
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
                        <h2>Ingreso <b>Encinte </b></h2>
                    </div>
                </div>
				<div class="row">
                    <div class="col-sm-3">
                        <input type="Date" class="form-control" id="filtroFecha">
                        <!-- <input type="date" class="form-control" placeholder="Color de la Cinta" id="filtroUsuario"> -->
                    </div>
                    <div class="col">
                        <select class="form-control" id="cmb_lote_consulta">
                            
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" id="cmb_producto_consulta">
                            
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
                        <th>Id</th>
                        <th>Lote</th>
                        <th>Cinta</th>
                        <th>Fec. Ini</th>
                        <th>Fec. Fin</th>
                        <th>Responsable</th>
						<th>Semana</th>
                        <th>Nota</th>
                        <!-- <th>Estado</th> -->
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
					<h4 class="modal-title">Registro Encinte</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <div class="form-group">
                        <label>Lote</label>
                        <select id="cmb_lote_form" type="select" class="form-control editable" required></select>
                        <!-- <input id="txt_descripcion" type="text" class="form-control" required> -->
                    </div>
                    <div class="form-group">
						<label>Cinta</label>
						<select id="cmb_prodcuto_form" type="select" class="form-control editable" required></select>
						<!-- <input id="txt_descripcion" type="text" class="form-control" required> -->
					</div>
                    <div class="form-group">
                        <label>Fecha Inicial</label>
                        <input id="txt_fecha" type="Date" class="form-control editable" required>
                    </div>
                    <div class="form-group">
                        <label>Fecha Fin</label>
                        <input id="txt_fecha_fin" type="Date" class="form-control editable" required>
                    </div>
					
					<div class="form-group">
						<label>Responsable</label>
						<input id="txt_responsable" type="text" class="form-control editable" required>
					</div>
					<div class="form-group">
						<label>Semana</label>
						<input id="txt_semana" type="Number" class="form-control editable" required>
						<p id="txt_semana1" class="error-message"></p>
					</div>
                    <div class="form-group" >
						<label>Nota</label>
						<input id="txt_observacion" type="Text" class="form-control editable" required>
                        <input type="hidden" name="txt_id" id="txt_id" value="0"/>
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
		function validarNumeroDecimal(numero) {
            var regex = /^\d+(\.\d{1,2})?$/;
            return regex.test(numero);
        }
		function validarNumerosPositivos(inputId, errorMessageId) {
            var inputValue = document.getElementById(inputId).value;
            var errorMessageElement = document.getElementById(errorMessageId);

            if(!validarNumeroDecimal(inputValue) || parseFloat(inputValue) < 0 ){
                errorMessageElement.textContent = 'Solo se permiten números positivos';
            } else {
                errorMessageElement.textContent = '';
            }
        }
        document.getElementById('txt_semana').addEventListener('input', function() {
            validarNumerosPositivos('txt_semana', 'txt_semana1');
        });
        $(document).ready(function() {
			let editUserId; 
			let deleteUserId;
			
            cargarUsuarios();
            cargarcombo();
            cargarcombolote();
			let titulo_error = 'Error, Registro Encinte';
			let titulo_succes = 'Éxito, Registro Encinte';
			let titulo_aviso = 'Aviso, Registro Encinte';
			let titulo_advertencia = 'Advertencia , Registro Encinte';
			function mensaje(titulo,contenido,tipo){
				Swal.fire(titulo, contenido, tipo);
			}
            function cargarcombo(){
				let combo = 'comboproducto';
				$.ajax({
					type:"post",
					url: "Inventario/Ic_Controlador.php",
					data:{ comboproducto:combo},
					success:function(datos)
					{
						$("#cmb_producto_consulta").html(datos);
                        $("#cmb_prodcuto_form").html(datos);
					}
					
				});
			}
            function cargarcombolote(){
				let combo = 'combolote';
				$.ajax({
					type:"post",
					url: "Cosecha_Empaque/Encinte_Controlador.php",
					data:{ combolote:combo},
					success:function(datos)
					{
						$("#cmb_lote_form").html(datos);
                        $("#cmb_lote_consulta").html(datos);
                        
					}
					
				});
			}
            $("#buscarUsuarios").click(function() {
                cargarUsuarios();
            });
			
            function cargarUsuarios() {
                var filtroProducto = $("#cmb_producto_consulta").val();
                var filtroLote = $("#cmb_lote_consulta").val();
                var filtroFecha = $("#filtroFecha").val();
                var buscar = 'buscar';

                $.ajax({
                    url: "Cosecha_Empaque/Encinte_Controlador.php",
                    method: "POST",
                    data: { cse_enc_fec_ini: filtroFecha, 
                            cse_lot_codigo: filtroLote,
                            cse_codigo_prod:filtroProducto ,
                            buscar:buscar

                        },
                    success: function(data) {
                        $("#tablaUsuarios").html(data);
                    }
                });
            }
          
			$(document).on("click", ".edit", function() {
				clearModalFields();
				editUserId = $(this).data("id");
				// Encuentra la fila correspondiente a editUserId
				var $userRow = $(".user-row[data-id='" + editUserId + "']");
				// Obtén los valores de las celdas de la fila
				var id = $userRow.find("td:eq(0)").text(); // ID
                var lotecod = $userRow.find("td:eq(1)").text(); // Codigo Proveedor
				var productocod = $userRow.find("td:eq(3)").text(); // Cantidad
                var cantidad = $userRow.find("td:eq(5)").text(); // Fecha
                var fecini = $userRow.find("td:eq(6)").text(); // Observacion
                var fecfin = $userRow.find("td:eq(7)").text(); // COd Producto
                var responsable = $userRow.find("td:eq(8)").text(); // COd Producto
				var semana = $userRow.find("td:eq(9)").text(); // COd Producto
                var nota = $userRow.find("td:eq(10)").text(); // Estado
                var estadoval = $userRow.find("td:eq(12)").text(); // Estado
				// Llena los campos del modal con los valores obtenidos
				$("#txt_id").val(id);
				$("#txt_fecha").val(fecini);
                $("#cmb_prodcuto_form").val(productocod);
                $("#cmb_lote_form").val(lotecod);
                $("#txt_fecha_fin").val(fecfin);
                $("#txt_observacion").val(nota);
                $("#txt_responsable").val(responsable);
                /* $("#cmb_estado_form").val(estadoval);         */
				$("#txt_semana").val(semana);        
            
			});
			
			$(document).on("click", ".delete", function() {
				deleteUserId = $(this).data("id");
				// Encuentra la fila correspondiente a editUserId
				var $userRow = $(".user-row[data-id='" + deleteUserId + "']");
				// Obtén los valores de las celdas de la fila
				var id = $userRow.find("td:eq(0)").text(); // ID
                $("#txt_ideli").val(id);
               
                var accion ='eliminar';

                Swal.fire({
                    title: '¿Estás seguro de eliminar este registro?',
                    text: 'Se Procederá a realizar esta anulacion de información',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, proceder',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                       
						$.ajax({ 
							type:"Post",
							url:"Cosecha_Empaque/Encinte_Controlador.php",
							data: { accion:accion,
                                    cse_enc_codigo:id},
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
            
			function validarNumero(valor) {
				const regex = /^[0-9]{10}$|^[0-9]{13}$/;
				return regex.test(valor);
			}
			function validarNumeroFactura(numero) {
				const regex = /^[0-9]{3}-[0-9]{3}-[0-9]{9}$/;
				return regex.test(numero);
			}
			
			
			$("#btn_ingreso").click(function(){
				var id=$("#txt_id").val();
                var prodcuto = $("#cmb_prodcuto_form").val();
                var fecha = $("#txt_fecha").val();
                var fechafin = $("#txt_fecha_fin").val();
                var lote = $("#cmb_lote_form").val();
                var observacion = $("#txt_observacion").val();
                var responsable = $("#txt_responsable").val();
                var estado= 'A';
				var semana = $("#txt_semana").val(); 
                var cantidad = 0;
				
				if(fecha===''){
					mensaje(titulo_error, 'Debe Seleccionar una fecha Inicial', 'error');
					return;
				}
                if(fechafin===''){
					mensaje(titulo_error, 'Debe Seleccionar una fecha Final', 'error');
					return;
				}
				if(prodcuto === '0'){
					mensaje(titulo_error, 'Debe Seleccionar prodcuto', 'error');
					return;
				}
				if(lote === '0'){
					mensaje(titulo_error, 'Debe Seleccionar lote', 'error');
					return;
				}
				
				if(!validarNumeroDecimal(semana) || parseFloat(semana) < 0 ){
					mensaje(titulo_error, 'La semana debe ser positivo', 'error');
					return;
				}
				
                if (id==0){
                    var accion  =   'ingresar';

                }else{
                    var accion  =   'actualizar';
                }
                $.ajax({ 
                    type:"Post",
                    url:"Cosecha_Empaque/Encinte_Controlador.php",
                    data:   {   accion:accion,
                                cse_enc_codigo: id,
                                cse_lot_codigo:lote,
                                cse_codigo_prod:prodcuto,
                                cse_enc_cantidad:cantidad,
                                cse_enc_fec_ini:fecha,
                                cse_enc_fec_fin:fechafin,
                                cse_enc_responsable:responsable,
                                cse_enc_semana:semana,
                                cse_enc_nota:observacion,
								cse_enc_estado:estado
                            },
                    success:function(datos){
                        cargarUsuarios();
                        if(datos === '1'){
                            mensaje(titulo_succes, 'Se Realizó el proceso de forma correcta', 'success');
                            clearModalFields();
                        }else{
                            mensaje(titulo_error, 'No se Realizó el proceso', 'error');
                        }
                        
                    }
            });
				
		
			});
			// Vaciar los campos del modal
			function clearModalFields() {
				$("#txt_id").val(0);
				$("#txt_fecha").val("");
                $("#cmb_lote_form").val("0");
                $("#cmb_prodcuto_form").val("0");
                $("#txt_semana").val(0);
                $("#txt_observacion").val("");
                $("#txt_fecha_fin").val("");
                $("#txt_responsable").val("");
                
                
			}
        });
        
        
		
    </script>
</body>
</html>
