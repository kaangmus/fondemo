@if ($paginator->hasPages())

        <ul class='pagination mx-auto'>
            @if(!$paginator->onFirstPage())
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
            @endif

            @foreach($elements as $element)
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="page-item active"><span class="page-link">{{ $page }}<span class="sr-only">(current)</span>
            </span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach
            @endforeach

            @if($paginator->hasMorePages())
            <li><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
            @endif
        </ul>


@endif