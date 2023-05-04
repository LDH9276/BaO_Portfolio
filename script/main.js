let swiper00 = new Swiper(".lineup-list", {
  navigation: {
    nextEl: ".line_up-banner-next",
    prevEl: ".line_up-banner-prev",
  },
  breakpoints:{
    1025: {
      slidesPerView: 5,
      spaceBetween: 30,
      centeredSlides: false,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 16,
      centeredSlides: false,
      pagination: {
        el: ".lineup-pagination",
      },
    },
    320: {
      slidesPerView: 1,
      spaceBetween: 16,
      centeredSlides: true,
      loop: true,
      pagination: {
        el: ".lineup-pagination",
      },
    }
  }
});
let swiper01 = new Swiper(".slide-banner", {
  navigation: {
    nextEl: ".slide-banner-next",
    prevEl: ".slide-banner-prev",
  },
  loop: true,
  breakpoints:{
    1025: {
      pagination: {
        el: ".slide-pagination",
      },
    },
    320: {
      pagination: {
        el: ".slide-pagination",
      },
    }
  }
});

// 탭메뉴
const tabBtn = document.querySelectorAll('.product-tabbtn>li');
const tabitem = document.querySelectorAll('.product-tab-item');

tabBtn.forEach((arr, idx) => {
  arr.addEventListener('click', () => {
    tabBtn.forEach(arr => {
      arr.classList.remove('act');
    });
    arr.classList.add('act');
    tabitem.forEach((arr) => {
      arr.classList.remove('act');
    });
    tabitem[idx].classList.add('act');
  });
});

// selsect 탭메뉴
const selectBtn = document.querySelector('#product-category');

selectBtn.addEventListener('change', ()=> {
  console.log(selectBtn.value);
  const selectValue = selectBtn.value;

  tabitem.forEach((tabitems)=>{
    if(tabitems.classList.contains(selectValue)){
      tabitems.classList.add('act')
    } else {
      tabitems.classList.remove('act')
    }
  });

  

});



if(window.innerWidth < 1025) {
  const slidePrevBtn = document.querySelector('.slide-banner-prev');
  const slideNextBtn = document.querySelector('.slide-banner-next');
  
  slidePrevBtn.setAttribute('src', 'img/w-btn-left.svg');
  slideNextBtn.setAttribute('src', 'img/w-btn-right.svg');
}

if(window.innerWidth < 728){
  const slidePrevBtn = document.querySelector('.slide-banner-prev');
  const slideNextBtn = document.querySelector('.slide-banner-next');

  slidePrevBtn.setAttribute('src', 'img/btn-left.svg');
  slideNextBtn.setAttribute('src', 'img/btn-right.svg');
}

window.onresize = function() {
if(window.innerWidth < 1025) {
  const slidePrevBtn = document.querySelector('.slide-banner-prev');
  const slideNextBtn = document.querySelector('.slide-banner-next');
  
  slidePrevBtn.setAttribute('src', 'img/w-btn-left.svg');
  slideNextBtn.setAttribute('src', 'img/w-btn-right.svg');
}
if(window.innerWidth < 728){
  const slidePrevBtn = document.querySelector('.slide-banner-prev');
  const slideNextBtn = document.querySelector('.slide-banner-next');

  slidePrevBtn.setAttribute('src', 'img/btn-left.svg');
  slideNextBtn.setAttribute('src', 'img/btn-right.svg');
}
}


//다크모드
const dropdown = document.querySelector('.category-drop');
const arrow01 = document.querySelectorAll('.right-btns');
const leftBtn = document.querySelector('.line_up-banner-prev');
const rightBtn = document.querySelector('.line_up-banner-next');
const darkModeQuery01 = window.matchMedia('(prefers-color-scheme: dark)');


function handleColorSchemeChange(e) {
  if (darkModeQuery01.matches) {
    arrow01.forEach(arrow => {
      arrow.src = 'img/wt-right-btn.svg';
    });
    leftBtn.src = 'img/wt-btn-left.svg';
    rightBtn.src = 'img/wt-btn-right.svg';
    dropdown.src = 'img/wt-down-btn.svg';
  } 
  else {
    arrow01.forEach(arrow => {
      arrow.src = 'img/right-btn.svg';
    });
    leftBtn.src = 'img/btn-left.svg';
    rightBtn.src = 'img/btn-right.svg';
    dropdown.src = 'img/down_btn.svg';
  }
}

//다크모드인지 여부확인
handleColorSchemeChange(darkModeQuery01);

//다크모드 감지
darkModeQuery01.addListener(handleColorSchemeChange);

