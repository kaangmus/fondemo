@extends('layouts.front')

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
                        <img class=" progressiveMedia-image thumb lazyload"
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

            </div>
            <div class="col-md-4 ">
                
                @include('post.sidebar')
            </div>
        </div>
    </div>

</section>




@endsection
{{-- @section('scripts')
<script>
    $(document).ready(function() {
var stickyTop = $('.sidebarfix').offset().top;

$(window).scroll(function() {
var windowTop = $(window).scrollTop();
if (stickyTop < windowTop && $(".single_post").height() + $(".single_post").offset().top - $(".sidebarfix").height()> windowTop) {
    $('.sidebarfix').css('position', 'fixed');
    } else {
    $('.sidebarfix').css('position', 'relative');
    }
    });
    });
</script>
@endsection --}}