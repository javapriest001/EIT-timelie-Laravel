<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accountant;
use App\Models\desk_officer;
use App\Models\deskOfficer;
use App\Models\fees;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use App\Models\utility;
use App\Models\equipment;
use Illuminate\Support\Facades\Hash;

class utilityController extends Controller
{
    //
    //
    public function index(){

        $deskofficer = DB::table('utility')
                ->join('user', 'utility.staff_id', '=', 'user.id')
                ->where('staff_id' , session('staffid'))
                ->select('utility.*', 'user.first_name', 'user.surname')
                ->skip(0)->take(3)
                ->get();

        $equipment = equipment::all()
                ->skip(0)->take(6);        

                $userdetail = users::where('id' , session('staffid'))->first();
       
                $data = [
                    'records' => $deskofficer,
                    'equipments' => $equipment,
                    'avatar' => $userdetail
                ];
        return view('utilityofficer.dashboard' , $data);
        

    }


    public function records(){

        $utility = DB::table('utility')
                ->join('user', 'utility.staff_id', '=', 'user.id')
                ->where('staff_id' , session('staffid'))
                ->select('utility.*', 'user.first_name', 'user.surname')
                ->skip(0)->take(3)
                ->get();

         
      // return  var_dump($utility);
        $userdetail = users::where('id' , session('staffid'))->first();
       
        $record = [
            'records' => $utility,
            'data' => $userdetail,
        ];
        return view('utilityofficer.records' , $record);
       
    }
   


   
   


    public function profile(){

           
        

        $numberOfRecords = utility::where('staff_id' , session('staffid'))->count();
        
        $userdetail = users::where('id' , session('staffid'))->first();
        $data = [
            'numberOfRecords' => $numberOfRecords,
            'data' => $userdetail,
            
            
        ];
        return view('utilityofficer.profile' , $data);
    
        
    }


    public function updateprofile(Request $req){

        
        // $req->validate([
        //     'password' => 'required'
        // ]);
        
        $user = users::find($req->staffid);

        $user->first_name = $req->first_name;
        $user->surname = $req->surname;
        $user->email = $req->email;
        
        if ($req->password) {
            $user->password = Hash::make($req->password);
        }
        $user->password = $user->password;


        if ($req->has('file')) {
            $file = $req->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =  time().'.' .$extension;

            $file->move('img/', $filename);
            $user->profile_picture = $filename;
        }
        $user->save();
       
        return redirect('utilityofficer/profile')->with('success' , 'profile updated');
        
    }

     public function addTimeline(Request $req){

        $query = utility::create([

            'staff_id'  => $req->staff_id,
            'date'  => $req->date,
            'general_issue'  => $req->general_issue,
            'general_comments'  => $req->general_comments,
            'general_status'  => $req->general_status,
            'general_location'  => $req->general_location,
            'mower_issue'  => $req->mower_issue,
            'mower_comment'  => $req->mower_comment,
            'mower_status'  => $req->mower_status,
            'mower_size'  => $req->mower_size,
            'generator_issue'  => $req->generator_issue, 
            'generator_comment'  => $req->generator_comment,
            'generator_size'  => $req->generator_size,
            'generator_status'  => $req->generator_status,
            'ups_issue'  => $req->ups_issue,
            'ups_comment'  => $req->ups_comment,
            'fuel_type'  => $req->fuel_type,
            'fuel_liters'  => $req->fuel_liters,
         

        ]);
        if ($query) {
            return redirect('accountant/dashboard')->with('success' , 'Record Successfully Added');
        }
        return redirect('accountant/dashboard')->with('error' , 'There Was An error Adding Record');


    }
    

   

    public function logout(){
        if (session()->has('staffid')) {
            session()->pull('staffid');
        }

        return redirect('/');
    }
}
