<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Auth;
class Notifications extends Component
{
   
    public $notifications;
    public $unReadCount=5;
    public function __construct()
    {
        $this->notifications = Auth::user()->notifications()->get();

        $this->unReadCount = Auth::user()->notifications()->unread()->count();
     }


    public function render()
    {
        return view('components.Notifications');
    }
}
