<?php
//세션 시작
session_start();

// 장바구니 세션이 존재하지 않을 때, 새로 생성한다.
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

// GET으로 받아온 값을 변수에 저장한다.
$id = $_GET['insert'];
$quantity = $_GET['value'];

// 필터링 처리
$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$quantity = filter_var($quantity, FILTER_SANITIZE_NUMBER_INT);

// 상품의 id와 수량을 배열에 저장한다.
$item = array('id' => $id, 'quantity' => $quantity);
$found = false;

// 장바구니에 이미 상품이 존재하는지 확인한다.
foreach ($_SESSION['cart'] as $key => $value) {
  if (is_array($value) && isset($value['id']) && $value['id'] == $id) {
    // 조건식의 조건은 배열에 값이 존재하고(상품), 그 상품의 id가 현재 상품의 id와 같을 때
    // 만약에 이미 장바구니에 있는 상품이라면, 수량만 더해준다.
    $_SESSION['cart'][$key]['quantity'] += $quantity;
    $found = true;
    break;
  }
}

if (!$found) {
  // 만약에 장바구니에 없는 상품이라면, 새로 추가한다.
  array_push($_SESSION['cart'], $item);
}

// 장바구니에 담긴 상품을 확인한다.
foreach ($_SESSION['cart'] as $key => $value) {
  // 배열에 값이 존재하고, 그 값이 id와 quantity를 가지고 있다면
  // 상품의 id와 수량을 출력한다.
  if (is_array($value) && isset($value['id']) && isset($value['quantity'])) {
    echo $value['id'] . ' '. $value['quantity'] . '<br>';
  }
}
// 장바구니 페이지로 이동한다.
echo '<script>location.href = "cart.php";</script>';
?>