@if($paginator->hasPages())

<ul class="pagination"> 
    <!-- previous page link -->
    @if($paginator->onFirstPage())
    <li class="page-item disabled"><a class="page-link"><span>&laquo;</span></a></li>
    @else
    <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev"><span>&laquo;</span></a></li>
    @endif

    <!-- pagination elements here -->
    @foreach($elements as $element)
        <!-- make three dots -->
        @if(is_string($element))
            <li class="page-item disabled"><a class="page-link"><span>{{$element}}</span></a></li>
        @endif

        <!-- Link Array Here -->
        @if(is_array($element))
            @foreach($element as $page=>$url)

            @if($page == $paginator->currentPage())
                <li class="page-item active"><a class="page-link"><span>{{ $page }}</span></a></li>
            @else
                <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
            @endif


            @endforeach
        @endif


    @endforeach   

    <!-- next page link -->
    @if($paginator->hasMorePages())
        <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link"><span>&raquo;</span></a></li>
    @else
        <li class="page-item disabled"><a class="page-link"><span>&raquo;</span></a></li>
    @endif

</ul>

@endif