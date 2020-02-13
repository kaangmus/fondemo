@foreach($yearsData as $key => $year)            
                  <!-- Article -->
                 <div class="timeline-article">
                    <div class="content-left-container">
                      
                    <div class="content-left collapse" id="year{{$year['year']->year}}">
                        @foreach($year->yearngos as $key => $yearngo)
                            <h3 class="">{{$yearngo->name}}</h3>
                               @if($yearngo->photo)
                                 <img class="rimage" src="{{$yearngo->photo->getUrl()}}">
                                @endif
                             <h6 id="total{{$yearngo->id}}" class="collapse">{{$yearngo->description}}</h6>
                        @endforeach
                      </div>
                    </div>
                    <div class="content-right-container">
                      
                      <div class="content-right collapse" id="year{{$year['year']->year}}">
                        <?php $total=0; ?>
                           <h3 class="marine">MARINE</h3>
                          @foreach($year->yearngos as $key => $yearngo)
                               @foreach ($yearngo->species as $species)
                                
                                      @if($species->type=='MARINE')
                                         <div class="species">
                                            @if($species->image)
                                             <img class="rimage" src="{{$species->image->getUrl()}}">
                                             @endif
                                        <h5>{{$species->name}}</h5>

                                     @foreach($species->speciesNgos as $key => $speciesngo)
                                       

                                        <p> 
                                          
                                         
                                          $<?php echo number_format($yearngo->pivot->price); ?>
                                          <?php $total+=$yearngo->pivot->price ?>
                                          <a href="javascript:void(0)" id="company" data-toggle="collapse"
                                            data-target="#total{{$speciesngo->id}}">{{$speciesngo->name}}</a>
                                        </p>
                                        @endforeach
                                       
                                      </div>
                                      @endif

                                 
                               @endforeach
                           @endforeach


                           <h3 class="terrestrial">TERRESTRIAL</h3>
                           @foreach($year->yearngos as $key => $yearngo)
                            @foreach ($yearngo->species as $species)
                            
                            @if($species->type=='TERRESTRIAL')
                            <div class="species">
                              @if($species->image)
                              <img class="rimage" src="{{$species->image->getUrl()}}">
                              @endif
                              <h5>{{$species->name}}</h5>
                            
                              @foreach($species->speciesNgos as $key => $speciesngo)
                            
                            
                              <p>
                            
                            
                                $<?php echo number_format($yearngo->pivot->price); ?>
                                <?php $total+=$yearngo->pivot->price ?>
                                <a href="javascript:void(0)" id="company" data-toggle="collapse"
                                  data-target="#total{{$speciesngo->id}}">{{$speciesngo->name}}</a>
                              </p>
                              @endforeach
                            
                            </div>
                            @endif
                            
                            
                            @endforeach
                            @endforeach


                            
                         
                          
                                    
                      </div>
                    
                      <h4 class="text-center">$<?php echo number_format($total); ?></h4>
                    </div>
                    <div class="meta-date">
                      <span class="date" data-toggle="collapse" data-target="#year{{$year['year']->year}}" >{{$year['year']->year}}</span>
                    </div>
                </div>

                 @endforeach