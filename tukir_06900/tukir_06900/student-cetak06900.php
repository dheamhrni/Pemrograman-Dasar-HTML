<?php
require('fpdf/fpdf.php');
include('config06900.php');

// Pastikan nim ada dalam permintaan GET
if (!isset($_GET['nim'])) {
    die('NIM tidak ditemukan');
}

$nim = $_GET['nim'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 10, 'Date: ' . date('d-m-Y'), 0, 1, 'R');
$pdf->Ln(14);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(100, 10, 'USER PROFILE', 1, 0, 'C');
$pdf->Ln(10);

$query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
$result = mysqli_query($mysqli, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($mysqli));
}

$no = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $no++;
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 8, 'No.', 1, 0);
    $pdf->Cell(50, 8, $no, 1, 1);

    $pdf->Cell(50, 8, 'NIM', 1, 0);
    $pdf->Cell(50, 8, $row['nim'], 1, 1);

    $pdf->Cell(50, 8, 'Nama', 1, 0);
    $pdf->Cell(50, 8, $row['nama'], 1, 1);

    $pdf->Cell(50, 8, 'Jenis Kelamin', 1, 0);
    $pdf->Cell(50, 8, $row['jkel'], 1, 1);

    $pdf->Cell(50, 8, 'Alamat', 1, 0);
    $pdf->Cell(50, 8, $row['alamat'], 1, 1);

    $pdf->Cell(50, 8, 'Email', 1, 0);
    $pdf->Cell(50, 8, $row['email'], 1, 1);

    $pdf->Cell(50, 8, 'Kota', 1, 0);
    $pdf->Cell(50, 8, $row['kota'], 1, 1);

    $pdf->Cell(50, 8, 'IPK', 1, 0);
    $pdf->Cell(50, 8, $row['ipk'], 1, 1);

    $pdf->Ln(10);
}

$pdf->Output();
?>
