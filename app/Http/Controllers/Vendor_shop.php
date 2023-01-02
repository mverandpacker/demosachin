<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\vendorproduct;
use App\Models\vendormoney;
use DB;
class Vendor_shop extends Controller
{
    public function vendro_show(){
        return view('vendor.add_vendor');
    }
    public function add_vendor(Request $request){
        $vendor = new Vendor;
        $vendor->Vendor_name = $request['vendorname'];
        $vendor->Shop_name = $request['Shopname'];
        $vendor->Vendor_email = $request['vendoremail'];
        $vendor->Vendor_number = $request['vendorphoneno'];
        $vendor->Vendor_address = $request['vendoraddress'];
        $vendor->save();
        return redirect()->route('all_vend');
    }
    public function all_vendor(){
        $vendor = Vendor::all();
        $vendor =  DB::table('_add_vendor')->orderBy('id','DESC')->paginate(10,['*'],'vendor');
        $data = compact('vendor');
        return view('vendor.all_vendor')->with($data);
    }
    public function edit_vendor($id){
        $vendor = Vendor::find($id);
        if(is_null($vendor)){
            return redirect()->back();
        }else{
            $data = compact('vendor');
            return view('vendor.edit_vendor')->with($data);
        }
    }
    public function update_vendor(Request $request){
        $vendor = Vendor::find($request->id);
        $vendor->Vendor_name = $request['vendorname'];
        $vendor->Shop_name = $request['Shopname'];
        $vendor->Vendor_email = $request['vendoremail'];
        $vendor->Vendor_number = $request['vendorphoneno'];
        $vendor->Vendor_address = $request['vendoraddress'];
        $vendor->save();
        return redirect()->route('all_vend')->with('message','Update successfully');
    }
    public function delete_vendor($id){
        $vendor = Vendor::find($id);
        if(!is_null($vendor)){
            $vendor->delete();
        }
        return redirect()->back();
    }
    public function vendorProduct($id){
        $vendor = Vendor::find($id);
        $data = compact('vendor');
        return view('vendor.vendorProdcut')->with($data);
    }
    public function addvendorproduct(Request $request){
        $Vproduct = new vendorproduct;
        $Vproduct->Vendor_id = $request['vendorid']; 
        $Vproduct->Title = $request['title']; 
        $Vproduct->Model = $request['model']; 
        $Vproduct->Photo = $request->image->getClientOriginalName();
        $upload = $request->file('image')->move('vendor_image',$Vproduct->Photo);

        $Vproduct->Price = $request['price']; 
        $Vproduct->Description = $request['description']; 
        $Vproduct->save();
        return redirect()->back()->with('success','Add Vendor product successfully');
    }
    public function vendorView($id){
        $Vproduct = DB::table('vendor_product')
                    ->where('vendor_product.Vendor_id','=',$id)
                    ->select('vendor_product.*')
                    ->get();
         $data = compact('Vproduct');           
        return view('vendor.vendorview')->with($data);
    }
    public function vendormoney($id,$vendor_id){
        $Vproduct = vendorproduct::find($id);
        $vendorID = vendorproduct::find($vendor_id);
        $data = compact('Vproduct','vendorID');
        return view('vendor.vendormoney')->with($data);
    }
    public function addMOney(Request $request){
        $vendormoney = new vendormoney;
        $vendormoney->VendorID = $request['VendorId'];
        $vendormoney->ProductID = $request['productId'];
        $vendormoney->Date = $request['datevendor'];
        $vendormoney->Price = $request['vendorprice'];
        $vendormoney->save();
        return redirect()->back()->with('message','Add Money Successfully');
    }
    public function VendorMoneyDEtails($id, $prdID){
        $wallets = DB::table('vendor_money')
                        ->join('vendor_product','vendor_product.id','=','vendor_money.ProductID')
                        ->where('vendor_money.ProductID','=', $prdID)
                        ->select('vendor_money.Date','vendor_money.Price','vendor_product.Title','vendor_product.Photo')
                        ->get();
                       
                     
                    
                 $ReceiveMoney = DB::table('vendor_money')
                                    ->select(DB::raw('sum(Price) AS Recieve'))
                                    ->where('vendor_money.ProductID','=',$prdID)
                                    ->get();
                                    
                $totalProduct = DB::table('vendor_product')
                                    ->select(DB::raw('sum(Price) AS TotalPrd'))
                                    ->where('vendor_product.id','=',$prdID)
                                    ->get();
                                                     
        $data = compact('wallets','ReceiveMoney','totalProduct');                
        return view('vendor.vendormoneydetails')->with($data);
    }
}
