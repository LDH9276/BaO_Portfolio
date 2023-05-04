
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

  <!-- index css -->
  <link rel="stylesheet" href="./css/login.css">

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
  include 'header.php';
  include 'lib.php';
  
  $mem_id = isset($mem_id) ? $mem_id : "";
  $logout = isset($logout) ? $logout : "";
  $mem_pass = isset($mem_pass) ? $mem_pass : "";

  // if(session_is_registered('shop_logon'))  registered함수는 php5.4부터 삭제됨
  //로그인 되었는지 확인
  if (isset($_SESSION['shop_logon']))
  {
    //로그아웃을 선택하면 아래 내용 실행
    if($logout=='ok')
      {
        //세션을 해제한다.
        unset($_SESSION['shop_logon']);
        unset($_SESSION['cart']);
        echo('
        <script>
          alert("로그아웃 되셨습니다.");
          location.href = history.back();
        </script>
        ');
      }
      //로그인된 회원인 경우에 실행
      else
    {
      echo("
        <p>
          <b>".$_SESSION['shop_logon'][1]."</b>님 환영합니다.<br>
          <a href='./login.php?logout=ok' title='로그아웃'>로그아웃</a>
        </p>
      ");
    }
  }
  //아이디와 패스워드 입력확인하기
  else if(($mem_id=="") || ($mem_pass=="")){
    echo('
    <main>
    <section class="login">

      <form name="login" method="post" action="./login.php">
        <div class="login-wrap">
          <img src="./img/logo.svg" alt="로고" class="login-logo">
          <h2>로그인</h2>
          <p class="login-id-form">
            <label for="mem_id">아이디</label>
            <input type="text" name="mem_id" id="mem_id" placeholder="아이디를 입력해주세요">
          </p>
          <p class="login-pw-form">
            <label for="mem_pass">비밀번호</label>
            <input type="password" name="mem_pass" id="mem_pass" placeholder="비밀번호를 입력해주세요">
          </p>
  
          <p class="find-my-id">
            아이디 | 비밀번호 찾기
          </p>
  
          <p>
            <button type="submit" class="login-btn">로그인</button>
          </p>
          <p>
            B&O에 처음이신가요? <br>
            <a href="#" title="회원가입하기" class="join-btn">회원가입하기</a>
          </p>
          
        </div>
      </form>


    </section>

  </main>
    ');
  }
    // 회원 로그인 확인
  else{
    // $conn=mysqli_connect('localhost','root','root');
    // $db_status=mysqli_select_db('shoppingmall');
    

    $query = "select mem_id, mem_name, mem_password from member_tab where mem_id='$mem_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $dbpass = $row[2];

    if($row[0]==''){
      echo('
        <script>
          window.alert("아이디와 비밀번호를 확인하세요");
          history.go(-1);
        </script>
      ');
    } else if(!password_verify($mem_pass, $dbpass)){
      echo('
        <script>
          window.alert("비밀번호가 일치하지 않습니다.");
          history.go(-1);
        </script>
      ');} else{
      // 세션이 설정되지 않았으면 설정함.
      if(!isset($_SESSION['shop_logon'])){
        // $_SESSION['shop_logon'] = $row[0];
        $_SESSION['shop_logon']=array($row[0], $row[1]);
    }echo('
      <script>
        location.href = "./index.php"
      </script>
    ');
    }
  }
  include ('footer.php');
?>