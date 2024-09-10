<?php
require('../fpdf186/fpdf.php');
require('../DataBase/conexion.php');

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png', 10, 8, 10);
        $this->SetFont('Arial', 'B', 15);
        $this->SetTextColor(87, 151, 161);
        $this->Cell(65, 10, 'Vision Limpieza', 0, 0, 'C');
        $this->Cell(80);
        $this->Cell(1, 10, 'Acumulado de comision de cada comisionista', 0, 0, 'C');
        $this->Ln(15);
        $this->Cell(0, 0, '', 1, 0);
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$sql = "SELECT c.UsuarioID, c.NombreUsuario, c.ApellidosUsuario,
cm.ValorComision, cm.AcumuladoComision FROM comisionista c JOIN comision cm ON c.UsuarioID = cm.UsuarioID;";
$result = mysqli_query($Link, $sql);
$pdf = new PDF('P', 'mm', array(300, 300));
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, '', 0, 0);
$pdf->Cell(50, 10, 'Documento', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nombre', 1, 0, 'C');
$pdf->Cell(50, 10, 'Apellidos', 1, 0, 'C');
$pdf->Cell(50, 10, 'Acumulado Comision', 1, 0, 'C');
$pdf->Ln();
while ($row = mysqli_fetch_array($result)) {
    $pdf->setfont('Arial', 'B', 12);
    $nombre = str_replace(
        ['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'],
        ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'],
        $row['NombreUsuario']
    );
    $apellidos = str_replace(
        ['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', '��'],
        ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'],
        $row['ApellidosUsuario']
    );
    $pdf->Cell(40, 10, '', 0, 0);
    $pdf->Cell(50, 10, $row['UsuarioID'], 1, 0, 'C');
    $pdf->Cell(50, 10, $nombre, 1, 0, 'C');
    $pdf->Cell(50, 10, $apellidos, 1, 0, 'C');
    $pdf->Cell(50, 10, '$' . number_format($row['AcumuladoComision'], 0, '', '.'), 1, 0, 'C');
    $pdf->Ln();
}
$pdf->Output();
