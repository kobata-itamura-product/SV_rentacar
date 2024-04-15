const Swiper = new Swiper('.swiper-container', {
    //
    direction: 'horizontal',
    loop: 'true',
    slidesPerView: '1',
    effect: 'fade',
    delay: '1000',
    centeredSlides: 'true',
  
    //
    pagination: {
      el: '.swiper-pagination',
    },
  
    //
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    //
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  })