<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\customer;
use App\Http\Controllers\product;
use App\Http\Controllers\Vendor_shop;
use App\Http\Controllers\ProductSpecification;
use App\Http\Controllers\Error;
use App\Http\Controllers\BUY;
use App\Http\Controllers\login_admin;
use App\Http\Controllers\Repair;
use App\Http\Controllers\AllPayment;
use App\Http\Controllers\Cottaions;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('login_again');
Route::get('/dash',[dashboard::class,'dashboard'])->name('dashhboard');
Route::get('/form',[dashboard::class,'form']);
Route::get('/add_customer',[customer::class,'add_customer']);
Route::post('/register_customer',[customer::class,'Register_customer']);
Route::get('/All_customer',[customer::class,'All_customer']);
Route::get('/All_customer/edit_customer/{id}',[customer::class,'customer_edit'])->name('all_customer.edit');
Route::get('/All_customer/edit_customer/del/{id}',[customer::class,'customer_del'])->name('del');
Route::post('/update',[customer::class,'update_customer']);
Route::get('/search',[customer::class,'All_customer'])->name('search');
Route::get('/customerdetails/{id}',[customer::class,'details_customer'])->name('customer_details');
//----------product-----------------
Route::get('/product',[product::class,'product']);
Route::post('/Add_product',[product::class,'add_product']);
Route::get('/All_product',[product::class,'all_product'])->name('all_prodt');
Route::get('/All_product/edit_product/{id}',[product::class,'edit_product'])->name('all_product.edit');
Route::post('/update_product',[product::class,'update_product']);
Route::get('/del_product/{id}',[product::class,'delete_product'])->name('del_product');

//-----------------------------vendor---------------------
Route::get('/vendor',[Vendor_shop::class,'vendro_show']);
Route::post('/Add_vendor',[Vendor_shop::class,'add_vendor']);
Route::get('/All_vendor',[Vendor_shop::class,'all_vendor'])->name('all_vend');
Route::get('/edit_vendor/{id}',[Vendor_shop::class,'edit_vendor'])->name('edit_vend');
Route::post('/update_vendor',[Vendor_shop::class,'update_vendor']);
Route::get('/Delete_vendor/{id}',[Vendor_shop::class,'delete_vendor'])->name('delete_vend');
Route::get('/vendorProduct/{id}',[Vendor_shop::class,'vendorProduct'])->name('vendorProduct');
Route::post('/addvendorproduct',[Vendor_shop::class,'addvendorproduct']);
Route::get('/vendorView/{id}',[Vendor_shop::class,'vendorView'])->name('vendorView');
Route::get('/vendormoney/{id}/{vendor_id}',[Vendor_shop::class,'vendormoney'])->name('VendorMoney');
Route::post('/addVendorMoney',[Vendor_shop::class,'addMOney']);
Route::get('/vendorMOneyDetails/{id}/{prdID}',[Vendor_shop::class,'VendorMoneyDEtails'])->name('vendorMOneyDetails');
//----------------------------product--Specification-----------
Route::get('/specification',[ProductSpecification::class,'specification']);
Route::post('/Add_speci',[ProductSpecification::class,'add_specification']);
Route::get('/All_speci',[ProductSpecification::class,'all_speci'])->name('all_speci');
Route::get('/edit_speci/{id}',[ProductSpecification::class,'edit_speci'])->name('edit_speci');
Route::post('/update_speci',[ProductSpecification::class,'update_speci']);
Route::get('/delete_speci/{id}',[ProductSpecification::class,'delete_specification'])->name('del_speci');

//---------------------error-----------------------

Route::get('/error_page',[Error::class,'error_show']);
Route::post('/Add_error',[Error::class,'add_error']);
Route::get('/all_error',[Error::class,'all_error'])->name('all_error');
Route::get('/edit_error/{id}',[Error::class,'edit_error'])->name('edit_error');
Route::post('/update_error',[Error::class,'update_error']);
Route::get('/delete_error/{id}',[Error::class,'del_error'])->name('del_error');


Route::get('/table',[dashboard::class,'table']);
//  {{route('edit',['id' => $cust_value->id])}} 

//----------------buy----------------

Route::get('/buy/{id}',[BUY::class,'buy'])->name('buy');
Route::post('/buy_now',[BUY::class,'product_buy']);


//-------------------payment-----------
Route::get('/payment/{id}/{cust_id}',[Customer::class,'payment'])->name('payments');
Route::post('/receive_money',[Customer::class,'receive_money']);

//-------tranission---details-----------

Route::get('/transition/{id}',[Customer::class,'transition_details'])->name('trans_details');

//--------------admin_login------------------------

Route::post('/admin_loing',[login_admin::class,'login_user']);
Route::post('/login_admin',[login_admin::class,'login_admin'])->name('loginAdmin');
Route::get('/logout', [login_admin::class, 'logout']);


//------------------laptop--repair-----------------

Route::get('/repair',[Repair::class,'repair']);
Route::post('/add_repair',[Repair::class,'add_repair']);
Route::get('/All_repair',[Repair::class,'all_repair'])->name('all_repair');
// Route::get('/Edit_repair/{id}',[Repair::class,'edit_repair'])->name('Edit_repair');
// Route::post('/update_repair',[Repair::class,'update_repair']);
Route::get('/View_repair/{id}',[Repair::class,'view_repair'])->name('View_repair');
Route::get('/Buy_repair/{id}',[Repair::class,'buy_repair'])->name('buy_repair');
Route::post('/add_product',[Repair::class,'add_product'])->name('add_product');
Route::get('/Addmoney/{id}/{custo_id}',[Repair::class,'addmoney'])->name('Addmoney');
//------------------add--money---------------
Route::post('/Addpayment',[Repair::class,'add_payment']);
// Route::get('/Customerview/{id}',[Repair::class,'customerview'])->name('Customerview');


//------------------all--payment----------

Route::get('/allTrans',[AllPayment::class,'all_payment']);

//===============cottation---pages====
Route::get('/Quotation',[Cottaions::class,'quotation']);
Route::get('/addmoreQuotation',[Cottaions::class,'quotation']);


Route::post('/AddQuotation',[Cottaions::class,'addquotation']);
Route::get('/Allquotation',[Cottaions::class,'aallquotation'])->name('allquotation');
Route::get('/signleq/{id}',[Cottaions::class,'signleview'])->name('signleq');
Route::get('/Deletequotationn/{id}',[Cottaions::class,'deletesingle'])->name('Deletequotationn');
Route::get('/viewquotationn/{id}',[Cottaions::class,'viewsingle'])->name('viewquotationn');


Route::post('/AddmoreQ',[Cottaions::class,'AddmoreQuotation']);
Route::get('/EditQuotation/{id}',[Cottaions::class,'editQuotation'])->name('EditQuotation');
Route::post('/UpdatemoreQ',[Cottaions::class,'updateQuotation']);
Route::get('/DeletemoreQ/{id}',[Cottaions::class,'deleteQuotation'])->name('DeletemoreQ');
Route::get('/Remainder',[Cottaions::class,'remainder']);
