<?php 
 session_start();
require_once 'config.php';
require('fpdf/fpdf.php');

$pdf = new FPDF();


$pdf->AddPage();
$orderid = $_SESSION['orderid'];
    
    $sql = "SELECT * FROM orders where id='$orderid'";
    $query = $conn->query($sql);
    $order = $query->fetch_object();
    $order_id = $order->id; 
    $name = $order->name; 
    $aadhar = $order->aadhar; 
    $mobileno = $order->mobileno; 
    $total_price = $order->total_price; 
    $created_at = $order->created_at; 
    
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(20, 8, 'Name : ', 0, 0, 'L');
$pdf->SetFont('Arial','', 14);
$pdf->Cell(60, 8,$name, 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(42, 8, 'Aadhar number : ', 0, 0, 'L');
$pdf->SetFont('Arial','', 14);
$pdf->Cell(60, 8, $aadhar, 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(41, 8, 'Mobile number : ', 0, 0, 'L');
$pdf->SetFont('Arial','', 14);
$pdf->Cell(60, 8, $mobileno , 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(26, 8, 'Address : ', 0, 0, 'L');
$pdf->SetFont('Arial','', 14);
$pdf->MultiCell( 90, 8, 'Sawwalakhe lay-out Bhosa Road, Yavatmal, Yavatmal, 445001', 0);

$pdf->Image('profile-pic.png', 150, 9, -350);

$pdf->ln(12);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(14, 8, 'Pro ID', 1, 0, 'L'); 

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(120, 8, 'Product Name', 1, 0, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(26, 8, 'Quantity', 1, 0, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 8, 'Total', 1, 1, 'C');


$sql = "SELECT * FROM `order_details` where order_id='$order_id'";
$result = $conn->query($sql);
while($row = $result->fetch_object()){
$id = $row->product_id;
$name = $row->product_name;
$qty = $row->qty;
$total = $row->total_price;
$pdf->SetFont('Arial','', 14);
$pdf->Cell(14, 8, $id, 1, 0, 'C'); 

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(120, 8, $name, 1, 0, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(26, 8, $qty, 1, 0, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 8, $total, 1, 1, 'C');
}

$pdf->SetFont('Arial','', 14);
$pdf->Cell(14, 8, '', 0, 0, 'C'); 

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(120, 8,'', 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(26, 8, 'Sub Total', 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 8, $total_price , 0, 1, 'C');

$pdf->Output();



?>