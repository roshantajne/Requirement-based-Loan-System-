<?php
include 'config.php';

// Taking all values from the form data(input)
$name = $_POST['name'];
$aadhar = $_POST['aadhar'];
$mobileno = $_POST['mobileno'];
$address = $_POST['address'];
$village = $_POST['village'];
$taluka = $_POST['taluka'];
$district = $_POST['district'];
$pincode = $_POST['pincode'];
$faddress = $_POST['faddress'];
$fvillage = $_POST['fvillage'];
$ftaluka = $_POST['ftaluka'];
$fdistrict = $_POST['fdistrict'];
$fpincode = $_POST['fpincode'];
$surveyno = $_POST['surveyno'];
$area = $_POST['area'];
$holdername = $_POST['holdername'];
$bankname = $_POST['bankname'];
$accountno = $_POST['accountno'];
$ifsc = $_POST['ifsc'];


// $paadhar = $_FILES['paadhar'];
// $plandrecord = $_FILES['plandrecord'];
// $pphoto = $_FILES['pphoto'];


// //file handling code for aadhar card 
// $paadharname = $paadhar['name'];
// $paadharpath = $paadhar['tmp_name'];
// $paadharerror = $paadhar['error'];

// $ext = pathinfo($paadharname, PATHINFO_EXTENSION);
// $newFileName = uniqid();
// $destpaadhar = 'documents/'.$newFileName.'.'.$ext;

// if($paadharerror == 0) {
//     $destpaadhar = 'documents/'.$newFileName.'.'.$ext;
//     move_uploaded_file($paadharpath,$destpaadhar);
// }
// else {
//     echo "error while uploading Aadhar card.";
// }



// //file handling code for land record 
// $plandrecordname = $plandrecord['name'];
// $plandrecordpath = $plandrecord['tmp_name'];
// $plandrecorderror = $plandrecord['error'];

// $ext = pathinfo($plandrecordname, PATHINFO_EXTENSION);
// $newFileName = uniqid();
// $destplandrecord = 'documents/'.$newFileName.'.'.$ext;

// if($plandrecorderror == 0) {
//     $destplandrecord = 'documents/'.$newFileName.'.'.$ext;
//     move_uploaded_file($plandrecordpath,$destplandrecord);
// }
// else {
//     echo "error while uploading Aadhar card.";
// }

// //file handling code for photo 
// $pphotoname = $pphoto['name'];
// $pphotopath = $pphoto['tmp_name'];
// $pphotoerror = $pphoto['error'];

// $ext = pathinfo($pphotoname, PATHINFO_EXTENSION);
// $newFileName = uniqid();
// $destpphoto = 'documents/'.$newFileName.'.'.$ext;

// if($pphotoerror == 0) {
//     $destpphoto = 'documents/'.$newFileName.'.'.$ext;
//     move_uploaded_file($pphotopath,$destpphoto);
// }
// else {
//     echo "error while uploading Aadhar card.";
// }


$query = "UPDATE `farmer` SET `name`='$name',`aadhar`='$aadhar',`mobileno`='$mobileno',
`address`='$address',`village`='$village',`taluka`='$taluka',`district`='$district',`pincode`='$pincode',
`faddress`='$faddress',`fvillage`='$fvillage',`ftaluka`='$ftaluka',`fdistrict`='$fdistrict',
`fpincode`='$fpincode',`surveyno`='$surveyno',`area`='$area',`holdername`='$holdername',
`bankname`='$bankname',`accountno`='$accountno',`ifsc`='$ifsc' WHERE `farmer`.`aadhar` = '$aadhar' ";

$result= mysqli_query($conn, $query);
header('location:details.php');

// Close connection
mysqli_close($conn);

?>
