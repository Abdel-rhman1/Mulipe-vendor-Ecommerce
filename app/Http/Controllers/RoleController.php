<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Rule;
use App\Models\Rule_Ability;
class RoleController extends Controller
{

    public function index(){
        $stor_id = Auth::id();
        $roles = Role::where('stor_id' , $stor_id)->get();
        return view('admin.role.index')->with(['roles'=>$roles]);
    }


    public function create(){
        return view('admin.role.create');
    }


    public function store(Request $request){

        $role = Rule::create([
            'name'=>$request->name,
        ]);

        foreach($request['abilities'] as $ability=>$type){
            Rule_Ability::create([
                'role_id'=>$role->id,
                'ability'=>$ability,
                'type'=>$type,
            ]);
        }
        
        if($role){
            return redirect()->back()->with(['successMsg'=>'Unit Created Siccefully']);
        }

    }
}
