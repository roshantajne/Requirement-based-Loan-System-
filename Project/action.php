<?php
require_once 'config.php';

if(isset($_POST['query'])){
    $inpText=$_POST['query'];
    $query = "SELECT aadhar FROM farmer WHERE aadhar LIKE '%$inpText%'";
    $result = $conn->query($query);

    if($result->num_rows>0){
        while ($row=$result->fetch_assoc())
        {
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['aadhar']."</a>";
        }
    }
    else{
        echo "<p class='list-group-item border-1'>No records found </p>";
    }
}
?>