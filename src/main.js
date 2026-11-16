import Splide from '@splidejs/splide';
import '@splidejs/splide/css/core';
const splideElm = document.querySelectorAll('.splide');
if (splideElm) {
  splideElm.forEach((elm) => {
    const slides = elm.querySelectorAll('.splide__slide');
    if (slides.length <= 1) {
      const splide = new Splide(elm, {
        arrows: false,
      });
      splide.mount();
      splide.destroy('completely');
    } else {
      const splide = new Splide(elm, {
        type: 'loop',
        perPage: 3,
        gap: '2rem',
        padding: '1rem',
        pagination: false,
        autoplay: true,
        breakpoints: {
          900: {
            perPage: 2,
            padding: '2vw',
          },
          480: {
            perPage: 1,
            padding: '4vw',
          },
        },
      }).mount();
    }
  });
}

(function () {
  const kvItem = document.querySelectorAll('.topKV__img01, .topKV__img02');
  kvItem.forEach((elm) => {
    elm.classList.add('is-show');
  });
})();

//ページトップ
(function () {
  window.addEventListener('scroll', () => {
    const winH = window.innerHeight;
    const header = document.querySelector('.header');
    const headerH = header.clientHeight;
    const pageTop = document.querySelector('.pageTop');
    const scrollY = window.scrollY;
    if (scrollY > winH - headerH) {
      pageTop.classList.add('is-show');
    } else {
      pageTop.classList.remove('is-show');
    }
  });
})();

//フィルタリング
(function () {
  if (document.querySelector('.catfiltering')) {
    const item = document.querySelectorAll('.catsList__item');
    const select = document.getElementById('filtering');

    select.addEventListener('change', () => {
      const selectVal = select.value;
      item.forEach((elm) => {
        const sex = elm.dataset.sex;
        const age = elm.dataset.age;
        const color = elm.dataset.color;
        if (selectVal === 'all') {
          elm.classList.remove('is-hidden');
        } else {
          if (selectVal !== sex && selectVal !== age && selectVal !== color) {
            elm.classList.add('is-hidden');
          } else {
            elm.classList.remove('is-hidden');
          }
        }
      });
    });
  }
})();

(function () {
  const targets = document.querySelectorAll('.js-fadeInUp');
  const callback = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-inView');
        observer.unobserve(entry.target);
      }
    });
  };
  const options = {
    root: null,
    rootMargin: '-10% 0px',
    threshold: 0,
  };
  const observer = new IntersectionObserver(callback, options);
  if (targets) {
    targets.forEach((target) => observer.observe(target));
  }
})();

(function () {
  if (window.innerWidth <= 900) {
    return false;
  } else {
    window.addEventListener('scroll', () => {
      const parallaxItem = document.querySelectorAll('.js-parallax');
      const scrolled = window.scrollY;
      const speed = 0.5;
      const bgPosY = scrolled * speed;

      parallaxItem.forEach((elm) => {
        elm.style.backgroundPositionY = `${bgPosY}px`;
      });
    });
  }
})();

(function () {
  // tab
  const tabList = document.querySelector('.js-tab-list');
  if (!tabList) {
    return;
  } else {
    const tabBtns = Array.from(tabList.querySelectorAll('.js-tab-button'));

    const switchTab = (targetTab) => {
      tabBtns.forEach((btn) => {
        const isSelected = btn === targetTab;
        btn.setAttribute('aria-selected', isSelected ? 'true' : 'false');
        btn.setAttribute('tabindex', isSelected ? '0' : '-1');

        const targetId = btn.getAttribute('aria-controls');
        const targetPanel = document.getElementById(targetId);

        if (isSelected) {
          btn.classList.add('is-active');
          targetPanel.removeAttribute('hidden');
        } else {
          btn.classList.remove('is-active');
          targetPanel.setAttribute('hidden', '');
        }
      });
    };

    tabList.addEventListener('click', (e) => {
      const clickedBtn = e.target.closest('.js-tab-button');
      if (!clickedBtn) return;
      switchTab(clickedBtn);
    });

    tabList.addEventListener('keydown', (e) => {
      const currentTab = document.activeElement;
      if (!tabBtns.includes(currentTab)) return;

      const currentIndex = tabBtns.indexOf(currentTab);
      let targetIndex = null;

      switch (e.key) {
        case 'ArrowRight':
        case 'ArrowDown':
          targetIndex = (currentIndex + 1) % tabBtns.length;
          break;
        case 'ArrowLeft':
        case 'ArrowUp':
          targetIndex = (currentIndex - 1 + tabBtns.length) % tabBtns.length;
          break;
        case 'Home':
          targetIndex = 0;
        case 'End':
          targetIndex = tabBtns.length - 1;
          break;
        default:
          return;
      }
      if (targetIndex !== null) {
        e.preventDefault();
        tabBtns[targetIndex].focus();
        switchTab(tabBtns[targetIndex]);
      }
    });
  }
})();
