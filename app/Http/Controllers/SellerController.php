<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Models\User;
use App\Models\Company;
use App\Models\Ownership;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Throwable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class SellerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $users =  User::role('salesman')
            ->orderBy('updated_at', 'desc')
            ->get();
            foreach ($users as $index => $user) {
                $user->username = $user->username;
                if(empty($user->username )){
                    $user["username"] = strtolower(str_replace(' ', '_', $user["name"]));
                }

            }
            return Datatables::of($users)->make(true);
        }
        $Users =  User::role('salesman')
        ->orderBy('updated_at', 'desc')
        ->get();
        return view('Admin.salesman.salesman',compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.salesman.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $this->validate($request, [
                'username' => 'required|string|max:255|unique:users',
                'email' =>  'required|string|email|max:255|unique:users',
                'name' => 'required',
                'phoneNumber' => 'string|max:255',
                'gender'=> 'required',
                'profileImage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                            ]);

              if($request->hasfile('profileImage')){
                    $file = $request->file('profileImage');
                    $profile_image_name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/images/profile/user-upload',$profile_image_name);
                }

                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->username = $request->username;
                $user->phone_no = $request->phoneNumber;
                $user->address = $request->address;
                $user->country = $request->country;
                $user->city = $request->city;
                $user->is_active = '1';
                $user->profile_image =  $profile_image_name;
                $dob = date("Y-m-d", strtotime($request->dob));
                $user->date_of_birth = $dob;
                $user->twitter_url = $request->twitter;
                $user->facebook_url = $request->facebook;
                $user->google_url = $request->google;
                $user->linkdin_url = $request->linkedin;
                $user->bio= $request->bio;
                $user->gender = $request->gender;
                $user->postal_code = $request->pincode;
                $user->assignRole('salesman');
                $user->save();
                
                
               
                return ['code' => '200', 'message' => 'success'];

        } catch (Exception   $e) {
                return ['code' => '500' , 'error' => $e];

        }
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        foreach($data as $key => $value){
            if($data['profile_image'] == null || $data['profile_image'] == ''){
                $data->profile_image = 'profile.png';
            }
            if($data['username'] == null || $data['username'] == ''){
                $data->username = strtolower(str_replace(' ', '_',  $data["name"]));
            }
        }
        return view('Admin.salesman.viewsalesman',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id)->with('views');
        dd($data);
        foreach($data as $key => $value){
            if($data['profile_image'] == null || $data['profile_image'] == ''){
                $data->profile_image = 'profile.png';
            }
            if($data['username'] == null || $data['username'] == ''){
                $data->username = strtolower(str_replace(' ', '_',  $data["name"]));
            }
        }
        return view('Admin.salesman.editsalesman',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->hasfile('profileImage'));
        // echo $request['twitter'];
        // die;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = User::find($id);
            if($data->profile_image != null || $data->profile_image != ''){
                $image_path = public_path().'/images/profile/user-upload/'.$data->profile_image;
                if(file_exists($image_path)){
                    unlink($image_path);
                }

            }
            $data->delete();
            return ['code' => '200','message'=>'success'];
        }
        catch(\Exception $e){
            return ['code' => '200','error_message'=>$e->getMessage()];
        }
    }

    /**
     * Store New Saleman
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function addNewSalesman(Request $request)
    {
        try{
            // dd($request->all());
            $user = new User();
           $user->name = $request->first_name.' '.$request->last_name;
           $name = $request->first_name.' '.$request->last_name;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $user->username = strtolower(str_replace(' ', '_', $name)).rand();
           $user->phone_no = $request->phone;
           $user->address = $request->address;
           $user->country = $request->country;
           $user->city = $request->city;
           $user->state = $request->state;
           $user->is_active = '1';
           $dob = date('Y-m-d', strtotime($request->dateofbirth));
           $user->date_of_birth = $dob;
           $user->postal_code = $request->postalcode;
           $user->assignRole('salesman');
           $user->save();
           $company = new Company();
            $company->uid = Auth::user()->id;
            $company->company_name = $request->company;
            $company->DBA = $request->company_dba;
            $company->address = $request->businessaddress;
            $company->city = $request->businesscity;
            $company->state = $request->businessstate;
            $company->postal_code = $request->businesspostal;
            $company->signature = $request->signature;
            $company->d_b_number = $request->db;
            $company->entity = $request->entity;
            $company->start_date = $request->businessstartdate;
            $company->isBankruptcyVerified = ($request->islawverify == 'yes') ? '1' : '0';
            $company->isTermsVerified = ($request->termsandconditions == true ) ? '1' : '0';
            $company->save();
           
            $allOwnerships = explode(",",$request->ownership[0]);
            $PartnerPosition = explode(",",$request->PartnerPosition[0]);
            $PartnerName = explode(",",$request->PartnerName[0]);
            foreach($allOwnerships as $key => $value){
                $ownership = new Ownership();
                $ownership->uuid = Auth::user()->id;
                $ownership->company_id = $company->id;
                $ownership->ownership = $value;
                $ownership->title = $PartnerPosition[$key];
                $ownership->name = $PartnerName[$key];
                $ownership->save();
            }
            return ['code' => '200', 'message' => 'success'];
        } catch(\Exception $e){
            return ['code' => '500','error_message'=>$e->getMessage()];
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function updateSeller(Request $request,$id)
    {
        try {
            $this->validate($request, [
                'username' => 'required|string|max:255|unique:users,username,'.$id,
                'email' =>  'required|string|email|max:255|unique:users,email,'.$id,
                'name' => 'required',
                'phoneNumber' => 'string|max:255',
                'gender'=> 'required',
                            ]);
                $user = User::find($id);

                if($request->hasfile('profileImage')){
                    $image_path = public_path().'/images/profile/user-upload/'.$user->profile_image;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                    $file = $request->file('profileImage');
                    $profile_image_name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/images/profile/user-upload',$profile_image_name);
                }
                else{
                    $profile_image_name = $user->profile_image;
                }

                $user->name = $request->name;
                $user->username = $request->username;
                $user->email = $request->email;
                $user->phone_no = $request->phoneNumber;
                $user->address = $request->address;
                $user->country = $request->country;
                $user->city = $request->city;
                $user->postal_code = $request->pincode;
                $user->is_active = '1';
                $user->profile_image =  $profile_image_name;
                $dob = date('Y-m-d', strtotime($request->dob));
                $user->date_of_birth = $dob;
                $user->twitter_url = $request->twitter;
                $user->facebook_url = $request->facebook;
                $user->google_url = $request->google;
                $user->linkdin_url = $request->linkedin;
                $user->bio= $request->bio;
                $user->save();
            return ['code' => '200', 'message' => 'success'];
        } catch (\Exception | ValidationException $e) {
            if ($e instanceof ValidationException) {
                return ['code' => '400', 'errors' => $e->errors()];
            } else {
                return ['code' => '400', 'error_message' => $e->getMessage()];
            }
        }
    }
}
