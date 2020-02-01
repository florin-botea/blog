@php
    $preview = $preview ?? false;
    $count_field = $count_field ?? false;
		$value = $value ?? null;
@endphp

<div class="{{ ($type??'text')==='file' ? 'custom-file mb-4' : 'form-group' }}">
	<label for="{{ $id ?? $name ?? '' }}" class="input__label">{{ $label ?? '' }}</label>
	@if (isset($type) && $type==='textarea')
		<textarea name="{{ $name ?? '' }}" class="form-control {{ $class ?? '' }}{{ $count_field ? 'countMe' : '' }}" {{ $count_field ? 'data-count=count-'.($id ?? $name) : '' }} id="{{ $id ?? $name ?? '' }}"
			@foreach( ($attrs??[]) as $attr => $val)
				{{$attr}}="{{$val}}"
			@endforeach
		>{{ $value ?? '' }}</textarea>
		@elseif(isset($type) && $type==='select')
			<select class="form-control" name="{{ $name }}" id="{{ $id??$name }}" value="{{ $value }}">
				@isset ($default)
					<option default value="">{{$default}}</option>
				@endisset
				@foreach($options??[] as $key => $_value)
					<option value="{{$_value}}" {{$value === $_value ? 'selected' : ''}}>{{ $key }}</option>
				@endforeach
			</select>
		@else
		<input name="{{ $name ?? '' }}" type="{{ $type ?? 'text' }}" value="{{ $value ?? '' }}" class="form-control {{ $class ?? '' }}{{ $count_field ? 'countMe' : '' }}{{ $preview ? 'photo-preview' : '' }}" {{ $count_field ? 'data-count=count-'.($id ?? $name) : '' }} id="{{ $id ?? $name ?? '' }}" {{ $preview ? 'data-preview=preview-'.($id??$name) : ''}}
			@foreach( ($attrs??[]) as $attr => $val)
				{{$attr}}="{{$val}}"
			@endforeach
		>
	@endif
    <small class="float-right badge badge-light" id="count-{{ $id ?? $name }}"></small>
	@if ( $invalid??false )
		<p class="text-danger font-weight-bold m-0">
			{{ $invalid }}
		</p>
	@endif
	@foreach ( ($helpers??[]) as $helper)
		<small>{{ $helper }}</small>
	@endforeach
    @if ( $preview )
        <img src="{{ asset('/storage/'.$value??'#') }}" id="preview-{{ $id ?? $name }}" style="width:100%; height:auto; {{ ($value??false) ? '' : 'display:none' }}">
        <br><br>
    @endif
</div>
