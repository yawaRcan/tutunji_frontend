<?php 

// use Closure;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


$paginator->appends(request()->query());
$totalPages = $paginator->lastPage();
$currentPage = $paginator->currentPage();
$maxVisiblePages = 5;
$ellipsis = '...';

if ($totalPages <= $maxVisiblePages) {
    $visiblePages = range(1, $totalPages);
} else {
    $visiblePages = [];

    // Add first page
    $visiblePages[] = 1;

    // Add middle pages
    $startRange = max($currentPage - floor($maxVisiblePages / 2), 2);
    $endRange = min($startRange + $maxVisiblePages - 3, $totalPages - 1);

    if ($startRange > 2) {
        $visiblePages[] = $ellipsis;
    }

    $visiblePages = array_merge($visiblePages, range($startRange, $endRange));

    if ($endRange < $totalPages - 1) {
        $visiblePages[] = $ellipsis;
    }

    // Add last page
    $visiblePages[] = $totalPages;
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
                <li class="page-item disabled"><span class="page-link">...</span></li>
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
