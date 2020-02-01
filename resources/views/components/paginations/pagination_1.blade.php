@if ( $total > $per_page && $current_page <= $last_page )
@php
    function force_between($n=1, $start=1, $end=7, $chunk=5){
        $side = intval(floor($chunk/2));
        $min_factor = $n+$side > $end ? abs($end-($n+$side)) : 0;
        $max_factor = $n-$side < $start ? abs($start-($n-$side)) : 0;
        $min = max($start, $n-$side-$min_factor);
        $max = min($end, $n+$side+$max_factor);
        
        return [$min, $max];
    }
    $chunk = force_between($current_page, 1, $last_page, 5);
    $min = $chunk[0];
    $max = $chunk[1];
    $pages = [];
    //add first page, last page and dots
    if ($min > 1){
        $pages[] = 1;
    }
    if ($min-1 > 1){
        $pages[] = null;
    }
    for($i=$min; $i<=$max; $i++){
        $pages[] = $i;
    }
    if ($max+1 < $last_page){
        $pages[] = null;
    }
    if (!in_array($last_page, $pages)){
        $pages[] = $last_page;
    }
@endphp
<nav aria-label="Page navigation example" class="mx-auto">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" {{ $prev_page_url ? 'href='.$prev_page_url : '' }}>
                <span aria-hidden="true">&laquo;</span><span class="sr-only">Next</span>
            </a>
        </li>
        @foreach($pages as $page)
            <li class="page-item">
                <a class="page-link" {{ $page && $page !== $current_page ? 'href=?page='.$page : '' }}>
                    {{ $page ?? '...' }}
                </a>
            </li>
        @endforeach
        <li class="page-item">
            <a class="page-link" {{ $next_page_url ? 'href='.$next_page_url : '' }}>
                <span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
@endif