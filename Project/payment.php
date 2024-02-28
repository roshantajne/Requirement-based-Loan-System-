<?php 

require_once 'config.php';
session_start();
unset( $_SESSION['orderid']);

$aadhar = $_SESSION['aadhar'];

if(isset($_POST['submit'])) {
  $aadhar      = $_REQUEST['aadhar'];
  $mobileno      = $_REQUEST['mobileno'];
  $name     = $_REQUEST['name'];
  $loanamount      = $_REQUEST['balance'];
  $cropamount = $_REQUEST['cropamount'];
  $receipt = $_FILES['receipt'];

//file handling code for aadhar card 
$receiptname = $receipt['name'];
$receiptpath = $receipt['tmp_name'];
$receipterror = $receipt['error'];

$ext = pathinfo($receiptname, PATHINFO_EXTENSION);
$newFileName = uniqid();
$destreceipt = 'documents/'.$newFileName.'.'.$ext;

if($receipterror == 0) {
    $destreceipt = 'documents/'.$newFileName.'.'.$ext;
    move_uploaded_file($receiptpath,$destreceipt);
}
else {
    echo "error while uploading Aadhar card.";
}
 
   // buy back implementation

  if($cropamount > $loanamount) {
    $available_balance = $cropamount - $loanamount;
    $_SESSION['available_balance'] = $available_balance;
    $balance = 0;
    $sql = "UPDATE farmer set balance = '$balance' where aadhar = '$aadhar'";

    if ($conn->query($sql) === TRUE) {
      $buybacksql = "INSERT INTO `buyback`(`name`, `aadhar`, `mobileno`, `loan_amount`, `amount`, `receipt`, `reloanamount`, `disbursed_amount`) 
      VALUES ('$name','$aadhar','$mobileno','$loanamount','$cropamount','$destreceipt','$balance','$available_balance')";

      if ($conn->query($buybacksql) === TRUE) {
        $last_id = $conn->insert_id;
        $_SESSION['id']= $last_id;
      header('location:success.php');
      exit();
    }
    }
    }
    else{
      $balance = $loanamount - $cropamount; 
      
      $sql = "UPDATE farmer set balance = '$balance' where aadhar = '$aadhar'";
      if ($conn->query($sql) === TRUE) {

      $buybacksql = "INSERT INTO `buyback`(`name`, `aadhar`, `mobileno`, `loan_amount`,`amount`, `receipt`, `reloanamount`) 
      VALUES ('$name','$aadhar','$mobileno','$loanamount','$cropamount','$destreceipt','$balance')";

       if ($conn->query($buybacksql) === TRUE) {
        $last_id = $conn->insert_id;
        $_SESSION['id']= $last_id;
        header('location:deduct.php');
        exit();
      }
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/f8bc328439.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <section id="menu">
        <div class="logo">
            <img src="profile-pic.png" alt="" class="">
            <h2>Farmer</h2>
        </div>

        <div class="items">
        <li><i class="fas fa-home"></i><a href="home.php">Home</a></li>
            <li><i class="fas fa-user"></i><a href="farmer.php">Add/Modify Farmer</a></li>
            <li><i class="fas fa-chart-bar"></i><a href="details.php">Check Details</a></li>
            <li><i class="fas fa-tasks"></i><a href="allot.php">Allot</a></li>
            <li><i class="fas fa-infinity"></i><a href="buyback.php">Buyback</a></li>
            <!-- <li><i class="fas fa-sign-out-alt"></i><a href="home.php">Logout</a></li> -->
        </div>
    </section>
    
    <section id="interface">
        <div class="navigation" style="z-index:5;">
            <div class="n1">
                <div class="search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="search">
                </div>
            </div>
            <!-- <div class="profile">
                <i class="fas fa-bell"></i>
                <img src="profile-pic.png" alt="">
            </div> -->
        </div>

        <h3 class="i-name">Checkout</h3>

<div class="row mt-3 mx-0">
 
<div class="col-md-8 order-md-1 mx-4 " style="margin-bottom: 100px;">
  <?php 
    if(isset($errorMsg) && count($errorMsg) > 0)
    {
        foreach($errorMsg as $error)
        {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
        echo "<form method='post' ><button class='btn btn-primary btn-lg btn-block' type='submit' name='submitback' value='submitback'>Continue to next alloment</button>
        </form>";
    }
  ?>

  <?php
    if(isset( $_SESSION['aadhar'])){
        $data = $_SESSION['aadhar'];
        $sql = "SELECT * FROM farmer WHERE aadhar='$data'";
        $result = $conn->query($sql);
        $row= $result->fetch_assoc();
   ?>
  <form action="" class="needs-validation" method="POST" enctype="multipart/form-data">
    
  
  <div class="mb-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" readonly>
    </div>
  
  <div class="row">
      <div class="col-md-6 mb-3">
        <label for="aadhar">Aadhar Number</label>
        <input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $row['aadhar']; ?>" readonly>
      </div>
      <div class="col-md-6 mb-3">
        <label for="mobileno">Mobile Number</label>
        <input type="text" class="form-control" id="mobileno" name="mobileno"value="<?php echo $row['mobileno']; ?>" readonly>
      </div>
    </div>

    <div class="mb-2">
      <label for="balance">Loan Amount</label>
      <input type="number" id="balance" name="balance" class="form-control"name="pincode" id="pincode"  value="<?php echo $row['balance']; ?>" readonly>
    </div>

    <h4>Payment Information </h4>

    <div class="mb-2">
      <label for="cropamount">Total Amount of crop yield sold</label>
      <input type="number" id="cropamount" name="cropamount"class="form-control"name="pincode" id="pincode" >
    </div>

    <div class="form-group">
    <label for="exampleFormControlFile1">Receipt</label>
    <input type="file" class="form-control-file" name="receipt" id="receipt" required> 
  </div>
    

    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block mx-5" type="submit" name="submit" value="submit"> continue </button>
  </form>
</div>
</div>
<?php

    }
    ?>
    </section>
</body>
</html>