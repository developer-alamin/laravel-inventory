<?php

namespace App\Http\Controllers\backendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class reportController extends Controller
{
    function reportPage(){
        return view("backend.report");
    }
 
    function reportGena(Request $request){
        $fromDate = $request->fromData;
        $toDate   = $request->toDate;

        $date = $fromDate.' To '.$toDate;
        $ReportTotal = invoice::whereBetween("date",[$fromDate,$toDate])->sum('total');
        $ReDiscount = invoice::whereBetween("date",[$fromDate,$toDate])->sum('discount');
        $ReportVat = invoice::whereBetween("date",[$fromDate,$toDate])->sum('vat');
        $RepPayable = invoice::whereBetween("date",[$fromDate,$toDate])->sum('payable');
        $reportDetails = invoice::whereBetween("date",[$fromDate,$toDate])->get();

        return compact("date","ReportTotal","ReDiscount","ReportVat","RepPayable","reportDetails");
       
    }
}
