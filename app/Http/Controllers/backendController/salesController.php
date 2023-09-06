<?php

namespace App\Http\Controllers\backendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\product;
use App\Models\invoice;
use Carbon\Carbon;
use App\Models\sales;
class salesController extends Controller
{
    function salesPage(){
        return view("backend.sales");
    }

    function customerPick(Request $request){
        $cusPickData = customer::findOrFail($request->CusPickId);
        return $cusPickData;
    }
    function salProductShow(){
        $salProShow = product::where("quantity","!=",0)->where("status","!=",0)->get();
        return $salProShow;
    }
    function invAddProShow(Request $request){
        $InvAddproShow = product::findOrFail($request->InvAddProId);
        return $InvAddproShow;
    }
    function InvProductAdd(Request $request){
       $InvAddPid = $request->invAddProId;
       $InvAddPQty = $request->InvaddProQty;
       $invAddProData = product::findOrFail($InvAddPid);
       $InvQtySum = $InvAddPQty*$invAddProData->rate;
       return $request;

    }   

    function productPick(Request $request){
        $productPickData = product::findOrFail($request->proPickid);
        return $productPickData;
    }
    function createSales(Request $request){
        $date = Carbon::now()->format("d-m-Y");
        $cusPickId    = $request->salCusPickId;
        $cusPickData  = customer::findOrFail($cusPickId);
        $invTotalTaka = $request->inputTotalTaka;
        $invPayTaka   = $request->inputPayTaka;
        $invVatTaka   = $request->InputVatTaka;
        $invDisTaka   = $request->InputDisTaka;

        $ProName = $request->name;
        $ProQty  = $request->qty;
        $ProRate = $request->rate;
        $proTotalTaka = $request->total;

        $Invoice = invoice::create([
            "name"     => $cusPickData->name,
            "email"    => $cusPickData->email,
            "phone"    => $cusPickData->phone,
            "total"    => $invTotalTaka,
            "vat"      => $invVatTaka,
            "discount" => $invDisTaka, 
            "payable"  => $invPayTaka,
            "date"     => $date
        ]);

        for ($x = 0; $x < count($ProName); $x++) {
           sales::create([
                "name"       => $ProName[$x],
                "quantity"   => $ProQty[$x],
                "rate"       => $ProRate[$x],
                "total"      => $proTotalTaka[$x],
                "invoice_id" => $Invoice->id,
                "date"       => $date
            ]);
        } 


    }
}
