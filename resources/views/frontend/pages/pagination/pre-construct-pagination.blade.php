@if ($paginator->hasPages())
    <?php
        $lastElements = [];
        $firstElements = [];
        
        $_perPage = 5;
        if ( $paginator->lastPage() > 5 ) {
            
            if($paginator->currentPage()+1 === $paginator->lastPage() or $paginator->lastPage() === $paginator->currentPage() ) {
            
                $lastElements = array_slice($elements[0], $paginator->lastPage()-2, 2, true);   
                $_perPage = 3;
            } elseif ($paginator->currentPage()+2 < $paginator->lastPage()-2) {
             
                $lastElements = array_slice($elements[0], $paginator->lastPage()-2, 2, true);   
                $_perPage = 3;
            } else {
                
                if(($paginator->currentPage()+3) >= $paginator->lastPage()) {
                    
                    $lastElements = array_slice($elements[0], $paginator->currentPage()-1, 2, true);   
                    $_perPage = 3;
                } else {
                    
                    $lastElements = array_slice($elements[0], $paginator->currentPage()+2, 2, true);   
                    $_perPage = 3;   
                }
            }
            
            $limit = 0;
            foreach($elements[0] as $i => $el) {
                
                if( $limit < $_perPage and (($paginator->currentPage()+$_perPage) >= $paginator->lastPage()) ) {
                    
                    $firstElements[$i] = $el;
                    $limit++;
                } elseif ($limit < $_perPage and ($i >= $paginator->currentPage())) {
                    
                    $firstElements[$i] = $el;
                    $limit++;
                }
            }   
        } else {
            
            foreach($elements[0] as $i => $el) {
                
                $firstElements[$i] = $el;
            }
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
            {{-- Pagination Elements --}}
            
            
            {{-- @if(count($elements) === 3) --}}
            
                @foreach ($firstElements as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item mr-5 active"><a class="page-link" href="#">{{ $page }}</a></li>
                    @else
                        <li class="page-item mr-5"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
                
                @if(count($lastElements))
                <li class="page-item disabled mr-5" aria-disabled="true"><span class="page-link">...</span></li>
                @endif
                
                @foreach ($lastElements as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item mr-5 active"><a class="page-link" href="#">{{ $page }}</a></li>
                    @else
                        <li class="page-item mr-5"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            
            {{-- @endif --}}

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
@endif
