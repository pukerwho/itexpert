 $(window).load(function() {
  //Мобильное меню открываем/закрываем
  var burgerIterator = 0;


  $('.header-burger').on('click', function(){
    $(this).toggleClass('open');
    $('.header-menu__mobile').toggleClass('show');
  })

  $(window).scroll(function(){
    var h_scroll = $(this).scrollTop();
    if (h_scroll > 50) {
      $('.header').addClass('scrolled');
    } else {
      $('.header').removeClass('scrolled');
    }
    if (h_scroll > 200) {
      $('.scroll-up').addClass('show')
    } else {
      $('.scroll-up').removeClass('show')
    }
  })

  //Скролл к якорю
  // $(document).on('click', 'a[href^="#"]', function (event) {
  //   event.preventDefault();
  //   var target = $($.attr(this, 'href'));
  //   var targetScroll =  target.offset().top;
  //   $('html, body').animate({
  //       scrollTop: targetScroll
  //   }, 500);
  // });

  //Плавный скролл вверх
  $(document).on('click', '.scroll-up', function (event) {
    $('html, body').animate({
        scrollTop: 0
    }, 500);
  });

  //Закрываем меню в мобильной, если кликнули на него
  if ($(window).outerWidth() < 767) {
    $('.header-menu__mobile .menu-item:not(.wpml-ls-item)').on('click', function(){
      $('.header-menu__mobile').removeClass('show');
      console.log('go');
    });
  }

  //Gutenberg Block Steps (Count Animation)
  $('.facts_item_number').each(function(){
    factItemInnerText = $(this).text();
    factItemInnerNumber = parseInt(factItemInnerText, 10);
    newFactItemInnerText = factItemInnerText.replace(/\s\s+/g, ' ');
    factItemText = newFactItemInnerText.replace(factItemInnerNumber,'');
    factItemText = factItemText.replace(/\s\s+/g, ' ');
    $(this).find('.counter-number').append(factItemInnerNumber);
    $(this).find('.counter-text').html(factItemText);
  });
  
  

  $('.counter-number').counterUp({
    delay: 10,
    time: 4000
  });



  var swiperReviewsBlock = function() {
    if ($(window).outerWidth() > 767) {
      var swiperReviews = new Swiper('.swiper-container-reviews', {
        loop: true,
        autoplay: {
    	    delay: 5000,
    	  },
        slidesPerView: 3,
        pagination: {
          el: '.swiper-pagination-reviews',
        },
      })
    } else {
      var swiperReviews = new Swiper('.swiper-container-reviews', {
        autoHeight: true,
        loop: true,
        autoplay: {
          delay: 5000,
        },
        slidesPerView: 1,
        pagination: {
          el: '.swiper-pagination-reviews',
        },
      })
    }
  }

  swiperReviewsBlock();
  if ($(window).outerWidth() > 767) {

    let swiperReviewItemsArray = [];
    let swiperReviewItems = document.querySelectorAll('.swiper-container-reviews .swiper-slide .review_item_content');
    for (swiperReviewItem of swiperReviewItems) {
      if (swiperReviewItem) {
        swiperReviewItemsArray.push(swiperReviewItem.offsetHeight); 
      }
    }

    let maxSwiperReviewHeight = Math.max.apply(null, swiperReviewItemsArray);
    $('.review_item_content').each(function(){
      $(this).css({'min-height' : maxSwiperReviewHeight+'px'});
    });
  }

  //MASONRY
  $(function() {
    var $content = $('.blog_template_one');
    $content.imagesLoaded( function() {
      $('.blog_template_one').masonry({
        itemSelector: '.blog-masonry',
        columnWidth: '.blog-masonry-size',
        percentPosition: true,
        gutter: 20,
        horizontalOrder: true,
      })
    })
  });
});