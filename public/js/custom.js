

/*
 * Author: Sławomir Netteria.NET https://netteria.net
 */

    $(window).scroll(function () {
        var sticky = $('.myheader'),
            scroll = $(window).scrollTop();

        if (scroll <= 90) sticky.removeClass('sticky');
        else sticky.addClass('sticky');
    }); 
  
     









// $(document).ready(function () {
//     $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
//         disableOn: 700,
//         type: 'iframe',
//         mainClass: 'mfp-fade',
//         removalDelay: 160,
//         preloader: false,

//         fixedContentPos: false
//     });
// });





// Pure-media v1.0

// Developer: https://github.com/localnetwork/

;(function() {
    'use strict';

    // set progressive image loading
    var progressiveMedias = document.querySelectorAll('.progressiveMedia');
    for (var i = 0; i < progressiveMedias.length; i++) {
        loadImage(progressiveMedias[i]);
    }

    // global function
    function loadImage(progressiveMedia) {

        // calculate aspect ratio
        // for the aspectRatioPlaceholder-fill
        // that helps to set a fixed fill for loading images
        var width = progressiveMedia.dataset.width,
        height = progressiveMedia.dataset.height,
        fill = height / width * 100,
        placeholderFill = progressiveMedia.previousElementSibling;

        placeholderFill.setAttribute('style', 'padding-bottom:'+fill+'%;');


    }

})();

