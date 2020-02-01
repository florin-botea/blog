@if ($total > $per_page)
<nav aria-label="Page navigation example" class="mx-auto d-flex justify-content-center">
    <form action="/" method="get" class="px-3 py-1 form-inline">
        <a href="{{ $prev_page_url }}" class="px-3 py-1 btn btn-light {{ $current_page === 1 ? 'disabled' : '' }}">
            <span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span>
        </a>
        <div class="px-3 mx-2 py-1 bg-light">
            1 of {{ $last_page }}
        </div>
        <a href="{{ $next_page_url }}" class="px-3 py-1 btn btn-light {{ $current_page === $last_page ? 'disabled' : '' }}">
            <span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span>
        </a>
        <input name="page" type="text" class="ml-2 form-control form-control-sm" style="width:40px;" autocomplete="off">
        <button class="btn-sm btn-light border-0"> 
            <i class="fas fa-external-link-alt"></i>
        </button>
    </form>
</nav>
@endif