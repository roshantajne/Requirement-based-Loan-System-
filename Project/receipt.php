<?php 
 session_start();
require_once 'config.php';
require('fpdf/fpdf.php');

$pdf = new FPDF();


$pdf->AddPage();

$aadhar = $_SESSION['aadhar'];
    
    $sql = "SELECT * FROM farmer where aadhar='$aadhar'";
    $query = $conn->query($sql);
    $result = $query->fetch_object();
    $name = $result->name; 
    $bankname = $result->bankname; 
    $accountno = $result->accountno; 
    $mobileno = $result->mobileno; 
    $hodername = $result->holdername; 
    $ifsc = $result->ifsc;

$id = $_SESSION['id'];
$sql = "SELECT * FROM buyback where id='$id'";
$query = $conn->query($sql);
$result = $query->fetch_object();
$amount = $result->amount; 
$reloanamount = $result->reloanamount; 
$disbursed_amount = $result->disbursed_amount; 
$loan_amount = $result->loan_amount;
    
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
$pdf->Cell(60, 8, 'previous Loan Amount        : ', 0, 0, 'L'); 

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60, 8, $loan_amount , 0, 1, 'L'); 

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 8, 'Total Amount of Crop yeild : ', 0, 0, 'L'); 

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60, 8, $amount , 0, 1, 'L'); 

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 8, 'Remaining loan amount      : ', 0, 0 , 'L'); 

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60, 8, $reloanamount , 0, 1, 'L'); 

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 8, 'Amount disbursed to bank : ', 0, 0 , 'L'); 

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60, 8, $disbursed_amount , 0, 1, 'L'); 


if(isset( $_SESSION['available_balance'])){

$pdf->ln(12);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(60, 8, 'Bank Account details', 0, 1 , 'L'); 

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 8, 'Account No.                      : ', 0, 0 , 'L'); 

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 8, $accountno , 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 8, 'Account Holder Name      : ', 0, 0 , 'L'); 

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 8, $hodername, 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 8, 'Bank Name                        : ', 0, 0 , 'L'); 

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 8, $bankname , 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 8, 'IFSC Code                          : ', 0, 0 , 'L'); 

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 8, $ifsc , 0, 1, 'L');

}
$pdf->Output();



?>