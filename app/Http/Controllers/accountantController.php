<?php

namespace App\Http\Controllers;
use App\Models\Accountant;
use App\Models\fees;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class accountantController extends Controller
{
    //

    public function index(){

        $accountant = DB::table('accountant')
                ->join('user', 'accountant.staff_id', '=', 'user.id')
                ->where('staff_id' , session('staffid'))
                ->select('accountant.*', 'user.first_name', 'user.surname')
                ->skip(0)->take(3)
                ->get();

        $fees = fees::all()
                ->skip(0)->take(6);        

                $userdetail = users::where('id' , session('staffid'))->first();
       
        return view('accountant.dashboard')
        ->with('records' , $accountant)
        ->with('fees' , $fees)
        ->with('avatar' , $userdetail);
    }

    
    public function records(){

        $accountant = DB::table('accountant')
                ->join('user', 'accountant.staff_id', '=', 'user.id')
                ->where('staff_id' , session('staffid'))
                ->select('accountant.*', 'user.first_name', 'user.surname')
                ->skip(0)->take(3)
                ->get();

        
       
        return view('accountant.records')
        ->with('records' , $accountant);
    }
    public function fees(){

        $fees = fees::all();

        
       
        return view('accountant.fees')
        ->with('records' , $fees);
    }
    public function profile(){

        
        $numberOfRecords = Accountant::where('staff_id' , session('staffid'))->count();
        
        $userdetail = users::where('id' , session('staffid'))->first();
        return view('accountant.profile')
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
       
        return redirect('accountant/profile')->with('success' , 'profile updated');
        
    }

    public function logout(){
        if (session()->has('staffid')) {
            session()->pull('staffid');
        }

        return redirect('/');
    }
           
        
    
}
