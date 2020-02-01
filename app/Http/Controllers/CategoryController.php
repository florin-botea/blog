<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
		{
				$categories = \App\Category::all();
				return view('editCategories')->with('categories', $categories);
		}
		
		public function remake(Request $request)
		{
				// dd($request->category_id);
				foreach ($request->id as $index => $id){
						\App\Category::find($id)->update([
								'index' => $request->index[$index],
								'name' => $request->name[$index],
								'category_id' => $request->category_id[$index]
						]);
				}
				return back();
		}
}
