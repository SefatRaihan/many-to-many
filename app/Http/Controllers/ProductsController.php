<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
// use Facade\FlareClient\Stacktrace\File;
class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('ecom.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('ecom.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_image' => 'required|mimes:jpeg,jpg,png,svg,gif|max:2048'
        ]);

        

        if ($image = $request->file('product_image')) {
            $destinationPath = 'images/upload/';
            $productImage = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
        } else {
            unset($profileImage);
        }
        $datas =$request->all();
        $datas['product_image'] = $productImage;
        $product = Product::create($datas);
        
        $category = $request->category_name;
        $product->categories()->attach($category);
        return Redirect()->route('product-index')->with('success', 'Product uploaded successfully');
    }

    public function edit($product_id)
    {
        $product = Product::findOrFail($product_id);
        $categories = Category::all();
        $selecetd_prodcut = $product->categories->pluck('id')->toArray();
        return view('ecom.edit', compact('product', 'categories', 'selected_prodcut'));
    }

    public function update(Request $request, $product_id)
    {
        $product = Product::find($product_id);

        if ($image = $request->file('product_image')) {

            $destination = $product;
            if (File::exists($destination->product_image)) {
                File::delete($destination->product_image);
            };

            $destinationPath = 'images/upload/';
            $productImage = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);

            $product->findOrFail($product_id)->update([
                'product_name' => $request->product_name,
                'product_image' => $productImage
            ]);
        } else {
            $product->findOrFail($product_id)->update([
                'product_name' => $request->product_name
            ]);
        }

        $product->categories()->sync($request->category_name);
        return Redirect()->route('product-index')->with('success', 'Product information has been successfully updated');
    }

    public function delete($product_id)
    {
        $destroy = Product::findOrFail($product_id);
        $category = $destroy['category_name'];
        $destroy->categories()->detach($category);
        $destroy->delete();
        return Redirect()->route('product-index')->with('destroy', 'Product information has been successfully deleted');
    }

    public function show($product_id){
       $product = Product::findOrFail($product_id);
       return view('ecom.show', compact('product'));
    }
}
