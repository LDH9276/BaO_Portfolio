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
  <link rel="stylesheet" href="./css/modal.css">

  <!-- index css -->
  <link rel="stylesheet" href="./css/main.css">

  <!-- swiper slide -->
  <link rel="stylesheet" href="./css/swiper.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- js -->
  <script src="./script/common.js" defer></script>
  <script src="./script/main.js" defer></script>

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>

<?php
  include_once('notice.php');
?>

<?php 
  include('header.php'); 
?>

<main>
    <section id="banner">
      <div class="banner-bg"><h2>뱅앤울룹슨 메인페이지</h2></div>
      <article id="banner-wrap">
        <h3 style="opacity: 0;">뱅앤울룹슨 메인제품</h3>
        <div class="banner-list">
            <figure>
              <a href="#none" title="item1">
                <img src="./img/main01.png" alt="메인이미지">
              </a>
              <figcaption>
                <a href="#none" title="item4">
                  <span>뱅앤올룹슨 스피커</span>
                  <span>Beosound Emerge는 전에는 상상할 수 없었던 곳으로 음악을 가져갑니다. 우아하고 매우 슬림한 이 스피커는 침실의 책장부터 주방의 좁은 모서리까지 모든 것에 어울립니다.</span>
                </a>
              </figcaption>
            </figure>
            <figure>
              <a href="#none" title="item2">
                <img src="./img/main02.png" alt="메인이미지">
              </a>              
              <figcaption>
                <a href="#none" title="item4">
                  <span>뱅앤올룹슨 스피커</span>
                  <span>우아하고 매우 슬림한 이 스피커는 침실의 책장부터 주방의 좁은 모서리까지 모든 것에 어울립니다.</span>
                </a>
              </figcaption>
            </figure>
            <figure>
              <a href="#none" title="item3">
                <img src="./img/main03.png" alt="메인이미지">
              </a>              
              <figcaption>
                <a href="#none" title="item4">
                  <span>뱅앤올룹슨 스피커</span>
                  <span>Beosound Emerge는 전에는 상상할 수 없었던 곳으로 음악을 가져갑니다.</span>
                </a>
              </figcaption>
            </figure>
            <figure>
              <a href="#none" title="item4">
                <img src="./img/main04.png" alt="메인이미지">
              </a>              
              <figcaption>
                <a href="#none" title="item4">
                  <span>BeoSound EX</span>
                  <span>우아하고 매우 슬림한 이 스피커는 침실의 책장부터 주방의 좁은 모서리까지 모든 것에 어울립니다.</span>
                </a>
              </figcaption>
            </figure>
        </div>

      </article>

    </section>

    <section id="lineup-list">
      <p class="m-title-sub">
        since. 1925
      </p>
      <h2 class="m-title">
        자유롭게 느껴보세요
      </h2>
      <div class="swiper lineup-list">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="./img/title01.png" alt="`">
            <span>TV</span>
            <span class="lineup-list-bar">&nbsp;</span>
          </div>
          <div class="swiper-slide">
            <img src="./img/title02.png" alt="2">
            <span>스피커</span>
            <span class="lineup-list-bar">&nbsp;</span>
          </div>
          <div class="swiper-slide">
            <img src="./img/title03.png" alt="3">
            <span>사운드바</span>
            <span class="lineup-list-bar">&nbsp;</span>
          </div>
          <div class="swiper-slide">
            <img src="./img/title04.png" alt="4">
            <span>헤드폰</span>
            <span class="lineup-list-bar">&nbsp;</span>
          </div>
          <div class="swiper-slide">
            <img src="./img/title05.png" alt="5">
            <span>이어폰</span>
            <span class="lineup-list-bar">&nbsp;</span>
          </div>
        </div>
      </div>
      <div class="lineup-pagination"></div>
      <div class="lineup-list-btn-wrap">
        <img src="./img/btn-left.svg" alt="이전버튼" class="line_up-banner-prev">
        <img src="./img/btn-right.svg" alt="다음버튼" class="line_up-banner-next">  
      </div>
    </section>

    <section id="slide-banner">
      <h2>뱅앤올룹슨 새 상품</h2>
      <div class="swiper slide-banner">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="#none" title="A9">
              <div class="slide-title-wrap">
                <p class="slide-subtitle">미니멀리즘의 극한</p>
                <p class="slide-title">B&O A9</p>
                <p class="slide-info">베오링크의 커넥트디 사운드 기술을 통한 <br> 멀티룸 사운드에 어울리는 스피커</p>
              </div>
              <img src="./img/slide_banner01.png" alt="1">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="#none" title="beovision">
              <div class="slide-title-wrap">
                <p class="slide-subtitle">미니멀리즘의 극한</p>
                <p class="slide-title">B&O A9</p>
                <p class="slide-info">베오링크의 커넥트디 사운드 기술을 통한 <br> 멀티룸 사운드에 어울리는 스피커</p>
              </div>
              <img src="./img/slide_banner02.png" alt="2">
            </a>
          </div>
        </div>
      </div>
      <div class="slide-btn-wrap">
        <img src="./img/w-btn-left.svg" alt="이전버튼" class="slide-banner-prev">
        <img src="./img/w-btn-right.svg" alt="다음버튼" class="slide-banner-next">
      </div>
      <div class="slide-pagination"></div>


    </section>

    <section id="product">
      <p class="m-title-sub">
        B&O Product
      </p>
      <h2 class="m-title">
        당신을 위한 사운드
      </h2>

      <article id="product-list">
        <h3>제품목록</h3>
        <div class="product-tabbtn-wrap">
          <span class="product-tabbtn-title">카테고리</span>
          <ul class="product-tabbtn">
            <li class="act"><span>TV</span></li>
            <li><span>스피커</span></li>
            <li><span>사운드바</span></li>
            <li><span>헤드폰</span></li>
            <li><span>이어폰</span></li>
          </ul>
          <div class="category-wrap">
            <select name="category" id="product-category">
              <option value="TV">TV</option>
              <option value="speakr">스피커</option>
              <option value="soundbar">사운드바</option>
              <option value="headphone">헤드폰</option>
              <option value="earphones">이어폰</option>
            </select>
            <img src="./img/down_btn.svg" alt="down" class="category-drop">  
          </div>
        </div>

        <ul class="product-tab-item TV act">
          <?php
            include "./index-tabTV.php";
          ?>
        </ul>
        <ul class="product-tab-item speakr">
          <?php
            include "./index-tabSP.php";
          ?>
        </ul>
        <ul class="product-tab-item soundbar">
          <?php
            include "./index-tabSB.php";
          ?>
        </ul>
        <ul class="product-tab-item headphone">
          <?php
            include "./index-tabHP.php";
          ?>
        </ul>
        <ul class="product-tab-item earphones">
          <?php
            include "./index-tabEP.php";
          ?>
        </ul>
      </article>
    </section>

    <section id="shop_info">
      <h2>매장정보 및 문의</h2>
      <article class="shop_info-wrap">
        <div class="shop_info-item">
          <img src="./img/bnoshop.png" alt="매장">
        </div>
        <div class="shop_info-item">
          <p>체험매장 안내</p>
          <h3>가깝고 친절하게</h3>
          <p>매장을 찾아 Bang & Olufsen을 <br>직접 보고 듣고 느껴보세요.</p>
          <a href="#" title="자세히보기">자세히보기<img src="./img/right-btn.svg" alt="자세히보기" class="right-btns"></a>
        </div>
        <div class="shop_info-item">
          <h3>도움이 필요하신가요?</h3>
          <p>제품에 대한 문의는 <br> 여기에 찾아보세요.</p>
          <a href="#" title="자세히보기">B&O지원<img src="./img/right-btn.svg" alt="자세히보기" class="right-btns"></a>
        </div>
        <div class="shop_info-item">
          <h3>연락해주세요</h3>
          <p>B&O의 전문가가 제품의 조언 및 <br> 안내를 해드립니다.</p>
          <a href="#" title="자세히보기">연락처<img src="./img/right-btn.svg" alt="자세히보기" class="right-btns"></a>
        </div>
      </article>
    </section>
  </main>

  <?php
    include ('footer.php');
  ?>