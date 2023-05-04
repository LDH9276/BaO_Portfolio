<?php
session_start();

if(isset($_GET['id'])){
  $id = $_GET['id'];
  foreach($_SESSION['cart'] as $key => $value){
    if($value['id'] == $id){
      unset($_SESSION['cart'][$key]);
      break;
    }
  }
}

header("Location: ./cart.php");
exit();
?>
