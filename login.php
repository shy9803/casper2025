<?php 
  include('./sub/header.php');
?>
<link rel="stylesheet" href="./css/login.css" type="text/css">

  <section id="login_form">
    <h2>로그인</h2>
    <form action="login_update.php" method="post" name="login">
      <fieldset>
        <legend>로그인</legend>
        <div class="id_sec">
          <label for="log_id"></label>
          <input type="text" id="log_id" placeholder="아이디를 입력해주세요" required maxlength="15">
        </div>
        <div class="pw_sec">
          <label for="log_pw"></label>
          <input type="password" id="log_pw" placeholder="비밀번호를 입력해주세요" required maxlength="15">
        </div>
        <div class="id_save_sec">
          <input type="checkbox" name="id_save" id="id_save">
          <label for="id_save">아이디 저장</label>
        </div>
        <input type="submit" value="로그인">
        <div class="search_sec">
          <a href="#" title="아이디 찾기">아이디 찾기</a>
          <a href="#" title="비밀번호 찾기">비밀번호 찾기</a>
          <a href="register.php" title="회원가입">회원가입</a>
        </div>
      </fieldset>
    </form>
  </section>

<?php 
  include('./sub/footer.php');
?>
