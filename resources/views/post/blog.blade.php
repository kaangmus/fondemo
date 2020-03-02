@extends('layouts.front')

@section('content')


<div class="banner">
    <div class="container-fluid">
        <div class="row  justify-content-center sub_banner_title">
            
        </div>
        @if($post->featured_image)
                <div class="sub_img">
                    <div class='image-container'>
                        
                        <img src="{{ $post->featured_image->getUrl() }}" class="bannertp lazyload">
                    
                        <div class='curtain'>
                            <div class='shine'></div>
                        </div>
                    </div>
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
                <h1 class="post_title">{{$post->title }}</h1>
                {!!$post->page_text!!}
             
            </div>
            <div class="col-md-4 ">
                @include('post.sidebar')
            </div>
        </div>
    </div>
   
</section>




@endsection
@section('scripts')
<script>
$(document).ready(function() {
var stickyTop = $('.sidebarfix').offset().top;

$(window).scroll(function() {
var windowTop = $(window).scrollTop();
if (stickyTop > windowTop && $(".single_post").height() + $(".single_post").offset().top - $(".sidebarfix").height()> windowTop) {
    $('.sidebarfix').css('position', 'fixed');
    } else {
    $('.sidebarfix').css('position', 'relative');
    }
    });
    });
</script>
@endsection