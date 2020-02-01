<section class="mb-5">
  <h4 class="bold"> Archive </h4>
  <hr class="m-1">
  <ul class="list-unstyled">
  @foreach ($archives as $archive)
    <li class="ml-2">
      <a class="text-dark" href="{{ route('archives', ['month'=>$archive->month, 'year'=>$archive->year]) }}">
        @lang('calendar.month.'.$archive->month) {{ $archive->year. ' ('. $archive->count .')' }}
      </a>
    </li>
    @endforeach
  </ul>
</section>