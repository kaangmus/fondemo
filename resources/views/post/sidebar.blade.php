
<div class="sidebar-inner">
<ul >
    @foreach ($relates as $key=>$relate)
    {{-- @if( $relate->id!=isset($post->id)) --}}
   
    <div class="latest_news single  flex-column flex-md-row">
        <a href="@if($relate->link){{$relate->link}}@else/post/{{$relate->id}}@endif" @if($relate->link) target="_blank"
            @endif>
            @if($relate->featured_image)
             <figure class="graf-figure">
                <div class="aspectRatioPlaceholder">
                    <div class="aspectRatioPlaceholder-fill"></div>
                    <div class="progressiveMedia lazyload" data-width="90" data-height="90">
                        <img class="progressiveMedia-thumbnail" src="{{ $relate->featured_image->getUrl('thumb') }}" alt="" />
                        <img class="progressiveMedia-image lazyload" data-src="{{ $relate->featured_image->getUrl('medium') }}"
                            alt="" />
                    </div>
                </div>
            </figure>
         
            @endif
        </a>
        <div class="media-body align-self-center">
            <a href="@if($relate->link){{$relate->link}}@else/post/{{$relate->id}}@endif" @if($relate->link)
                target="_blank" @endif>
                <h6>{!!$relate->title!!}</h6>
            </a>
            <a href="@if($relate->link){{$relate->link}}@else/post/{{$relate->id}}@endif" @if($relate->link)
                target="_blank" @endif class="news_paragraph">
                <p>{!!$relate->excerpt!!}</p>
            </a>
        </div>
    </div>
    {{-- @endif --}}
    @endforeach

</ul>
</div>
