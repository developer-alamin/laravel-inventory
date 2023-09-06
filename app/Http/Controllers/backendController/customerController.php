<?php

namespace App\Http\Controllers\backendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\Hash;

class customerController extends Controller
{
    function customerPage(){
        return view("backend.customer");
    }
    function admincreateCustomer(Request $request){
        $customer = new customer();
        $customer->name = $request->customerName;
        $customer->email = $request->customerEmail;
        $customer->phone = $request->customerPhone;
        $customer->password = Hash::make("12345",['rounds' => 5]);
        return $customer->save();
    }

    function adminGetCustomer(){
        $getCustomer = customer::all();
        return $getCustomer;
    }

    function adminCustomerShow(Request $request){
        $showId = $request->ShowId;
        $customerShowData = customer::findOrFail($showId);
        return $customerShowData;
    }

    function adminCustomerUPdate(Request $request){
        $cusUpId = $request->customerUpId;
        $cusUpName = $request->custoUpName;
        $cusUpEmail = $request->custoUpEmail;
        $cusUpPhone = $request->custoUpPhone;

        $cusUpData = customer::findOrFail($cusUpId);

        $cusUpData->name = $cusUpName;
        $cusUpData->email = $cusUpEmail;
        $cusUpData->phone = $cusUpPhone;
        
        return $cusUpData->update();
    }

    function adminCustomerDelete(Request $request){
        $cusDelData = customer::findOrFail($request->deleteId);
        return $cusDelData->delete();
    }
}
