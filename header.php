<?php
session_start(); //세션시작
include('lib.php'); //DB연결
if(isset($_SESSION['shop_logon'])){ //세션에 값이 있으면
$shop_logon = isset($_SESSION['shop_logon']) ? $_SESSION['shop_logon'] : ""; //세션값을 변수에 저장



// 쿼리로 유저정보 검색 (구매내역, ID, 이름)
$userSQL = "select mem_id, mem_profile, mem_genui from member_tab where mem_id = '$shop_logon[0]'";
$query = mysqli_query($conn, $userSQL);
$row = mysqli_fetch_row($query);

$genuieSQL = "select mem_genui from member_tab where mem_id = '$shop_logon[0]'"; // 유저의 정품등록 검색
$genuieQuery = mysqli_query($conn, $genuieSQL);
$genuieRow = mysqli_fetch_row($genuieQuery);

};
?>

  <!-- 헤더 영역 -->
  <header class="header">

    <!-- 메인 메뉴 -->
    <div class="h-wrap">
      <h1>
        <a href="index.php">
          <img src="img/logo.svg" alt="logo" id="logo">
        </a>
      </h1>

      <!-- 내비게이션 -->
      <div class="h-nav-wrap">
          <!-- GNB -->
          <nav class="h-gnb">
            <ul>
              <li><a href="#none" title="TV">TV</a></li>
              <li><a href="#none" title="스피커">스피커</a></li>
              <li><a href="#none" title="헤드폰/이어폰">헤드폰/이어폰</a></li>
              <li><a href="#none" title="사운드바">사운드바</a></li>
              <li><a href="#none" title="브랜드">브랜드</a></li>
            </ul>
          </nav>
          <!-- 장바구니, 검색버튼 -->
          <nav class="h-lnb">
            <ul>
              <li>
                <a href="cart.php" title="장바구니" class="h-cartlist">
                <img src="./img/cart.svg" alt="장바구니" id="logo02">
                  <!-- 장바구니 개수 -->
                  <?php
                    if(!isset($_SESSION['cart'])){
                      echo '';
                    } else {
                    // 장바구니 정보 불러오기
                    $cartlist = 0;
                    foreach($_SESSION['cart'] as $key => $value){
                      if(is_array($value) && isset($value['id']) && isset($value['quantity'])){
                        $cartlist += $value['quantity'];
                      }
                    }
                    if($cartlist > 0){
                      echo '<span class="h-cart-badge">';
                      echo $cartlist;
                      echo '</span>';
                    } else {
                      echo '';
                    }
                  }
                  ?>
                </span>
              </a>
            </li>
              <li class="search-btn"><img src="./img/search.svg" alt="검색" class="search"></li>
              <li class="h-toggle__menu">
                <span>&nbsp;</span>
                <span>&nbsp;</span>
              </li>
            </ul>
          </nav>
      </div>
    </div>

    <!-- 셔브 메뉴 -->
    <div class="h-toggle__sub">

      <!-- 메뉴 버튼 -->
      <div class="h-toggle_menu">
        <span>&nbsp;</span>
        <span>&nbsp;</span>
      </div>

      <!-- 로그인창 부분 -->
      <nav class="h-sub-login_wrap">
        <ul>
          <!-- 상단 로그인 영역 -->
          <?php 
            if(isset($_SESSION['shop_logon'])){
              if($shop_logon[0]=='admin'){
                echo '
                  <li><a href="#none" title="재고관리">재고관리</a></li>
                  <li><a href="#none" title="구매관리">구매관리</a></li>
                  <li><a href="#none" title="유저정보확인">유저정보확인</a></li>
                  <li><a href="./login.php?logout=ok" title="로그아웃">로그아웃</a></li>
                  ';
                } else {
              echo '
              <li><a href="#none" title="마이페이지">마이페이지</a></li>
              <li><a href="#none" title="회원정보수정">회원정보수정</a></li>
              <li><a href="./login.php?logout=ok" title="로그아웃">로그아웃</a></li>
              ';}
            } else {
              echo '
              <li><a href="#none" title="비회원 주문확인">비회원 주문확인</a></li>
              <li><a href="./login.php" title="로그인">로그인</a></li>
              <li><a href="./new_member.php" title="회원가입">회원가입</a></li>
              ';
            }
          ?>
        </ul>
      </nav>

      <!-- 하단 유저정보 영역 -->
      <div class="h-sub-menu-wrap">

        <!-- 유저 프로필 -->
        <div class="h-lnb-user-wrap">
          <!-- 프로필 이미지  -->
          <?php
            if(isset($_SESSION['shop_logon'])){
              if($shop_logon[0]=='admin'){
              echo '
              <img src="./img/admin_profile.jpg" alt="프로필" class="h-lnb-user_profile">
                ';
              }else{
              if($row[1] == ''){
                echo '
                <img src="./img/profile/defaultprofile.png" alt="프로필" class="h-lnb-user_profile">
                ';
              }else{
                echo '<img src="./img/profile/' . $row[1] . '"
              alt="프로필" class="h-lnb-user_profile">';
              }
            }
            } else {
              echo '
              <img src="./img/profile/defaultprofile.png" alt="프로필" class="h-lnb-user_profile">
              ';
            }
          ?>

          <!-- 유저 정보 -->
          <div class="h-lnb-name-wrap">
            <span class="h-lnb-user_class">
              <!-- 유저 분류  -->
              <?php
                if(isset($_SESSION['shop_logon'])){
                  if($shop_logon[0]=='admin'){
                    echo '
                      Admin
                      ';
                    } else {
                      echo 'Customer';
                    }
                  } else {
                    echo 'Guest';
                  }
              ?>
            </span>

            <!-- 유저네임 -->
            <span class="h-lnb-user_name">
              <?php
                if(isset($_SESSION['shop_logon'])){
                  if($shop_logon[0]=='admin'){
                    echo '
                      Admin
                      ';
                    } else {
                      echo $shop_logon[0];
                    }
                  } else {
                    echo 'Guest';
                  }
              ?>
            </span>  
          </div>
        </div>

        <!-- 모바일 메뉴 바로가기 -->
        <div class="h-lnb-mobile-gnb">
          <p class="h-lnb-title">메뉴 바로가기 <img src="./img/down_btn.svg" alt="더보기" class="h-lnb-title-arrow"></p>
          <nav class="h-mobile-gnb">
            <ul>
              <li><a href="#none" title="TV">TV</a></li>
              <li><a href="#none" title="스피커">스피커</a></li>
              <li><a href="#none" title="헤드폰/이어폰">헤드폰/이어폰</a></li>
              <li><a href="#none" title="사운드바">사운드바</a></li>
              <li><a href="#none" title="브랜드">브랜드</a></li>
            </ul>
          </nav>
        </div>  

        <!-- 정품인증 -->
        <div class="h-lnb-my_bao">

          <!-- 관리자일 경우 -->
          <?php
            if(isset($_SESSION['shop_logon'])){
            if($shop_logon[0]=='admin'){
            echo '
            <span class="h-lnb-title">정품등록 확인<img src="./img/down_btn.svg" alt="더보기" class="h-lnb-title-arrow"></span>
            <span class="h-lnb-genuine">리스트</span>
              <ul class="h-my_bao-list">
                <li class="h-my_bao-not">
                <a href="./genuie.php" title="제품등록"   class="more">제품등록 확인</a>
                </li>
              </ul>
              ';
            } else {
          ?>

          <!-- 일반 유저일 경우 -->
          <span class="h-lnb-title">
            나의 B&O<img src="./img/down_btn.svg" alt="더보기" class="h-lnb-title-arrow">
          </span>
          <span class="h-lnb-genuine">정품등록</span>

            <!-- 정품 리스트 시작 -->
            <ul class="h-my_bao-list">
              <!-- 정품인증 리스트 -->
              <?php
                if(isset($_SESSION['shop_logon'])){
                    if($row[2] == null){
                      echo '
                      <li class="h-my_bao-not">
                        <a href="./genuie.php" title="제품등록" class="more">등록된 제품이 없습니다.</a>
                      </li>
                      ';
                    }else{
                      $genuie = explode(',', $row[2]);
                      for($i=0; $i<count($genuie); $i++){
                        echo '
                        <li class="h-my_bao-item">
                          <a href="#none" title="정품">
                            <img src="./img/title/' . $genuie[$i] . '.png" alt="정품" class="h-my_bao-item_img">
                          </a>
                        </li>
                        ';
                      }
                    }
                  }
                ?>
            </ul>

          <?php }
            } else {
              echo '
              <span class="h-lnb-title">
                나의 B&O<img src="./img/down_btn.svg" alt="더보기" class="h-lnb-title-arrow">
              </span>
              <span class="h-lnb-genuine">정품등록</span>
              <ul class="h-my_bao-list">
                <li class="h-my_bao-not">
                  <a href="./login.php" title="로그인" class="more">비회원입니다. 로그인 해주세요</a>
                </li>
              </ul>
              ';
            }
          ?>
        </div>
        <div class="h-lnb-mybuy">
          <span class="h-lnb-title">최근 구매내역<img src="./img/down_btn.svg" alt="더보기" class="h-lnb-title-arrow"></span>
          <ul class="h-mybuy-list">

            <!-- 구매내역 확인 -->
            <?php
              if(isset($_SESSION['shop_logon'])){
                echo '
                  <li class="h-mybuy-item">
                    <a href="#none" title="정품">
                      <img src="./img/title04.png" alt="1">
                      <span class="h-mybuy-title">H95 Limited Edition</span> 
                      <span class="h-mybuy-value">1</span> 
                      <span class="h-mybuy-price">1,245,000</span> 
                    </a>
                  </li>
                  <li class="h-mybuy-item">
                    <a href="#none" title="정품">
                      <img src="./img/title04.png" alt="1">
                      <span class="h-mybuy-title">H95 Limited Edition</span> 
                      <span class="h-mybuy-value">1</span> 
                      <span class="h-mybuy-price">1,245,000</span> 
                    </a>
                  </li>
                  <li class="h-mybuy-item">
                    <a href="#none" title="정품">
                      <img src="./img/title04.png" alt="1">
                      <span class="h-mybuy-title">H95 Limited Edition</span> 
                      <span class="h-mybuy-value">1</span> 
                      <span class="h-mybuy-price">1,245,000</span> 
                    </a>
                  </li>
                  <li class="h-mybuy-item">
                    <a href="#none" title="정품">
                      <img src="./img/title04.png" alt="1">
                      <span class="h-mybuy-title">H95 Limited Edition</span> 
                      <span class="h-mybuy-value">1</span> 
                      <span class="h-mybuy-price">1,245,000</span> 
                    </a>
                  </li>
                  <li class="h-mybuy-more">
                    <a href="#none" title="정품" class="more">더 보기</a>
                  </li>
                ';
                if($shop_logon[0]=='admin'){
                echo '
                <li> 관리자 계정입니다. </li>
                  ';
                }
              } else {
                echo '
                <li class="h-mybuy-none"> 비회원 주문 조회로 바로 가기 </li>
                ';
              }
            ?>

          </ul>
        </div>
        <div class="h-lnb-cartlist">
          <span class="h-lnb-title">장바구니 <img src="./img/down_btn.svg" alt="더보기" class="h-lnb-title-arrow"></span>
          <ul class="h-cartlist-list">
            
            
            <!-- 세션으로 장바구니 확인 -->
            <?php
                if ($_SESSION['cart'] == null ){
                  echo '
                  <li class="h-cartlist-item">
                    <a href="#none" title="정품" class="more" style="display:block; text-align:center;">장바구니 내역이 없습니다.</a>
                  </li>
                  ';
                } else {
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
                  }

                  echo '
                  <li class="h-cartlist-item Total">
                    <a href="cart.php">
                      <span class="h-cartlist-picture">Total</span> 
                      <span class="h-cartlist-title"></span> 
                      <span class="h-cartlist-value">' . $totalQuantity .'</span> 
                      <span class="h-cartlist-price">' . $total .'</span> 
                    </a>
                  </li>
                  <li class="h-mybuy-more">
                    <a href="#none" title="정품" class="more">더 보기</a>
                  </li>
                  ';
                }
            ?>

            
          </ul>
        </div>
      </div>

      <!-- 문의 -->
      <div class="h-lnb-inquiry">
        <?php 
          if(isset($_SESSION['shop_logon'])){
            if($shop_logon[0]=='admin'){
              echo '
                <a href="#" title="나의 문의">문의 확인</a>
                <a href="#" title="나의 문의">답변 확인</a>
              ';
              } else {
                echo '
                <a href="#" title="나의 문의">나의 문의</a>
                <a href="#" title="나의 문의">문의하기</a>
              ';
              }
            } else {
              echo '
                <a href="#" title="나의 문의">나의 문의</a>
                <a href="#" title="나의 문의">문의하기</a>
              ';
            }
        ?>
      </div>
      <div class="h-sub-bg">&nbsp;</div>
    </div>

    <!-- 검색창 -->
    <div class="h-search-box">
      <div class="h-search-wrap">
        <div class="h-search">
          <form action="./search.php" name="search" method="get">
            <fieldset>
              <legend>검색</legend>
              <input type="text" name="search" id="search" placeholder="검색어를 입력해주세요">
              <button type="submit" class="h-search-btn"><img src="./img/search.svg" alt="검색"></button>
              <button type="button" class="h-search-close"><img src="./img/close.svg" alt="닫기" class="close-icon"></button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>  
  </header>