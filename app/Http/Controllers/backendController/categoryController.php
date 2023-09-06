<?php

namespace App\Http\Controllers\backendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    function categoryPage(){
        return view("backend.category");
    }
    function createCategory(Request $request){
        $createCategory = new category();
        $createCategory->name = $request->categoryName;
        return $createCategory->save();
    }
    function getCategory(){
        $getCategory = category::all();
        return $getCategory;
    }

    function adminCategoryShow(Request $request){
        $catShowData = category::findOrFail($request->catShowid);
        return $catShowData;
    }

    function categoryUpdate(Request $request){
        $categoryUpdate = category::findOrFail($request->catUpId);
        $categoryUpdate->name = $request->catUpName;
         return $categoryUpdate->update(); 
    }
    function categoryDelete( Request $request){
       $categoryDelete = category::findOrFail($request->catDeleteid);
       return $categoryDelete->delete();
    }
}
