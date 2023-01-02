<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reg_customer;
use App\Models\Productmodel;
use App\Models\buyNow;

class BUY extends Controller
{
    public function buy($id){
        $customer = Reg_customer::find($id);
        $product = Productmodel::all();
        if(is_null($customer)){
            return redirect()->back();
        }else{
            $data = compact('customer','product');
            return view('buy.buynow')->with($data);
        }
    }
    public function product_buy(Request $request){
        $buy = new buyNow;
        $buy->Customer_id = $request['customerID'];
        $buy->Product_id = $request['Product_id'];
        $buy->Date = $request['date'];
        $buy->Total_price = $request['total_price'];
        $buy->description = $request['disc_rption'];
        $buy->save();
       return redirect()->back()->with('message','Add product successfully');
    }


}
