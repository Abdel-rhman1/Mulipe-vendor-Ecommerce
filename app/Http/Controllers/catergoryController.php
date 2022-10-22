<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createCategoryRequest;
use App\Models\Category;
use Auth;
class catergoryController extends Controller
{
    public function index(){

        $categories = Category::where('stor_id' , Auth::id())->with('categoryParent')->paginate(15); 


        // dd($categories);


        return view('admin.category.index')->with(['categories'=>$categories]);
    }

    public function create(){
        $categories = Category::where('stor_id' , Auth::id())->whereNull('parent_category_id')->get(); 
        return view('admin.category.create')->with(['categories'=>$categories]);
    }

    public function store(createCategoryRequest $request){
        $category = Category::create([
            'name'=>$request['name'],
            'parent_category_id'=>$request['parent_category_id'],
            'stor_id'=>Auth::id()
        ]);

        if($category){
            return redirect()->back()->with(['successMsg'=>'Category Created Succefullay']);
        }else{
            return redirect()->back()->with(['errorMsg'=>'error Occuring In Creating Category']);
        }
    }
}
