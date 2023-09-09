<?php 
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\customerAuth;

use App\Http\Controllers\backendController\dashboardController;
use App\Http\Controllers\backendController\customerController;
use App\Http\Controllers\backendController\categoryController;

use App\Http\Controllers\backendController\brandController;
use App\Http\Controllers\backendController\productController;
use App\Http\Controllers\backendController\salesController;

use App\Http\Controllers\backendController\invoiceController;
use App\Http\Controllers\backendController\reportController;
use App\Http\Controllers\backendController\profileController;

Route::middleware([customerAuth::class])->group(function(){
    Route::prefix('/admin')->group(function () {
        Route::get("/",[dashboardController::class,"dashboard"])->name("admin.dashboard");
        
        // customer route start form here
        Route::get("/customerPage",[customerController::class,"customerPage"])->name("admin.customerPage");
        Route::post("/createCustomer",[customerController::class,"admincreateCustomer"])->name("admin.createCustomer");
        Route::get("/getCustomer",[customerController::class,"adminGetCustomer"])->name("admin.GetCustomer");
        Route::post("/customerShow",[customerController::class,"adminCustomerShow"])->name("admin.CustomerShow");
        Route::post("/customerUPdate",[customerController::class,"adminCustomerUPdate"])->name("admin.customerUPdate");
        Route::post("/customerDelete",[customerController::class,"adminCustomerDelete"])->name("admin.CustomerDelete");
        // customer route start form here

        // category route start form here
        Route::get("/categoryPage",[categoryController::class,"categoryPage"])->name("admin.categoryPage");
        Route::post("/createCategory",[categoryController::class,"createCategory"])->name("admin.createCategory");
        Route::get("/getCategory",[categoryController::class,"getCategory"])->name("admin.getCategory");
        Route::post("/categoryShow",[categoryController::class,"adminCategoryShow"])->name("admin.categoryShow");
        Route::post("/categoryUpdate",[categoryController::class,"categoryUpdate"])->name("admin.categoryUpdate");
        Route::post("/categoryDelete",[categoryController::class,"categoryDelete"])->name("admin.categoryDelete");
         // category route start form here

        // brand route start form here
        Route::get("/brandPage",[brandController::class,"brandPage"])->name("admin.brandPage");
        Route::post("/createBrand",[brandController::class,"createBrand"])->name("admin.createBrand");
        Route::get("/getBrand",[brandController::class,"getBrand"])->name("admin.getBrand");
        Route::post("/brandShow",[brandController::class,"brandShow"])->name("admin.brandShow");
        Route::post("/brandUpdate",[brandController::class,"brandUpdate"])->name("admin.brandUpdate");
        Route::post("/brandDelete",[brandController::class,"brandDelete"])->name("admin.brandDelete");
        // brand route end form here
        // product route start form here
        Route::get("/productPage",[productController::class,"productPage"])->name("admin.productPage");
        Route::post("/createProduct",[productController::class,"createProduct"])->name("admin.createProduct");
        Route::get("/getProduct",[productController::class,"getProduct"])->name("admin.getProduct");
        Route::post("/productUpShow",[productController::class,"productUpShow"])->name("admin.productUpShow");
        Route::post("/productUpdate",[productController::class,"productUpdate"])->name("admin.productUpdate");
        Route::post("/productDelete",[productController::class,"productDelete"])->name("admin.productDelete");
        // product route end form here

        // create product sales route start form here
        Route::get("/salesPage",[salesController::class,"salesPage"])->name("admin.salesPage");
        Route::get("/salProductShow",[salesController::class,"salProductShow"])->name("admin.salProductShow");

        Route::post("/invAddProShow",[salesController::class,"invAddProShow"])->name("admin.invAddProShow");
        
        Route::post("/InvProductAdd",[salesController::class,"InvProductAdd"])->name("admin.InvProductAdd");

       Route::post("/productPick",[salesController::class,"productPick"])->name("admin.productPick");

        Route::post("/customerPick",[salesController::class,"customerPick"])->name("admin.customerPick");
        
        Route::post("/createSales",[salesController::class,"createSales"])->name("admin.createSales");
        // create product sales route end form here
        // invoice page route code start fork here
        Route::get("/invoicePage",[invoiceController::class,"invoicePage"])->name("admin.invoicePage");
        Route::get("/InvoiceAll",[invoiceController::class,"InvoiceAll"])->name("admin.InvoiceAll");

        Route::post("/InvoiceViewShow",[invoiceController::class,"InvoiceViewShow"])->name("admin.InvoiceViewShow");

        Route::post("/invoiceDelete",[invoiceController::class,"invoiceDelete"])->name("admin.invoiceDelete");
        // invoice page route code end fork here
        // report page route code start form here
        Route::get("/reportPage",[reportController::class,"reportPage"])->name("admin.reportPage");
        Route::post("/reportGena",[reportController::class,"reportGena"])->name("admin.reportGena");
        // report page route code end form here
        // profile route code start form here
        Route::get("/profilePage",[profileController::class,"profilePage"])->name("admin.profilePage");
        
        Route::post("/profileUpdate",[profileController::class,"profileUpdate"])->name("admin.profileUpdate");
           // profile route code end form here
        Route::get('/test',[productController::class,"test"]);
    });

})

?>