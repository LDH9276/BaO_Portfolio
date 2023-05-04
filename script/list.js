const swiper01 = new Swiper(".slide-banner", {
  navigation: {
    nextEl: ".list-slide-next",
    prevEl: ".list-slide-prev",
  },
  breakpoints:{
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    320: {
      slidesPerView: "auto",
      loop: true,
    }
  },
  on: {
    slideChange: function () {
      if(swiper01.isBeginning) {
        prevBtn.forEach(arr => {
          arr.classList.add('disabled');
        });
      } else {
        prevBtn.forEach(arr => {
          arr.classList.remove('disabled');
        });
      }
      if(swiper01.isEnd) {
        nextBtn.forEach(arr => {
          arr.classList.add('disabled');
        });
      } else {
        nextBtn.forEach(arr => {
          arr.classList.remove('disabled');
        });
      }
    }
  }
});

const nextBtn = document.querySelectorAll('.list-slide-next');
const prevBtn = document.querySelectorAll('.list-slide-prev');


$(document).ready(function(){
  $('.swiper-slide').click(function(){
    $('.slide-absolute').removeClass('act');
    $(this).find('.slide-absolute').addClass('act');
    let URL = $(this).find('img').attr('src');
    $('.item-about').attr('src', URL);
  });
});



//다크모드
const darkModeQuery01 = window.matchMedia('(prefers-color-scheme: dark)');


function handleColorSchemeChange(e) {
  if (darkModeQuery01.matches) {
    nextBtn.forEach(arr => {
      arr.src = 'img/wt-btn-right.svg';
    });
    prevBtn.forEach(arr => {
      arr.src = 'img/wt-btn-left.svg';
    });
  } 
  else {
    nextBtn.forEach(arr => {
      arr.src = 'img/btn-right.svg';
    });
    prevBtn.forEach(arr => {
      arr.src = 'img/btn-left.svg';
    });
  }
}

//다크모드인지 여부확인
handleColorSchemeChange(darkModeQuery01);

//다크모드 감지
darkModeQuery01.addListener(handleColorSchemeChange);

