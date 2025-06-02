<?php 
  include('./sub/header.php')
?>
<link rel="stylesheet" href="./css/qna.css" type="text/css">

<main>
  <div class="sub_top">
    <nav>홈 &gt; 고객지원 &gt; <b>1:1문의</b></nav>
    <h2>구매 상담 신청</h2>
    <p>캐스퍼에 대해 궁금한 것이 있으시다면 상담을 신청해주세요.<br>전문 상담사가 캐스퍼 차량 구매 정보를 신속하고 정확하게 알려드립니다.</p>
  </div>
  <section class="online_qna">
    <h2>온라인 문의하기</h2>
    <form action="./sub/send.php" name="qna" method="post" onsubmit="return form_check()">
      <fieldset>
        <legend>온라인 문의</legend>
        <p class="field">
          <label for="subject">제목 &#42;</label>
          <input type="text" name="subject" id="subject" placeholder="제목을 입력하세요" required>
        </p>

        <p class="field">
          <label for="name">성명 &#42;</label>
          <input type="text" name="name" id="name" placeholder="이름을 입력하세요" required maxlength="5">
        </p>

        <p class="field">
          <label for="email">이메일 &#42;</label>
          <input type="email" name="email" id="email" placeholder="id@domain" required>
        </p>

        <p class="field">
          <label for="mb_type">문의유형 &#42;</label>
          <select name="mb_type" id="mb_type">
            <option value="">선택해주세요</option>
            <option value="차량/모델 선택">차량/모델 선택</option>
            <option value="구매 절차(계약/결제/인수/등록">구매 절차(계약/결제/인수/등록)</option>
            <option value="구매혜택/이벤트">구매혜택/이벤트</option>
            <option value="홈페이지 이용">홈페이지 이용</option>
            <option value="기타">기타</option>
          </select>
        </p>

        <p class="field">
          <label for="msg">문의 내용 &#42;</label>
          <div class="count_box">
            (<input type="text" name="txtLen" size="3" maxlength="3" value="500" readonly class="count">/500)
            글자가 남았습니다.
          </div>
        </p>
        <textarea name="msg" rows=
        "3" id="msg" onkeydown="txtCount(this.form.msg, this.form.txtLen, 500);" onkeyup="txtCount(this.form.msg, this.form.txtLen, 500);"></textarea>

        <div class="agree">
          <div class="privacy">
            <span>(필수) 개인정보 수집 및 이용 동의</span>
            <input type="radio" name="a" value="r01" id="r01">
            <label for="r01">동의함</label>
            <input type="radio" name="a" value="r02" id="r02">
            <label for="r02">동의안함</label>
            <i class="fas fa-angle-down"></i>
          </div>

          <div class="con">
            <p>(필수) 개인정보 수집 및 이용 동의</p>
            <ol>
              <li>수집·이용하는 개인 정보의 항목 : [필수] 성명, 휴대폰번호, 연계 정보(CI), 문의 내용, 상담을 통해 생성된 정보</li>
              <li>개인정보 수집·이용 목적 : 상담 신청 고객관리, 차량 구매 관련 상담 및 문의 대응, 고지사항 전달, 고객 요청 정보 제공(카탈로그, 견적서 등) 등</li>
              <li>개인정보 보유 및 이용기간 : 정보 수집 직후 1년 간 보유 및 이용 후 파기</li>
            </ol>
            <p>&#x203B; 개인정보 수집 및 이용에 동의할 경우, 구매상담을 위해 전문 상담사가 연락을 드릴 예정입니다.</p>
            <p>&#x203B; 개인정보 수집 및 이용에 동의를 하지 않을 경우, 구매상담에 제한을 받을 수 있습니다.</p>
            <p>본인은 현대자동차가 상기와 같이 본인의 개인정보를 수집·이용하는 것에 대하여 동의합니다.</p>
          </div>
        </div>

        <div id="btn_g">
          <input type="reset" value="취소">
          <input type="submit" value="등록">
        </div>
      </fieldset>
    </form>
  </section>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
  // 유효성 검사 함수
  function form_check() { //submit 최종 폼 체크
    if(!document.getElementById('mb_type').value) { //문의유형을 선택하지 않은 경우라면
      alert("문의 유형을 선택해야 합니다."); //메세지 띄우고
      mb_type.focus(); //다시 문의유형 폼으로 초점을 맞춘다.
      return false; //실행 중지
    }

    // 2번째 라디오버튼(동의안함)을 선택 안 한 경우라면
    if($('input[name="a"]:checked').val() == "r02") {
      alert('개인정보 수집 및 이용약관 동의가 필요합니다.');
      $('input[name="a"]').focus(); //커서를 라디오 버튼에 위치
      return false; //종료 = 되돌아감
    }
    return false(); //그렇지 않은 경우면 실행
  }

  // 글자수 체크하는 함수
  // 텍스트 박스에 키보드 키를 누르고 글자를 입력하면 아래 txtCount함수가 호출되어 실행되도록 한다.
  // 3개의 변수값을 전달받아 함수에 대입(textarea이름, input박스의 이름, 최대 글자수 500)
  function txtCount(msg, txtLen, maxlimit){
    // 만약 텍스트 박스에 입력한 글자의 최대 개수가 500자보다 크면 
    if(msg.value.length > maxlimit) {
      // 글자개수 0에서 500글자 범위 내에서 글자를 출력한다.
      msg.value = msg.value.substing(0, maxlimit);
    } else { // 그렇지 않으면
      // 125자에서 글자개수를 뺀 값을 변수에 넣어서 출력한다.
      txtLen.value = maxlimit - msg.value.length;
    }
  }

  $(document).ready(function() {
    // 약관내용의 아래방향 버튼을 클릭시
    $('.con').hide();
    $('.privacy i.fa-angle-down').click(function() {
      if($(this).attr('class') == 'fas fa-angle-down') { //클래스가 맞다면
        $(this).attr('class', 'fas fa-angle-up'); //아이콘 방향을 반대로 변경
        $('.con').show(); //약관내용이 보이게 하고
      } else { //그렇지 않으면
        $('.con').hide(); //약관내용이 숨겨지게 한다.
        $(this).attr('class', 'fas fa-angle-down'); //아이콘 방향은 원래대로 전환
      }
    });
  });
</script>

<?php 
  include('./sub/footer.php')
?>