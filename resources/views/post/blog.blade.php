@extends('layouts.front')

@section('content')


<div class="banner_single header" >

        @if($post->featured_image)
        <figure class="graf-figure">
            <div class="aspectRatioPlaceholder">
                <div class="aspectRatioPlaceholder-fill"></div>
                <div class="progressiveMedia lazyload" data-width="1275" data-height="850">
                    <img class="progressiveMedia-thumbnail" src="{{ $post->featured_image->getUrl('thumb') }}" alt="" />
                    <img class="progressiveMedia-image lazyload" data-src="{{ $post->featured_image->getUrl() }}"
                        alt="" />
                </div>
            </div>
        </figure>
        @endif

</div>
<section class="single_post content" id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <div class="social_share text-center">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fas fa-envelope-open"></i></a>
                </div>

            </div>

            <div class="col-md-6">
                <h1 class="post_title">{{$post->title }}</h1>
                {!!$post->page_text!!}
               
             
            </div>
            
            <div class="col-md-5 sidebar">
            <div class="sidebar-inner">
                <ul>
                    @foreach ($relates as $key=>$relate)
                    @if( $relate->id!=$post->id)
            
                    <div class="latest_news  flex-column flex-md-row">
                        <a href="@if($relate->link){{$relate->link}}@else/post/{{$relate->id}}@endif" @if($relate->link)
                            target="_blank"
                            @endif>
                            @if($relate->featured_image)
                            <figure class="graf-figure">
                                <div class="aspectRatioPlaceholder">
                                    <div class="aspectRatioPlaceholder-fill"></div>
                                    <div class="progressiveMedia lazyload" data-width="90" data-height="90">
                                        <img class="progressiveMedia-thumbnail" src="{{ $relate->featured_image->getUrl('thumb') }}"
                                            alt="" />
                                        <img class="progressiveMedia-image lazyload"
                                            data-src="{{ $relate->featured_image->getUrl('medium') }}" alt="" />
                                    </div>
                                </div>
                            </figure>
            
                            @endif
                        </a>
                        <div class="media-body align-self-center">
                            <a href="@if($relate->link){{$relate->link}}@else/post/{{$relate->id}}@endif" @if($relate->link)
                                target="_blank" @endif>
                                <h6>{!!$relate->title!!}</h6>
                            </a>
                            <a href="@if($relate->link){{$relate->link}}@else/post/{{$relate->id}}@endif" @if($relate->link)
                                target="_blank" @endif class="news_paragraph">
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
        </div>
    </div>
   
</section>




@endsection
@section('scripts')
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
@endsection