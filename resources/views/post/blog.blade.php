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
                <ul class="sidebarfix">
                    @foreach ($relates as $key=>$relate)
                       @if($relate->id!=$post->id)
                        <div class="latest_news  flex-column flex-md-row">
                            <a href="@if($relate->link){{$relate->link}}@else/post/{{$relate->id}}@endif" @if($relate->link) target="_blank" @endif>
                                @if($relate->featured_image)
                                <img src="{{ $relate->featured_image->getUrl('medium') }}" alt="#" class="mr-3 wh-100">
                                @endif
                            </a>
                            <div class="media-body align-self-center">
                                <a href="@if($relate->link){{$relate->link}}@else/post/{{$relate->id}}@endif" @if($relate->link) target="_blank" @endif>
                                    <h6>{!!$relate->title!!}</h6>
                                </a>
                                <a href="@if($relate->link){{$relate->link}}@else/post/{{$relate->id}}@endif" @if($relate->link) target="_blank" @endif class="news_paragraph">
                                    <p>{!!$relate->excerpt!!}</p>
                                </a>
                            </div>
                        </div>
                       @endif 
                    @endforeach
                    
                </ul>
              
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
if (stickyTop < windowTop && $(".single_post").height() + $(".single_post").offset().top - $(".sidebarfix").height()> windowTop) {
    $('.sidebarfix').css('position', 'fixed');
    } else {
    $('.sidebarfix').css('position', 'relative');
    }
    });
    });
</script>
@endsection