<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accountant;
use App\Models\desk_officer;
use App\Models\deskOfficer;
use App\Models\fees;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use Illuminate\Support\Facades\Hash;

class deskofficerController extends Controller
{
    //
    public function index(){

        $deskofficer = DB::table('desk_officer')
                ->join('user', 'desk_officer.staff_id', '=', 'user.id')
                ->where('staff_id' , session('staffid'))
                ->select('desk_officer.*', 'user.first_name', 'user.surname')
                ->skip(0)->take(3)
                ->get();

        $fees = fees::all()
                ->skip(0)->take(6);        

                $userdetail = users::where('id' , session('staffid'))->first();
       
        return view('deskofficer.dashboard')
        ->with('records' , $deskofficer)
        ->with('fees' , $fees)
        ->with('avatar' , $userdetail);
    }

    
    public function records(){

        $deskofficer = DB::table('desk_officer')
                ->join('user', 'desk_officer.staff_id', '=', 'user.id')
                ->where('staff_id' , session('staffid'))
                ->select('desk_officer.*', 'user.first_name', 'user.surname')
                ->skip(0)->take(3)
                ->get();

        $userdetail = users::where('id' , session('staffid'))->first();
       
        return view('deskofficer.records')
        ->with('records' , $deskofficer)
        ->with('data' , $userdetail);
    }
    public function fees(){

        $fees = fees::all();

        
       
        return view('deskofficer.fees')
        ->with('records' , $fees);
    }
    public function profile(){

        
        $numberOfRecords = deskOfficer::where('staff_id' , session('staffid'))->count();
        
        $userdetail = users::where('id' , session('staffid'))->first();
        return view('deskofficer.profile')
        ->with('data' , $userdetail)
        ->with('numberOfRecords' , $numberOfRecords);
        
    }

    public function updateprofile(Request $req){

        
        // $req->validate([
        //     'password' => 'required'
        // ]);
        
        $user = users::find($req->staffid);

        $user->first_name = $req->first_name;
        $user->surname = $req->surname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password) ;

        if ($req->has('file')) {
            $file = $req->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename =  time().'.' .$extension;

            $file->move('img/', $filename);
            $user->profile_picture = $filename;
        }
        $user->save();
       
        return redirect('deskofficer/profile')->with('success' , 'profile updated');
        
    }

    public function logout(){
        if (session()->has('staffid')) {
            session()->pull('staffid');
        }

        return redirect('/');
    }
}
