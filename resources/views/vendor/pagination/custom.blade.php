@if ($paginator->hasPages())
    <div class="row">
        <div class="col-md-6 offset-md-3 d-flex justify-content-between align-items-center">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a title="Previous Page" data-toggle="tooltip" class="btn btn-secondary disabled">
                    <i class="fa fa-fw fa-arrow-left"></i>
                </a>
            @else
                <a title="Previous Page" data-toggle="tooltip" class="btn btn-secondary"
                    href="{{ $paginator->previousPageUrl() }}">
                    <i class="fa fa-fw fa-arrow-left"></i>
                </a>
            @endif

            {{-- Page Info --}}
            <a href="#page-jump" data-toggle="page-jump">
                Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
            </a>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a title="Next Page" data-toggle="tooltip" class="btn btn-secondary"
                    href="{{ $paginator->nextPageUrl() }}">
                    <i class="fa fa-fw fa-arrow-right"></i>
                </a>
            @else
                <a title="Next Page" data-toggle="tooltip" class="btn btn-secondary disabled">
                    <i class="fa fa-fw fa-arrow-right"></i>
                </a>
            @endif

        </div>
    </div>
@endif
