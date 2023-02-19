<div class="solas-pagination">
    <ul class="pagination justify-content-center">
        
        <!-- Previous button -->
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
        @else
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link" tabindex="-1" rel="prev">Previous</a>
            </li>
        @endif

        <!-- Each item -->
        @foreach ($elements as $element)
            <!-- If items is singular -->
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                        <a class="page-link" href="#" tabindex="-1">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">
                            {{ $page }}
                        </a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        <!-- Next Button -->    
        @if ($paginator->onFirstPage())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" class="page-link" tabindex="-1" rel="next">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Next</a>
            </li>
        @endif
    
    </ul>
</div>

