<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Role;
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
        dd($request);
    }
}
