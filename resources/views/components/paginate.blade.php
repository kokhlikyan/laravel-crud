@if ($paginator->lastPage() > 1)
    <nav aria-label="Page navigation">
        <ul class="pagination    ">
            <li class="page-item {{ $paginator->currentPage() === 1 ? ' disabled' : '' }}">
                <a class="page-link " href="{{ $paginator->url(1) }}" aria-label="Previous">
                    <span>&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="page-item"><a class="page-link {{ $paginator->currentPage() == $i ? ' active' : '' }}"
                        href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endfor
            <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}" aria-label="Next">
                    <span>&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
@endif
