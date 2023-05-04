  <!-- 헤더 영역 -->
  <?php
  include ('lib.php');

  $id = $_GET['id'];
  $productSQL = "select * from goods_tab where goods_id = $id";
  $query = mysqli_query($conn, $productSQL);

  while ($row = mysqli_fetch_assoc($query)) {
    $product_list = $row['goods_code'];
    $product_name = $row['goods_name'];
    $product_title = $row['goods_explain'];
    $product_image = $row['goods_image'];
    $price = $row['goods_price'];
    $product_slide = $row['goods_about'];
    $slide = explode(',', $product_slide);
    $slide = array_map('trim', $slide);  



  }
  ?>

<!DOCTYPE html>
  <html lang="ko">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B&O 포트폴리오</title>
    <!-- reset css -->
    <link rel="stylesheet" href="./css/reset.css">

    <!-- common css -->
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/common.css">

    <!-- list css -->
    <link rel="stylesheet" href="./css/list.css">

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


  <!-- 시작 -->

    <?php include ('header.php'); ?>

    <main>
      <div class="dark-bg">&nbsp;</div>
      <section id="index">
        <h2>B&O 상품</h2>
        <article id="item-img">
          <h2>상품</h2>
          <img src="./productimg/<?=$product_image?>" alt="<?=$product_name?>" class="item-about">
          <div class="slide">
            <div class="swiper slide-banner">
              <div class="swiper-wrapper">
                <?php
                  if($product_slide == null){
                    echo '
                    <div class="swiper-slide">
                      <img src="./productimg/' . $product_image . '" alt="' . $product_name . '">
                    </div>
                    ';
                    } else {
                      foreach($slide as $value){
                        echo '
                        <div class="swiper-slide">
                          <img src="./productimg/about/' . $value . '" alt="' . $product_name . '">
                        </div>
                        ';
                      }
                    }
                ?>
              </div>
            </div>
            <div class="slide-btn-wrap">
              <img src="./img/btn-left.svg" alt="이전버튼" class="list-slide-prev">
              <img src="./img/btn-right.svg" alt="다음버튼" class="list-slide-next">
            </div>
          </div>
        </article>

        <article id="item-index">
          <div class="item-index-textbox">
            <p class="index-subtitle"><?=$product_list?></p>
            <h3 class="index-title"><?=$product_name?></h3>
            <p class="index-info"><?=$product_title?></p>
          </div>

          <div class="item-index-gallery">
            <div class="swiper slide-banner">
              <div class="swiper-wrapper">
                <?php
                  if($product_slide == null){
                    echo '
                    <div style = "display:none">
                    </div>
                    ';
                    } else {
                      foreach($slide as $value){
                        echo '
                        <div class="swiper-slide">
                          <img src="./productimg/about/' . $value . '" alt="' . $product_name . '">
                        </div>';
                      }
                    }
                ?>

              </div>
            </div>
            <div class="slide-btn-wrap">
              <img src="./img/btn-left.svg" alt="이전버튼" class="list-slide-prev">
              <img src="./img/btn-right.svg" alt="다음버튼" class="list-slide-next">
            </div>
          </div>
          <div class="item-index-order">
            <p class="item-price"> 
              <?php
                  if($price == null){
                    echo '
                    
                    <span class="item-order-price">출시예정</span>
                    ';
                  } else {
                    echo'
                    <span class="item-order-price">' . $price . '</span> 
                    <span class="item-order-won">원</span> 
                    ';
                  }
              ?>

            </p>

            <script>
            function addToCart() {
                const price = document.querySelector(".item-order-price").textContent;
                if (price.indexOf("출시예정") > -1){
                  alert('출시예정입니다.');
                  return;
                } else {
                // 인풋의 밸류를 가져온다
                const quantity = document.getElementById("quantity").value;

                // 주소를 다음으로 설정한다
                const url = "cartlist.php?mode=add&insert=<?=$id?>&value=" + quantity;

                // 다음으로 이동한다
                window.location.href = url;
                }
              }
            </script>
            <p class="item-order-btn">
              <input type="number" id="quantity" value="1">
              <a href="#" onclick="addToCart()" title="Add to Cart" class="order-btn">Add to Cart</a>
            </p>
          </div>
  
        </article>
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