function init() {
  //Мобильное меню открываем/закрываем
  var burgerIterator = 0;

  var mobileMenuHeight = $('.header-menu__mobile').height();
  $('.header-menu__mobile').css({
    'display':'none',
    'height':0
  })

  $('.header-burger').on('click', function(){
    $(this).toggleClass('open');
    
    if (burgerIterator === 0) {
      $('.header-menu__mobile').css({'display':'block'});
      $('.header-menu__mobile').animate({
        height:mobileMenuHeight+'px',
      }, 500);
      burgerIterator = 1;
    } else {
      $('.header-menu__mobile').animate({
        height:0,
      }, 500, function(){
        $('.header-menu__mobile').css({'display':'none'});
      });
      burgerIterator = 0;
    }
  })

  //Открываем закрываем мобильное субменю
  if ($(window).outerWidth() < 767) {
    $('.menu-item-has-children a').on('click', function(e){
      e.preventDefault();

      $(this).closest('.menu-item-has-children').find('.sub-menu').css({
        'display': 'block',
      })

      subMenuHeight = $(this).closest('.menu-item-has-children').find('.sub-menu').height();
      
      $(this).closest('.menu-item-has-children').find('.sub-menu').css({
        height: 0
      })

      $('.header-menu__mobile').animate({
        height:(subMenuHeight+mobileMenuHeight)+'px',
        opacity: 1,
      }, 500);

      $(this).closest('.menu-item-has-children').find('.sub-menu').animate({
        height:subMenuHeight+'px',
        opacity: 1,
      }, 500);
    });
  } 


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

  //Плавный скролл
  $(document).on('click', '.scroll-up', function (event) {
    $('html, body').animate({
        scrollTop: 0
    }, 500);
  });

  //Gutenberg Block Steps (Count Animation)
  $('.facts_item_number').each(function(){
    let factItemInnerText = $(this).text();
    let factItemInnerNumber = parseInt(factItemInnerText, 10);
    let newStr = factItemInnerText.replace(/[^0-9\.]+/g, "s");
    console.log(newStr);
  });

  $('.counter').counterUp({
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
}

document.addEventListener("DOMContentLoaded", init);