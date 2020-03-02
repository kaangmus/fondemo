

/*
 * Author: Sławomir Netteria.NET https://netteria.net
 */

    $(window).scroll(function () {
        var sticky = $('.myheader'),
            scroll = $(window).scrollTop();

        if (scroll <= 90) sticky.removeClass('sticky');
        else sticky.addClass('sticky');
    }); // video light box $(function () {



// $(window).load(function (){
//     $('#ensign-nivoslider').nivoSlider({
//         effect: 'fade',
//         slices: 15,
//         boxCols: 12,
//         autoplay: false,
//         boxRows: 8,
//         animSpeed: 500,
//         pauseTime: 5000,
//         startSlide: 0,
//         directionNav: true,
//         controlNavThumbs: false,
//         pauseOnHover: true,
//         manualAdvance: false,

//     })

// });

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