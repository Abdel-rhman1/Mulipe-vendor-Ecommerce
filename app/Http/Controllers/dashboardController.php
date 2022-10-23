<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\RemeberJob;
use Auth;
class dashboardController extends Controller
{
    public function __constructor(){

    }

    public function index(){
        return view('admin.dashboard');
    }


}
