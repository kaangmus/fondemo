@extends('layouts.front') @section('content')
<!-- Start Slider Area -->
<div id="slidercontainer" class="slider-area">
  <div class="bend niceties preview-2">
    <div id="ensign-nivoslider" class="slides">
      @foreach($sliders as $key => $slider) @if($slider->image)
      <img srcset="{{$slider->image->getUrl('thumb') }}" src="{{ asset($slider->image->getUrl('large')) }}"
        title="#slider-direction-{{ $slider->id}}" height="750px"> @endif @endforeach
    </div>
    @foreach($sliders as $key => $slider)
    <div id="slider-direction-{{ $slider->id ?? '' }}" class="slider-direction slider-one">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="{{$slider->position}}">
              <!-- layer 1 -->
              <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                <h2 class="maincolor text-light text-center">{{ $slider->title ?? '' }}</h2>
              </div>
              <!-- layer 2 -->
              <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <p id="fontsize">{{ $slider->description ?? '' }}</p>
              </div>
              <!-- layer 3 -->
              @if($slider->btn_text)
              <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <a class="ready-btn right-btn page-scroll" href="{{$slider->btn_link}}">{{$slider->btn_text}}</a>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<!-- End Slider Area -->

<section id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h4 class="text-center">Emergency funds</h4> @foreach ($fundposts as $key=>$fundpost)
        <div class="latest_news  flex-column flex-md-row">
          <a href="{{$fundpost->link}}" target="_blank">

            @if($fundpost->featured_image)
            <img src="{{ $fundpost->featured_image->getUrl('medium') }}" alt="#" class="mr-3 wh-100">
            @endif
          </a>
          <div class="media-body align-self-center">
            <a href="{{$fundpost->link}}" target="_blank">
              <h6>{!!$fundpost->title!!}</h6>
            </a>
            <a href="{{$fundpost->link}}" class="news_paragraph" target="_blank">
              <p>{!!$fundpost->excerpt!!}</p>
            </a>
          </div>
        </div>
        @endforeach
        <h4 class="p-1"></h4>
        <h4 class="text-center">Focused Articles</h4> @foreach ($faposts as $key=>$fapost)
        <div class="latest_news  flex-column flex-md-row">
          <a href="@if($fapost->link){{$fapost->link}}@else/post/{{$fapost->id}}@endif"
            @if($fapost->link)target="_blank"@endif>
            @if($fapost->featured_image)
            <img src="{{ $fapost->featured_image->getUrl('medium') }}" alt="#" class="mr-3 wh-100">
            @endif
          </a>
          <div class="media-body align-self-center">
            <a href="@if($fapost->link){{$fapost->link}}@else/post/{{$fapost->id}}@endif"
              @if($fapost->link)target="_blank"@endif>
              <h6>{!!$fapost->title!!}</h6>
            </a>
            <a href="@if($fapost->link){{$fapost->link}}@else/post/{{$fapost->id}}@endif" class="news_paragraph"
              @if($fapost->link)target="_blank"@endif>
              <p>{!!$fapost->excerpt!!}</p>
            </a>
          </div>
        </div>
        @endforeach
      </div>
      <!-- end col-md-4-->
      <div class="col-md-8">
        <div class="post-thumb ts-resize">
          <a href="@if($larges->link){{$larges->link}}@else/post/{{$larges->id}}@endif"
            @if($larges->link)target="_blank"@endif>
            @if($larges->featured_image)
            <img src="{{ $larges->featured_image->getUrl() }}" class="attachment-digiqole-medium" alt="">
            @endif
          </a>
          <div class="new_second_text">
            <a href="@if($larges->link){{$larges->link}}@else/post/{{$larges->id}}@endif"
              @if($larges->link)target="_blank"@endif>
              <h3>{{$larges->title}}</h3>
              <p>{!!$larges->excerpt!!}</p>

            </a>
          </div>
          </a>
        </div>
        <div class="row">
          @foreach ($mediums as $key=>$medium)
          <div class="col-md-6">
            <div class="post-thumb ts-resize">
              <a href="@if($medium->link){{$medium->link}}@else/post/{{$medium->id}}@endif"
                @if($medium->link)target="_blank"@endif>
                @if($medium->featured_image)
                <img src="{{ $medium->featured_image->getUrl() }}" class="attachment-digiqole-medium" alt="">
                @endif
              </a>
              <div class="new_third_text">
                <a href="@if($medium->link){{$medium->link}}@else/post/{{$medium->id}}@endif"
                  @if($medium->link)target="_blank"@endif>
                  <h3>{{$medium->title}}</h3>
                  <p>{!!$medium->excerpt!!}</p>

                </a>
              </div>
              </a>
            </div>
          </div>
          @endforeach

        </div>
      </div>
      <!-- row -->
    </div>
</section>
<!-- MEMBER -->
<section id="team" class="member bg-dark text-white">
  <div class="container ">
    <div class="row">
      <!-- who we are -->
      <div class="col-md-6 who_we_are">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="maincolor">WHO WE ARE</h2>
          </div>
        </div>
        <div class="row">
          @foreach ($whoweares as $whoweare)
          <div class="advisor col-md-6 col-xs-6">
            @if($whoweare->photp)
            <img src="{{$whoweare->photp->getUrl()}}" alt="#" class="mr-3 advisor" style="width:100px;height:100px">
            @endif
            <div class="advisor_text">
              <h4>{{$whoweare->name ?? '' }}</h4>
              <p>{{$whoweare->level ?? '' }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <!-- end who we are -->
      <!-- advisor -->
      <div class="col-md-6 advisor">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="maincolor">ADVISERS</h2>
          </div>
        </div>
        <div class="row">
          @foreach ($advisors as $key=>$advisor)
          <div class="col-md-6 col-xs-6 advisor mb-2">
            @if($advisor->photp)
            <img src="{{$advisor->photp->getUrl()}}" alt="#" class="mr-3 advisor" style="width:100px;height:100px">
            @endif
            <div class="advisor_text">
              <h4>{{$advisor->name ?? ''}}</h4>
              <p>{{$advisor->level ?? ''}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <!-- edn advisor     -->
    </div>
  </div>
</section>
{{-- who we are --}}

{{-- slide showcontent --}}
<section id="digital" class="digital_section">
  <div class="container">
    <h2 class="maincolor text-center">Slideshows</h2>
    <p class="text-center">slide show content</p>

     <div class="row">
      <div class="col-md-10 offset-md-2 text-center text-white">
       <div class="swiper-slideshow">
        <div class="swiper-wrapper">
          
          <div class="swiper-slide">
            <div class="post-thumb ts-resize">
              <a href="/post/18">
                <img src="{{asset('images/gbanner.jpg')}}"
                  class="attachment-digiqole-medium" alt="" width="445px" height="250px">
              </a>
              <div class="new_third_text">
                <a href="/post/18">
                  <h3>Clarion Call speech</h3>
                  <p></p>
                <p>EAT Stockholm Food Forum, Sweden</p>
          
                <p>June 13, 2019</p>
                <p></p>
          
              </a>
             </div>
            </div> 
          </div>
          
          <div class="swiper-slide">
            <div class="post-thumb ts-resize">
              <a href="/post/18">
                <img src="{{asset('images/gbanner.jpg')}}"
                  class="attachment-digiqole-medium" alt="" width="445px" height="250px">
              </a>
              <div class="new_third_text">
                <a href="/post/18">
                  <h3>Clarion Call speech</h3>
                  <p></p>
                <p>EAT Stockholm Food Forum, Sweden</p>
          
                <p>June 13, 2019</p>
                <p></p>
          
              </a>
             </div>
            </div> 
          </div>
          
          <div class="swiper-slide">
            <div class="post-thumb ts-resize">
              <a href="/post/18">
                <img src="{{asset('images/gbanner.jpg')}}"
                  class="attachment-digiqole-medium" alt="" width="445px" height="250px">
              </a>
              <div class="new_third_text">
                <a href="/post/18">
                  <h3>Clarion Call speech</h3>
                  <p></p>
                <p>EAT Stockholm Food Forum, Sweden</p>
          
                <p>June 13, 2019</p>
                <p></p>
          
              </a>
             </div>
            </div> 
          </div>
          
          <div class="swiper-slide">
            <div class="post-thumb ts-resize">
              <a href="/post/18">
                <img src="{{asset('images/gbanner.jpg')}}"
                  class="attachment-digiqole-medium" alt="" width="445px" height="250px">
              </a>
              <div class="new_third_text">
                <a href="/post/18">
                  <h3>Clarion Call speech</h3>
                  <p></p>
                <p>EAT Stockholm Food Forum, Sweden</p>
          
                <p>June 13, 2019</p>
                <p></p>
          
              </a>
             </div>
            </div> 
          </div>
          
          <div class="swiper-slide">
            <div class="post-thumb ts-resize">
              <a href="/post/18">
                <img src="{{asset('images/gbanner.jpg')}}"
                  class="attachment-digiqole-medium" alt="" width="445px" height="250px">
              </a>
              <div class="new_third_text">
                <a href="/post/18">
                  <h3>Clarion Call speech</h3>
                  <p></p>
                <p>EAT Stockholm Food Forum, Sweden</p>
          
                <p>June 13, 2019</p>
                <p></p>
          
              </a>
             </div>
            </div> 
          </div>
          <!-- Add Pagination -->
         </div> 
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
       
       </div>
      </div>
  </div>

</section>
{{-- end slde show --}}

<!-- Grands -->
<div id="grants_homeid" class="grants_home">
  <a href="/grants" class="grants_button">
    <img src="{{asset('images/gbanner.jpg')}}" alt="Snow" style="width:100%;">
    <div class="toped">

      <h2 class="maincolor text-center grant_tcolor">GRANTS TIMELINE</h2>
      <p class="text-light text-center">USD
        <?php echo number_format($ngopricestotal); ?> FOCUSED ON NATURE GRANTS TO WILDLIFE CONSERVATION PROJECTS SINCE
        2009
      </p>

    </div>
  </a>
</div>
{{-- end grands --}}
<!-- digital brounch -->

@php
$data = file_get_contents ('http://hakimages.com/ws_brochures.php');
$json = json_decode($data);
$jsons=array_slice($json, -11, 11, true);



@endphp


<section id="digital" class="digital_section">
  <div class="container">
    <h2 class="maincolor text-center">DIGITAL BROCHURES</h2>
    <p class="text-center">Flick through the latest Digital Brochures</p>
  </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-8 offset-md-2 text-center text-white">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          @foreach ($jsons as $key=> $value)
            
              
           

                <div class="swiper-slide digital">
                  <td>
                    
                    <img class='crop' src='https://online.fliphtml5.com/ekgb/{{$value->fliphtml}}/files/shot.jpg'
                      data-rel='fh5-light-box-demo' data-href='https://online.fliphtml5.com/ekgb/{{$value->fliphtml}}/'
                      data-width='1000' data-height='600' data-title='Flick through the Digital Brochure'> 
                  </td>
                  
                </div>
           
          @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
      <a class=" main_button" href="#">View all Brochures</a>
    </div>
  </div>

</section>
{{-- end digital --}} {{-- google map --}}
<div id="map" style="width: 100%; height: 700px;"></div>
{{-- end google map --}} {{-- exivation timeline --}} @include('exhibition') {{-- exbition timeline --}}
{{-- species essay --}}
<div id='species_essay' class="grants_home bg-dark">
  <img src="{{asset('images/gbanner.jpg')}}" alt="Snow" style="width:100%;">
  <div class="centered">
    <h1 class="maincolor text-light">SPEECHES & ESSAYS</h1>
    <a href="#">
      <h3 class="text-center">THE LIVING SEA Portugal National Museum of Natural History and Science</h3>
    </a>
    <p>September 2019</p>
    <a href="#">
      <h3 class="text-center">THE LIVING SEAPortugal History and Science</h3>
    </a>
    <p>September 2019</p>
    <a href="#">
      <h3 class="text-center">THE LIVING SEAPortugal History and Science</h3>
    </a>
    <p>September 2019</p>
  </div>
</div>
{{-- species essay --}} {{-- online shop --}}
<section id="online_shop">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class='maincolor'>SHOP</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card-banner"
          style="height:250px;background-size:cover; background-image: url('{{asset('images/gbanner.jpg')}}');">
          <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
            <div class="text-center">
              <h5 class="card-title text-white">Primary text as title</h5>
              <a href="/shop" class="btn btn-warning btn-sm"> View All </a>
            </div>
          </article>
        </div>
        <!-- card.// -->
      </div>
      <div class="col-md-4">
        <div class="card-banner"
          style="height:250px;background-size:cover; background-image: url('{{asset('images/gbanner.jpg')}}');">
          <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
            <div class="text-center">
              <h5 class="card-title text-white">Primary text as title</h5>
              <a href="/shop" class="btn btn-warning btn-sm"> View All </a>
            </div>
          </article>
        </div>
        <!-- card.// -->
      </div>
      <div class="col-md-4">
        <div class="card-banner"
          style="height:250px;background-size:cover; background-image: url('{{asset('images/gbanner.jpg')}}');">
          <article class="overlay overlay-cover d-flex align-items-center justify-content-center">
            <div class="text-center">
              <h5 class="card-title text-white">Primary text as title</h5>
              <a href="/shop" class="btn btn-warning btn-sm"> View All </a>
            </div>
          </article>
        </div>
        <!-- card.// -->
      </div>
    </div>
  </div>
</section>
{{-- end online shop --}}
<!-- instagram -->
<section id='instagram bg-dark'>
  <h1 class='maincolor text-center'>Follow Us On Instagram</h1>
  <!-- LightWidget WIDGET -->
  <!-- SnapWidget -->
  <!-- SnapWidget -->
  <script src="https://snapwidget.com/js/snapwidget.js"></script>
  <iframe src="https://snapwidget.com/embed/791321" class="snapwidget-widget" allowtransparency="true" frameborder="0"
    scrolling="no" style="border:none; overflow:hidden;  width:100%; "></iframe>

</section>
{{-- instagram --}} @endsection @section('scripts')
<script type="text/javascript">
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
<script src='https://fliphtml5.com/plugin/LightBox/js/fliphtml5-light-box-api-min.js'></script>
<script src="https://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script>
var map = new google.maps.Map(document.getElementById('map'), {

Zoom: 2,

center: {lat: 51.5174361, lng: -0.1562695000000076},
mapTypeId: 'satellite',
});
  
  var image = new google.maps.MarkerImage("/images/pin.png", null, null, null, new google.maps.Size(40,52));
  var places = @json($mapplaces);
 
    
  
    var infowindow = new google.maps.InfoWindow();
    
  for(place in places)
    {
    place = places[place];
    if(place.latitude && place.longitude)
    {
    var marker = new google.maps.Marker({
    position: new google.maps.LatLng(place.latitude, place.longitude),
    icon:image,
    map: map,
    title: place.name
    });
    var infowindow = new google.maps.InfoWindow();
    google.maps.event.addListener(marker, 'click', (function (marker, place) {
    return function () {
    infowindow.setContent(generateContent(place))
    infowindow.open(map, marker);
    }
    })(marker, place));
    }
    }
 

function generateContent(place)
{
var content = `
<div class="gd-bubble" style="">
  <div class="gd-bubble-inside">
    <div class="geodir-bubble_desc">
      <div class="geodir-bubble_image">
        <div class="geodir-post-slider">
          <div class="geodir-image-container geodir-image-sizes-medium_large ">
            <div id="geodir_images_5de53f2a45254_189" class="geodir-image-wrapper" data-controlnav="1">
              <ul class="geodir-post-image geodir-images clearfix">
                <li>
                  <div class="geodir-post-title">
                    <h4 class="geodir-entry-title">
                      <h3  title="View: `+place.name+`">`+place.name+`</h3>
                    </h4>
                  </div>
                  
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="geodir-bubble-meta-side">
    <div class="geodir-output-location">
      <div class="geodir-output-location geodir-output-location-mapbubble">
        <div class="geodir_post_meta  geodir-field-post_title"><span class="geodir_post_meta_icon geodir-i-text">
  
            
            <div class="flex-container">
              <div>
                <h5>year</h5>
                <p>year</p>
                <p>sadfsf</p>
              </div>
              <div>
                <h5>categories</h5>
                  <p>sadfsf</p>
                  <p>sadfsf</p>
              </div>
            
            </div>
        
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>`;

return content;

}

    $('.ajax-popup-link').magnificPopup({
        type: 'iframe',

        iframe: {
            patterns: {
                dailymotion: {

                    index: '{{$app_url}}/digitalpdf/',

                    id: '/',

                    src: '{{$app_url}}/digitalpdf/%id%'

                }
            }
        }

    });
    new WOW().init();

    var swiper = new Swiper('.swiper-slideshow', {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,

        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    $(function() {
        $('#button').click(function() {
            $('.modal').addClass('open');

            if ($('.modal').hasClass('open')) {
                $('.cont').addClass('blur');
            }
        });

        $('.close').click(function() {
            $('.modal').removeClass('open');
            $('.cont').removeClass('blur');
        });
    });

   $(function() {
  
  
  
  Books.init();
  
  
  
  });
</script>
@endsection