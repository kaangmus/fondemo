

/*
 * Author: Sławomir Netteria.NET https://netteria.net
 */

    $(window).scroll(function () {
        var sticky = $('.myheader'),
            scroll = $(window).scrollTop();

        if (scroll <= 90) sticky.removeClass('sticky');
        else sticky.addClass('sticky');
    }); // video light box $(function () {



  window.onload = function () {
      var placeholders = document.querySelectorAll('.placeholder');
      for (var i = 0; i < placeholders.length; i++) {
          loadImage(placeholders[i]);
      }

      function loadImage(placeholder) {
          var small = placeholder.children[0];

          // 1: load small image and show it
          var img = new Image();
          img.src = small.src;
          img.onload = function () {
              small.classList.add('loaded');
          };

          // 2: load large image
          var imgLarge = new Image();
          imgLarge.src = placeholder.dataset.large;
          imgLarge.onload = function () {
              imgLarge.classList.add('loaded');
          };
          placeholder.appendChild(imgLarge);
      }
  }

 var swiper = new Swiper('.swiper_digital', {
     effect: 'coverflow',
     grabCursor: true,
     centeredSlides: true,
     slidesPerView: 'auto',
     initialSlide:'5',
     coverflowEffect: {
         rotate: 0,
         stretch: 1,
         depth: 100,
         modifier: 5,
         slideShadows: true,
     },
    
      navigation: {
          nextEl: '.swiper-button-next2',
          prevEl: '.swiper-button-prev2',
      },
 });



 $(".image-container img").one('lazyloaded load', function () {
     $(this).parent().find(".curtain").remove();
 }).each(function (e) {
     if (this.complete) {
         $(this).trigger("lazyloaded load");
         $(this).parent().find(".curtain").remove();
     }
 });


$(document).ready(function () {
    $('#video_link').click(function () {

        $('.myVideo').attr("src", $(this).attr("vidUrl"));
        $('.overlay').fadeIn(500, function () {
            $('.main-vid-box').fadeIn(500);
            $('.close').fadeIn(500);
        });
    });

    $('.close, .overlay').click(function () {
        $('.overlay').fadeOut(500);
        $('.myVideo').attr("src", $(this).attr("vidUrl"));
        $('.main-vid-box').fadeOut(500);
        $('.close').fadeOut(500);
    });
});


$(document).ready(function () {
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });
});



$('.popup-youtube').magnificPopup({
    type: 'iframe',


    iframe: {
        patterns: {
           youtube: {
               index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

               id: 'v=', // String that splits URL in a two parts, second part should be %id%
               // Or null - full URL will be returned
               // Or a function that should return %id%, for example:
               // id: function(url) { return 'parsed id'; }

               src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
           },
        }
    }


});