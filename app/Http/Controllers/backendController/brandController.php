<?php

namespace App\Http\Controllers\backendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;

class brandController extends Controller
{
    function brandPage(){
        return view("backend.brand");
    }

    function createBrand(Request $request){
        $createBrand = new brand();
        $createBrand->name = $request->brandName;
        return $createBrand->save();
    }
    function getBrand(){
        $getBrand = brand::all();
        return $getBrand;
    }

    function brandShow(Request $request){
        $brandShowData = brand::findOrFail($request->braShowid);
        return $brandShowData;
    }

    function brandUpdate(Request $request){
        $brandUpdate = brand::findOrFail($request->brandUpid);
        $brandUpdate->name = $request->brandUpName;
        return $brandUpdate->update();
    }

    function brandDelete(Request $request){
        $brandDelete = brand::findOrFail($request->deleteId);
        return $brandDelete->delete();
    }
}
