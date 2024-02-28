<?php 
session_start();
require_once 'config.php';
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

<?php
    $sql = "SELECT * FROM farmer";
    $result = $conn->query($sql);
    $row= $result->fetch_assoc();
?>
        <!--  -->
        <div class="container mt-5" style="z-index:2;">
      <div class="row">
      <div class="col-md-8 offset-md-2 bg-light p-1 mt-5">
     <h4>Select a Farmer to Allot Products</h4>


   <form action="allot.php" method="post" class= "form-inline p-3">
    <input type="text" name="search" id="search" class= "form-control rounded-0 border-info" placeholder="search by aadhar" style="width:80%;" minlength="12" maxlength="12" required>
     <input type="submit" name="submit" value="search" class="btn btn-info rounded-0" style="width:20%;">
  </form>
      </div>
      <div class="col-md-5 overlay" style="position:relative; margin-top:-20px; margin-left:200px; z-index:4;">
        <div class="list-group" id="show-list">
          
        </div>
      </div>
     </div> 
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
       $("#search").keyup(function(){
          var searchText = $(this).val();
          if(searchText!= ''){
            $.ajax({
              url:'action.php',
              method:'post',
              data:{query:searchText},
              success:function(response){
                $("#show-list").html(response);
              }
            });
          }
          else{
            $("#show-list").html('');
          }
       });
       $(document).on('click','a',function(){
        $("#search").val($(this).text());
        $("#show-list").html('');
       })
      });
    </script>


 
<?php
        //to show selected farmer data 
    if(isset($_POST['submit']) && !empty($_POST['search'])){
    $data = $_POST['search'];
    $sql = "SELECT * FROM farmer WHERE aadhar='$data'";
    $result = $conn->query($sql);
    $row= $result->fetch_assoc();
    $_SESSION['aadhar'] = $row['aadhar'];
       ?>
        <div class="row g-0 mt-3">
              <div class="col-md-3">
                <img src="<?php echo $row['pphoto']; ?>" class="img-fluid rounded-start mx-auto d-block" alt="..." style="width:200px; height:200px;" >
              </div>
              
        

          <form action="store.php?action=view&id=<?php echo $row["aadhar"]; ?>" method="post">
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
    
            <button type="submit" value="submit" class="btn btn-primary">Proceed to allotment</button>
            
          </form>
        </div>
        <?php
}
        ?>
        

    </section>
</body>
</html>