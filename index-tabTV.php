<?php

include ('./lib.php');

$sql = "select * from goods_tab where goods_code = 'TV' limit 0, 6";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  $id = $row['goods_id'];
  $image = $row['goods_image'];
  $title = $row['goods_name'];
  $info = $row['goods_info'];
  $price = '₩ ' . $row['goods_price'];

  if($price == '₩ '){
    $price = "출시예정";
  }

  echo'
  <li>
  <a href="./list.php?id=' . $id  . '" title="'. $title .'">
    <img src="./productimg/' . $image . '" alt="' . $title . '">
    <p class="product-title">' . $title . '</p>
    <p class="product-info">' . $info . '</p>
    <p class="product-price">'. $price .'</p>
  </a>
</li>
';
}