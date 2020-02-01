@extends('layouts.managePost')

@section('form')
    @component('partials.forms.form', ['action'=> route('articles.store'), 'attrs'=>['enctype'=>'multipart/form-data'] ])
        @foreach ( $form_fields as $field )
            @formGroup(array_merge($field, [
                'value' => old($field['name']),
								'invalid' => $errors->first($field['name'])
            ]))
        @endforeach
        <div class="mt-2 d-flex justify-content-end">
            @formSubmit(['class'=>'btn-primary', 'text'=>'Submit'])
        </div>
    @endcomponent
@endsection