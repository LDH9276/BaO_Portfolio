<?php

include_once('./lib.php');

?>

<html>
 <head>
  <?php 
  #--------- 홈페이지 디자인 적용 ----------#
  include("./style.php");
  ?>
 </head>
 <body>
  <br><p>상품 목록</p>
  <table>
   <tr>
    <td colspan="6">
    <form action="product_list.php" method="post" name="search_form">
     <select name="search_item">
      <option value="goods_name">제품명</option>
      <option value="goods_country">원산지</option>
     </select>

     <input type="text" name="search_text">
     <input type="submit" value="찾기">
    </form>
    </td>
   </tr>
   <tr>
    <td>그림</td>
    <td>제품명</td>
    <td>원산지</td>
    <td>가격</td>
    <td>수량</td>
    <td>장바구니</td>
   </tr>
   <?php 
    
    #------ 검색 조건이 있는지 확인하고 검색 조건에 맞는 상품 검색 -------#
    if((trim($search_item) == "") || (trim($search_text) == "")) {
     $query = "select goods_id, goods_name, goods_country, goods_price, goods_image from goods_tab order by goods_date desc, goods_name asc"; 
    } else {
     $qeury = "select goods_id, goods_name, goods_country, goods_price, goods_image from goods_tab where $search_item like '%$search_text%' order by goods_date desc, goods_name asc";

    }

    $result = mysqli_query($conn, $query);

    //페이지를 나타내기 위한 환경변수
    
    $total_row = mysqli_num_rows($result);
    $PAGE_LINE = 5;
    $LINK_NUM = 2;
    $total_page = (int)(($total_row -1) / $PAGE_LINE) + 1;
    
    //검색된 상품이 있으면 화면에 보여줄 상품 선택
    
    
    if($total_row > 0) {
      if(($page_num == "") || ($page_num < 1) || ($page_num > $total_page))
        $page_num = 1;
      $go_page = ($page_num - 1) * $PAGE_LINE;
      $i = 0;
      mysqli_data_seek($result, $go_page);
    }
    
    //검색된 상품이 있으면 화면에 보여준다
    while( $row = mysqli_fetch_row($result) ) {
      //한 페이지에 들어갈 상품만큼만 선택
      if($i >= $PAGE_LINE )
        break;
      $i++;
    
    ?>
    
      <form name="insert_form" method="post" action="./cart.php?code=insert">
      <tr>
        <td><a href="javascript:var detailview = window.open('./detail.php?goods_id=<?=$row[0]?>', 'detail', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=580,height=500' );">
    <?PHP
        //상품에 대한 그림이 있는지를 확인한다
        if(trim($row[4]) == "" )
          echo("그림없음");
          else
            echo("<img src='./file/$row[4]'> ");
    ?>
    
    </a>
    </td>
    
    <td>&nbsp;
      <a href="javascript:var detailview = window.open('./detail.php?goods_id=<?=$row[0]?>','detail','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=580,height=500');"><?=$row[1]?></a>
    </td>
    <td>&nbsp;<?=$row[2]?></td>
    <td><?=$row[3]?>원&nbsp;</td>
    <td>
      <select name="amount">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      <input type="hidden" name="id" value="<?=$row[0]?>">
      <input type="hidden" name="name" value="<?=$row[1]?>">
      <input type="hidden" name="price" value="<?=$row[3]?>">
    </td>
    <td>
      <input type="submit" name="submit" value="추가">

      <?php
    #-----관리자인 경우에만 아래 링크를 활성화 시킨다-----#
    if($shop_logon[0] == "admin") {
      echo "<br><a href='./goods_update.php?goods_id=$row[0]'>수정</a>";
      echo "<br><a href='./goods_delete.php?goods_id=$row[0]&image=$row[4]'>삭제</a>";
    }
    ?>
        </td>
      </tr>
    </form>
    <?php
      }
    ?>
    <tr>
    <td colspan="6" >
      <?php
      #-----페이지 링크에 대한 루틴-----#
      if($total_row > 0) {
        echo "<br><br><a href='./product_list.php?page_num=1&search_item=$search_item&search_text=$search_text'><<</a>&nbsp;&nbsp;";
        $i = $page_num - $LINK_NUM;
        if($i < 1) {
          $j = $page_num + $LINK_NUM - $i + 1;
          if($j > $total_page) {
            $j = $total_page;
          }
          $i = 1;
        } else {
          $j = $page_num + $LINK_NUM;
          if($j > $total_page) {
            $i = $i + $total_page - $j;
            if($i < 1) {
              $i = 1;
            }
            $j = $total_page;
          }
        }

        for($i=1; $i <= $j; $i++) {
          if($i == $page_num) {
            echo "<a href='./product_list.php?page_num$i&search_item=$search_item&search_text=$search_text'><b>$i</b></a>&nbsp;";
          } else {
            echo "<a href='./product_list.php?page_num$i&search_item=$search_item&search_text=$search_text'>$i</a>&nbsp;";
          }
          echo "&nbsp;<a href='./product_list.php?page_num=$total_page&search_item=$search_item&search_text=$search_text>>></a>'";
        }
      }
      ?>
        </td>
      </tr>
    </table>
  </body>
</html>