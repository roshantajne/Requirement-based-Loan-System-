<?php 

require_once 'config.php';

session_start();

if(isset($_POST['add_to_cart']) && $_POST['add_to_cart'] == 'add to cart')
{
    $productID = intval($_POST['product_id']);
    $productQty = 1;
    
    $sql = "SELECT * FROM `products` WHERE id = '$productID'";

    $prepare =  $conn->query($sql);
    $fetchProduct = $prepare->fetch_assoc();
   

    $calculateTotalPrice = number_format($productQty * $fetchProduct['price'],2);
    
    $cartArray = [
        'product_id' =>$productID,
        'qty' => $productQty,
        'product_name' =>$fetchProduct['title'],
        'product_price' => $fetchProduct['price'],
        'total_price' => $calculateTotalPrice,
        'product_img' =>$fetchProduct['image']
    ];
    
    if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items']))
    {
        $productIDs = [];
        foreach($_SESSION['cart_items'] as $cartKey => $cartItem)
        {
            $productIDs[] = $cartItem['product_id'];
            // if($cartItem['product_id'] == $productID)
            // {
            //     $_SESSION['cart_items'][$cartKey]['qty'] = $productQty;
            //     $_SESSION['cart_items'][$cartKey]['total_price'] = $calculateTotalPrice;
            //     break;
            // }
        }   

        if(!in_array($productID,$productIDs))
        {
            $_SESSION['cart_items'][]= $cartArray;
        }

        $successMsg = true;
        
    }
    else
    {
        $_SESSION['cart_items'][]= $cartArray;
        $successMsg = true;
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
  
      <div class="container" style="max-width:100%">
        <div style="margin-top:100px;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary " style="z-index: 1;">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0" >
            <li class="nav-item active">home</li>
        </ul>
        <div class="form-inline my-2 my-lg-0" >
            <a href="cart.php" style="color:#ffffff">
        <h5> <i class="fas fa-shopping-cart"></i>cart
        <?php
         if(isset($_SESSION['cart_items'])){
          $count = count($_SESSION['cart_items']);
          echo "<span id='cart_count'>$count</span>";
         }
         else {
          echo "<span id='cart_count'>0</span>";
         }
        ?>
       </h5>
        </a>
        </div>
      </nav>
      </div>

      <!-- products and store -->
      
        
   

      <div class="row">
        <?php
        $select_products = mysqli_query($conn, "SELECT * FROM `products`");
        if(mysqli_num_rows($select_products) > 0){
           while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>
            <div class="col-lg-3 col-md-3 col-sm-12  mt-4  mb-4 mx-0 my-5">
                <div class="card mb-2 ml-1 mr-1"  >
                    
                        <img class="card"src="images/<?php echo $fetch_product['image'];?>" alt="">
                 
                    <div class="card-body mb-3" style="height: 120px;" >
                        <h6 class="card-title mx-0 my-0">
                        <?php echo $fetch_product['title']; ?>
                        </h6>
                        <strong >Price: ₹<?php echo $fetch_product['price']; ?></strong>
                       
                        <form class="form-inline" action="store.php?action=add&id=<?php echo $fetch_product['id']; ?>"method="POST">
				                 <div class="form-group mb-2">
					                  
					                   <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']?>">
				                   </div>
				                   <div class="form-group mb-2 ml-0 mt-1">
                                  
					                   <button type="submit" class="btn btn-primary mb-7" name="add_to_cart" value="add to cart">Add to Cart</button>
				                   </div>
			                   </form>
                        
                    </div>
                </div>
            </div>
            <?php
    }
    }
    ?>
    </div>
    </div>
    </section>
</body>
</html>