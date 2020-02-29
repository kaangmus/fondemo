<section id="exhibiton" class="exhibiton_section mr-5 ml-5">
	<h1 class="text-center maincolor">Exhibitions Timeline</h1>
	<p class="text-center">And a selection of publications</p>
	<div class="d-flex justify-content-center">
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			@foreach($years as $key=>$year)
			<li class="nav-item">
				<a class="nav-link {{$key == 0 ? 'active':''}}" id="pills-home-tab" data-toggle="pill"
					href="#pills-{{$key}}" role="tab" aria-controls="pills-{{$key}}"
					aria-selected="{{$key == 0 ? 'true':'false'}}">{{$year->year}}</a>
			</li>
			@endforeach
		</ul>

	</div>
	<div class="tab-content" id="myTabContent">
		@foreach($years as $key=>$year)
		<div class="tab-pane fade {{$key == 0 ? 'show active':''}}" id="pills-{{$key}}" role="tabpanel"
			aria-labelledby="pills-{{$key}}-tab">
			@foreach($year->yearExhibationCategories as $k=>$exbcategory)
			<div class="row exb-item mt-2">
				<div class="col-md-1"></div>
				<div class="col-md-3 col-sm-12 text-center">
					{!! $exbcategory->title !!}
				</div>
				<div class="col-md-4 col-sm-12">
					{!! $exbcategory->description !!}
				</div>
				<div class="col-md-3 col-sm-12  align-items-center">
					@if($exbcategory->post)
					<a href="#" class="btn m-2 btn-md btn-warning">
						VIEW MORE
					</a>
					@endif
					@if($exbcategory->video)
					<a href="#" data-toggle="lightbox" data-max-width="600"
						class="btn m-2 btn-md btn-warning">
						VIEW VIDEO HERE
					</a>
					@endif
					@if($exbcategory->gallery)
					<a href="#" class="btn m-2 btn-md btn-warning">
						PLAY SLIDESHOW
					</a>
					@endif
					@if($exbcategory->book)
					<a href="#" class="btn m-2 btn-md btn-warning">
						PURCHASE BOOKS
					</a>
					@endif
					@if($exbcategory->photo)
					<a href="#" class="btn m-2 btn-md btn-warning">
						VIEW EXHIBITION PHOTOS
					</a>
					@endif

				</div>
				<div class="col-md-1"></div>
			</div>
			@endforeach
		</div>
		@endforeach
	</div>
</section>