<?php

namespace App\Http\Controllers\frontendController;

use Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;

class loginController extends Controller
{
    function login(){
        return view("frontend.login");
    }

    function loginPost(Request $request){
       $email = $request->email;
       $password = $request->password;

       $customer = customer::where("email",$email)->first();
       if(isset($customer)){
         if(Hash::check($password,$customer->password)){
            $request->Session()->put('customerId',$customer->id);
              return response([
                'status' => 200,
                'data' => "success"
              ]);
              
         }else{
            return response([
              'status' => 200,
              'passerror'  => "Incorrect Password"
            ]);
         }
       }else{
          return response([
            'status' => 200,
            'error'  => 'Incorrect Email'
          ]);
       }
    }

    function logout(){
        if(Session::has("customerId")){
            Session::pull("customerId");
            return redirect(route("frontend.login"));
        }
    }
}

