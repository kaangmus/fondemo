<ul class="sidebarfix">
    @foreach ($relates as $key=>$relate)
    @if($relate->id!=$post->id)
   
    <div class="latest_news  flex-column flex-md-row">
        <a href="@if($relate->link){{$relate->link}}@else/post/{{$relate->id}}@endif" @if($relate->link) target="_blank"
            @endif>
            @if($relate->featured_image)
            <img src="{{ $relate->featured_image->getUrl('medium') }}" alt="#" class="mr-3 wh-100">
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
    @endif
    @endforeach

</ul>