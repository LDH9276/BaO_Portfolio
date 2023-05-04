<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/join.css">
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/base.css">
  <link rel="stylesheet" href="./css/common.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./script/common.js" defer></script>
  <title>B&O 회원가입</title>
</head>
<body>
  
</body>
</html>

<?php 
if(!isset($_SESSION['shop_logon'])){
  if(isset($_POST['pass']) && ($_POST['pass']=='ok')){
    // 회원가입을 확인하는 내용
    include_once('./new_confirm.php');
  }else{
    //회원가입 초기화면.
    include 'header.php';
    include_once('./new_init.php');
    include 'footer.php';
  }
}
?>
