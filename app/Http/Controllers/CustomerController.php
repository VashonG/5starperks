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
        return view('Admin.dashboard');
    }
    public function salesman(){
         return view('Admin.salesman');
    }
     public function announcements(){
         return view('Admin.announcements');
    }
     public function category(){
         return view('Admin.category');
    }
     public function Tickets(){
         return view('Admin.Tickets');
    }
     public function customers(){
         return view('Admin.customers');
    }
     public function get_users(){
        // View all the items
        $json_data = file_get_contents('app-assets/data/user-list.json');
        $json_data = json_decode($json_data);
        return $json_data;
    }
    
}
