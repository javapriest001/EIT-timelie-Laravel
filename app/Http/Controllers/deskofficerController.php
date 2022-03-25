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
                $validation = fees::where('Name' , 'Validation')->first();
                $printing = fees::where('Name' , 'printing')->first();
                $putme = fees::where('Name' , 'Post Utme')->first();
                $jambpay = fees::where('Name' , 'jamb Pay Attitude')->first();
                $jambremita = fees::where('Name' , 'jamb Remita')->first();
                $onlinereg = fees::where('Name' , 'Online Registration')->first();
                $profilecrtn = fees::where('Name' , 'Profile Creation')->first();
                $uploads = fees::where('Name' , 'Uploads')->first();
                $data = fees::where('Name' , 'Data Correction')->first();
                $parttime = fees::where('Name' , 'Part Time Services')->first();

         
                $data = [
                    'records' => $deskofficer,
                     'fees' => $fees,
                     'avatar' => $userdetail,
                     'validation' => $validation,
                     'printing' => $printing,
                     'putme' => $putme,
                     'jambpay' => $jambpay,
                     'jambremita' => $jambremita,
                     'profilecrtn' => $profilecrtn,
                     'uploads' => $uploads,
                     'data' => $data,
                     'parttime' => $parttime,
                     'Onlinereg' => $onlinereg,
                     
         
                 ];        
        return view('deskofficer.dashboard' , $data);
        
    }

    
    public function records(){

        $deskofficer = DB::table('desk_officer')
                ->join('user', 'desk_officer.staff_id', '=', 'user.id')
                ->where('staff_id' , session('staffid'))
                ->select('desk_officer.*', 'user.first_name', 'user.surname')
                ->skip(0)->take(3)
                ->get();

        $userdetail = users::where('id' , session('staffid'))->first();
       $data =[
        'records' => $deskofficer,
        'data' => $userdetail
       ];
        return view('deskofficer.records' , $data);
        
    }
    public function fees(){

        $fees = fees::all();

        return view('deskofficer.fees' , ['records' => $fees]);
       
    }
    public function profile(){

        
        $numberOfRecords = deskOfficer::where('staff_id' , session('staffid'))->count();
        
        $userdetail = users::where('id' , session('staffid'))->first();
        $data=[
            'data' => $userdetail,
            'numberOfRecords' => $numberOfRecords
        ];
        return view('deskofficer.profile' , $data);
        
        
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
       
        return redirect('deskofficer/profile')->with('success' , 'profile updated');
        
    }

    
    public function addTimeline(Request $req){

        $query = deskOfficer::create([

            'staff_id'  => $req->staff_id,
            'date'  => $req->date,
            'uploads'  => $req->uploads,
            'corrections'  => $req->corrections,
            'post_utme'  => $req->post_utme,
            'printing'  => $req->printing,
            'online_reg'  => $req->online_reg,
            'validation'  => $req->validation,
            'profile_crtn'  => $req->profile_crtn,
            'part_time'  => $req->part_time,
           
         

        ]);
        if ($query) {
            return redirect('deskofficer/dashboard')->with('success' , 'Record Successfully Added');
        }
        return redirect('deskofficer/dashboard')->with('error' , 'There Was An error Adding Record');


    }

    public function logout(){
        if (session()->has('staffid')) {
            session()->pull('staffid');
        }

        return redirect('/');
    }
}
