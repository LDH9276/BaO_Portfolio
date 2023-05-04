<?php
    echo('
    <head>
    <link rel="stylesheet" href="./css/join.css">
    </head>
      <main>
      <section class="join">
        <div class="join-container">
          <img src="./img/join_main.webp" alt="회원가입" class="join-img">
          <div class="join-wrap">
            <h2>회원가입</h2>
            <p>아래 폼을 작성하셔서 가입을 완료해 주세요.</p>
            <form name="join" method="post" action="new_member.php">
              <fieldset>
                <legend>로그인 정보</legend>
                <p class="join-id-form">
                  <label for="mem_id">아이디</label>
                  <input type="text" name="mem_id" size="22" maxlength="16" value="" id="mem_id">
                </p>
      
                <p class="join-pw-form">
                  <label>패스워드 </label>
                  <input type="password" name="mem_pass" size="22" maxlength="22" value="">
                </p>
      
                <p class="join-pwcheck-form">
                  <label>패스워드 확인 </label>
                  <input type="password" name="mem_pass2" size="22" maxlength="22" value="">
                </p>
      
                <p class="join-email-form">
                  <label>기본 메일 주소 </label>
                  <input type="text" name="mem_email" size="22" maxlength="64" value="">
                </p>
      
                <p class="join-name-form">
                  <label>이름 </label>
                  <input type="text" name="mem_name" size="22" maxlength="32" value="">
                </p>
      
                <p class="join-zip-form">
                  <label>우편번호</label>
                  <input type="text" name="mem_zip1" size="3" maxlength="3" value="">
                  <span class="join-span">-</span>
                  <input type="text" name="mem_zip2" size="3" maxlength="3" value="">
                  
                </p>
      
                <p class="join-address-form">
                  <label>주소</label>
                    <input type="text" name="mem_address" size="34" maxlength="128" value="">
                </p>
      
                <p class="join-tel-form">
                  <label>전화번호 </label>
                  <input type="text" name="mem_tel1" size="4" maxlength="4" value="" class="">
                  <span class="join-span">-</span>
                  <input type="text" name="mem_tel2" size="4" maxlength="4" value="">
                  <span class="join-span">-</span>
                  <input type="text" name="mem_tel3" size="4" maxlength="4" value="">
                </p>
  
                <div class="join-check-confirm">
                  <div class="check">
                    <input type="checkbox" id="check1">
                    <label for="check1">이용약관에 동의합니다.</label>
                  </div>
                  <div class="check">
                    <input type="checkbox" id="check2">
                    <label for="check2">마케팅활용에 대한 정보제공에 동의합니다.</label>
                  </div>
                </div>
      
                <div class="join-btn-form">
                    <button type="reset" class="join-btn reset">다시쓰기</button>
                    <button type="submit" class="join-btn submit">가입하기</button>
                </div>
                <input type="hidden" name="pass" value="ok">
              </fieldset>
            </form>
          </div>
        </div>
      </section>
    </main>
      </body>
      </html>
      ');
?>