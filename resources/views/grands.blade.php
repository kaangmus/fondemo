<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>GRANTS-TIMELINE</title>
  <link rel="icon" href="{{ settings('favicon') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <link href="{{ asset('css/all.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  @include('partials.header')
  <div class="banner">
          
          
        
          <div class="container-fluid">
            
            <div class="row  justify-content-center grand_banner">
              <div class="slider_content">
              
                <span class="text-center">
                  <h2 class="sliderfont text-light text-center text_align18">Participate in the projects you care about:</h2>
                </span>
                <div class="slider_btn text-center">
                  <a class="button_main" href="#">Donate</a>
                </div>
              
              
              </div>
             
            </div>
          </div>

          <figure class="placeholder" data-large="{{asset('images/gbanner.jpg')}}">
            <img src="{{asset('images/gbanner.jpg')}}" class="img-small">
            <div style="padding-bottom: 50%;"></div>
          </figure>


          
         <div class="scroll_down_area">
          <a href="#grands" class="scrool_down"><span></span></a>
          </div>
</div>

    <section id="grands">

      <h1 class="text-center">USD <?php echo number_format($total); ?> FOCUSED ON NATURE GRANTS TO WILDLIFE CONSERVATION PROJECTS SINCE 2009</h1>
      <h5 class="text-center">Click years and organizations to view more</h5>
         <div class="container-fluid">
            <div class="row">
              <div id="conference-timeline">
                <div class="conference-center-line"></div>
                <div class="conference-timeline-content">
                  <!-- total -->
                  <div class="timeline-article">
                    <div class="content-left-container">

                      <div class="content-left collapse" id="grants" >
                      
                         <div id="second_grants">
                           <h5 class="view_more" title="grants">view more</h5>
                       
                            
                            @foreach($ngos as $key => $ngo)
                               
                              <h3>{{$ngo->name}}</h3>
                                <div  class="collapse grants total{{$ngo->id}} ">
                                    @if($ngo->photo)
                                      <img class="gomodal_img" src="{{$ngo->photo->getUrl()}}">
                                    @endif
                                  <h6 >{!!$ngo->description!!}</h6>
                                </div> 
                            @endforeach 
                          </div>    
                      </div>
                    </div>
                    <div class="content-right-container" >
                      
                      <div class="content-right collapse" id="grants">
                        
                      @foreach($species as $key => $specieGroup)
                             
                         
                   
                        <h3 class="{{$key}}">{{$key}}</h3>
                        
                        @foreach($specieGroup as $specie)
                        
     
                          @if(isset($specie->prices[0]))
                          <div class="species {{$specie->type}}">
                                @if($specie->image)
                                <img class="rimage" src="{{$specie->image->getUrl()}}">
                                @endif
                                <h5>{{$specie->name}}</h5>
                                @foreach($specie->price as $yearKey => $ngo)
                                    <p>                                          
                                          <?php 
                                            $specie_total_by_ngo = 0;
                                            $uniq_ngo_id = 0;
                                            $ngo_name = 0;
                                          ?>
                                          @foreach($ngo as $ngoprice)
                                            <?php 
                                            $uniq_ngo_id = $ngoprice->ngo_id;
                                            $specie_total_by_ngo = $specie_total_by_ngo+$ngoprice->price;
                                            ?>
                                          @endforeach
                                        ${{ number_format($specie_total_by_ngo) }} 
                                                                                 
                                    </p>
                                    <p>
                                    <a href="javascript:void(0)" class="company" data-toggle="modal" data-target="#grands{{$uniq_ngo_id}}">
                                        {{$yearKey}}
                                      </a>
                                     <div class="modal fade" id="grands{{$uniq_ngo_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">{{$yearKey}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                           <div class="modal-body" id='ngomodal'>
                                              @if(App\Ngo::find($uniq_ngo_id)->photo)
                                               <img class="gomodal_img" src="{{App\Ngo::find($uniq_ngo_id)->photo->getUrl()}}">
                                              @endif
                                             <h6 >{!!App\Ngo::find($uniq_ngo_id)->description!!}</h6>
                                         
                                          </div>
      
                                      </div>
                                    </div>
                                  </div>
     
                                    </p>
                                @endforeach                                    
                          </div>
                          @endif
                        @endforeach
                      @endforeach
                      </div>
 
                      <h4 class="text-center">$<?php echo number_format($total); ?></h4>
                    </div>
                    <div class="meta-date" data-toggle="collapse" data-target="#grants">
                      <span class="date" >All Years</span>
                    </div>
                  </div>
                  <!-- //end total -->



                  

                  @foreach($years as $key=>$mainyear)
                  @if(!$mainyear->speciesbyyear->isEmpty() )

                
               
                   <div class="timeline-article">
                    <div class="content-left-container">
                  
                      <div class="content-left collapse" id="year{{$mainyear->year}}">
                        <div>
                          <h5 class="view_more" title="year{{$mainyear->year}}">view more</h5>
                          @foreach($ngos as $kk=> $yearngo)
                           @foreach ($mainyear->speciesbyyear as $key=> $specbyyear)
                               @if($specbyyear['ngo_id']==$yearngo->id)     
                                  <h3 class="{{$yearngo->id}}">{{$yearngo->name}}</h3>
                               <div id="title{{$mainyear->year}}" class="collapse total{{$yearngo->id}}{{$mainyear->id}}">
                                    @if($yearngo->photo)
                                    <img class="gomodal_img" src="{{$yearngo->photo->getUrl()}}">
                                    @endif
                                    <h6>{!!$yearngo->description!!}</h6>
                                  </div>
                                @endif
                            @endforeach
                          @endforeach
                        </div> 
                      </div>
                    </div>
                    <div class="content-right-container">
                  
                      <div class="content-right collapse" id="year{{$mainyear->year}}">
                      <?php $array = array();$yeartotal=0;$ngobyyears=array();?>
                        @foreach ($mainyear->speciesbyyear as $key=>$specbyyear)
                          <?php $array[] = $specbyyear['specie_id'] ;
                                 $yeartotal+=$specbyyear['price'];
                                 $ngobyyears[] =$specbyyear['ngo_id'];

                                
                             
                           ?>   
                             
                        @endforeach
                        
                          <?php $array = array_flatten($array);
                                   $spcids=array_unique($array);
                                   $ngobyyears = Arr::flatten($ngobyyears);
                                 $ngobyyears

                                
                                  
                                
                                  
                                  
                           ?>
                           
                           <?php $allspedd='0'; ?>
                           @foreach($allspecies as $ky=>$allspe)
                           @foreach($spcids as $it=> $spcid)
                            
                           
                            
                             @if($allspe->id==$spcid && $allspe->type=='MARINE')
                              
                               <?php $allspedd=$allspe->id; ?>
                             @endif
                            
                            
                             @endforeach
                             @endforeach 
                            
                            @if($allspedd != 0) 
                              <h3 class="MARINE marine{{$mainyear->year}}">Marine</h3>
                            @endif
                            @foreach($allspecies as $ky=>$allspe)
                              @foreach($spcids as $it=> $spcid)
                          
                              
                              
                                @if($allspe->id==$spcid && $allspe->type=='MARINE')
                                  @if($allspe->image)
                                  <div class="species {{$specie->type}}">
                                  <img class="rimage" src="{{$allspe->image->getUrl()}}">
                                  @endif
                                   <h5>{{$allspe->name}}</h5>
                                   @foreach($allspe->speciesNgos as $tt => $sngo)
                                      @foreach ($mainyear->speciesbyyear as $key=> $specbyyear)
                                         @if ($specbyyear['ngo_id']==$sngo->id)
                                            <p>${{ number_format($specbyyear['price']) }}</p>
                                             <p>
                                              <a href="javascript:void(0)" id="company" data-toggle="modal" data-target="#modal{{$mainyear->year}}{{$sngo->id}}">
                                                {{$sngo->name}}
                                                    </a>
                                      <div class="modal fade" id="modal{{$mainyear->year}}{{$sngo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">{{$sngo->name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                           <div class="modal-body" id='ngomodal'>
                                              @if($sngo->photo)
                                               <img class="gomodal_img"  src="{{$sngo->photo->getUrl()}}">
                                              @endif
                                             <h6 >{!!$sngo->description!!}</h6>
                                         
                                          </div>
      
                                      </div>
                                    </div>
                                  </div>
     

                                                </p>
                                          @endif
                                      @endforeach
                                  @endforeach
                                  </div>
                                 @endif  
                               @endforeach  
                           @endforeach
                           <?php $allspedd='0'; ?>
                         @foreach($spcids as $it=> $spcid)
                            
                            @foreach($allspecies as $ky=>$allspe)
                            
                             @if($allspe->id==$spcid && $allspe->type=='TERRESTRIAL')
                              
                                  <?php $allspedd=$allspe->id;?>
                             
                            @endif
                        
                        
                            @endforeach
                          @endforeach
                          
                           @if($allspedd != 0)
                           <h3 class="TERRESTRIAL TERRESTRIAL{{$mainyear->year}}">TERRESTRIAL</h3>
                           @endif
                           @foreach($allspecies as $ky=>$allspe)
                            @foreach($spcids as $it=> $spcid)
                            
                               
                            
                                   @if($allspe->id==$spcid && $allspe->type=='TERRESTRIAL')
                                        <div class="species {{$specie->type}}">
                                            @if($allspe->image)
                                                <img class="rimage" src="{{$allspe->image->getUrl()}}">
                                            @endif
                                                 <h5>{{$allspe->name}}</h5>
                                                      @foreach($allspe->speciesNgos as $tt => $sngo)
                                                         @foreach ($mainyear->speciesbyyear as $key=> $specbyyear)
                                                            @if ($specbyyear['ngo_id']==$sngo->id)
                                                            <p>${{ number_format($specbyyear['price']) }}</p>
                                                            <p>
                                                              <a href="javascript:void(0)" id="company" data-toggle="modal" data-target="#modal{{$mainyear->year}}{{$sngo->id}}">
                                                {{$sngo->name}}
                                                    </a>
                                      <div class="modal fade" id="modal{{$mainyear->year}}{{$sngo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">{{$sngo->name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                           <div class="modal-body" id='ngomodal'>
                                              @if($sngo->photo)
                                               <img src="{{$sngo->photo->getUrl()}}">
                                              @endif
                                             <h6 >{!!$sngo->description!!}</h6>
                                         
                                          </div>
      
                                      </div>
                                    </div>
                                  </div>
                                                            </p>
                                                            @endif
                                                            @endforeach

                                                      @endforeach
                                          </div>
                                    @endif
                                @endforeach
                            @endforeach

                        
                        
                          
                          
                     
                      
                           
                      
                    
                       
                     

                          

                            
                            
                 
                      
                      
                       
                  
                  
                      </div>
                  
                      <h4 class="text-center">$<?php echo number_format($yeartotal); ?></h4>
                    </div>
                    <div class="meta-date">
                      <span class="date" data-toggle="collapse"
                        data-target="#year{{$mainyear->year}}">{{$mainyear->year}}</span>
                    </div>
                  </div>
                  @endif
                  @endforeach
                 



                   
                  <!-- // Article -->
              
                </div>
            </div>
        </div>     
    </section>
@include('partials.footer')    
<script src="{{ asset('js/jquery-1.12.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript">
$(window).scroll(function () {
  var sticky = $('.myheader'),
  scroll = $(window).scrollTop();
  
  if (scroll <= 90) sticky.removeClass('sticky'); else sticky.addClass('sticky'); });


    $(".view_more").on("click", function () {
      $(this).text(function (i, v) {
      return v === 'view more' ? 'view less' : 'view more'
      })
      var idvalue = this.title;

      if ($(this).text() === 'view more') {

      $("#" + this.title + " .collapse").collapse('hide');

      } else {
      $("#" + this.title + " .collapse").collapse('show');
      }
    });

   $('.company').popover();
  $('.company').click(function () {
  $('.company').not(this).popover('hide');
  });



  window.onload = function() {
  var placeholders = document.querySelectorAll('.placeholder');
  for (var i = 0; i < placeholders.length; i++) {
    loadImage(placeholders[i]);
  }

  function loadImage(placeholder) {
    var small = placeholder.children[0];

    // 1: load small image and show it
    var img = new Image();
    img.src = small.src;
    img.onload = function() {
      small.classList.add('loaded');
    };

    // 2: load large image
    var imgLarge = new Image();
    imgLarge.src = placeholder.dataset.large;
    imgLarge.onload = function() {
      imgLarge.classList.add('loaded');
    };
    placeholder.appendChild(imgLarge);
  }
}
</script>
</body>

</html>

