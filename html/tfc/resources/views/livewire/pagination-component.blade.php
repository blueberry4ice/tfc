{{-- @if ($paginator->hasPages() && $paginator->onFirstPage()) --}}

<div class="clearfix pagination-wrapper">
    <div class="pull-right pr1">
        @if ($paginator->onFirstPage())
        {{-- <a class="page-link" href="" rel="prev" aria-label="@lang('pagination.previous')">
            <div class="inline fz24 c-pointer">
                <i class="blue fa fa-caret-left"></i>
            </div>
        </a> --}}
        <button wire:click="previousPage" wire:loading.attr="disabled" dusk="previousPage.before"
            class="inline fz24 c-pointer" disabled>
            {{-- {!! __('pagination.previous') !!} --}}
            <i class="blue fa fa-caret-left"></i>
        </button>
        @else
        {{-- <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
            aria-label="@lang('pagination.previous')">
            <div class="inline fz24 c-pointer">
                <i class="blue fa fa-caret-left"></i>
            </div>
        </a> --}}
        <button wire:click="previousPage" wire:loading.attr="disabled" dusk="previousPage.before"
            class="inline fz24 c-pointer">
            {{-- {!! __('pagination.previous') !!} --}}
            <i class="blue fa fa-caret-left"></i>
        </button>
        @endif

        <div class="inline fz12 text-center" style="width: 130px">Page {{$paginator->currentPage()}} of
            {{$paginator->lastPage()}}
            {{-- {{ Log::info(print_r($paginator->currentPage(), true)); }} --}}


        </div>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        {{-- <button wire:click="{{ $paginator->nextPageUrl() }}" wire:loading.attr="disabled" rel="next"
            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            {!! __('pagination.next') !!}
        </button> --}}
        {{-- <button type="button" class="page-link" wire:click="nextPage" rel="next"
            aria-label="@lang('pagination.next')">
            <span class="d-block d-md-none">@lang('pagination.next')</span>
            <span class="d-none d-md-block">&rsaquo;</span>
        </button> --}}
        <button wire:click="nextPage" wire:loading.attr="disabled" dusk="nextPage.before" class="inline fz24 c-pointer">
            <i class="blue fa fa-caret-right"></i>
        </button>

        {{-- <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
            aria-label="@lang('pagination.next')">
            <div class="inline fz24 c-pointer">
                <i class="blue fa fa-caret-right"></i>
            </div>
        </a> --}}
        @else
        <button wire:click="nextPage" wire:loading.attr="disabled" dusk="nextPage.before" class="inline fz24 c-pointer"
            disabled>
            <i class="blue fa fa-caret-right"></i>
        </button>
        @endif

    </div>
</div>
{{-- @else --}}

    {{-- No result Found ... --}}

{{-- @endif --}}
