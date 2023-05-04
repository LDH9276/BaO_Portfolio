<?php
session_start();

if(isset($_SESSION['cart'])){
  unset($_SESSION['cart']);
  echo "<script>location.href = 'cart.php';</script>";
}
?>