<?php
session_start();
require_once 'config.php';

if(isset($_POST['add_to_cart'])){
   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE id = '$product_id'");

   if(mysqli_num_rows($select_cart) > 0){
    
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(aadhar, productid,quantity) VALUES( '{$_SESSION['aadhar']}', '$product_id', '$product_quantity')");
      
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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
  
       
        <h3 class="i-name">Store</h3>
        
       
        
        <div class="card mb-3 " style="margin-left: 25px; height:200px; width:90%;">

        <?php
        //to show selected farmer data 
    if(isset($_POST['submit']) && !empty($_POST['search'])){
    $data = $_POST['search'];
    $sql = "SELECT * FROM farmer WHERE aadhar='$data'";
    $_SESSION['aadhar'] = "$data";
    $result = $conn->query($sql);
    $row= $result->fetch_assoc();
       ?>
        <div class="row g-0">
              <div class="col-md-3">
                <img src="<?php echo $row['pphoto']; ?>" class="img-fluid rounded-start mx-auto d-block" alt="..." style="width:200px; height:200px;" >
              </div>
              
        

          <form  >
          <div class="form-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
          <label for="name" style="margin-right:10px;">Name</label>
          <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" readonly>
          </div>

          <div class="form-group mt-2" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
          <label for="name" style="margin-right:10px;">Address</label>
          <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['address'].','.$row['village'].','.$row['taluka'].','.$row['district']; ?>" readonly>
          </div> 
            <div class="form-row">

              <div class="col-md-4 mb-1">
                <label for="validationDefault02">Aadhar Number</label>
                <input type="text" class="form-control" id="validationDefault01" name="aadhar" value="<?php echo $row['aadhar']; ?>" readonly>
              </div>

              <div class="col-md-4 mb-1">
                <label for="validationDefault02">Mobile Number</label>
                <input type="text" class="form-control" id="validationDefault02"  value="<?php echo $row['mobileno']; ?>" readonly>
              </div>

              <div class="col-md-2 mb-1">
                <label for="validationDefault02">Survey Number</label>
                <input type="text" class="form-control" id="validationDefault02" value="<?php echo $row['surveyno']; ?>" readonly>
              </div>
              
              <div class="col-md-2 mb-1">
                <label for="validationDefault02">Area</label>
                <input type="text" class="form-control" id="validationDefault02" value="<?php echo $row['area']; ?>" readonly>
              </div>

            </div>
    
            
          </form>
        </div>
        <?php
}
        ?>
        </div>
    


        <div class="container-fluid p-0 m-0 justify-content-center d-flex"  style="min-height: 100vh; ">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post" >
         <div class="card-deck m-5">
            <img class="card-img-top"src="images/<?php echo $fetch_product['image']; ?>" alt="" style="height:100px; width:100px;">
            <h6 style=""><?php echo $fetch_product['title']; ?></h6>
            <div class="price">Price: ₹<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['title']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="primary-btn" value="add_to_cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

    </section>
</body>
</html>
