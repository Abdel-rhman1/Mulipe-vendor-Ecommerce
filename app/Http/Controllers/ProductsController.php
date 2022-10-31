<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Unit;
use App\Models\Category;
use Auth;
use Gate;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function index()
    {
        Gate::authorize('products.view');
        $store_id = Auth()->id();
        $products = Product::where('stor_id', $store_id)->with('category', 'unit')->get();
        return view('admin.products.index')->with(['products' => $products]);
    }

    public function create()
    {
        Gate::authorize('products.create');
        $stor_id =  Auth::id();
        $units = Unit::where('stor_id', $stor_id)->get();
        $categorie = Category::where('stor_id', $stor_id)->get();
        return view('admin.products.create')->with(['units' => $units, 'categories' => $categorie]);
    }

    public function store(ProductRequest $request)
    {
        // dd($request->file('files'));
        Gate::authorize('products.create');
        $validation = $request->validated();
        $stor_id = Auth::id();
        $Product = Product::create([
            'stor_id' => $stor_id,
            'slug' => Str::slug($request->name_en),
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'qty' => $request->qty,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
        ]);

        if ($Product) {
            $Product->uploadImages($request, $Product->id);
            return redirect()->back()->with(['successMsg' => 'Unit Created Siccefully']);
        }
    }

    public function edit($Product)
    {
        Gate::authorize('products.update');
        $stor_id =  Auth::id();
        $units = Unit::where('stor_id', $stor_id)->get();
        $categories = Category::where('stor_id', $stor_id)->get();
        $product = Product::find($Product);
        return view('admin.products.edit')->with(['units' => $units, 'categories' => $categories, 'product' => $product]);
    }

    public function update(ProductRequest $request)
    {
        if (!Gate::allows('products.update')) {
            abort(403);
        }
        $Product = Product::where('id', $request['id'])->update([
            'slug' => Str::slug($request->name_en),
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'qty' => $request->qty,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
        ]);

        if ($Product) {
            $Product->uploadImages($request, $Product->id);
            return redirect()->back()->with(['successMsg' => 'Unit Created Siccefully']);
        }
    }


    public function destroy($product)
    {
        dd($product);
    }
}
