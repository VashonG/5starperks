<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard');
    }
    public function salesman(){
         return view('admin.salesman');
    }
     public function announcements(){
         return view('admin.announcements');
    }
     public function category(){
         return view('admin.category');
    }
     public function Tickets(){
         return view('admin.Tickets');
    }
     public function customers(){
         return view('admin.customers');
    }
     public function get_users(){
        // View all the items
        $json_data = file_get_contents('app-assets/data/user-list.json');
        $json_data = json_decode($json_data);
        return $json_data;
    }
    
}
