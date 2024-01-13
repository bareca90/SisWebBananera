<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema Web Para Bananeras</title>
    <!-- Agrega SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
        #contenedordatos {
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
                            <h2>Reporte Venta</h2>
                        </div>
                    </div>
                </div>
                <div>
					<form id="reportForm" method="post">
                        <div class="form-group">
                            <label for="tipoReporte">Tipo de Reporte:</label>
                            <select class="form-control" id="tipoReporte" name="tipoReporte" onchange="mostrarCampos()">
                                <option value="DI">Diario</option>
                                <option value="ME">Mensual</option>
                                <option value="AN">Anual</option>
                            </select>
                        </div>
                        <div class="form-group" id="fechaGroup">
                            <label for="fechaReporte">Fecha:</label>
                            <input type="date" class="form-control" id="fechaReporte" name="fechaReporte">
                        </div>
                        <div class="form-group" id="mesGroup" style="display: none;">
                            <label for="mesReporte">Mes:</label>
                            <select class="form-control" id="mesReporte" name="mesReporte">
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="form-group" id="anioGroup" style="display: none;">
                            <label for="anioReporte">Año:</label>
                            <input type="number" class="form-control" id="anioReporte" name="anioReporte" placeholder="Ingrese el año" min="0" oninput="validarAnio(this)">
                            <span id="anioError" style="color: red; display: none;">Ingrese un año válido (mayor a 2019 y de 4 dígitos)</span>
                        </div>
                        <button id="btn_imprimir" onclick="generarReporte(event)" class="btn btn-primary">
                            <i class="fas fa-file-pdf"></i>
                            <span>Mostrar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="pdfContainer" style="height: 600px; overflow: auto;"></div> <!-- Div para mostrar el PDF -->

    <script>
        function mostrarCampos() {
            var tipoReporte = document.getElementById("tipoReporte").value;
            var fechaGroup = document.getElementById("fechaGroup");
            var mesGroup = document.getElementById("mesGroup");
            var anioGroup = document.getElementById("anioGroup");

            // Ocultar todos los grupos de campos
            fechaGroup.style.display = "none";
            mesGroup.style.display = "none";
            anioGroup.style.display = "none";

            // Mostrar el grupo de campos correspondiente al tipo de reporte seleccionado
            if (tipoReporte === "DI") {
                fechaGroup.style.display = "block";
            } else if (tipoReporte === "ME") {
                mesGroup.style.display = "block";
            } else if (tipoReporte === "AN") {
                anioGroup.style.display = "block";
            }
        }
        function validarAnio(input) {
            var anio = input.value;

            // Verificar si el año cumple con las condiciones
            var esValido = /^\d{4}$/.test(anio) && parseInt(anio) >= 2019;

            // Mostrar u ocultar el mensaje de error
            var mensajeError = document.getElementById("anioError");
            mensajeError.style.display = esValido ? "none" : "inline";
        }

        function generarReporte(event) {
			event.preventDefault();
			var tipoReporte = document.getElementById("tipoReporte").value;
			var fechaReporte = document.getElementById("fechaReporte").value;
			var mesReporte = document.getElementById("mesReporte").value;
			var anioReporte = document.getElementById("anioReporte").value;

            if (tipoReporte === "AN"){
                // Verificar si el año cumple con las condiciones
                var esValido = /^\d{4}$/.test(anioReporte) && parseInt(anioReporte) >= 2019;
    
                // Mostrar SweetAlert en caso de error
                if (!esValido) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ingrese un año válido (mayor igual a 2019 y de 4 dígitos)',
                    });
                    return; // Salir de la función si hay un error
                }
            }
            if (tipoReporte === "DI"){
                console.log(fechaReporte);
                 // Validar si la fecha está vacía
                if (!fechaReporte) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ingrese una fecha',
                    });
                    return; // Salir de la función si la fecha está vacía
                }
                // Validar la fecha si está presente y no es una fecha válida
                if (fechaReporte && isNaN(Date.parse(fechaReporte))) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ingrese una fecha válida',
                    });
                    return; // Salir de la función si hay un error
                }
            }
			// Construir la URL con los parámetros
			var url = 'Reportes/Rpt_Informe_Venta_PDF.php?tipoReporte=' + tipoReporte;

			if (fechaReporte) {
				url += '&fechaReporte=' + fechaReporte;
			}

			if (mesReporte) {
				url += '&mesReporte=' + mesReporte;
			}

			if (anioReporte) {
				url += '&anioReporte=' + anioReporte;
			}

			// Cambiar la fuente del iframe con la nueva URL y parámetros
			document.getElementById("pdfContainer").innerHTML = '<iframe src="' + url + '" style="width: 100%; height: 100%;" frameborder="0"></iframe>';
        }
    </script>
</body>
</html>
