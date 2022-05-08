<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Validation\ValidationException;

class AdminDashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard');
    }
    public function salesmen(Request $request){
        if($request->ajax()){    
            $users =  User::role('salesman')->get();
            foreach ($users as $index => $user) {
                $user["username"] = strtolower(str_replace(' ', '_', $user["name"]));
            }
            return Datatables::of($users)->make(true);
        }
        $Users =  User::role('salesman')->get();
        return view('admin.salesman',compact('Users')); 
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
