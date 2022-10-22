<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Unit;

class UnitController extends Controller
{
    protected $stor_id;
    
    // public function __construct(){
    //     $this->stor_id = Auth::id();
    // }


    public function index(){
        $stor_id = Auth::id();
        $units = Unit::where('stor_id' , $stor_id)->with('parentUnit')->paginate();
        return view('admin.units.index')->with(['units'=>$units]);
    }

    public function create(){
        $stor_id = Auth::id();

        $units = Unit::where('stor_id' , $stor_id)->whereNull('parent_unit_id')->paginate(15);
        return view('admin.units.create')->with(['units'=>$units]);
    }

    public function store(Request $request){
        $stor_id = Auth::id();
        $unit = Unit::create([
            'stor_id'=>$stor_id,
            'name'=>$request->name,
            'parent_unit_id'=>$request->parent_unit_id,
            'equality'=>$request->value
        ]);

        if($unit){
            return redirect()->back()->with(['successMsg'=>'Unit Created Siccefully']);
        }else{

        }
    }

}
