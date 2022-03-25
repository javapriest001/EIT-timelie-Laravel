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
           'records' => $accountant,
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

        // var_dump($data)  ;
        // return;

   
     
        return view('accountant.dashboard' , $data);
        
    }

    
    public function records(){

        $accountant = DB::table('accountant')
                ->join('user', 'accountant.staff_id', '=', 'user.id')
                ->where('staff_id' , session('staffid'))
                ->select('accountant.*', 'user.first_name', 'user.surname')
                ->skip(0)->take(3)
                ->get();

        
       
        return view('accountant.records' , ['records' => $accountant]);
        
    }
    public function fees(){

        $fees = fees::all();

        
       
        return view('accountant.fees' , ['records' => $fees]);
      
    }

    public function profile(){

        
        $numberOfRecords = Accountant::where('staff_id' , session('staffid'))->count();
        
        $userdetail = users::where('id' , session('staffid'))->first();
        $data = [
            'data' => $userdetail,
            'numberOfRecords' => $numberOfRecords
        ];
        return view('accountant.profile' , $data);
        
        
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
        
        //$user->password =   ;

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

    public function addTimeline(Request $req){

        $query = Accountant::create([

            'staff_id'  => $req->staff_id,
            'date'  => $req->date,
            'uploads'  => $req->uploads,
            'correction'  => $req->correction,
            'post_utme'  => $req->post_utme,
            'printing'  => $req->printing,
            'onlinereg'  => $req->onlinereg,
            'validation'  => $req->validation,
            'profile_crtn'  => $req->profile_crtn,
            'part_time'  => $req->part_time,
            'opening_bal'  => $req->opening_bal, 
            'jamb_no'  => $req->jamb_no,
            'jamb_payall'  => $req->jamb_payall,
            'jamb_remita'  => $req->jamb_remita,
            //'putme_amt'  => $req->putme_amt,
            'exp_amt'  => $req->exp_amt,
            'exp_remark'  => $req->exp_remark
         

        ]);
        if ($query) {
            return redirect('utility/dashboard')->with('success' , 'Record Successfully Added');
        }
        return redirect('utility/dashboard')->with('error' , 'There Was An error Adding Record');


    }
    
        
    
}
