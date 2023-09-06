<?php

namespace App\Http\Controllers\backendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\invoice;
use App\Models\sales;

class invoiceController extends Controller
{
    function invoicePage(){
        return view("backend.invoice");
    }
    function InvoiceAll(){
        $invoiceData = invoice::all();
        return $invoiceData;
    }
    function InvoiceViewShow(Request $request){
        $invoiceView = invoice::findOrFail($request->viewId);
        $salesView = sales::where("invoice_id",$request->viewId)->get();
        return compact("invoiceView","salesView");
    }
    function invoiceDelete(Request $request){
        $invoiceDelete = invoice::findOrFail($request->InvDelId);
        sales::where("invoice_id",$request->InvDelId)->delete();
        return $invoiceDelete->delete();
    }
}
