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
			{!! $exhibitionCategory->e_cat_post_description 	!!}
		<div class="row mx-2">
			@foreach($exhibitionCategory->exhibitionCategoryExhibitionPosts()->get() as $post)
				<div class="col-md-4 col-sm-12 p-0">
					<figure class="position-relative">
					  @if($post->feature_image)
			            	<img src="{{ $post->feature_image->getUrl() }}" alt="#" class="mr-3 w-100" style="height: 300px">
			           @endif
					  <figcaption class="position-absolute exb-position">
					    <h3 class="ih-fade-down ih-delay-sm text-white">{{$post->name}}</h3>
					    <a class="ih-fade-up ih-delay-lg button text-danger text-decoration-none" href="#">Read More</a>
					  </figcaption>
					</figure>
				</div>
			@endforeach
		</div>
	</div>

@endsection