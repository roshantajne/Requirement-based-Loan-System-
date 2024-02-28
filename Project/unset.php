<?php 
    session_start();

    unset($_SESSION['cart_items']);
    unset($_SESSION['aadhar']);
    unset($_SESSION['orderid']);
     if(!isset($_SESSION['orderid']) || empty($_SESSION['orderid']))
     {
         header('location:home.php');
         exit();
     }
     
unset($_SESSION['id']); 
unset($_SESSION['aadhar']);
if(!isset($_SESSION['id']) || empty($_SESSION['id']))
     {
         header('location:home.php');
         exit();
     }
     
?>