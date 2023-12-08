@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">

        @if ($paginator->onFirstPage())
            <li class="page-item mr-5">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @else
            <li class="page-item mr-5">
                <a class="page-link" href="{{ $paginator->previousPageUrl().'&filter_property_type='.$_GET['filter_property_type'].'&filter_transaction_type='.$_GET['filter_transaction_type'].'&filter_postal_code='.$_GET['filter_postal_code']
                .'&filter_min='.$_GET['filter_min'].'&filter_max='.$_GET['filter_max'].'&filter_bed='.$_GET['filter_bed'].'&filter_bath='.$_GET['filter_bath'].'&filter_size='.$_GET['filter_size'] }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            {{--            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>--}}
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
{{--                        @if(isset($params['filter_property_type']))--}}
                            @if ($page == $paginator->currentPage())
                                {{--                        <li class="active my-active"><span>{{ $page }}</span></li>--}}
                                <li class="page-item mr-5 active"><a class="page-link" href="#">{{$page}}</a></li>
                            @else
                                <li class="page-item mr-5"><a class="page-link" href="{{ $url.'&filter_property_type='.$_GET['filter_property_type'].'&filter_transaction_type='.$_GET['filter_transaction_type'].'&filter_postal_code='.$_GET['filter_postal_code']
                .'&filter_min='.$_GET['filter_min'].'&filter_max='.$_GET['filter_max'].'&filter_bed='.$_GET['filter_bed'].'&filter_bath='.$_GET['filter_bath'].'&filter_size='.$_GET['filter_size']}}">{{$page}}</a></li>
                                {{--                        <li><a href="{{ $url }}">{{ $page }}</a></li>--}}
{{--                            @endif--}}
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li class="page-item mr-5">
                <a class="page-link" href="{{ $paginator->nextPageUrl().'&filter_property_type='.$_GET['filter_property_type'].'&filter_transaction_type='.$_GET['filter_transaction_type'].'&filter_postal_code='.$_GET['filter_postal_code']
                .'&filter_min='.$_GET['filter_min'].'&filter_max='.$_GET['filter_max'].'&filter_bed='.$_GET['filter_bed'].'&filter_bath='.$_GET['filter_bath'].'&filter_size='.$_GET['filter_size'] }}" aria-label="Next">
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
