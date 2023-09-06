<?php

namespace App\Http\Controllers\backendController;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;

class profileController extends Controller
{
    function profilePage(){
        if(Session::has("customerId")){
            $cusData = customer::findOrFail(Session::get("customerId"));
             return view("backend.profile",compact('cusData'));
        }
    }
    function profileUpdate(Request $request){
        $proUpId = $request->proUpId;
        $ProName = $request->ProName;
        $ProEmail = $request->ProEmail;
        $ProPhone = $request->ProPhone;

        $customerUp = customer::findOrFail($proUpId);
        $customerUp->name = $ProName;
        $customerUp->email = $ProEmail;
        $customerUp->phone = $ProPhone;
        return $customerUp->update();
    }
}
