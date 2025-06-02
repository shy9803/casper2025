$(document).ready(function(){
  // 모달 입력
  const modal = `<!-- 모달 -->
  <div id="modal">
    <div class="modal_inner">
      <img src="./images/main_Popup_PC.jpg" alt="메인 팝업">
      
      <input type="checkbox" name="check" id="ch_box">
      <label for="ch_box">일주일간 창 보지 않기</label>
      <input type="button" value="닫기" id="m_btn">
    </div>
  </div>`;

  // index에 모달 입력 위치
  $('body').append(modal); // body 태그 맨 뒤에 배치

  // 변수
  const m_btn = $('#m_btn, #ch_box'); //닫기
  let ch_box = $('#ch_box'); //체크박스(일주일 간 창 보지 않기)

  // 닫기 버튼 클릭시 닫기
  m_btn.click(function() {
    modal_close();
  });

  // 브라우저 쿠키정보에 따른 모달 윈도 띄우기 (있을 경우 안 띄운다.)
  if($.cookie('popup') == 'none') {
    $('#modal').hide();
  }

  // 체크박스 여부에 따른 닫기
  function modal_close() {
    if(ch_box.is(':checked')) {
      $.cookie('popup', 'none', {expires: 7, path: '/'});
      $('#modal').hide();
    } else {
      $('#modal').hide();
    }
  }

});