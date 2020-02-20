@extends('layouts.front')

@section('content')
	<div class="banner">
	  <div class="container-fluid">
	      <div class="row  justify-content-center sub_banner_title">
	            <h1 class="bannertitle text-light text-center">Exhibitions</h1>
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
	<div class="container mt-2">
		<h1 class="text-center">
			{{$exhibitionCategory->title}}
		</h1>
		<div class="exbcatdesc">
			{!! $exhibitionCategory->description 	!!}
		</div>
		@php
			$galleries = $exhibitionCategory->exhibitionCategoryExhibitionGalleries;
		@endphp
		 @if($galleries->gallery)
		 <div class="row mx-2">
		 	@foreach($galleries->gallery as $key => $media)
            	<div class="col-md-4 col-sm-12 p-1">
                 <img src="{{ $media->getUrl() }}">
                </div>
            @endforeach
		 </div>
        @endif
	</div>

@endsection