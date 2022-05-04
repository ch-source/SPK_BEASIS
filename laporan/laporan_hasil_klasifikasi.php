<?php
include'koneksi.php';
include"fpdf.php";
require('makefont/makefont.php');
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->SetX(1.6);   
$pdf->Image('img/lg.png', 1, 1, 2);
$pdf->SetX(1.6);
$pdf->SetFont('Times','B',12);
$pdf->SetX(3);            
$pdf->MultiCell(15.5,0.6,'SMA NEGERI I ENDE',0,'L');
$pdf->SetX(3);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(22.5,0.6,'Jl. Wirajaya, Kelurahan Onekore, Kecamatan Ende Tengah',0,'L'); 
$tglaw = $_POST['tglaw'];
$tglak = $_POST['tglak'];
$pdf->SetX(3);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(22.5,0.6,"Laporan Hasil Klasifikasi Tanggal: ".$tglaw."-".$tglak,0,'L'); 
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->SetFont('Times','i',8);
$tglaw = $_POST['tglaw'];
$tglak = $_POST['tglak'];
$pdf->ln(1);
$pdf->Cell(3.5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Times','B',8);
$pdf->Cell(1, 0.6, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.6, 'Nama', 1, 0, 'L');
$pdf->Cell(2, 0.6, 'Kelas', 1, 0, 'L');
$pdf->Cell(1.5, 0.6, 'Tanggal', 1, 0, 'L');
$pdf->Cell(1.5, 0.6, 'P/T', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'Pekerjaan Ayah', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'Pekerjaan Ibu', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'Penghasilan Ayah', 1, 0, 'L');
$pdf->Cell(3, 0.6, 'Penghasilan Ibu', 1, 0, 'L');
$pdf->Cell(2, 0.6, 'Tanggungan', 1, 0, 'L');
$pdf->Cell(2, 0.6, 'Transportasi', 1, 0, 'L');
$pdf->Cell(2, 0.6, 'Status', 1, 1, 'L');
$no=1;
$sql="SELECT * FROM tbl_hasil_klasifikasi WHERE tanggal BETWEEN '$tglaw' AND '$tglak'";
$tampil=mysqli_query($connect, $sql);
while($lihat=mysqli_fetch_array($tampil)){
    $pdf->SetFont('Times','',7);
    $pdf->Cell(1, 0.6, $no , 1, 0, 'C');
    $pdf->Cell(4, 0.6, $lihat['nama'],1, 0, 'L');
    $pdf->Cell(2, 0.6, $lihat['kelas'],1, 0, 'L');
    $pdf->Cell(1.5, 0.6, $lihat['tanggal'],1, 0, 'L');
    $pdf->Cell(1.5, 0.6, $lihat['periode']."/".$lihat['tahun'],1, 0, 'L');
    $pdf->Cell(3, 0.6, $lihat['pekerjaan_ayah'],1, 0, 'L');
    $pdf->Cell(3, 0.6, $lihat['pekerjaan_ibu'],1, 0, 'L');
    $pdf->Cell(3, 0.6, $lihat['penghasilan_ayah'],1, 0, 'L');
    $pdf->Cell(3, 0.6, $lihat['penghasilan_ibu'],1, 0, 'L');
    $pdf->Cell(2, 0.6, $lihat['tanggungan'],1, 0, 'L');
    $pdf->Cell(2, 0.6, $lihat['transportasi'],1, 0, 'L');
    $pdf->Cell(2, 0.6, $lihat['status'],1, 1, 'L');
    $no++;
}

$order="SELECT * FROM tbl_hasil_klasifikasi WHERE tanggal BETWEEN '$tglaw' AND '$tglak' AND status='Layak'";
$query_order=mysqli_query($connect, $order);
$data_order=array();
while(($row_order=mysqli_fetch_array($query_order)) !=null){
$data_order[]=$row_order;
}
$count=count($data_order);
$pdf->SetFont('Times','B',8);
$pdf->Cell(26, 0.6,"Jml. Layak",1, 0, '');
$pdf->Cell(2, 0.6, $count ,1, 1, 'C');

$order_a="SELECT * FROM tbl_hasil_klasifikasi WHERE tanggal BETWEEN '$tglaw' AND '$tglak' AND status='Tidak Layak'";
$query_order_a=mysqli_query($connect, $order_a);
$data_order_a=array();
while(($row_order_a=mysqli_fetch_array($query_order_a)) !=null){
$data_order_a[]=$row_order_a;
}
$count_a=count($data_order_a);
$pdf->SetFont('Times','B',8);
$pdf->Cell(26, 0.6,"Jml. Tidak Layak",1, 0, '');
$pdf->Cell(2, 0.6, $count_a ,1, 1, 'C');

$pdf->Output();
?>