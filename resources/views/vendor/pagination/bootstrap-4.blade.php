@if ($paginator->hasPages())
  <div class="paginations">
    <ul class="lab-ul d-flex flex-wrap justify-content-center mb-1">
      @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
          <span class="page-link" aria-hidden="true">
              <i class="icofont-rounded-double-left"></i>
          </span>
        </li>
      @else
        <li class="page-item">
          <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
             aria-label="@lang('pagination.previous')">
            <i class="icofont-rounded-double-left"></i>
          </a>
        </li>
      @endif
      @foreach ($elements as $element)
        @if (is_string($element))
          <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
            @else
              <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
          @endforeach
        @endif
      @endforeach
      @if ($paginator->hasMorePages())
        <li class="page-item">
          <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
             aria-label="@lang('pagination.next')"><i class="icofont-rounded-double-right"></i></a>
        </li>
      @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
          <span class="page-link" aria-hidden="true"><i class="icofont-rounded-double-right"></i></span>
        </li>
      @endif
    </ul>
  </div>
@endif
