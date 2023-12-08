<?php
$paginator->appends(request()->query());
$totalPages = $paginator->lastPage();
$currentPage = $paginator->currentPage();
$maxVisiblePages = 7;
$ellipsis = '...';

if ($totalPages <= $maxVisiblePages) {
    $visiblePages = range(1, $totalPages);
} else {
    $visiblePages = [];

    // Add first 2 pages
    $visiblePages = array_merge($visiblePages, range(1, 2));

    // Add middle pages
    $startRange = max($currentPage - floor(($maxVisiblePages - 4) / 2), 3);
    $endRange = min($startRange + $maxVisiblePages - 5, $totalPages - 2);

    if ($startRange > 3) {
        $visiblePages[] = $ellipsis;
    }

    $visiblePages = array_merge($visiblePages, range($startRange, $endRange));

    if ($endRange < $totalPages - 2) {
        $visiblePages[] = $ellipsis;
    }

    // Add last 2 pages
    $visiblePages = array_merge($visiblePages, range($totalPages - 1, $totalPages));
}
?>

<nav>
    <ul class="pagination" style="justify-content: center;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item mr-5">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @else
            <li class="page-item mr-5">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @endif

        @foreach ($visiblePages as $page)
            @if ($page === '...')
                <li class="page-item disabled mr-5"><span class="page-link">...</span></li>
            @else
                <li class="page-item mr-5{{ $page == $paginator->currentPage() ? ' active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                </li>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item mr-5">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @else
            <li class="page-item mr-5">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
