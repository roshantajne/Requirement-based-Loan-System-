<?php
include 'config.php';
unset( $_SESSION['orderid']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/f8bc328439.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
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
  
    <h3 class="i-name">Registered Farmers</h3>
      
    <div class="container">
    

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Aadhar number</th>
      <th scope="col">Survey No.</th>
      <th scope="col">village</th>
      <th scope="col">taluka</th>
      <th scope="col">district</th>
    </tr>
  </thead>
  <tbody>

  <?php 
      $sql = "SELECT * FROM `farmer`";
      $query = mysqli_query($conn,$sql);
      $sno = 0;
      while ($result = mysqli_fetch_array($query)) {
        $sno = $sno + 1;
        ?>
        <tr>
        <th scope='row'> <?php echo $sno;?></th>
        <td><img src="<?php echo $result['pphoto']; ?>" alt="" width="75px" height="75px"></td>
        <td><?php echo $result['name'];?></td>
        <td><?php echo $result['aadhar'];?></td>
        <td><?php echo $result['surveyno'];?></td>
        <td><?php echo $result['village'];?></td>
        <td><?php echo $result['taluka'];?></td>
        <td><?php echo $result['district'];?></td>
       
      </tr>

      <?php
    }
      ?>
  
  
  </tbody>
</table>
     </div>
       
    </section>
</body>
</html>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   <script>$(document).ready( function () {
    $('#myTable').DataTable();
    } );</script>

<script>$('#myTable').DataTable( {
    select: true
} );
</script>
