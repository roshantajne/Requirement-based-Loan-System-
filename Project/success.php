<?php 

require_once 'config.php';
session_start();

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
            <div class="profile">
                <i class="fas fa-bell"></i>
                <img src="profile-pic.png" alt="">
            </div>
        </div>

        <h3 class="i-name"></h3> 
         
      

       <div class="container" style="margin-left: 17rem!important;">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
        <br><br> <h2 style="color:#0fad00">Success</h2>
        <img src="">

      <?php  
        $aadhar = $_SESSION['aadhar'];
        $sql = "SELECT * FROM farmer where aadhar ='$aadhar'";
        $query = mysqli_query($conn,$sql);
        $result = mysqli_fetch_assoc($query);
        
       ?>
        <h3>Dear, <?php echo $result['name']; ?> </h3>
        <p style="font-size:20px;color:#5C5C5C;">Your payment is successful. </p>

        <p style="font-size:20px;">loan Amount : 0 </p>
        <p style="font-size:20px;">Remaining Amount ₹<?php echo $_SESSION['available_balance']; ?> disbursed to : </p>
        <p style="font-size:20px;">Account No : <?php echo $result['accountno']; ?> </p>
        <p style="font-size:20px;">Account Holder Name : <?php echo $result['holdername']; ?> </p>
        <p style="font-size:20px;">Bank Name : <?php echo $result['bankname']; ?> </p>
        <p style="font-size:20px;">IFSC Code : <?php echo $result['ifsc']; ?> </p>
        <!-- <p style="font-size:20px;">Best of luck for the next season of crops </p> -->


        <a href="unset.php" class="btn btn-primary btn-md " role="button" aria-disabled="true">Continue</a>
       <a href="receipt.php" target="_blank"class="btn btn-primary btn-md " role="button" aria-disabled="true">Print receipt</a>
       <br><br>
        </div>
        
	</div>
</div>


</section>
</body>
</html>