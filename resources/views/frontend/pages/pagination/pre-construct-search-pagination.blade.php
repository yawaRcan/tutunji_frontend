@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item mr-5">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @else
            <li class="page-item mr-5">
                <a class="page-link" href="{{ $paginator->previousPageUrl().'&query='.$_GET['query'].'&property_type=pre-construct' }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
{{--            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>--}}
        @endif

        @if($paginator->currentPage() > 2)
            <li class="hidden-xs page-item"><a class="page-link" href="{{$paginator->url(1)}}">1</a></li>
        @endif
        @if($paginator->currentPage() > 3)
            <li class="page-item"><span class="page-link">...</span></li>
        @endif

        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))

                @foreach ($element as $page => $url)
                    @php($new_url = $url.'&query='.$_GET['query'].'&property_type=pre-construct')
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                            <li class="page-item mr-5 active"><a class="page-link" href="#">{{$page}}</a></li>
                    @else
                            <li class="page-item mr-5"><a class="page-link" href="{{ $url.'&query='.$_GET['query'].'&property_type=pre-construct' }}">{{$page}}</a></li>
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach

            @endif
        @endforeach



        @if ($paginator->hasMorePages())
                <li class="page-item mr-5">
                    <a class="page-link" href="{{ $paginator->nextPageUrl().'&query='.$_GET['query'].'&property_type=pre-construct' }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
{{--            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>--}}
        @else
{{--            <li class="disabled"><span>Next →</span></li>--}}
                <li class="page-item mr-5">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        @endif
    </ul>
@endif
