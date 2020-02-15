@extends('layouts.front')
@section('content')
<div class="banner">
  <div class="container-fluid">
      <div class="row  justify-content-center sub_banner_title">
            <h1 class="bannertitle text-light text-center">News</h1>
      </div>
       <div class="sub_img">
         <div class='image-container'>
            <img src="{{asset('images/sub_banner.png')}}" class="bannertp lazyload">
            <div class='curtain'>
                  <div class='shine'></div>
             </div>
         </div>
       </div>

    </div>
</div>
<section class="post">
   <div class="container py-3">
        @foreach ($posts as $post)
        <a href="@if($fapost->link){{$fapost->link}}@else/post/{{$fapost->id}}@endif" @if($fapost->link)target="_blank"@endif">
                <div class="row justify-content-center my-5 ">
                    <div class="col-md-4">
                        @if($post->featured_image)
                          <img src="{{ $post->featured_image->getUrl() }}" alt="#" class="w-100">
                        @endif
                        
                    </div>
                    <div class="col-md-5 px-3">
                        <div class="card-block px-3">
                            <h1 class="card-title">{{$post->title}}</h1>
                            <p class="card-text">{{$post->excerpt}} </p>
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