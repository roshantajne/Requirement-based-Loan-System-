<?php 

require_once 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
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

        <h3 class="i-name">cart</h3>

       
        <div class="row">
    <div class="col-md-12">
        <?php if(empty($_SESSION['cart_items'])){?>
        <table class="table">
            <tr>
                <td>
                    <p>Your cart is emty</p>
                </td>
            </tr>
        </table>
        <?php }?>
        <?php if(isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0){?>
        <table class="table">
           <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $totalCounter = 0;
                    $itemCounter = 0;
                    foreach($_SESSION['cart_items'] as $key => $item){

                  
                    $total = $item['product_price'] * $item['qty'];
                    $totalCounter+= $total;
                    $itemCounter+=$item['qty'];
                    ?>
                    <tr>
                        <td>
                            <img src="images/<?php echo $item['product_img']; ?>" class="rounded img-thumbnail mr-2" style="width:60px;"><?php echo $item['product_name'];?>
                            
                            <a href="cart.php?action=remove&item=<?php echo $key?>" class="text-danger">
                                <i class="bi bi-trash-fill"></i>
                            </a>

                        </td>
                        <td>
                            $<?php echo $item['product_price'];?>
                        </td>
                        <td>
                            <input type="number" name="" class="cart-qty-single" data-item-id="<?php echo $key?>" value="<?php echo $item['qty'];?>" min="1" max="1000" >
                        </td>
                        <td>
                            <?php echo $total;?>
                        </td>
                    </tr>
                <?php }?>
                <tr class="border-top border-bottom">
                    <td><button class="btn btn-danger btn-sm" id="emptyCart">Clear Cart</button></td>
                    <td></td>
                    <td>
                        <strong>
                            <?php 
                                echo ($itemCounter==1)?$itemCounter.' item':$itemCounter.' items'; ?>
                        </strong>
                    </td>
                    <td><strong>$<?php echo $totalCounter;?></strong></td>
                </tr> 
                </tr>
            </tbody> 
        </table>
        <div class="row">
            <div class="col-md-11">
				<a href="checkout.php">
					<button class="btn btn-primary btn-lg float-right">Checkout</button>
				</a>
            </div>
        </div>
        
        <?php }?>
    </div>
</div>

<script>
    $(document).ready(function(){
    $(".cart-qty-single").change(function(){
        let getItemID = $(this).data('item-id');
        let qty = $(this).val();
        $.ajax({
            type:'POST',
            url:'ajax_calls.php',
            dataType: 'json',
            data: {action:'update-qty', itemID: getItemID, qty: qty},
            success:function(data){
                if (data.msg == 'success')
                {
                    window.location.href='cart.php';
                }
            }
        });
    });

    $('#emptyCart').click(function(){
        $.ajax({
            type: 'POST',
            url: 'ajax_calls.php',
            dataType: 'json',
            data: {action:'empty',empty_cart:true},
            success:function(data){
                if (data.msg == 'success') {
                    window.location.href = 'cart.php';
                }
            }
        });
    });
});
</script>

    </section>
</body>
</html>