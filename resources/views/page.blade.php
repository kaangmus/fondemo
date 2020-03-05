@extends('layouts.front')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/default-skin/default-skin.css">
<style>
    .slider_gallery_container {
    width: 770px;
    margin: 0 auto;
    }
    .swiper-button-prev, .swiper-button-next {
    top: 78%;
    }
</style>

@section('content')


<div class="banner">
    <div class="container-fluid">
        <div class="row  justify-content-center sub_banner_title">

        </div>
        @if($page->feature_image)
        <div class="sub_img">
            <figure class="graf-figure">
                <div class="aspectRatioPlaceholder">
                    <div class="aspectRatioPlaceholder-fill"></div>
                    <div class="progressiveMedia lazyload" data-width="1275" data-height="850">
                        <img class="progressiveMedia-thumbnail" src="{{asset('images/loadimg.jpg')}}" alt="" />
                        <img class=" progressiveMedia-image  lazyload"
                    data-src="{{ $page->feature_image->getUrl() }}" alt="{{$page->title}}" />
                    </div>
                </div>
            </figure>
            
        </div>
        @endif

    </div>
</div>
<section class="single_post">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <div class="social_share text-center">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fas fa-envelope-open"></i></a>
                </div>

            </div>

            <div class="col-md-7">
                <h1 class="post_title">{{$page->title }}</h1>
                {!!$page->content!!}

                @if($page->id==1)

              <div id="gallery" class="gallery" itemscope itemtype="http://schema.org/ImageGallery">
                <div class="row">
             
                  

                   <div class="slider_gallery_container">
                
                    <div id="gallery" class="gallery" itemscope itemtype="http://schema.org/ImageGallery">
                        <div class="slider_gallery">
                            <div class="swiper-container swiper-gallery">
                
                                <div class="swiper-wrapper">
                
                                   @foreach($gallerys as $key=>$gallery)
                                     @foreach($gallery->gallery as $key => $media)
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
                                    @endforeach
                                    
                
                                </div>
                            </div>
                
                            <div class="swiper-button-prev gallerynav"></div>
                            <div class="swiper-button-next gallerynav"></div>
                        </div>
                    </div>
                </div>
                    
                   </div> 
                </div>

                @endif

            </div>
            <div class="col-md-4 ">
                
                @include('post.sidebar')
            </div>
        </div>
    </div>

</section>


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
                <button class="pswp__button pswp__button--buy" title="buy this photo">buy photo</button>
                {{-- <button class="text-light buynow" title="buy this photo">Buy Photo</button> --}}
                {{-- <button class="pswp__button pswp__button--zoom" title="Zoom in/out">Buy Photo</button> --}}
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
<script src="{{ asset('js/stickysidebar.min.js') }}"></script>
<script>
    jQuery(document).ready(function($){
    $('.sidebar').stickySidebar({
    topSpacing: 110,
    container: '.container',
    sidebarInner: '.sidebar-inner',
    callback: function() {
    console.log('Sticky sidebar fired!');
    }
    });
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
@endsection