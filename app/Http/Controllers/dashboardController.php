<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\RemeberJob;
class dashboardController extends Controller
{
    public function __constructor(){

    }

    public function index(){
        return view('admin.dashboard');
    }
}
