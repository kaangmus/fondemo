@extends('layouts.front')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/default-skin/default-skin.css">
<style>
    html,
    body {
        position: relative;
        height: 100%;
    }
.slider_gallery {
position: relative;
padding: 0px 60px;
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
    .slider_gallery_container {
    width: 770px;
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


            <div class="slider_gallery_container">
            
              <div id="gallery" class="gallery" itemscope itemtype="http://schema.org/ImageGallery">
                <div class="slider_gallery">
                    <div class="swiper-container swiper-gallery">

                        <div class="swiper-wrapper">
                            
                             @foreach ($photogallery as $media)
                             <div class="swiper-slide gallery pswp__item">
                                 <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                    <a class="gallery_link" href="{{ $media->getUrl('large') }}"
                                        data-caption="focus on nature<br><em class='text-muted'>© fon</em>" data-width="1920"
                                        data-height="1280" itemprop="contentUrl">
                                        <img src="{{ $media->getUrl() }}" itemprop="thumbnail" alt="Image description">
                                    </a>
                                </figure>
     
                             </div>
                                @endforeach
                               
                            </div>
                         </div>   

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
               </div>
            </div>   

        
        </div>
</section>




</div>
</div>
</div>


<div class="spacer"></div>


<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- Background of PhotoSwipe. 
           It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>
    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">
        <!-- Container that holds slides. 
              PhotoSwipe keeps only 3 of them in the DOM to save memory.
              Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
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
                {{-- <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> --}}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe-ui-default.min.js"></script>
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
    'use strict';

    /* global jQuery, PhotoSwipe, PhotoSwipeUI_Default, console */

    (function($){

      // Init empty gallery array
      var container = [];

      // Loop over gallery items and push it to the array
      $('#gallery').find('figure').each(function(){
        var $link = $(this).find('a'),
            item = {
              src: $link.attr('href'),
              w: $link.data('width'),
              h: $link.data('height'),
              title: $link.data('caption')
            };
        container.push(item);
      });

      // Define click event on gallery item
      $('.gallery_link').click(function(event){

        // Prevent location change
        event.preventDefault();

        // Define object and gallery options
        var $pswp = $('.pswp')[0],
            options = {
              index: $(this).parent('figure').index(),
              bgOpacity: 0.85,
              showHideOpacity: true
            };

        // Initialize PhotoSwipe
        var gallery = new PhotoSwipe($pswp, PhotoSwipeUI_Default, container, options);
        gallery.init();
      });

    }(jQuery));
</script>
@endsection