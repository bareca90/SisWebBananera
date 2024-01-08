<?php
    require('../../fpdf/fpdf.php');
    require_once('../../Clases/ConexionBD.php');
    $tipoReporte    = isset($_GET['tipoReporte']) ? $_GET['tipoReporte'] : '';
    $fechaReporte   = isset($_GET['fechaReporte']) ? $_GET['fechaReporte'] : '';
    $mesReporte     = isset($_GET['mesReporte']) ? $_GET['mesReporte'] : '';
    $anioReporte    = isset($_GET['anioReporte']) ? $_GET['anioReporte'] : 0;
    $cadena         = "Diario";
    if (empty($tipoReporte)) {
        // Manejar el caso en el que $_GET['fechainicio'] no está seteado
        // Puedes mostrar un mensaje de error o redirigir a otra página, por ejemplo.
        echo "Error: No hay tipo de reporte";
        exit; // O cualquier otra acción que desees tomar
    }
    if($tipoReporte=="DI" && empty($fechaReporte) ){
        echo "Error: No Hay Fecha Reporte";
        exit; // O cualqu
    }
    if($tipoReporte=="AN" && $anioReporte==0 ){
        echo "Error: Debe Registrar el Anio";
        exit; // O cualqu
    }

    if($tipoReporte=="DI"){
        $cadena =   "Diario";
    }
    if($tipoReporte=="ME"){
        $cadena =   "Mensual";
    }
    if($tipoReporte=="AN"){
        $cadena =   "Anual";
    }
    class PDF extends FPDF
    {
        private $conexion;
        private $cadena;

        public function __construct($conexion)
        {
            parent::__construct();
            $this->conexion = $conexion;
            
        }
        public function setCadena($cadena)
    {       $this->cadena = $cadena;
        }

        function Header()
        {
            // Establecer el tamaño de la imagen de encabezado
            $headerWidth = $this->GetPageWidth();
            $headerHeight = 1 * 28.35; // Convertir 5 cm a puntos

            // Establecer la posición de la imagen de encabezado
            $this->Image('../../img/cabecerarpt.png', 0, 0, $headerWidth, $headerHeight);

            // Otras configuraciones del encabezado
            $this->Ln(22);
            $this->SetFont('Helvetica', 'B', 20);
            $this->SetTextColor(24, 106, 59);
            $this->Cell(0, 2, 'Informe Calibre', 0, 1, 'C', 0);
            $this->Ln(9);
            $this->SetFont('Helvetica', 'B', 16);
            $this->Cell(90, 3, 'Resumen ' . $this->cadena, 0, 1, 'L', 0);
            $this->Ln(5);
            // Agregar una línea debajo del texto
            $this->SetDrawColor(254, 222, 0);
            $this->SetLineWidth(0.5);
            $this->Line(0, $this->GetY(), $this->GetPageWidth() , $this->GetY());
            $this->Ln(5);
        }

        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Helvetica', 'B', 10);
            $this->Cell(170, 10, 'Todos los derechos reservados Jasencio', 0, 0, 'C', 0);
            $this->Cell(25, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }

    // Crear la conexión a la base de datos
    $conexion = new ConexionBD();

    $pdf = new PDF($conexion);
    $pdf->setCadena($cadena);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetX(15);
    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(10, 8, 'Fecha', 'B', 0, 'C', 0);
    $pdf->Cell(90, 8, 'Productor', 'B', 0, 'C', 0);
    $pdf->Cell(50, 8, 'Calibre', 'B', 0, 'C', 0);
    $pdf->Cell(35, 8, 'Estado', 'B', 1, 'C', 0); 

    $pdf->SetFillColor(233, 229, 235);
    $pdf->SetDrawColor(61, 61, 61);
    $pdf->SetFont('Arial', '', 12);

    // Consulta SQL para obtener los datos de la tabla de productos
    $sql = "SELECT 	evc_evc_fecha_evaluacion,
                    evc_evc_productor	,
                    evc_evc_calibre,
                    Case
                    When  evc_evc_estado	=	'A'
                        then 'Activo'
                    When  evc_evc_estado	=	'P'
                        then 'Procesado'
                    Else
                            'Anulado'
                    END  'estado'
                        
            FROM evc_evaluacion_campo
            
            WHERE evc_evc_fecha_evaluacion = '$fechaReporte'";
    $result = $conexion->query($sql);
    if (!$result) {
        die("Error en la consulta: " . $conexion->getError());
    }
    while ($row = $result->fetch_assoc()) {
        $pdf->Ln(0.6);
        $pdf->setX(15);
        $pdf->Cell(25, 8, $row['evc_evc_fecha_evaluacion'], 'B', 0, 'C', 1);
        $pdf->Cell(90, 8, $row['evc_evc_productor'], 'B', 0, 'C', 1);
        $pdf->Cell(50, 8, $row['evc_evc_calibre'], 'B', 0, 'C', 1);
        $pdf->Cell(19, 8, $row['estado'], 'B', 1, 'C', 1);
    }

    $pdf->Output();
    $conexion->cerrarConexion(); 
?>
