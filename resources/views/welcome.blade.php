@extends('layouts.front') @section('content')
<!-- Start Slider Area -->
<div id="slidercontainer" class="slider-area">
  <div class="bannerswiper">
    <div class="swiper-wrapper">
      @foreach($sliders as $key => $slider)
      <div class="swiper-slide">
            <img srcset="{{$slider->image->getUrl('thumb') }}"
            src="{{ asset($slider->image->getUrl('large')) }}" class="swiper-lazy"
            title="#slider-direction-{{ $slider->id}}">
          <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
              <div class="slider_content bannercaption{{ $slider->id}}">
                  
                    <span class="text-center">
                      <h2 class="sliderfont text-light text-center text_align{{ $slider->id}}">{{ $slider->title ?? '' }}</h2>
                     </span> 
                      @if($slider->description)<h4 id="fontsize">{{ $slider->description ?? '' }}</h4>@endif
                       @if($slider->btn_text)
                        <div class="slider_btn">
                          @if($slider->id==1)
                            <a href="javascript:void(0)" id="video_link"  class="button_main video_play_button" vidUrl="/video/intro.mp4">{{$slider->btn_text}}</a>
                          @else
                            <a class="button_main" href="{{$slider->btn_link}}">{{$slider->btn_text}}</a>
                          @endif
                         </div> 
                       @endif   

                  </div>
                 
           </div>

        
   
      @endforeach
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-next1"></div>
    <div class="swiper-button-prev swiper-button-prev1"></div>
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
              <a @if($medium->video) href="javascript:void(0)" vidUrl="{{$app_url}}/video/intro.mp4" id="video_lightbox"@else href="{{$slider->btn_link}}" @endif>
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

{{-- who we are --}}
<section id="team" class="member bg_black text-white">
  <div class="container ">
    <div class="row">
      
      <div class="tab">
      <h2 class="maincolor">who we are</h2>
        @foreach($whoweares as $key=>$whoweare)
        <button class="tablinks" onclick="openCity(event, 'who{{$whoweare->id}}')"
          id="{{$key == 0 ? 'defaultOpen':''}}"><strong>{{$whoweare->name}}</strong></button>
        @endforeach

      </div>
      <div class="whocontent">
         @foreach($whoadvisors as $key=>$whoadvisor)
            <div id="who{{$whoadvisor->id}}" class="tabcontent">
              <div class="who">
                <div class="box col" >
                  <div class="img">
                   @if($whoadvisor->photp)
                    <img src="{{$whoadvisor->photp->getUrl()}}" alt="{{$whoadvisor->name}}" class="whoadvisor_photo">
                    @endif
                  </div>
                  <div class="whoheader">
                    <h2 class="maincolor text-light">{{$whoadvisor->name}}</h2>
                    <h4>{{$whoadvisor->level}} </h4>
                   <div class="social">
                      @if($whoadvisor->facebook) <a href="{{$whoadvisor->facebook}}" target="_blank"><i class="fab fa-facebook-square"></i></a>@endif
                      @if($whoadvisor->twitter)<a href="{{$whoadvisor->twitter}}" target="_blank"><i class="fab fa-twitter-square"></i></a>@endif
                      @if($whoadvisor->instagram) <a href="{{$whoadvisor->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>@endif
                      @if($whoadvisor->website)<a href="{{$whoadvisor->website}}" target="_blank"><i class="fas fa-globe"></i></a>@endif
                      @if($whoadvisor->email)<a href="mailto:{{$whoadvisor->email}}" target="_blank"><i class="fas fa-envelope-square"></i></a>@endif
                    </div>
                    
                    
                  </div>
                </div>
               </div> 
                <div class="whodescription col" >
                  {!!$whoadvisor->description!!}
                </div>
             
            </div>
        @endforeach
      </div>

      <div class="lab">
        <h2 class="maincolor">ADVISERS</h2>
        @foreach($advisors as $key=>$advisor)
        <button class="tablinks" onclick="openCity(event, 'who{{$advisor->id}}')"><strong>{{$advisor->name}}</strong></button>
        @endforeach
      </div>
    </div>
  </div>
</section>
{{-- end who we are --}}

{{-- slide showcontent --}}
<section id="slideshows" class="digital_section">
  
    <h2 class="maincolor text-center">Slideshows</h2>
     <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="swiper-container swiper-slideshow">
          <div class="swiper-wrapper">
  
            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                
                 <a href="javascript:void(0)">
                  <img src="{{asset('slideshow/slideshow1.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                    height="300px">
                    <div class="middle">
                      <div class="play_button"><i class="far fa-play-circle"></i></div>
                    </div>
                   
                </a>
                <div class="new_third_text">
                  
                    <h3>The Living Sea</h3>
                    <p></p>
                    <p>Meeting with Hussain Aga Khan and Marta Lourenço</p>
  
                    <p>MUHNAC-University of Lisbon, 11 December 2019</p>
                 
  
                  </a>
                </div>
              </div>
            </div>
  
            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('slideshow/slideshow2.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                    >
                    <div class="middle">
                      <div class="play_button"><i class="far fa-play-circle"></i></div>
                    </div>
                </a>
                <div class="new_third_text">
                  
                    <h3>Clarion Call</h3>
                    <p></p>
                    <p>EAT Stockholm Food Forum</p>
  
                    <p>Sweden, 13 June 2019</p>
                    <p></p>
  
                  </a>
                </div>
              </div>
            </div>
  
            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                 <a href="javascript:void(0)">
                  <img src="{{asset('slideshow/slideshow3.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                    >
                    <div class="middle">
                      <div class="play_button"><i class="far fa-play-circle"></i></div>
                    </div>
                </a>
                <div class="new_third_text">
                  
                    <h3>Best of 2014-2019</h3>
                    <p></p>
                    <p></p>
  
                    <p></p>
  
                  </a>
                </div>
              </div>
            </div>
  
            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('slideshow/slideshow4.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                   >
                    <div class="middle">
                      <div class="play_button"><i class="far fa-play-circle"></i></div>
                    </div>
                </a>
                <div class="new_third_text">
                  
                    <h3>Sharks</h3>
                    <p></p>
                    <p>OCEANA board meeting</p>
  
                    <p>Washington DC, December 4-5, 2018</p>
                    <p></p>
  
                  </a>
                </div>
              </div>
            </div>
  
            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('slideshow/slideshow5.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                    >
                    <div class="middle">
                      <div class="play_button"><i class="far fa-play-circle"></i></div>
                    </div>
                </a>
                <div class="new_third_text">
                  
                    <h3>Bimini</h3>
                    <p></p>
                    <p>2013-1017</p>

                    <p></p>
  
                  </a>
                </div>
              </div>
            </div>
  
            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('slideshow/slideshow6.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                   >
                   <div class="middle">
                    <div class="play_button"><i class="far fa-play-circle"></i></div>
                  </div>
                </a>
                <div class="new_third_text">
                  
                    <h3>Cocos Island</h3>
                    <p></p>
                    <p>June 2017</p>
                    <p></p>
  
                  </a>
                </div>
              </div>
            </div>
  
            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('slideshow/slideshow7.JPG')}}" class="attachment-digiqole-medium" alt="" width="445px"
                    >
                    <div class="middle">
                      <div class="play_button"><i class="far fa-play-circle"></i></div>
                    </div>
                </a>
                <div class="new_third_text">
                  
                    <h3>The Exumas</h3>
                    <p></p>

  
                    <p>January 2017</p>
                    <p></p>
  
                  </a>
                </div>
              </div>
            </div>
  

  
            
  
            <!-- Add Pagination -->
          </div>
          <div class="swiper-button-prev swiper-button-prev3"></div>
          <div class="swiper-button-next swiper-button-next3"></div>
  
        </div>
      </div>
    </div>
  </div>
</section>
{{-- end slde show --}}
<!-- digital brounch -->

@php
$data = file_get_contents ('http://hakimages.com/ws_brochures.php');
$json = json_decode($data);
$jsons=array_slice($json, -11, 11, true);



@endphp


<section id="digital" class="digital_section bg_black">
  <div class="container">
    <h2 class="maincolor text-center">DIGITAL BROCHURES</h2>
    <p class="text-center text-light">Discover the latest Digital Brochures</p>
  </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center text-white">
      <div class="swiper-container swiper_digital">
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
        <div class="swiper-button-prev swiper-button-prev2"></div>
        <div class="swiper-button-next swiper-button-next2"></div>
      </div>
      <a class="button_main" href="#">View all Brochures</a>
    </div>
  </div>

</section>
{{-- end digital --}}

{{-- slide showcontent --}}
<section id="digital" class="digital_section">

    <h2 class="maincolor text-center">SPEECHES & ESSAYS </h2>
    <p class="text-center"></p>
   <div class="container">
    <div class="row">
      <div class="col-md-12 overflow-hidden">
        <div class="swiper-container swiper-speecies">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('species/species1.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                   >
                   <div class="middle">
                    <div class="read_button"><i class="fas fa-bars"></i>READ</div>
                  </div>
                </a>
                <div class="new_third_text">
                  
                    <h3>The Living Sea</h3>
                    <p></p>
                    <p>National Museum of Natural History and Science , </p>

                    <p>Lisbon, September 2019</p>
                    

                  </a>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('species/species2.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                    >
                    <div class="middle">
                      <div class="play_button"><i class="far fa-play-circle"></i></div>
                    </div>
                </a>
                <div class="new_third_text">
                  
                    <h3>The Living Sea</h3>
                    <p></p>
                    <p>MUNHAC  </p>

                    <p>Lisbon, September 2019</p>
                    <p></p>

                  </a>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('species/species3.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                   >
                   <div class="middle">
                    <div class="read_button"><i class="fas fa-bars"></i>READ</div>
                  </div>
                </a>
                <div class="new_third_text">
                  
                    <h3>Clarion Call</h3>
                    <p></p>
                    <p>EAT Stockholm Food Forum  </p>

                    <p>Sweden, June 13, 2019</p>
                    <p></p>

                  </a>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('species/species4.JPG')}}" class="attachment-digiqole-medium" alt="" width="445px"
                   >
                   <div class="middle">
                    <div class="play_button"><i class="far fa-play-circle"></i></div>
                  </div>
                </a>
                <div class="new_third_text">
                  
                    <h3>Clarion Call</h3>
                    <p></p>
                    <p>EAT Stockholm Food Forum  </p>

                    <p>Sweden, June 13, 2019</p>
                    <p></p>

                  </a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('species/species5.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                   >
                  <div class="middle">
                    <div class="read_button"><i class="fas fa-bars"></i>READ</div>
                  </div>
                   
                </a>
                <div class="new_third_text">
                  
                    <h3>SIPA</h3>
                    <p></p>
                    <p>School of International and Public Affairs, </p>

                    <p>March 2019</p>
                    <p></p>

                  </a>
                </div>
              </div>
            </div>

           
             
            </div>
            <!-- Add Pagination -->
          </div>
          <div class="swiper-button-prev swiper-button-prev4"></div>
          <div class="swiper-button-next swiper-button-next4"></div>

        </div>
      </div>
    </div>

</section>
{{-- end slde show --}}



<!-- Grands -->
<div id="grants_homeid" class="grants_home overflow-hidden">
  <a href="/grants" class="grants_button">
    <img src="{{asset('images/gbanner.jpg')}}" alt="Snow" style="width:100%;">
    <div class="granttimelime">

      <h2 class="maincolor text-center ">GRANTS TIMELINE</h2>
      <p class="text-light text-center">USD
        <?php echo number_format($ngopricestotal); ?> Focused on Nature Grants to wildlife conservation projects since 2009
      </p>

    </div>
  </a>
</div>
{{-- end grands --}}

{{-- exivation timeline --}} @include('exhibition') {{-- exbition timeline --}}



 {{-- google map --}}

<div id="map" style="width: 100%; height: 700px;" ></div> 
{{-- end google map --}} 

<div id="grants_homeid" class="grants_home">
  <a href="#" class="search map">
    <img src="{{asset('images/searchmap.jpg')}}" alt="Snow" style="width:100%;">
    <div class="toped">
    
      {{-- <h2 class="maincolor text-center grant_tcolor"></h2> --}}
      <h2 class="sliderfont text-light text-center text_align18 ">Search and purchase photos by country / by year / by category</h2>
     
    </div>
  </a>
</div>


{{-- online shop --}}
<section id="digital" class="shop_section">

  <h2 class="maincolor text-center">SHOP</h2>
  <p class="text-center"></p>
  <div class="container">
    <div class="row">
      <div class="col-md-12 overflow-hidden">
        <div class="swiper-container swiper-shop">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('shop/shop1.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                    height="250px">
                </a>
                <div class="new_third_text">
                  
                    <h3 class="text-uppercase">Art Prints</h3>
                 

                  </a>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('shop/shop2.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                    height="250px">
                </a>
                <div class="new_third_text">
                  
                    <h3 class="text-uppercase">Books</h3>
                  

                  </a>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="post-thumb ts-resize img_hover">
                <a href="javascript:void(0)">
                  <img src="{{asset('shop/shop3.jpg')}}" class="attachment-digiqole-medium" alt="" width="445px"
                    height="300px">
                </a>
                <div class="new_third_text">
                  
                    <h3 class="text-uppercase">Stenella</h3>
                    

                  </a>
                </div>
              </div>
            </div>

            



          </div>
          <!-- Add Pagination -->
        </div>
        <div class="swiper-button-prev swiper-button-prev5"></div>
        <div class="swiper-button-next swiper-button-next5"></div>

      </div>
    </div>
  </div>

</section>
{{-- end online shop --}}
<!-- instagram -->
<section id='instagram' class="bg_black">
  <h1 class='maincolor text-center btton50'>Follow Us On Instagram</h1>

  <!-- SnapWidget -->
  <div class="container">

      <script src="https://snapwidget.com/js/snapwidget.js"></script>
      <iframe src="https://snapwidget.com/embed/794602" class="snapwidget-widget" allowtransparency="true" frameborder="0"
        scrolling="no" style="border:none; overflow:hidden;  width:100%; height: 610px;"></iframe>
   </div>
</section>


<div class="overlay vid-link" vidUrl="#"></div>
<div class="main-vid-box">

  <div class="videoWrapper">
    <video autoplay="autoplay" class="myVideo" src="" frameborder="0" controls></video>
  </div>
</div>
 <img class="close vid-link" vidUrl="#" src="images/cancel.svg">

{{-- instagram --}} @endsection @section('scripts')

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
 


</script>




<script>
  function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();




    
</script>
<script>

var swiper = new Swiper('.swiper-slideshow', {
slidesPerView: 3,
spaceBetween: 50,
navigation: {
nextEl: '.swiper-button-next3',
prevEl: '.swiper-button-prev3',
},


});

</script>
<script>
  var swiper = new Swiper('.swiper-speecies', {
slidesPerView: 3,
spaceBetween: 50,
navigation: {
nextEl: '.swiper-button-next4',
prevEl: '.swiper-button-prev4',
},


});

</script>
<script>
  var swiper = new Swiper('.swiper-shop', {
slidesPerView: 3,
spaceBetween: 50,
navigation: {
nextEl: '.swiper-button-next5',
prevEl: '.swiper-button-prev5',
},


});

</script>
<script>
  var swiper = new Swiper('.bannerswiper', {

  loop: true,
  lazy: true,
  pagination: {
  el: '.swiper-pagination',
  clickable: true,
  },
  navigation: {
  nextEl: '.swiper-button-next1',
  prevEl: '.swiper-button-prev1',
  },
  });
  
</script>
<script>
  $(document).ready(function () {
  $('.video-link').click(function () {
  
  $('.myVideo').attr("src", $(this).attr("vidUrl"));
  $('.overlay').fadeIn(500, function () {
  $('.main-vid-box').fadeIn(500);
  $('.close').fadeIn(500);
  });
  });
  
  $('.close, .overlay').click(function () {
  $('.overlay').fadeOut(500);
  $('.myVideo').attr("src", $(this).attr("vidUrl"));
  $('.main-vid-box').fadeOut(500);
  $('.close').fadeOut(500);
  });
  });
</script>

@endsection