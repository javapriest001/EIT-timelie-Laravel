<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    //returns and renders the admin login page
    function adminLoginPage(){
        return view('adminlogin');
    }

    //returns and renders the user login page
    function userLoginPage(){
        return view('userLogin');
    }

    // Handles Admin Login
    function LoginAdmin(Request $req ){
        
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('username' , $req->username)->first();
        if(!$admin){
            return redirect('admin')->with('error','User Not Found');
        }else{
            if($req->password === $admin->password){
                $req->session()->put('loggedin' , $admin->id);
                return redirect('admin/dashboard');
            }else{
                return redirect('admin')->with('error', 'Incorrect Password');
            }
        }

    }

    //Handles Staff Login
    function LoginStaff(Request $req ){
        
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $users = users::where('email' , $req->username)->first();
        
        if(!$users){
            return redirect('/')->with('error','User Not Found');
        }
        
        
         if( Hash::check($req->password , $users->password) ){
                

                $category = $users->category;

                $allcategory = ['accountant' , 'deskofficer' , 'utilityofficer'];
                
                if(in_array($category , $allcategory)){
                  
                    
                    $req->session()->put('staffid' , $users->id);
                    return redirect($category.'/dashboard');
                }
                
            }
            else{
                return redirect('/')->with('error', 'Incorrect Password');
            }
        

    }
}
