@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-center">
       

        <div class="flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between flex-column">
            <div>
                <p class="text-big">
                    {!! __('Showing') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <ul class="pagination align-items-center">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        {{-- <li class="page-item disabled mx-1" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="terms badge btn" aria-hidden="true">&lsaquo;</span>
                        </li> --}}
                    @else
                            <li class="page-item mx-1">
                                <a class="terms badge btn" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                            </li>
                    @endif

                            {{-- Pagination Elements --}}
                            @foreach ($elements as $element)
                                {{-- "Three Dots" Separator --}}
                                @if (is_string($element))
                                    <li class="page-item disabled mx-1" aria-disabled="true"><span class="terms badge btn p-3 ">{{ $element }}</span></li>
                                @endif

                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())
                                            <li class="page-item mx-1" aria-current="page"><span class="btn btn-custom p-3 active-br">{{$page}}</span></li>
                                        @else
                                            <li class="page-item mx-1"><a class="btn btn-custom p-3 magnetic-button" href="{{ $url }}">{{$page}}</a></li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item mx-1">
                            <a class="terms badge btn magnetic-button" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        {{-- <li class="page-item disabled mx-1" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="terms badge btn" aria-hidden="true">&rsaquo;</span>
                        </li> --}}
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
