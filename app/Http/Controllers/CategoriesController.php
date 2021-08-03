<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
   public function create(){

    return view('ecom.category-create');
   }
   public function store(Request $request){
        $request->validate([
            'category_name' => 'required',
        ]);
        Category::create($request->all());
        return Redirect()->back()->with('success', 'Category has been uploaded successfuly');
   }

}
