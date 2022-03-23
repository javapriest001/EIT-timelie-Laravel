<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Accountant;
use App\Models\utility;
use App\Models\deskOfficer;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use App\Models\fees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
   
    //ADMIN DASHBOARD
    function index(){
        
        $utility= utility::all()->count();
        $deskOfficer= deskOfficer::all()->count();
        $Accountant= Accountant::all()->count();

        $utilityNumber= users::where('category', 'utilityofficer')->count();
        $deskOfficerNumber= users::where('category', 'deskofficer')->count();
        $AccountantNumber= users::where('category', 'accountant')->count();
      

        $staff = users::all();
        $fees = fees::all()->skip(0)->take(3);

        return view('admin.dashboard')
        ->with('utility' , $utility)
        ->with('deskOfficer' , $deskOfficer)
        ->with('Accountant' , $Accountant)
        ->with('utilityNumber' , $utilityNumber)
        ->with('deskOfficerNumber' , $deskOfficerNumber)
        ->with('AccountantNumber' , $AccountantNumber)
        ->with('staff' , $staff)
        ->with('fees' , $fees)
        ;
    }

     //GET ALL ACCOUNTANT OFFICERS RECORDS FOR ADMIN VIEW
    function accountantrecord(){

        $accountantRecord = DB::table('accountant')
            ->join('user', 'accountant.staff_id', '=', 'user.id')
            ->select('accountant.*', 'user.first_name', 'user.surname')
            ->get();
        return view('admin.accountantrecord' , ['Records' => $accountantRecord]);
    }

    //GET ALL DESK OFFICERS RECORDS FOR ADMIN VIEW
    function deskofficerrecord(){

        $deskofficerrecord = DB::table('desk_officer')
            ->join('user', 'desk_officer.staff_id', '=', 'user.id')
            ->select('desk_officer.*', 'user.first_name', 'user.surname')
            ->get();
        return view('admin.deskofficerrecord' , ['Records' => $deskofficerrecord]);
    }

    //GET ALL UTILITY OFFICERS RECORDS FOR ADMIN VIEW
    function utilityofficerrecord(){

        $utilityofficerrecord = DB::table('utility')
            ->join('user', 'utility.staff_id', '=', 'user.id')
            ->select('utility.*', 'user.first_name', 'user.surname')
            ->get();
        return view('admin.utilityofficerrecord' , ['Records' => $utilityofficerrecord]);
    }

    //GET ALL STAFF FOR ADMIN VIEW
    function staff(){

        $staff= users::all();
          
        return view('admin.staff' , ['Records' => $staff]);
    }


    //GET ALL FEES FOR ADMIN VIEW
    function fees(){

        $fees= fees::all();
          
        return view('admin.fee' , ['Records' => $fees]);
    }


    //Add Fees From Dashboard Route
    function addFee(Request $req){

        $check = fees::where('Name' , $req->fee)->count();
        $req->validate([
            'fee' => 'required',
            'amount' =>'required'
        ]);
        if($check > 0){
            return redirect('admin/dashboard')->with('error' ,'Fee Already Exists');
        }
        fees::create([
            'Name' => $req->fee,
            'Amount' => $req->amount,
        ]);
        return redirect('admin/dashboard')->with('success' ,'New Fee Added');
    }


    //Add Fees From Newfee Route
    function addFees(Request $req){

        $check = fees::where('Name' , $req->fee)->count();
        $req->validate([
            'fee' => 'required',
            'amount' =>'required'
        ]);
        if($check > 0){
            return redirect('admin/fees')->with('error' ,'Fee Already Exists');
        }
        fees::create([
            'Name' => $req->fee,
            'Amount' => $req->amount,
        ]);
        return redirect('admin/fees')->with('success' ,'New Fee Added');
    }

    //Admin Add New Staff
    function addStaff(Request $req){

       
        return view('admin.newstaff');

    } 

    
    function newstaff(Request $req){

        $check = users::where('email' , $req->email)->count();
        $req->validate([
            'firstname' => 'required',
            'surname' =>'required',
            'email' =>'required',
            'role' =>'required',
            'password' =>'required'
        ]);

        if($check > 0){
            return redirect('admin/newstaff')->with('error' ,'Staff Already Exist');
        }
        users::create([
            'first_name' => $req->firstname,
            'surname' =>$req->surname,
            'email' =>$req->email,
            'category' =>$req->role,
            'password' => Hash::make($req->password)
        ]);
        return redirect('admin/staff')->with('success' ,'New Staff Successfully Added');
    }

    //Logout  Method
    public function logout()
    {
        if(session()->has('loggedin'))
        {
            session()->pull('loggedin');
        }
        return redirect('admin');
    }


}
