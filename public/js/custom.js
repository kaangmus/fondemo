

/*
 * Author: Sławomir Netteria.NET https://netteria.net
 */

    $(window).scroll(function () {
        var sticky = $('.myheader'),
            scroll = $(window).scrollTop();

        if (scroll <= 90) sticky.removeClass('sticky');
        else sticky.addClass('sticky');
    }); // video light box $(function () {
    $('#vidBox').VideoPopUp({
        backgroundColor: "#17212a",
        opener: "video1",
        maxweight: "340",
        idvideo: "v1"
    });


$(window).load(function (){
    $('#ensign-nivoslider').nivoSlider({
        effect: 'fade',
        slices: 15,
        boxCols: 12,
        autoplay: false,
        boxRows: 8,
        animSpeed: 500,
        pauseTime: 5000,
        startSlide: 0,
        directionNav: true,
        controlNavThumbs: false,
        pauseOnHover: true,
        manualAdvance: false,

    })

});

 var swiper = new Swiper('.swiper-container', {
     effect: 'coverflow',
     grabCursor: true,
     centeredSlides: true,
     slidesPerView: 'auto',
     initialSlide:'6',
     coverflowEffect: {
         rotate: 0,
         stretch: 1,
         depth: 100,
         modifier: 5,
         slideShadows: true,
     },
     pagination: {
         el: '.swiper-pagination',
     },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
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

