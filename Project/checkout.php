<?php 

session_start();
$username = "root";
$password = "";
$conn = new \PDO('mysql:host=localhost;dbname=project', $username, $password, array(
    \PDO::ATTR_EMULATE_PREPARES => false,
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
)); 

if(!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items']))
     {
         header('location:details.php');
         exit();
     }

$cartItemCount = count($_SESSION['cart_items']);

if(isset($_POST['submit']) && isset($_SESSION['aadhar']))
    {
           
        $name       = $_POST['name'];
        $aadhar      = $_POST['aadhar'];
        $mobileno      = $_POST['mobileno'];
        $order_status = 'confirmed';
                $sql = "INSERT INTO `orders`(`name`, `aadhar`, `mobileno`, `order_status`) 
                VALUES ('$name', '$aadhar', '$mobileno', '$order_status')";
                $statement = $conn->prepare($sql);

                $statement->execute(); 

                if($statement->rowCount() == 1)
                {
                    
                    $getOrderID = $conn->lastInsertId();

                    if(isset($_SESSION['cart_items']) || !empty($_SESSION['cart_items']))
                    {
    
                        $totalPrice = 0;
                        foreach($_SESSION['cart_items'] as $item)
                        {
                                $totalPrice+=$item['total_price'];
                                $order_id =  $getOrderID;
                                $product_id =  $item['product_id'];
                                $product_name =  $item['product_name'];
                                $product_price =  $item['product_price'];
                                $qty =  $item['qty'];
                                $total_price =  $item['total_price'];
                        
                                $sqlDetails = "INSERT INTO `order_details` (`order_id`, `product_id`, `product_name`, `product_price`, `qty`, `total_price`)
                                values('$order_id', '$product_id' , '$product_name', '$product_price', '$qty', ' $total_price')";
                                $orderDetailStmt = $conn->prepare($sqlDetails);
                                $orderDetailStmt->execute();
                        }
                        
                            $total = $totalPrice;
                            $id = $getOrderID;
                            $_SESSION['orderid'] = $id;
                            $data = $_SESSION['aadhar'];

                            $query = "SELECT * FROM `FARMER` WHERE aadhar='$data';";
                            $result = $conn->query($query);
                            $row = $result->fetch();
                            $prevBal = $row["balance"];
                            $balance = $prevBal + $total;

                            if($balance<100000){
                              $updateSql = "UPDATE orders set total_price = '$total' where id = '$id'";

                              $rs = $conn->prepare($updateSql);
                              $rs->execute();

                              $updateBal = "UPDATE farmer set balance = '$balance' where aadhar='$data'";

                              $rs = $conn->prepare($updateBal);
                              $rs->execute();

                             
                              
                              header('location:confirm.php');
                              exit();

                            }
                            else {
                              $errorMsg[] = 'Unable to save your order. insufficeint funds.';
                            }

                            // $updateSql = "UPDATE orders set total_price = '$total' where id = '$id'";
                            // $rs = $conn->prepare($updateSql);
                            // $rs->execute();
                        
                        // unset($_SESSION['cart_items']);
                        // unset($_SESSION['aadhar']);
                        // header('location:details.php');
                        // exit();
                    }
                }
                else
                {
                  $errorMsg[] = 'Unable to save your order. Please try again';
                    
                }
           }
    
           if(isset($_POST['submitback'])){
            unset($_SESSION['cart_items']);
            unset($_SESSION['aadhar']);
            header('location:details.php');
            exit();
           }
?>

<!DOCTYPE html>
<html lang="en">
<head>
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

        <h3 class="i-name">Checkout</h3>

        <div class="row mt-3 mx-0">
        <div class="col-md-3 order-md-2 mb-4 ">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill"><?php echo $cartItemCount;?></span>
          </h4>
          <ul class="list-group mb-3">
            <?php
                $total = 0;
                foreach($_SESSION['cart_items'] as $cartItem)
                {
                    $total+=(int)$cartItem['total_price'];
                ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?php echo $cartItem['product_name'] ?></h6>
                            <small class="text-muted">Quantity: <?php echo $cartItem['qty'] ?> X Price: <?php echo $cartItem['product_price'] ?></small>
                        </div>
                        <span class="text-muted">₹<?php echo $cartItem['total_price'] ?></span>
                    </li>
            <?php
                }
            ?>
           
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (Ruppes)</span>
              <strong>₹<?php echo number_format($total,2);?></strong>
            </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1 mx-4 " style="margin-bottom: 100px;">
          <h4 class="mb-3">Billing address</h4>
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
                $row= $result->fetch();
           ?>
          <form class="needs-validation" method="POST">
            
          
          <div class="mb-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
            </div>
          
          <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Aadhar Number</label>
                <input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $row['aadhar']; ?>" >
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Mobile Number</label>
                <input type="text" class="form-control" id="mobileno" name="mobileno"value="<?php echo $row['mobileno']; ?>" >
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
            </div>

            <div class="form-row">
            <div class="form-group col-md-4">
              <label for="fvillage">Village</label>
              <input type="text" class="form-control"name="village" id="village"  value="<?php echo $row['village']; ?>">
            </div>
    
           <div class="form-group col-md-3">
             <label for="ftaluka">Taluka</label>
             <input type="text" class="form-control" name="taluka" id="taluka"  value="<?php echo $row['taluka']; ?>">
           </div>

           <div class="form-group col-md-4">
              <label for="fvillage">District</label>
              <input type="text" class="form-control"name="village" id="village"  value="<?php echo $row['district']; ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="fvillage">Pincode</label>
              <input type="text" class="form-control"name="pincode" id="pincode"  value="<?php echo $row['pincode']; ?>">
            </div>

            <div class="form-group col-md-4">
              <label for="fvillage">Loan Amount(till now)</label>
              <input type="number" class="form-control"name="pincode" id="pincode"  value="<?php echo $row['balance']; ?>">
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