@extends('layouts.front')
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

<section class="post">
   <div class="container py-3">
        @foreach ($posts as $post)
        <a href="@if($post->link){{$post->link}}@else/post/{{$post->id}}@endif" @if($post->link)target="_blank"@endif">
                <div class="row justify-content-center my-5 ">
                    <div class="col-md-4">
                        @if($post->featured_image)
                        <figure class="graf-figure">
                            <div class="aspectRatioPlaceholder">
                                <div class="aspectRatioPlaceholder-fill"></div>
                                <div class="progressiveMedia lazyload" data-width="450" data-height="300">
                                    <img class="progressiveMedia-thumbnail" src="{{ $post->featured_image->getUrl('thumb') }}" alt="" />
                                    <img class=" progressiveMedia-image lazyload" data-src="{{ $post->featured_image->getUrl() }}" alt="" />
                                </div>
                            </div>
                        </figure>
                         
                        @endif
                        
                    </div>
                    <div class="col-md-5 px-3">
                        <div class="card-block px-3">
                            <h1 class="card-title">{{$post->title}}</h1>
                            <p class="card-text">{!!$post->excerpt!!} </p>
                        </div>
                    </div>
                </div>
             </a>   
         @endforeach
         
          <div class="row">
            
              {{ $posts->appends(request()->query())->links('partials.pagination') }}
         </div>
        
    </div>
</section>
  



@endsection