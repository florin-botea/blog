@extends('layouts.managePost')

@php
	function render_nested_menu_items($navbar_items) {
		foreach($navbar_items as $parent){
			echo "<div class='js-contenteditable' draggable='true' contenteditable='false' data-id='$parent->id'>";
				echo "<h5 class='m-0 p-3'>$parent->name</h5>";
				if ($parent->children_categories || $parent->categories) {
					render_nested_menu_items($parent->children_categories ?? $parent->categories);
				}
			echo "</div>";
		}
	}
@endphp

@section('form')
	<div class="js-form-content-manager" id="js-form-content-manager-root">
		@csrf
		<div class="cms-root py-0">
			<p class="delimiter p-3 m-0 w-100"></p>
			{{render_nested_menu_items($navbar_items)}}
			<p class="delimiter p-3 m-0 w-100"></p>
		</div>
		<button type="submit" class="float-right" id="cms-submit"> Submit changes </button>
	</div>
	
	<script>

	</script>
@endsection