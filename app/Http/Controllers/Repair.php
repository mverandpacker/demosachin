<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reg_customer;
use App\Models\laptopRepair;
use App\Models\buyProductrepair;
use App\Models\AddMoney;

use DB;
class Repair extends Controller
{
    public function repair(){
    $customer = Reg_customer::all();
    $data = compact('customer');
        return view('rapair.addrepair')->with($data);
    }
    public function add_repair(Request $request){
        $repair = new laptopRepair;
        $repair->Customer_id = $request['customerid'];
        $repair->Repair_title = $request['repairtitle'];
        // $repair->Repair_photo = $request->repairpic->getClientOriginalName();
        $repair->Repair_photo = $request->repairpic->getClientOriginalName();
        $upload = $request->file('repairpic')->move('rapair',$repair->Repair_photo);
        $repair->Repair__price = $request['sallingprice'];
        $repair->Repair_MRP = $request['mrp'];
        $repair->Repair_description = $request['Repairdescription'];
        $repair->save();
        return redirect()->route('all_repair');
    }
    public function all_repair(){
        // $repair = laptopRepair::all();
        $customerid = DB::table('repair')
        ->join('_customer','_customer.id','=','repair.Customer_id')
        
        ->get();
        $customerid = DB::table('repair')
        ->join('_customer','_customer.id','=','repair.Customer_id')
        
        ->paginate(10);
        $data = compact('customerid');
        return view('rapair.Allrepair')->with($data);
    }
    // public function edit_repair($id){
    //     $repair = laptopRepair::find($id);        
    //     $data = compact('repair');
    //     return view('rapair.repairedit')->with($data);
    // }
    // public function update_repair(Request $request){
    //     $repair = laptopRepair::find($request->id);
    //     $repair->Customer_id = $request['customerid'];
    //     $repair->Repair_title = $request['repairtitle'];
    //     $repair->Repair_photo = $request->repairpic->getClientOriginalName();
    //     $upload = $request->file('repairpic')->move('rapair',$repair->Repair_photo);
    //     $repair->Repair__price = $request['sallingprice'];
    //     $repair->Repair_MRP = $request['mrp'];
    //     $repair->Repair_description = $request['Repairdescription'];
    //     $repair->save();
    //     return redirect()->route('all_repair');

    // }
    public function view_repair($id){
             $customer = Reg_customer::find($id);
             $productbuy = DB::table('repair')
             ->join('repairproduct','repairproduct.Product_id','=','repair.id')
             ->where('repairproduct.customer_id','=',$id)
             ->select('repair.*','repairproduct.Date','repairproduct.Price')
             ->get();
            //  $receiveMoney = DB::table('_repair_money')
            //                         ->join('repairproduct','repairproduct.Product_id','=','_repair_money.productId')
            //                         ->where('_repair_money.customerId','=',$id)
            //                         ->get();
            //               dd($receiveMoney);          
           $pendingAmount = DB::table('repairproduct')
                                ->select(DB::raw('sum(repairproduct.Price) AS Pending'))
                                ->where('repairproduct.customer_id','=',$id)
                                ->get();
                                
            $receiveMoney = DB::table('_repair_money')
                                ->select(DB::raw('sum(_repair_money.Total_Money) AS Receive'))
                                ->where('_repair_money.customerId','=',$id)
                                ->get();
             $transiton = DB::table('_repair_money')
                            ->select('_repair_money.*')
                            ->where('_repair_money.customerId','=',$id)
                            ->get();
                                                 

             $data = compact('customer','productbuy','pendingAmount','receiveMoney','transiton');  
                                   
        return view('rapair.repairview')->with($data);
    }
    public function buy_repair($id){
        $customer = Reg_customer::find($id);
        $rapirproduct = laptopRepair::all();
        $data = compact('customer','rapirproduct');
        return view('rapair.buyproduct')->with($data);
    }
    public function add_product(Request $request){
        $buyproduct = new buyProductrepair;
        $buyproduct->customer_id = $request['customerid'];
        $buyproduct->Product_id = $request['Productid'];
        $buyproduct->Date = $request['dateproduct'];
        $buyproduct->Price = $request['total_price'];
        $buyproduct->save();
        return redirect()->back()->with('message','Buy Product Successfully');
    }
    public function addmoney($id,$custo_id){
        $customer = Reg_customer::find($custo_id);
        $repair = laptopRepair::find($id);
        $data = compact('customer','repair');
        return view('rapair.addmoney')->with($data);
    }
    public function add_payment(Request $request){
        $addmoney = new AddMoney;
        $addmoney->customerId = $request['cutomer_id'];
        $addmoney->productId = $request['product_id'];
        $addmoney->Date = $request['date_payment'];
        $addmoney->Total_Money = $request['pricereceive'];
        $addmoney->save();
        return redirect()->back()->with('message','Add Money successfully');
    }
    // public function customerview(){
    //     return view('rapair.repaircustomerview');
    // }

}
