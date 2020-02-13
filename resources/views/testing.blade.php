@extends('layouts.front')
@section('content')

    <section style="display:none" id="grands">
         <div class="container">
            <div class="row">
             <div class="cntl"> <span class="cntl-bar cntl-center"> <span class="cntl-bar-fill"></span> </span>
                <div class="cntl-states">
                   <div class="cntl-state">
                      <div class="cntl-content">
                        <div class="accordion">
                          <h3 class="accordion-header">MARINE</h3>
                            <div class="accordion-content">
                            @foreach($years as $key => $year)
                                @foreach($year->yearngos as $key => $item)
                                    @foreach($item->species as $key => $species)
                                        @if($species->type=='MARINE')
                                        <div class="species">
                                                <div><img class="rounded" src="http://lorempixel.com/50/50"></div>
                                                <div>{{$species->name}}</div>
                                                <div>${{$item->donate}}</div>
                                                <div class="company">{{$item->name}}</div>
                                                <?php $total+=$item->donate;?>
                                            </div>
                                        @endif   
                                    @endforeach
                                    @endforeach
                                @endforeach 
                            </div>     

                            <h3 class="accordion-header">TERRESTRIAL</h3>
                            <div class="accordion-content">
                                @foreach($years as $key => $year)
                                 @foreach($year->yearngos as $key => $item)
                                  @foreach($item->species as $key => $species)
                                    @if($species->type=='TERRESTRIAL')
                                        <div class="species">
                                            <div><img class="rounded" src="http://lorempixel.com/50/50"></div>
                                            <div>{{$species->name}}</div>
                                            <div>${{$item->donate}}</div>
                                            <div class="company">{{$item->name}}</div>
                                            <?php $total+=$item->donate;?>
                                        </div>
                                        @endif
                                   @endforeach
                                  @endforeach
                                @endforeach
                            </div>
                          </div>   
                                <h4>Total=$<?php echo $total; ?>.00</h4>
                                
                            </div>
                            <div class="cntl-image">
                               @foreach($years as $key => $year)
                                 @foreach($year->yearngos as $key => $item)
                                   @if($item->photo)
                                     <img src="{{$item->photo->getUrl()}}">
                                   @endif  
                                   <h3>{{$item->name}}</h3>
                                    <p>{{$item->description}}</p>
                                 @endforeach
                                @endforeach   
                            </div>
                         
                    
                      <div class="cntl-icon cntl-center">Total</div>
                    </div>
             
          
          
                
                @foreach($years as $key => $year)
                   <div class="cntl-state">
                          <div class="cntl-content">
                                <?php $subtotal=0;  ?>
                              
                              <div class="accordion">  
                                  <h3 class="accordion-header">MARINE</h3>
                                    <div class="accordion-content">
                                     <div class="species">
                                       @foreach($year->yearngos as $key => $item)  
                                        @foreach($item->species as $key => $species)
                                          @if($species->type=='MARINE')
                                           <div><img class="rounded" src="http://lorempixel.com/50/50"></div>
                                            <div>{{$species->name}}</div>
                                            <div>${{$item->donate}}</div>
                                            <div class="company"><a  href="#">{{$item->name}}</a></div>
                                           @endif
                                         @endforeach
                                        @endforeach
                                      </div>
                                     </div>
                                   <h3 class="accordion-header">TERRESTRIAL</h3>
                                    <div class="accordion-content">
                                     <div class="species">
                                       @foreach($year->yearngos as $key => $item)  
                                        @foreach($item->species as $key => $species)
                                          @if($species->type=='TERRESTRIAL')
                                           <div><img class="rounded" src="http://lorempixel.com/50/50"></div>
                                            <div>{{$species->name}}</div>
                                            <div>${{$item->donate}}</div>
                                            <div class="company"><a  href="#">{{$item->name}}</a></div>
                                           @endif
                                         @endforeach
                                        @endforeach
                                      </div>
                                     </div>
                               </div>
                              @foreach($year->yearngos as $key => $item)
                                  
                                     <?php $subtotal+=$item->donate;?> 
                                 
                               @endforeach
                              <h4>Total=$<?php echo $subtotal; ?>.00</>             
                            </div>
                         <div class="cntl-image">
                             @foreach($year->yearngos as $key => $item)
                                @if($item->photo)
                                  <img src="{{$item->photo->getUrl()}}">
                                @endif  
                                <h3>{{$item->name}}</h3>
                                <p>{{$item->description}}</p>
                              @endforeach
                                 
                         </div>
                          
                    <div class="cntl-icon cntl-center">{{ $year->year ?? '' }}</div>
                </div>
             
            @endforeach
                
            </div>
            </div>
        </div>     
    </section>


<b>{{ count($data['years']) }} <b>  years Found..
<hr>

 AllTotal Price <i> {{$data['total']}} </i> <br>
<hr>
@foreach( $data['years'] as $key=>$YearIn )
 
    Yearly Total Price {{$YearIn['total_in']}}
    <hr>
    @foreach( $YearIn['NgoSpecie'] as $ngoprice )
      <hr>
      {{ $ngoprice['price'] }}
      <br>
      <h1>NGO</h1>
      {{ $ngoprice['ngo'] }}
      <br>
      <h1>Specie</h1>
      {{ $ngoprice['specie'] }}
      <hr>
    @endforeach
    <hr>
    <hr>
   
@endforeach

@endsection






