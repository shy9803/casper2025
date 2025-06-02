/*
  화면이 스크롤 동작시 상단 헤더에 .h_act 적용하기
*/

// 1. 자바스크립트로 구현하기
const h = document.getElementById('header');

// 2. 화면 스크롤 이벤트 = window scroll
/*window.addEventListener('scroll', function() {
  // this.alert('test');
  let sPos = window.scrollY;
  if(sPos > 0) { // 또는 >=1
    h.classList.add('h_act');
  } else {
    h.classList.remove('h_act');
  }
});*/

// 2. 제이쿼리로 구현하기
$(document).ready(function() {
  const h = $('header');

  // 메뉴 변수
  let nav = $('#m_nav > ul > li');

  // 헤더에 마우스 오버시 h_act 적용하기
  h.mouseenter(function() {
    $('header').addClass('h_act');
    $('header h1 img').attr('src', './images/logo-casper_black.png');
  });

  // 헤더에 마우스 아웃시 h_act 제거하기
  h.mouseleave(function() { // 마우스를 빼는 경우
    if($(window).scrollTop() <= 1) {
      $('header').removeClass('h_act');
      $('header h1 img').attr('src', './images/logo-casper-white.png');
    }
  });

  $(window).scroll(function() {
    let sPos = $(this).scrollTop();
    // console.log(sPos);

    if(sPos >= 1) {
      h.addClass('h_act');
      $('header h1 img').attr('src', './images/logo-casper_black.png');
    } else {
      h.removeClass('h_act');
      $('header h1 img').attr('src', './images/logo-casper-white.png');
    }
  });

  /* 원형 내비게이션 클릭시 각 해당 섹션으로 이동 */
  // 메뉴 클릭시 해당 아이디 값을 찾아서 해당 section 영역을 상단으로 scroll
  nav.click(function(e) {
    e.preventDefault(); // 페이지 새로고침 방지
    // alert('test');

    let i = $(this).index();
    // console.log(i); // 몇 번째 li 태그인지 n값을 구해줌.

    /* 방법1 _ 0307 수업 */
    // $('html, body').animate({scrollTop: 0}, 500); //섹션 순서가 안 맞아서 사용 불가
    // $('html, body').animate({scrollTop: $('section').eq(i + 2).offset().top - 70}, 500);
    
    /* 방법 2. ID값 사용 */
    let id_name = $(this).find('a').attr('href');
    // console.log(id_name);

    // 해당 id section을 선택하여 화면 위로 올리기
    let offTop = $(id_name).offset().top;
    $('html, body').animate({scrollTop: offTop}, 500);
  });
});

// 3. 이벤트 랜덤 배너
// 수학객체 math
let ran_n = Math.floor(Math.random() * 3) + 1; // 1,2,3 출력
// console.log(ran_n);

const r_img = document.getElementById('ran_banner');
r_img.src = './images/ran_banner0' + ran_n + '.jpg';
