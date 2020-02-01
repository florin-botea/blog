@php
    if (! $datetime instanceof \Carbon\Carbon){
        $datetime = \Carbon\Carbon::parse($datetime);
    }
@endphp
    
@lang('calendar.day.'.$datetime->format('D')) {{$datetime->format('d')}} @lang('calendar.month.'.$datetime->format('M')) {{$datetime->format('y')}}