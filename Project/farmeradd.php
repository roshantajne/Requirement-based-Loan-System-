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
        <a href="add-student.php"><button class="btn btn-danger">REGISTER A NEW FARMER</button></a>
        <a href="update-student.php"><button style="margin-left: 10px" class="btn btn-danger" >MODIFY FARMER DETAILS</button></a>
        </div>


<div class="container"style="margin: 10px 0 300px 0px; z-index:2; padding: 10px 40px 0px 30px;">
  <form action="insert.php" method="post" enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" required>
    </div>
 
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="aadhar">Aadhar Number</label>
      <input type="number" class="form-control" name="aadhar" id="aadhar" required> 
    </div>
    <div class="form-group col-md-5">
      <label for="mobileno">Mobile number</label>
      <input type="number" class="form-control" name="mobileno" id="mobileno" required >
    </div>
  </div>
  

  <div class="form-row">

  <div class="form-group col-md-12">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" id="address">
  </div> 

    <div class="form-group col-md-4">
      <label for="village">Village</label>
      <input type="text" class="form-control" name="village" id="village" required>
    </div>
    
    <div class="form-group col-md-3">
      <label for="taluka">Taluka</label>
      <input type="text" class="form-control" name="taluka" id="taluka" required>
    </div>

    <div class="form-group col-md-3">
      <label for="district">District</label>
      <select id="inputDistricts" class="form-control" name="district" id="district" required>
      <option disabled="disabled" selected="selected">--Select District--</option>
      <option value="Ahmednagar">Ahmednagar</option>
                        <option value="Akola">Akola</option>
                        <option value="Amravati">Amravati</option>
                        <option value="Beed">Beed</option>
                        <option value="Bhandara">Bhandara</option>
                        <option value="Buldhana">Buldhana</option>
                        <option value="Chandrapur">Chandrapur</option>
                        <option value="Chha. Sambhajinagar">Chha. Sambhajinagar</option>
                        <option value="Dhule">Dhule</option>
                        <option value="Gadchiroli">Gadchiroli</option>
                        <option value="Gondia">Gondia</option>
                        <option value="Hingoli">Hingoli</option>
                        <option value="Jalgaon">Jalgaon</option>
                        <option value="Jalna">Jalna</option>
                        <option value="Kolhapur">Kolhapur</option>
                        <option value="Latur">Latur</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Nagpur">Nagpur</option>
                        <option value="Nanded">Nanded</option>
                        <option value="Nandurbar">Nandurbar</option>
                        <option value="Nashik">Nashik</option>
                        <option value="Osmanabad">Osmanabad</option>
                        <option value="Palghar">Palghar</option>
                        <option value="Parbhani">Parbhani</option>
                        <option value="Pune">Pune</option>
                        <option value="Raigarh">Raigarh</option>
                        <option value="Ratnagiri">Ratnagiri</option>
                        <option value="Sangli">Sangli</option>
                        <option value="Satara">Satara</option>
                        <option value="Sindhudurg">Sindhudurg</option>
                        <option value="Solapur">Solapur</option>
                        <option value="Thane">Thane</option>
                        <option value="Wardha">Wardha</option>
                        <option value="Washmi">Washmi</option>
                        <option value="Yavatmal">Yavatmal</option>
        <option></option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="pincode">Pincode</label>
      <input type="number" class="form-control" name="pincode" id="pincode" required>
    </div>
  </div>
  <br>
   <h4> Farm Details </h4>

   <div class="form-group">
    <label for="faddress">Address</label>
    <input type="text" class="form-control" name="faddress" id="faddress" >
   </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="fvillage">Village</label>
      <input type="text" class="form-control"name="fvillage" id="fvillage" required>
    </div>
    
    <div class="form-group col-md-3">
      <label for="ftaluka">Taluka</label>
      <input type="text" class="form-control" name="ftaluka" id="ftaluka" required>
    </div>

    <div class="form-group col-md-3">
      <label for="fdistrict">District</label>
      <select id="inputDistricts" class="form-control" name="fdistrict" id="fdistrict" required>
      <option disabled="disabled" selected="selected">--Select District--</option>
                        <option value="Ahmednagar">Ahmednagar</option>
                        <option value="Akola">Akola</option>
                        <option value="Amravati">Amravati</option>
                        <option value="Beed">Beed</option>
                        <option value="Bhandara">Bhandara</option>
                        <option value="Buldhana">Buldhana</option>
                        <option value="Chandrapur">Chandrapur</option>
                        <option value="Chha. Sambhajinagar">Chha. Sambhajinagar</option>
                        <option value="Dhule">Dhule</option>
                        <option value="Gadchiroli">Gadchiroli</option>
                        <option value="Gondia">Gondia</option>
                        <option value="Hingoli">Hingoli</option>
                        <option value="Jalgaon">Jalgaon</option>
                        <option value="Jalna">Jalna</option>
                        <option value="Kolhapur">Kolhapur</option>
                        <option value="Latur">Latur</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Nagpur">Nagpur</option>
                        <option value="Nanded">Nanded</option>
                        <option value="Nandurbar">Nandurbar</option>
                        <option value="Nashik">Nashik</option>
                        <option value="Osmanabad">Osmanabad</option>
                        <option value="Palghar">Palghar</option>
                        <option value="Parbhani">Parbhani</option>
                        <option value="Pune">Pune</option>
                        <option value="Raigarh">Raigarh</option>
                        <option value="Ratnagiri">Ratnagiri</option>
                        <option value="Sangli">Sangli</option>
                        <option value="Satara">Satara</option>
                        <option value="Sindhudurg">Sindhudurg</option>
                        <option value="Solapur">Solapur</option>
                        <option value="Thane">Thane</option>
                        <option value="Wardha">Wardha</option>
                        <option value="Washmi">Washmi</option>
                        <option value="Yavatmal">Yavatmal</option>
      </select>
    </div>
    
    <div class="form-group col-md-2">
      <label for="fpincode">Pincode</label>
      <input type="number" class="form-control" name="fpincode" id="fpincode" required>
    </div>

    <div class="form-group col-md-2">
      <label for="surveyno">Survey number</label>
      <input type="text" class="form-control" name="surveyno" id="surveyno" required>
    </div>
     
    <div class="form-group col-md-2">
      <label for="area">Area</label>
      <input type="number" class="form-control" name="area" id="area" placeholder="In acers" required>
    </div>
    
  </div>  
 <br>
  <h4>Bank Details</h4>

  <div class="form-group">
      <label for="holdername">Account holder's Name</label>
      <input type="text" class="form-control" name="holdername" id="holdername" required>
    </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="bankname">Bank name</label>
      <input type="text" class="form-control" name="bankname" id="bankname" required>
    </div>
    
    <div class="form-group col-md-3">
      <label for="accountno">Bank Account Number</label>
      <input type="number" class="form-control" name="accountno" id="accountno" required>
    </div>
    
    <div class="form-group col-md-3">
      <label for="ifsc">IFSC Code</label>
      <input type="text" class="form-control" name="ifsc" id="ifsc" required>
    </div>
    
  </div>  
   <br>
 <h4>Upload Documents</h4>
 <div class="form-group">
    <label for="exampleFormControlFile1">Aadhar Card</label>
    <input type="file" class="form-control-file" name="paadhar" id="paadhar" required>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">7/12</label>
    <input type="file" class="form-control-file" name="plandrecord" id="plandrecord" required> 
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Photo</label>
    <input type="file" class="form-control-file" name="pphoto" id="pphoto" required>
  </div>

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
  
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
