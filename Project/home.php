<?php 

require_once 'config.php';
session_start();
unset( $_SESSION['orderid']);
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

        <h3 class="i-name">Dashboard</h3>

        <div class="values mr-5 " >

            <?php
              $sql = "SELECT * FROM `farmer`";
              $query = mysqli_query($conn,$sql);
              $result = mysqli_num_rows($query);
            ?>
            <div class="val-box"  style="width:350px" ; >
                <i class="fas fa-users"></i>
                <div>
                    <h3 style="margin-top:15px";><?php echo "$result"; ?></h3>
                    <span style="margin-top:5px";>farmers registered</span>
                </div>
            </div>

            <?php
              $sql = "SELECT  SUM(total_price) from orders";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_array($result)){
            ?>
            <div class="val-box " style="width:350px;">
                <i class="fa-solid fa-indian-rupee-sign"></i>
                <div class="val-text">
                    <h3 style="margin-top:15px";><?php echo $row['SUM(total_price)']; ?> </h3>
                    <span style="margin-top:15px";>worth products alloted</span>
                    <?php }?>
                </div>
            </div>

            <?php
              $sql = "SELECT  SUM(area) from farmer";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_array($result)){
            ?>

            <div class="val-box " style="width:350px">
                <i class="fas fa-users"></i>
                <div>
                    <h3 style="margin-top:15px";><?php echo $row['SUM(area)']; ?></h3>
                    <span style="margin-top:15px";>Acers of area Covered</span>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>