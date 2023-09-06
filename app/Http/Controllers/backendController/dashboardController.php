<?php

namespace App\Http\Controllers\backendController;

use Session;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{customer,category,brand,product,sales,invoice};

class dashboardController extends Controller
{
    function dashboard(){
        if(Session::has("customerId")){
            $customer = customer::count("id");
            $category = category::count("id");
            $brand    = brand::count("id");
            $product  = product::count("id");
            $sales = sales::count("id");
            $invoice = invoice::count("id");
            $invTotalTaka = invoice::sum("payable");
            $vat = invoice::sum("vat");

            $salesChart = sales::select("*")->get()->groupBy(function($data){
                return Carbon::parse($data->date)->format("D");
            });

            $salesDayKey = [];
            $salesDayCount = [];
            foreach($salesChart as $salesKey => $salesData){
              $salesDayKey[] = $salesKey;
              $salesDayCount[] = $salesData->count();    
            }
            
            $invChart = invoice::select("*")->get()->groupBy(function($data){
                 return Carbon::parse($data->date)->format("D");
            });

            $InvDayKey = [];
            $InvDayCount = [];
            foreach($invChart as $invChartKey => $invChartData){
              $InvDayKey[] = $invChartKey;
              $InvDayCount[] = $invChartData->count();    
            }
            return view("backend.dashboard",compact('customer',"category","brand","product","sales","invoice","invTotalTaka","vat","salesDayKey","salesDayCount","InvDayKey","InvDayCount"));
        }
    }
}
