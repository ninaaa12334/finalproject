<?php
require('fpdf/fpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $skills = htmlspecialchars($_POST['skills']);
    $education = htmlspecialchars($_POST['education']);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    $pdf->Cell(0, 10, 'CV', 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "Name: $name", 0, 1);
    $pdf->Cell(0, 10, "Email: $email", 0, 1);
    $pdf->Cell(0, 10, "Phone: $phone", 0, 1);
    $pdf->Ln(5);
    $pdf->MultiCell(0, 10, "Skills: $skills");
    $pdf->Ln(5);
    $pdf->MultiCell(0, 10, "Education: $education");

    $pdf->Output('D', 'CV.pdf'); 
}
?>