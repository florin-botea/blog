@extends('layouts.managePost')

@php
	$options = [];
	foreach ($categories->all() as $category) {
		$options[$category->name] = $category->id;
	}
@endphp

@section('form')
	@form(['action'=>'/categories/remake', 'method'=>'article'])
		@csrf
		@foreach ( $categories->all() as $category )
			<div class="form-row">
				<input type="hidden" name="id[]" value="{{ $category->id }}">
				<div class="col-2">
					@formGroup(['name'=>'index[]', 'type'=>'number', 'value'=>$category->index])
				</div>
				<div class="col-6">
					@formGroup(['name'=>'name[]', 'value'=>$category->name])
				</div>
				<div class="col-4">
					@formGroup(['name'=>'category_id[]', 'type'=>'select', 'default'=>'root', 'value'=>$category->category_id, 'options'=>$options])
				</div>
			</div>
		@endforeach
		@formSubmit(['text'=>'Submit', 'class'=>'btn-success float-right'])
	@endform
@endsection