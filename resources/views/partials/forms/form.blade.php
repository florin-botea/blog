<form class="prevent-multi-submit {{ $class ?? '' }}" action="{{ $action ?? '#' }}" method="{{ $method ?? 'post' }}" 
	@foreach (($attrs??[]) as $attr => $val)
		{{ $attr.( $val !== null ? '='.$val : '' ) }}
	@endforeach
>
	@csrf
	{{ $slot }}
</form>