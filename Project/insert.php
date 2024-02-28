<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";
// creating a connection
$conn = mysqli_connect($servername, $username, $password, $database);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

// Taking all values from the form data(input)
$name = $_REQUEST['name'];
$aadhar = $_REQUEST['aadhar'];
$mobileno = $_REQUEST['mobileno'];
$address = $_REQUEST['address'];
$village = $_REQUEST['village'];
$taluka = $_REQUEST['taluka'];
$district = $_REQUEST['district'];
$pincode = $_REQUEST['pincode'];
$faddress = $_REQUEST['faddress'];
$fvillage = $_REQUEST['fvillage'];
$ftaluka = $_REQUEST['ftaluka'];
$fdistrict = $_REQUEST['fdistrict'];
$fpincode = $_REQUEST['fpincode'];
$surveyno = $_REQUEST['surveyno'];
$area = $_REQUEST['area'];
$holdername = $_REQUEST['holdername'];
$bankname = $_REQUEST['bankname'];
$accountno = $_REQUEST['accountno'];
$ifsc = $_REQUEST['ifsc'];
$paadhar = $_FILES['paadhar'];
$plandrecord = $_FILES['plandrecord'];
$pphoto = $_FILES['pphoto'];


//file handling code for aadhar card 
$paadharname = $paadhar['name'];
$paadharpath = $paadhar['tmp_name'];
$paadharerror = $paadhar['error'];

$ext = pathinfo($paadharname, PATHINFO_EXTENSION);
$newFileName = uniqid();
$destpaadhar = 'documents/'.$newFileName.'.'.$ext;

if($paadharerror == 0) {
    $destpaadhar = 'documents/'.$newFileName.'.'.$ext;
    move_uploaded_file($paadharpath,$destpaadhar);
}
else {
    echo "error while uploading Aadhar card.";
}



//file handling code for land record 
$plandrecordname = $plandrecord['name'];
$plandrecordpath = $plandrecord['tmp_name'];
$plandrecorderror = $plandrecord['error'];

$ext = pathinfo($plandrecordname, PATHINFO_EXTENSION);
$newFileName = uniqid();
$destplandrecord = 'documents/'.$newFileName.'.'.$ext;

if($plandrecorderror == 0) {
    $destplandrecord = 'documents/'.$newFileName.'.'.$ext;
    move_uploaded_file($plandrecordpath,$destplandrecord);
}
else {
    echo "error while uploading Aadhar card.";
}

//file handling code for photo 
$pphotoname = $pphoto['name'];
$pphotopath = $pphoto['tmp_name'];
$pphotoerror = $pphoto['error'];

$ext = pathinfo($pphotoname, PATHINFO_EXTENSION);
$newFileName = uniqid();
$destpphoto = 'documents/'.$newFileName.'.'.$ext;

if($pphotoerror == 0) {
    $destpphoto = 'documents/'.$newFileName.'.'.$ext;
    move_uploaded_file($pphotopath,$destpphoto);
}
else {
    echo "error while uploading Aadhar card.";
}


$sql = "INSERT INTO `farmer` (`name`, `aadhar`, `mobileno`, `address`, `village`,
 `taluka`, `district`, `pincode`, `faddress`, `fvillage`, `ftaluka`, `fdistrict`,
  `fpincode`, `surveyno`, `area`, `holdername`, `bankname`, `accountno`, `ifsc`,
   `paadhar`, `plandrecord`, `pphoto`)
 VALUES ('$name', '$aadhar', '$mobileno', '$address', '$village', '$taluka',
  '$district', '$pincode', '$faddress', '$fvillage', '$ftaluka', '$fdistrict',
   '$fpincode', '$surveyno', '$area', '$holdername', '$bankname', '$accountno',
    '$ifsc','$destpaadhar','$destplandrecord','$destpphoto')";
 


if(mysqli_query($conn, $sql)){

    echo "<script>
    alert('New farmer added successfully.');
    window.location.href='home.php';
    </script>";

} else{
    
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);}

 

// Close connection
mysqli_close($conn);

?>