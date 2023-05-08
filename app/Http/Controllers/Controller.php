<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function Register(Request $request){
       $imagename = '';
            if ($request->hasFile('profile')) {
                    $image = $request->profile;
                    $image->move('Profileimage/', $image->getClientOriginalName());
        
                    $imagename = $request->profile->getClientOriginalName();
                    
                }
          $user = User::create([
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
            'mobile'=>$request->mobile,
            'branch'=>$request->branch,
             'token'=>$request->token,
            'year'=>$request->year,
            'roll_number'=>$request->roll_number,
            'role'=>$request->role,
            'profile'=>$imagename,
            'password'=>$request->password,
          ]);
       
         
        if($user){
            return response([
                'result'=>$user
            ]);
    }else{

        return response([
            'result'=>"User Not Register"
        ]);
    }

}
public function Login(Request $request){
    
        $user= User::where(['mobile'=>$request->mobile])->first();
        if($user != null){
            if($request->password != $user->password){
                return ["Result"=>"Wrong credentials please try again"];
            }else{
                $user= User::where(['mobile'=>$request->mobile])->first();
                return response([
                    'result'=>$user,"password"=>$user->password
                ]);
            }
        
        }else{
            return ["Result"=>"Something Wrong please try again,User Not Found"];
        }

}
public function update(Request $request){
    //return $request;

     $imagename = "";
     
     if ($request->hasFile('profile')) {
             $image = $request->profile;
             $image->move('Profileimage/', $image->getClientOriginalName());
 
             $imagename = $request->profile->getClientOriginalName();
             
         }
     $user= User::where(['mobile'=>$request->mobile])->first();
    
     if($user!=null){
         $user->f_name=$request->f_name;
         $user->l_name=$request->l_name;
         $user->branch=$request->branch;
         $user->token=$request->token;
         $user->roll_number=$request->roll_number;
         $user->year=$request->year;
         $user->role=$request->role;
         $user->profile=$imagename;
         $user->password=$request->password;

         $user->save();

         return response([
             'result'=>$user
         ]);
         
     }else{

         return ["Result"=>"Something Wrong please try again,User Not Found"];
     }
 }

 public function allstudents(){
    return ([
        'Result'=>User::where('role','student')->get()
    ]);
 }
 public function allteachers(){
    return ([
        'Result'=>User::where('role','teacher')->get()
    ]);
 }
 public function allstaff(){
    return ([
        'Result'=>User::where('role','staff')->get()
    ]);
 }
 public function alluser(){
    return ([
        'Result'=>User::get()
    ]);
 }


 public function sendOtp(Request $request){
     $otp = rand(1000,9999);
     Log::info('password ='.$otp);
     return $otp;
     $user = User::where('mobile','=',$request->mobile)->update(['password'=>$otp]);
 }
 
}
