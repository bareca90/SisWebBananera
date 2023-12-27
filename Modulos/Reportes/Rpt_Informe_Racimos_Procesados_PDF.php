<?php
    require('../../fpdf/fpdf.php');
    require_once('../../Clases/ConexionBD.php');
    $fechainicio = isset($_GET['fechainicio']) ? $_GET['fechainicio'] : '';

    if (empty($fechainicio)) {
        // Manejar el caso en el que $_GET['fechainicio'] no está seteado
        // Puedes mostrar un mensaje de error o redirigir a otra página, por ejemplo.
        echo "Error: La fecha de inicio no está definida.";
        exit; // O cualquier otra acción que desees tomar
    }

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
            $this->Cell(80, 8, 'Informe Racimos Procesados ', 0, 1, 'C', 0);
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
    $pdf->Cell(10, 8, 'Tipo', 'B', 0, 'C', 0);
    $pdf->Cell(90, 8, 'Fecha', 'B', 0, 'C', 0);
    $pdf->Cell(50, 8, 'Cantidad', 'B', 0, 'C', 0);
    $pdf->Cell(35, 8, 'Estado', 'B', 1, 'C', 0); 

    $pdf->SetFillColor(233, 229, 235);
    $pdf->SetDrawColor(61, 61, 61);
    $pdf->SetFont('Arial', '', 12);

    // Consulta SQL para obtener los datos de la tabla de productos
    $sql = "SELECT 	Case
                        When  cse_cse_tipo	=	'ECS'
                            then 'Ecuasabor'
                        Else
                            'Kassandra'
                    END  'tipo',
                    cse_cse_fecha,
                    cse_cse_num_racimos_procesados,
                    Case
                        When  cse_cse_estado	=	'A'
                            then 'Activo'
                        When  cse_cse_estado	=	'P'
                            then 'Procesado'
                        Else
                            'Anulado'
                    END  'estado'

                    FROM cse_cosecha_empaque
                    WHERE cse_cse_fecha = '$fechainicio'";
    $result = $conexion->query($sql);
    if (!$result) {
        die("Error en la consulta: " . $conexion->getError());
    }
    while ($row = $result->fetch_assoc()) {
        $pdf->Ln(0.6);
        $pdf->setX(15);
        $pdf->Cell(25, 8, $row['tipo'], 'B', 0, 'C', 1);
        $pdf->Cell(90, 8, $row['cse_cse_fecha'], 'B', 0, 'C', 1);
        $pdf->Cell(50, 8, $row['cse_cse_num_racimos_procesados'], 'B', 0, 'C', 1);
        $pdf->Cell(19, 8, $row['estado'], 'B', 1, 'C', 1);
    }

    $pdf->Output();
    $conexion->cerrarConexion(); 
?>
