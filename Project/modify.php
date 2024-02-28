<?php
include 'config.php';
if(isset($_GET['id'])){
  $aadhar = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/f8bc328439.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div id="menu">
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
</div>
    
    <div id="interface">
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
        
        <h3 class="i-name">Add/modify farmer</h3>
        
        <div class="fbuttons">
        <a href="farmeradd.php"><button class="btn btn-danger">REGISTER A NEW FARMER</button></a>
        <a href="modify.php"><button style="margin-left: 10px" class="btn btn-danger" >MODIFY FARMER DETAILS</button></a>
        </div>

        <?php  
        $sql = "SELECT * FROM `farmer` WHERE aadhar='$aadhar'";
        $query = mysqli_query($conn,$sql);
        while($result = mysqli_fetch_array($query)) { 
        
        ?>

<div class="container"style="margin: 10px 0 300px 0px; z-index:2; padding: 10px 40px 0px 30px;">
  <form action="update.php" method="post" enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="<?php echo $result['name']; ?>"  required>
    </div>
 
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="aadhar">Aadhar Number</label>
      <input type="number" class="form-control" name="aadhar" id="aadhar" value="<?php echo $result['aadhar']; ?>" required> 
    </div>
    <div class="form-group col-md-5">
      <label for="mobileno">Mobile number</label>
      <input type="number" class="form-control" name="mobileno" id="mobileno" value="<?php echo $result['mobileno']; ?>" required >
    </div>
  </div>
  

  <div class="form-row">

  <div class="form-group col-md-12">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" id="address" value="<?php echo $result['address']; ?>">
  </div> 

    <div class="form-group col-md-4">
      <label for="village">Village</label>
      <input type="text" class="form-control" name="village" id="village" value="<?php echo $result['village']; ?>" required>
    </div>
    
    <div class="form-group col-md-3">
      <label for="taluka">Taluka</label>
      <input type="text" class="form-control" name="taluka" id="taluka" value="<?php echo $result['taluka']; ?>" required>
    </div>

    <div class="form-group col-md-3">
      <label for="district">District</label>
      <select id="inputDistricts" class="form-control" name="district" id="district" required>

    <option value="Ahmednagar" <?php if ($result['district']=='Ahmednagar') { echo "selected";} ?>>Ahmednagar</option>
    <option value="Akola" <?php if ($result['district']=='Akola') { echo "selected";} ?>>Akola</option>
    <option value="Amravati" <?php if ($result['district']=='Amravati') { echo "selected";} ?>>Amravati</option>
    <option value="Beed" <?php if ($result['district']=='Beed') { echo "selected";} ?>>Beed</option>
    <option value="Bhandara" <?php if ($result['district']=='Bhandara') { echo "selected";} ?>>Bhandara</option>
    <option value="Buldhana" <?php if ($result['district']=='Buldhana') { echo "selected";} ?>>Buldhana</option>
    <option value="Chandrapur" <?php if ($result['district']=='Chandrapur') { echo "selected";} ?>>Chandrapur</option>
    <option value="Chha. Sambhajinagar" <?php if ($result['district']=='Chha. Sambhajinagar') { echo "selected";} ?>>Chha. Sambhajinagar</option>
    <option value="Dhule" <?php if ($result['district']=='Dhule') { echo "selected";} ?>>Dhule</option>
    <option value="Gadchiroli" <?php if ($result['district']=='Gadchiroli') { echo "selected";} ?>>Gadchiroli</option>
    <option value="Gondia" <?php if ($result['district']=='Gondia') { echo "selected";} ?>>Gondia</option>
    <option value="Hingoli" <?php if ($result['district']=='Hingoli') { echo "selected";} ?>>Hingoli</option>
    <option value="Jalgaon"<?php if ($result['district']=='Jalgaon') { echo "selected";} ?>>Jalgaon</option>
    <option value="Jalna"<?php if ($result['district']=='Jalna') { echo "selected";} ?>>Jalna</option>
    <option value="Kolhapur"<?php if ($result['district']=='Kolhapur') { echo "selected";} ?>>Kolhapur</option>
    <option value="Latur"<?php if ($result['district']=='Latur') { echo "selected";} ?>>Latur</option>
    <option value="Mumbai"<?php if ($result['district']=='Mumbai') { echo "selected";} ?>>Mumbai</option>
    <option value="Nagpur"<?php if ($result['district']=='Nagpur') { echo "selected";} ?>>Nagpur</option>
    <option value="Nanded"<?php if ($result['district']=='Nanded') { echo "selected";} ?>>Nanded</option>
    <option value="Nandurbar"<?php if ($result['district']=='Nandurbar') { echo "selected";} ?>>Nandurbar</option>
    <option value="Nashik"<?php if ($result['district']=='Nashik') { echo "selected";} ?>>Nashik</option>
    <option value="Osmanabad"<?php if ($result['district']=='Osmanabad') { echo "selected";} ?>>Osmanabad</option>
    <option value="Palghar"<?php if ($result['district']=='Palghar') { echo "selected";} ?>>Palghar</option>
    <option value="Parbhani"<?php if ($result['district']=='Parbhani') { echo "selected";} ?>>Parbhani</option>
    <option value="Pune"<?php if ($result['district']=='Pune') { echo "selected";} ?>>Pune</option>
    <option value="Raigarh"<?php if ($result['district']=='Raigarh') { echo "selected";} ?>>Raigarh</option>
    <option value="Ratnagiri"<?php if ($result['district']=='Ratnagiri') { echo "selected";} ?>>Ratnagiri</option>
    <option value="Sangli"<?php if ($result['district']=='Sangli') { echo "selected";} ?>>Sangli</option>
    <option value="Satara"<?php if ($result['district']=='Satara') { echo "selected";} ?>>Satara</option>
    <option value="Sindhudurg"<?php if ($result['district']=='Sindhudurg') { echo "selected";} ?>>Sindhudurg</option>
    <option value="Solapur"<?php if ($result['district']=='Solapur') { echo "selected";} ?>>Solapur</option>
    <option value="Thane"<?php if ($result['district']=='Thane') { echo "selected";} ?>>Thane</option>
    <option value="Wardha"<?php if ($result['district']=='Wardha') { echo "selected";} ?>>Wardha</option>
    <option value="Washmim"<?php if ($result['district']=='Washmim') { echo "selected";} ?>>Washim</option>
    <option value="Yavatmal"<?php if ($result['district']=='Yavatmal') { echo "selected";} ?>>Yavatmal</option>
        <option></option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="pincode">Pincode</label>
      <input type="number" class="form-control" name="pincode" id="pincode" value="<?php echo $result['pincode']; ?>" required>
    </div>
  </div>
  <br>
   <h4> Farm Details </h4>

   <div class="form-group">
    <label for="faddress">Address</label>
    <input type="text" class="form-control" name="faddress" id="faddress" value="<?php echo $result['faddress']; ?>">
   </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="fvillage">Village</label>
      <input type="text" class="form-control"name="fvillage" id="fvillage" value="<?php echo $result['village']; ?>"required>
    </div>
    
    <div class="form-group col-md-3">
      <label for="ftaluka">Taluka</label>
      <input type="text" class="form-control" name="ftaluka" id="ftaluka" value="<?php echo $result['ftaluka']; ?>" required>
    </div>

    <div class="form-group col-md-3">
      <label for="fdistrict">District</label>
      <select id="inputDistricts" class="form-control" name="district" id="district" required>

<option value="Ahmednagar" <?php if ($result['district']=='Ahmednagar') { echo "selected";} ?>>Ahmednagar</option>
<option value="Akola" <?php if ($result['district']=='Akola') { echo "selected";} ?>>Akola</option>
<option value="Amravati" <?php if ($result['district']=='Amravati') { echo "selected";} ?>>Amravati</option>
<option value="Beed" <?php if ($result['district']=='Beed') { echo "selected";} ?>>Beed</option>
<option value="Bhandara" <?php if ($result['district']=='Bhandara') { echo "selected";} ?>>Bhandara</option>
<option value="Buldhana" <?php if ($result['district']=='Buldhana') { echo "selected";} ?>>Buldhana</option>
<option value="Chandrapur" <?php if ($result['district']=='Chandrapur') { echo "selected";} ?>>Chandrapur</option>
<option value="Chha. Sambhajinagar" <?php if ($result['district']=='Chha. Sambhajinagar') { echo "selected";} ?>>Chha. Sambhajinagar</option>
<option value="Dhule" <?php if ($result['district']=='Dhule') { echo "selected";} ?>>Dhule</option>
<option value="Gadchiroli" <?php if ($result['district']=='Gadchiroli') { echo "selected";} ?>>Gadchiroli</option>
<option value="Gondia" <?php if ($result['district']=='Gondia') { echo "selected";} ?>>Gondia</option>
<option value="Hingoli" <?php if ($result['district']=='Hingoli') { echo "selected";} ?>>Hingoli</option>
<option value="Jalgaon"<?php if ($result['district']=='Jalgaon') { echo "selected";} ?>>Jalgaon</option>
<option value="Jalna"<?php if ($result['district']=='Jalna') { echo "selected";} ?>>Jalna</option>
<option value="Kolhapur"<?php if ($result['district']=='Kolhapur') { echo "selected";} ?>>Kolhapur</option>
<option value="Latur"<?php if ($result['district']=='Latur') { echo "selected";} ?>>Latur</option>
<option value="Mumbai"<?php if ($result['district']=='Mumbai') { echo "selected";} ?>>Mumbai</option>
<option value="Nagpur"<?php if ($result['district']=='Nagpur') { echo "selected";} ?>>Nagpur</option>
<option value="Nanded"<?php if ($result['district']=='Nanded') { echo "selected";} ?>>Nanded</option>
<option value="Nandurbar"<?php if ($result['district']=='Nandurbar') { echo "selected";} ?>>Nandurbar</option>
<option value="Nashik"<?php if ($result['district']=='Nashik') { echo "selected";} ?>>Nashik</option>
<option value="Osmanabad"<?php if ($result['district']=='Osmanabad') { echo "selected";} ?>>Osmanabad</option>
<option value="Palghar"<?php if ($result['district']=='Palghar') { echo "selected";} ?>>Palghar</option>
<option value="Parbhani"<?php if ($result['district']=='Parbhani') { echo "selected";} ?>>Parbhani</option>
<option value="Pune"<?php if ($result['district']=='Pune') { echo "selected";} ?>>Pune</option>
<option value="Raigarh"<?php if ($result['district']=='Raigarh') { echo "selected";} ?>>Raigarh</option>
<option value="Ratnagiri"<?php if ($result['district']=='Ratnagiri') { echo "selected";} ?>>Ratnagiri</option>
<option value="Sangli"<?php if ($result['district']=='Sangli') { echo "selected";} ?>>Sangli</option>
<option value="Satara"<?php if ($result['district']=='Satara') { echo "selected";} ?>>Satara</option>
<option value="Sindhudurg"<?php if ($result['district']=='Sindhudurg') { echo "selected";} ?>>Sindhudurg</option>
<option value="Solapur"<?php if ($result['district']=='Solapur') { echo "selected";} ?>>Solapur</option>
<option value="Thane"<?php if ($result['district']=='Thane') { echo "selected";} ?>>Thane</option>
<option value="Wardha"<?php if ($result['district']=='Wardha') { echo "selected";} ?>>Wardha</option>
<option value="Washmim"<?php if ($result['district']=='Washmim') { echo "selected";} ?>>Washim</option>
<option value="Yavatmal"<?php if ($result['district']=='Yavatmal') { echo "selected";} ?>>Yavatmal</option>
      </select>
    </div>
    
    <div class="form-group col-md-2">
      <label for="fpincode">Pincode</label>
      <input type="number" class="form-control" name="fpincode" id="fpincode" value="<?php echo $result['fpincode']; ?>" required>
    </div>

    <div class="form-group col-md-2">
      <label for="surveyno">Survey number</label>
      <input type="text" class="form-control" name="surveyno" id="surveyno" value="<?php echo $result['surveyno']; ?>"required>
    </div>
     
    <div class="form-group col-md-2">
      <label for="area">Area</label>
      <input type="number" class="form-control" name="area" id="area" value="<?php echo $result['area']; ?>" placeholder="In acers" required>
    </div>
    
  </div>  
 <br>
  <h4>Bank Details</h4>

  <div class="form-group">
      <label for="holdername">Account holder's Name</label>
      <input type="text" class="form-control" name="holdername" id="holdername" value="<?php echo $result['holdername']; ?>" required>
    </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="bankname">Bank name</label>
      <input type="text" class="form-control" name="bankname" id="bankname" value="<?php echo $result['bankname']; ?>" required>
    </div>
    
    <div class="form-group col-md-3">
      <label for="accountno">Bank Account Number</label>
      <input type="number" class="form-control" name="accountno" id="accountno" value="<?php echo $result['accountno']; ?>" required>
    </div>
    
    <div class="form-group col-md-3">
      <label for="ifsc">IFSC Code</label>
      <input type="text" class="form-control" name="ifsc" id="ifsc" value="<?php echo $result['ifsc']; ?>" required>
    </div>
    
  </div>  
   <br>
 <!-- <h4>Upload Documents</h4>
 
 <a href="" target="photo">View</a>
 <iframe name="photo">
</iframe>
 <div class="form-group">
    <label for="exampleFormControlFile1">Aadhar Card</label>
    <input type="file" class="form-control-file" name="paadhar" id="paadhar">
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">7/12</label>
    <input type="file" class="form-control-file" name="plandrecord" id="plandrecord" > 
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Photo</label>
    <input type="file" class="form-control-file" name="pphoto" id="pphoto" >
  </div> -->

    <div class="form-group">
      <div class="form-check">
       <input class="form-check-input" type="checkbox" id="gridCheck">
       <label class="form-check-label" for="gridCheck">
         Check me out
       </label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" value="submit">Submit</button>
     
   </form>

  </div>
  <?php } ?>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    