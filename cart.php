<?php
include ('./lib.php');

if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bang & Olupsn</title>
  <!-- reset css -->
  <link rel="stylesheet" href="./css/reset.css">

  <!-- common css -->
  <link rel="stylesheet" href="./css/base.css">
  <link rel="stylesheet" href="./css/common.css">

  <!-- list css -->
  <link rel="stylesheet" href="./css/cart.css">

  <!-- swiper slide -->
  <link rel="stylesheet" href="./css/swiper.css">

  <!-- js -->
  <script src="./script/common.js" defer></script>
  <script src="./script/list.js" defer></script>

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


</head>
<body>
<!-- 헤더 영역 -->

	<?php include('header.php'); ?>

  <main>
    <section id="cart-list">
      <div class="list-wrap">
        <h2>장바구니 리스트</h2>
        <ul>
          <?php

if($_SESSION['cart'] == null){

  echo '
    <div class = "list-empty">
      <p class = "empty-text">장바구니가 비어있습니다.</p>
    </div>
  ';

} else {


foreach($_SESSION['cart'] as $key => $value){
	if(is_array($value) && isset($value['id']) && isset($value['quantity'])){
			$sql = "select * from goods_tab where goods_id = '$value[id]'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			echo '<li class="list-item">';
      echo '<img src="./productimg/' . $row['goods_image']   . '" alt="' . $row['goods_name'] . '" class="productimg">' ;
      echo '<span class="list-title">' . $row['goods_name'] . '</span>';
      echo '<span class="list-quantity">' . $value['quantity'] . '</span>';
      echo '<span class="list-price">' . $row['goods_price'] . '원</span>';
			echo '<a href="./cart_delete.php?id=' . $value['id'] . '" class="item-delete">삭제</a> </li>';
	}
}

$total = 0;
$totalQuantity = 0;

foreach($_SESSION['cart'] as $key => $value){
    if(is_array($value) && isset($value['id']) && isset($value['quantity'])){
        $sql = "select * from goods_tab where goods_id = '$value[id]'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total += $row['goods_price'] * $value['quantity'];
				$totalQuantity += $value['quantity'];
    }
}?>

<li class="total">
  <div>
    <a href="#" title="구매하기" class="buy-btn">구매하기</a>
    <a href="cart_delete_all.php" title="장바구니 취소" class="cancel-btn">장바구니 취소</a>
  </div>
  <div>
    <span class = "total-text">수량 <?= $totalQuantity ?></span>
    <span class = "total-text">합계 <?= $total ?>원</span>
  </div>

<?php
  }
?>



</li>

        </ul>
      
      </div>

    </section>


  </main>

  <footer>
    <div class="f-wrap">
      <img src="./img/w-logo.svg" alt="로고">
      <div class="f-top">
        <p class="f-top-toggle">메뉴보기 <img src="./img/w-down_btn.svg" alt="메뉴보기"></p>
        <nav class="f-menu">
          <ul>
            <li><a href="#" title="로그인, 회원가입">로그인 / 회원가입</a></li>
            <li><a href="#" title="온라인 전용 서비스"><strong>온라인 전용 서비스</strong></a></li>
            <li><a href="#" title="고객 지원">고객 지원</a></li>
            <li><a href="#" title="매장 찾기">매장 찾기</a></li>
            <li><a href="#" title="회사 정책">회사 정책</a></li>
            <li><a href="#" title="개인 정보 정책"><strong>개인 정보 정책</strong></a></li>
            <li><a href="#" title="이용 약관"><strong>이용 약관</strong></a></li>
            <li><a href="#" title="회사 소개">회사소개</a></li>
            <li><a href="#" title="보도자료">보도자료</a></li>
            <li><a href="#" title="투자자 정보">투자자 정보</a></li>
            <li><a href="#" title="구인 정보">구인 정보</a></li>
          </ul>
        </nav>
      </div>
      <div class="f-bottom">
        <p>
          대표 이사: 뱅앤울룹슨㈜ <br> 사업장 주소: 경기도 안양시 XX구 XXXX로 XX <br> 사업자 등록번호: 833-00-00000
        </p>
        <p>
          통신 판매 번호: 제 2023-XXXX-XXXX 호 <br> 고객 지원센터 080-XXX-XXXX <br> 이메일: bno@XXX.XXX <br> 호스팅 서비스: Microsoft Azure
        </p>
      </div>
      <address>© Bang & Olufsen 2023</address>
    </div>
  </footer>
</body>
</html>