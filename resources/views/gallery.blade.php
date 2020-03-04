@extends('layouts.front')
<link rel="stylesheet" href="{{ asset('swipe/photoswipe.css') }}">
<link rel="stylesheet" href="{{ asset('swipe/default-skin.css') }}">
<style>
    html,
    body {
        position: relative;
        height: 100%;
    }

    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    .swiper-container {
        width: 100%;
        height: 100%;
padding-top: 0px;
padding-bottom: 0px;
}

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    .slider_post {
    width: 650px;
    margin: 0 auto;
    }
</style>

@section('content')
<figure class="graf-figure">
    <div class="aspectRatioPlaceholder">
        <div class="aspectRatioPlaceholder-fill"></div>
        <div class="progressiveMedia lazyload" data-width="1450" data-height="400">
            <img class="progressiveMedia-thumbnail" src="{{asset('images/sub_banner.png')}}" alt="" />
            <img class=" progressiveMedia-image lazyload" data-src="{{asset('images/sub_banner.png')}}" alt="" />
        </div>
    </div>
</figure>
<section>
        <div class="container">
            
                <h2 class="text-center maincolor">Sample gallery</h2>


            <div class="slider_post">
            

                <div class="slider_padding">
                    <div class="swiper-container swiper-gallery">
                        <div class="swiper-wrapper">
                             @foreach ($photogallery as $media)
                             <div class="swiper-slide gallery pswp__item">
                                      <a href='javascript:void(0)' class="swiper_img">
                              
                                            <img class='swiper_img'src="{{ $media->getUrl('large') }}" alt="" />
                                           </a> 
                                            
                             
                                    </div>
                                @endforeach
                            </div>
                         </div>   

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
             
            </div>   

        
        </div>
</section>
<div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <div class="pswp__container">
            <!-- don't modify these 3 pswp__item elements, data is added later on -->
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>






@endsection
@section('scripts')
<script src="{{ asset('swipe/photoswipe.min.js') }}"></script>
<script src="{{ asset('swipe/photoswipe-ui-default.min.js') }}"></script>
<script>
    var swiper = new Swiper('.swiper-gallery', {
     slidesPerView: 1,
    spaceBetween: 30,
   
    effect: 'fade',
    loop: true,
 
    autoplay: {
    delay: 2500,
    
    },
    
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
</script>


<script>
var openPhotoSwipe = function() {
var pswpElement = document.querySelectorAll('.pswp')[0];

// build items array
var items = [
{
src: 'https://farm2.staticflickr.com/1043/5186867718_06b2e9e551_b.jpg',
w: 964,
h: 1024
},
{
src: 'https://farm7.staticflickr.com/6175/6176698785_7dee72237e_b.jpg',
w: 1024,
h: 683
}
];

// define options (if needed)
var options = {
// history & focus options are disabled on CodePen
history: false,
focus: false,

showAnimationDuration: 0,
hideAnimationDuration: 0

};

var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
gallery.init();
};

openPhotoSwipe();

document.getElementsByClassName('swiper_img').onclick = openPhotoSwipe;
</script>

@endsection