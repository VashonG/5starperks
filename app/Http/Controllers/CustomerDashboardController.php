<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('client.dashboard');
}
 
     public function products(){
         return view('client.products');
    }
     
      public function profile(){
         return view('client.profile');
    }
     
}
