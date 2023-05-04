<?php


include('lib.php');

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
include('header.php');

$search = $_GET['search'];
if ($search == '스피커'){
  $search = 'speaker';
} else if ($search == '사운드바'){
  $search = 'soundbar';
} else if ($search == '헤드폰'){
  $search = 'headphone';
} else if ($search == '티비'){
  $search = 'TV';
} else if ($search == '이어폰'){
  $search = 'earphone';
}
$search = mysqli_real_escape_string($conn, $search);

$itemSQL = "SELECT goods_code, goods_name, goods_explain FROM goods_tab WHERE goods_code LIKE ? OR goods_name LIKE ? OR goods_explain LIKE ?";
$stmt = mysqli_prepare($conn, $itemSQL);
$searchParam = "%" . $search . "%";
mysqli_stmt_bind_param($stmt, "sss", $searchParam, $searchParam, $searchParam);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<?php
while ($row = mysqli_fetch_row($result)) {
  foreach ($row as $res) {
    echo '<p><a href="">' . $res . '</a></p>'; 
  }
} 

if (mysqli_num_rows($result) === 0){
echo '<p>검색결과가 존재하지 않습니다.</p>';
}
?>