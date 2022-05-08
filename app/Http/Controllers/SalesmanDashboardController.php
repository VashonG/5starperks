<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesmanDashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('salesman.dashboard');
    }
    public function customers(){
        return view('salesman.customers');
    }
    public function sales(){
        return view('salesman.sales');
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_users()
    {
        // View all the items
        $json = file_get_contents('app-assets/data/user-list.json');
        $json = json_decode($json);
        return $json;
    }
    public function products(){
        return view('salesman.products');    
    }
    
    public function announcements(){
        return view('salesman.announcements');
    }
    public function profile(){
        return view('salesman.profile');
    }
    


}
