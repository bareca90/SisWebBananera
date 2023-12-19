<?php
    require('../../fpdf/fpdf.php');
    require_once('../../Clases/ConexionBD.php');

    class PDF extends FPDF
    {
        private $conexion;

        public function __construct($conexion)
        {
            parent::__construct();
            $this->conexion = $conexion;
        }

        function Header()
        {
            $this->SetFont('Times', 'B', 20);
            $this->Image('../../img/triangulosrecortados.png', 0, 0, 70);
            $this->setXY(60, 15);
            $this->Cell(80, 8, 'Reporte Inventario General de Bodegas ', 0, 1, 'C', 0);
            $this->Ln(10);
        }

        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(170, 10, 'Todos los derechos reservados Jasencio', 0, 0, 'C', 0);
            $this->Cell(25, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }

    // Crear la conexión a la base de datos
    $conexion = new ConexionBD();

    $pdf = new PDF($conexion);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetX(15);
    $pdf->SetFont('Helvetica', 'B', 15);
    $pdf->Cell(10, 8, 'Id', 'B', 0, 'C', 0);
    $pdf->Cell(90, 8, 'Producto', 'B', 0, 'C', 0);
    $pdf->Cell(50, 8, utf8_decode('Ubicación'), 'B', 0, 'C', 0);
    $pdf->Cell(35, 8, 'Stock', 'B', 1, 'C', 0);

    $pdf->SetFillColor(233, 229, 235);
    $pdf->SetDrawColor(61, 61, 61);
    $pdf->SetFont('Arial', '', 12);

    // Consulta SQL para obtener los datos de la tabla de productos
    $sql = "SELECT reb_pro_codigo, reb_pro_descripcion, reb_pro_ubicacion, reb_pro_stock FROM reb_producto";
    $result = $conexion->query($sql);

    while ($row = $result->fetch_assoc()) {
        $pdf->Ln(0.6);
        $pdf->setX(15);
        $pdf->Cell(10, 8, $row['reb_pro_codigo'], 'B', 0, 'C', 1);
        $pdf->Cell(90, 8, $row['reb_pro_descripcion'], 'B', 0, 'C', 1);
        $pdf->Cell(50, 8, $row['reb_pro_ubicacion'], 'B', 0, 'C', 1);
        $pdf->Cell(35, 8, $row['reb_pro_stock'], 'B', 1, 'C', 1);
    }

    $pdf->Output();
    $conexion->cerrarConexion(); 
?>
