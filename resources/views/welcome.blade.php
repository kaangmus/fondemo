@extends('layouts.front')
@section('content')
<!-- Start Slider Area -->
<div id="slidercontainer" class="slider-area">
  <div class="bend niceties preview-2">
    <div id="ensign-nivoslider" class="slides">
      @foreach($sliders as $key => $slider)
      @if($slider->image)
      <img src="{{ asset($slider->image->getUrl('large')) }}" alt="" title="#slider-direction-{{ $slider->id ?? '' }}" />
      @endif
      @endforeach
    </div>
    @foreach($sliders as $key => $slider)
    <div id="slider-direction-{{ $slider->id ?? '' }}" class="slider-direction slider-one">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content">
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
        <h4 class="text-center">Emergency funds</h4>
        @foreach ($fundposts as $key=>$fundpost)
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
        <span class="p-1"></span>
       <h4 class="text-center">Focused Articles</h4>
        @foreach ($faposts as $key=>$fapost)
        <div class="latest_news  flex-column flex-md-row">
          <a href="@if($fapost->link){{$fapost->link}}@else/post/{{$fapost->id}}@endif" @if($fapost->link)target="_blank"@endif>
            @if($fapost->featured_image)
            <img src="{{ $fapost->featured_image->getUrl('medium') }}" alt="#" class="mr-3 wh-100">
            @endif
          </a>
          <div class="media-body align-self-center">
            <a href="@if($fapost->link){{$fapost->link}}@else/post/{{$fapost->id}}@endif" @if($fapost->link)target="_blank"@endif>
              <h6>{!!$fapost->title!!}</h6>
            </a>
            <a href="@if($fapost->link){{$fapost->link}}@else/post/{{$fapost->id}}@endif" class="news_paragraph" @if($fapost->link)target="_blank"@endif>
              <p>{!!$fapost->excerpt!!}</p>
            </a>
          </div>
        </div>
        @endforeach
      </div>
      <!-- end col-md-4-->
      <div class="col-md-8">
        <div class="post-thumb ts-resize">
          <a href="@if($larges->link){{$larges->link}}@else/post/{{$larges->id}}@endif" @if($larges->link)target="_blank"@endif>
            @if($larges->featured_image)
            <img src="{{ $larges->featured_image->getUrl() }}" class="attachment-digiqole-medium" alt="">
            @endif
          </a>
          <div class="new_second_text">
            <a href="@if($larges->link){{$larges->link}}@else/post/{{$larges->id}}@endif" @if($larges->link)target="_blank"@endif>
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
              <a href="@if($medium->link){{$medium->link}}@else/post/{{$medium->id}}@endif" @if($medium->link)target="_blank"@endif>
                @if($medium->featured_image)
                <img src="{{ $medium->featured_image->getUrl() }}" class="attachment-digiqole-medium" alt="">
                @endif
              </a>
              <div class="new_third_text">
                <a href="@if($medium->link){{$medium->link}}@else/post/{{$medium->id}}@endif" @if($medium->link)target="_blank"@endif>
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
            <img src="{{$whoweare->photp->getUrl()}}" alt="#" class="mr-3 advisor"
              style="width:100px;height:100px">
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
            <img src="{{$advisor->photp->getUrl()}}" alt="#" class="mr-3 advisor"
              style="width:100px;height:100px">
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
<!-- Grands -->
<div id="grants_homeid" class="grants_home">
  <img src="{{asset('images/gbanner.jpg')}}" alt="Snow" style="width:100%;">
  <div class="toped">
    <a href="/grants" class="grants_button">
    <h2 class="maincolor text-center grant_tcolor">GRANTS TIMELINE</h2>
    <h2 class="maincolor text-light text-center">USD <?php echo number_format($ngopricestotal); ?> FOCUSED ON NATURE GRANTS TO WILDLIFE CONSERVATION PROJECTS SINCE 2009
     </h2>
   </a>
  </div>
</div>
{{-- end grands --}}
<!-- digital brounch -->
<section id="digital" class="digital_section">
  <div class="container">
    <h2 class="maincolor text-center">DIGITAL BROCHURES</h2>
  </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-8 offset-md-2 text-center text-white">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          @foreach ($digitalbrochures as $pdfid=> $digitalbrochure)
          <div class="swiper-slide">
            <td>
              @if($digitalbrochure->digitalphoto)
              <img src="{{ $digitalbrochure->digitalphoto->getUrl() }}" class="swiper-lazy">
              @endif
            </td>
            <div class="digital_slider_text">
              <h2 class="digital_title">{{$digitalbrochure->name}}</h2>
              <a href="{{$app_url}}/digitalpdf/{{$digitalbrochure->id}}" class="btn digit_read_button ajax-popup-link"
                type="button"><i class="fas fa-bars"></i>VIEW</a>
            </div>
          </div>
          @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </div>
</section>
{{-- end digital --}}
{{-- google map --}}
<div id="map" style="width: 100%; height: 400px;"></div>
{{-- end google map --}}

{{-- exivation timeline --}}
<section id="exhibiton" class="exhibiton_section">
  <h1 class="text-center maincolor">Exhibiton Timeline</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <section class="cd-horizontal-timeline">
          <div class="timeline">
            <div class="events-wrapper">
              <div class="events">
                <ol>
                  <li><a href="#0" data-date="01/09/2015" class="selected">2015</a></li>
                  <li><a href="#0" data-date="01/09/2016">2016</a></li>
                  <li><a href="#0" data-date="01/09/2017">2017</a></li>
                  <li><a href="#0" data-date="01/09/2018">2018</a></li>
                  <li><a href="#0" data-date="01/09/2019">2019</a></li>
                  <li><a href="#0" data-date="01/09/2020">2020</a></li>
                </ol>
                <span class="filling-line" aria-hidden="true"></span>
              </div>
              <!-- .events -->
            </div>
            <!-- .events-wrapper -->
            <ul class="cd-timeline-navigation">
              <li><a href="#0" class="prev inactive">Prev</a></li>
              <li><a href="#0" class="next">Next</a></li>
            </ul>
            <!-- .cd-timeline-navigation -->
          </div>
          <!-- .timeline -->
          <div class="events-content">
            <ol>
              <li class="selected" data-date="16/01/2014">
                <h2>An Introduction to Infosec</h2>
                <em>January, 2017</em>
                <p>
                  Back in January, 2017 I began my journey of studies into different areas of infosec to see if it was a
                  challenge I would enjoy and a future prospect for further learning through college.
                </p>
              </li>
              <li data-date="01/09/2015">
                <h2>Fanshawe College Cyber Security</h2>
                <em>September, 2017</em>
                <p>
                  In September, 2018 I enrolled into the Cyber Security course at Fanshawe College.
                </p>
                <br>
                <p>Key courses include: </p>
              </li>
              <li data-date="01/12/2017">
                <h2>CTF</h2>
                <em>December, 2017</em>
                <p>
                  Participated in CTF.
                </p>
              </li>
              <li data-date="01/03/2018">
                <h2>Event title here</h2>
                <em>May 20th, 2014</em>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae
                  ipsa,
                  quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur
                  quae, ut
                  harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet
                  quibusdam
                  quisquam, quae, temporibus dolores porro doloribus.
                </p>
              </li>
              <li data-date="01/09/2016">
                <h2>Event title here</h2>
                <em>July 9th, 2014</em>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae
                  ipsa,
                  quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur
                  quae, ut
                  harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet
                  quibusdam
                  quisquam, quae, temporibus dolores porro doloribus.
                </p>
              </li>
              <li data-date="01/09/2017">
                <h2>Event title here</h2>
                <em>August 30th, 2014</em>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae
                  ipsa,
                  quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur
                  quae, ut
                  harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet
                  quibusdam
                  quisquam, quae, temporibus dolores porro doloribus.
                </p>
              </li>
              <li data-date="01/09/2018">
                <h2>Event title here</h2>
                <em>September 15th, 2014</em>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae
                  ipsa,
                  quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur
                  quae, ut
                  harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet
                  quibusdam
                  quisquam, quae, temporibus dolores porro doloribus.
                </p>
              </li>
              <li data-date="01/09/2019">
                <h2>Event title here</h2>
                <em>November 1st, 2014</em>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae
                  ipsa,
                  quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur
                  quae, ut
                  harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet
                  quibusdam
                  quisquam, quae, temporibus dolores porro doloribus.
                </p>
              </li>
              <li data-date="01/09/2020">
                <h2>Event title here</h2>
                <em>December 10th, 2014</em>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae
                  ipsa,
                  quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur
                  quae, ut
                  harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet
                  quibusdam
                  quisquam, quae, temporibus dolores porro doloribus.
                </p>
              </li>
              <li data-date="19/01/2015">
                <h2>Event title here</h2>
                <em>January 19th, 2015</em>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae
                  ipsa,
                  quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur
                  quae, ut
                  harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet
                  quibusdam
                  quisquam, quae, temporibus dolores porro doloribus.
                </p>
              </li>
            </ol>
          </div>
          <!-- .events-content -->
        </section>
      </div>
    </div>
  </div>
</section>
{{-- exbition timeline --}}
{{-- species essay --}}
<div id='species_essay' class="grants_home bg-dark">
  <img src="{{asset('images/sub_banner.png')}}" alt="Snow" style="width:100%;">
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
{{-- species essay --}}
{{-- online shop --}}
<section id="online_shop">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class='maincolor'>SHOP</h1>
        <p>Through the eyes of our Explorers, photographers, journalists, and filmmakers</p>
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
<section id='instagram'>
  <h1 class='maincolor text-center'>Follow Us On Instagram</h1>
  <!-- LightWidget WIDGET -->
  <!-- SnapWidget -->
  <!-- SnapWidget -->
  <script src="https://snapwidget.com/js/snapwidget.js"></script>
  <iframe src="https://snapwidget.com/embed/791321" class="snapwidget-widget" allowtransparency="true" frameborder="0"
    scrolling="no" style="border:none; overflow:hidden;  width:100%; "></iframe>
 
 
</section>
{{-- instagram  --}}
@endsection
@section('scripts')

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script defer>
  var locations = [
    ['Bondi Beach', -33.890542, 151.274856, 4],
    ['Coogee Beach', -33.923036, 151.259052, 5],
    ['Myanmar', 18.7807153, 151.157507, 3],
    ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
    ['Maroubra Beach', -33.950198, 151.259302, 1],
    ['Maroubra Beach', -41.0000, 151.259302, 5],
    ['india',20.0123533,64.4487244,6],
    ['pa',9.0000,-80.0000,7],
    ['pe',-10.0000,-76.0000,8],
    ['pf',-15.0000,-140.0000,9],
    ['pg',-6.0000,147.0000,10],
    ['ph',13.0000,122.0000,11],
    ['pk',30.0000,70.0000,12],
    ['pl',52.0000,20.0000,13],
    ['pm',46.8333,-56.3333,14],
    ['pr',18.2500,-66.5000,15],
    ['ps',32.0000,35.2500,16],
    ['pt',39.5000,-8.0000,17],
    ['pw',7.5000,134.5000,18],
    ['py',-23.0000,-58.0000,19],
    ['qa',25.5000,51.2500,20],
    ['re',-21.1000,55.6000,21],
    ['ro',46.0000,25.0000,22],
    ['rs',44.0000,21.0000,23],
   
    ];
    
    var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 1,
    center: {lat: 18.2500, lng: -66.5000},
    mapTypeId: 'satellite',
    });
    
    var infowindow = new google.maps.InfoWindow();
    
    var marker, i;
    
    for (i = 0; i < locations.length; i++) { marker=new google.maps.Marker({ position: new
      google.maps.LatLng(locations[i][1], locations[i][2]), map: map }); 
      google.maps.event.addListener(marker, 'click', (function (marker, i) {
                      return function () {
                         
                          infowindow.setContent(generateContent(i))
                          infowindow.open(map, marker);
                      }
                  })(marker, i)); }
   
                 
   
      function generateContent(i)
      {
          var content = `
              <div class="gd-bubble" style="">
                <div class="gggg">
                  <h4>country</h4>
                  <ul>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                  </ul>
                  </div>
             <div>
                  <h4>country</h4>
                  <ul>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                    <li><a href="#">sadfasdfasdf</a></li>
                  </ul>
              </div>
              </div>
             
          
              `;
   
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
</script>
@endsection