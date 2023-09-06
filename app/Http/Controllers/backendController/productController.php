<?php

namespace App\Http\Controllers\backendController;

use App\Models\{product,category,brand};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    function productPage(){
        $brand = brand::all();
        $brandUp = brand::all();
        $category = category::all();
        $cateUp = category::all();
        return view("backend.product",compact("brand","category","brandUp","cateUp"));
    }
    function createProduct(Request $request){
        $host = $_SERVER["HTTP_HOST"];
        $addHttp = "http://".$host."/storage/product";
        $file = $request->file("productImg");

         $nameStrRep = str_replace(' ','',$request->productName);

        $ServerUpload = $addHttp."/".time()."/".date('Y')."/".$nameStrRep.'_'.date("m").".".$file->getClientOriginalExtension();
         $fileUpload = time()."/".date('Y')."/".$nameStrRep.'_'.date("m").'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/product/',$fileUpload);

        $product = new product();
        $product->name = $request->productName;
        $product->rate = $request->productRate;
        $product->quantity = $request->productQuantity;
        $product->brand = $request->productBrand;
        $product->category = $request->productCategory;
        $product->status = $request->productStatus;
        $product->photo = $ServerUpload;
        return $product->save();
    }

    function getProduct(){
        $getProduct = product::all();
        return $getProduct;
    }
    function productUpShow(Request $request){
        $proShowId = $request->showId;
        $productShowData = product::findOrFail($proShowId);
        return $productShowData;
    }

    function productUpdate(Request $request){
      
       if($request->hasFile("proUpImg")){
        $host = $_SERVER["HTTP_HOST"];
        $addHttp = "http://".$host."/storage/product";

        $UpnameStrRep = str_replace(' ','',$request->proUpName);

        $newFile = $request->file("proUpImg");

        $newServerUpload = $addHttp."/".time()."/".date('Y')."/".$UpnameStrRep.'_'.date("m").".".$newFile->getClientOriginalExtension();

         $newFileUpload = time()."/".date('Y')."/".$UpnameStrRep.'_'.date("m").'.'.$newFile->getClientOriginalExtension();

       $newFile->storeAs("public/product/",$newFileUpload);

        $productPreImg = $request->ProUpImgPath;
        $explodeImg = explode("/",$productPreImg);
        $sendImg = end($explodeImg);
        $FirstEndPreImg = prev($explodeImg);
        $secondEndPreImg = prev($explodeImg);
        Storage::deleteDirectory('public/product/'.$secondEndPreImg);
       }else{
         $newServerUpload = $request->ProUpImgPath;
       }

        $productUpData = product::findOrFail($request->ProUpId);
        $productUpData->name = $request->proUpName;
        $productUpData->rate = $request->proUpRate;
        $productUpData->quantity = $request->proUpQuantity;
        $productUpData->brand = $request->ProductUpBrand;
        $productUpData->category = $request->ProductUpCate;
        $productUpData->status = $request->ProductUpStatus;
        $productUpData->photo = $newServerUpload;
        return $productUpData->update();
    }
    function productDelete(Request $request){
        $proDleteId = $request->proDelId;
        $productDelete = product::findOrFail($proDleteId);
        $deleteImgPath = $productDelete->photo;
        
         $explodeImg = explode("/",$deleteImgPath);
         $deleteEndImg = end($explodeImg);
         $deleteEndPreImg = prev($explodeImg);
         $SecondDelEndPreImg = prev($explodeImg);
         Storage::deleteDirectory("public/product/".$SecondDelEndPreImg);
        return product::destroy($proDleteId);
    }

    function test(){
       return "test";
    }
}
