<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reg_customer;
use App\Models\buyNow;
use App\Models\Add_payment;
use DB;


class customer extends Controller
{
    public function add_customer(){
        return view('pages.add_customer');
    }
    public function Register_customer(Request $request){
        $customer = new Reg_customer;
        $customer->Name = $request['firstname'];
        $customer->Email = $request['email'];
        $customer->Phone = $request['phoneno'];
        $customer->Address = $request['address'];
        $customer->save();
        return redirect('All_customer');
    }
    public function All_customer(Request $request){
        $search = $request['search']?? "";
        if($search!= ""){
            $customer = Reg_customer::Where('Name', 'LIKE',"%$search%")->orwhere('Email', 'LIKE',"%$search%")->paginate(10);
        }else{
        $customer =  DB::table('_customer')->orderBy('id','DESC')->paginate(10,['*'],'customer');
       
        }
        return view('pages.All_customer', compact('customer'));
    }
    public function customer_edit($id){
        $customer = Reg_customer::find($id);
        if(is_null($customer)){
            return redirect()->back();
        }else{
            $data = compact('customer');
        return view('pages.editcustomer')->with($data);
        }
    }
    public function update_customer(Request $request){
        $customer = Reg_customer::find($request->id);
        $customer->Name = $request['firstname'];
        $customer->Email = $request['email'];
        $customer->Phone = $request['phoneno'];
        $customer->Address = $request['address'];
        $customer->save(); 
        return redirect('All_customer')->with('message','Update successfully');;
    }
    public function customer_del($id){
        $customer = Reg_customer::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect()->back();
    }
public function details_customer($id){
    $customer = Reg_customer::find($id);
    $buy = DB::table('_buy_product')
            ->join('_product','_product.id','=','_buy_product.Product_id')
          
            ->where('_buy_product.Customer_id','=',$id)
            
            ->select('_buy_product.id','_buy_product.Date','_buy_product.Total_price','_product.Title','_product.Photo','_buy_product.description as disc')->get();
            
            $Total_payment = DB::table('_buy_product')
            ->select(DB::raw('sum(Total_price) AS total'))
            ->where('_buy_product.Customer_id','=',$id)
           
            ->get();
            $Total_recieve = DB::table('_addpayment')
            ->select(DB::raw('sum(Total_money) AS receive'))
            ->where('_addpayment.id_customer','=',$id)
           
            ->get();
         
    $pymtreceive = DB::table('_addpayment')
    ->join('_buy_product','_buy_product.id','=','_addpayment.prodt_id')
  
    ->where('_buy_product.Customer_id','=',$id)
    
    ->select('_addpayment.*')->get();
   
    //----------------count--query--------------
    $productCount = DB::table('_buy_product')
                        ->select('_buy_product.*')
                        ->where('_buy_product.Customer_id','=',$id)
                        ->count('_buy_product.Product_id');
     //----------repair----product--------
     
    //  $repair = DB::table('repairproduct')
    //                 ->join('repair','repair.id','=','repairproduct.Product_id')
    //               ->where('repairproduct.customer_id','=',$id)
    //               ->select('repairproduct.Date','repair.Repair_photo','repair.Repair_title')
    //                 ->get();
                // dd($repair);
    $repair = DB::table('_customer')
                    ->join('repair','repair.Customer_id','=','_customer.id')
                    ->where('_customer.id','=',$id)
                    ->select('repair.created_at','repair.Repair_photo','repair.Repair_title','repair.Repair__price')
                    ->get();
    //    dd($repair);
    $data = compact('customer','buy','Total_payment','pymtreceive','Total_recieve','productCount','repair');
    return view('pages.customer_details')->with($data);
}
//-------------paymnt-------------

public function payment($id, $cust_id){
    $buyorder = buyNow::find($id);
    $customer = Reg_customer::find($cust_id);
 
    $data = compact('buyorder','customer');
    return view('payment.add_payment')->with($data);
}
public function receive_money(Request $request){
    $Add_payment = new Add_payment;
    $Add_payment->id_customer = $request['cutomer_id'];
    $Add_payment->prodt_id = $request['product_id'];
    $Add_payment->Date = $request['date_payment'];
    $Add_payment->Total_money = $request['pricereceive'];
    $Add_payment->save();
   return redirect()->back()->with('message','Add Money successfully');
}

public function transition_details($id){
    $buyproduct = DB::table('_buy_product')
            ->join('_product','_product.id','=','_buy_product.Product_id')
            ->where('_buy_product.id','=',$id)
            ->select('_buy_product.id','_buy_product.Date','_buy_product.Total_price','_product.*')->get();
          
            $All_transaction = DB::table('_addpayment')
            ->join('_buy_product','_buy_product.id','=','_addpayment.prodt_id')
            ->where('_addpayment.prodt_id','=',$id)
   
            ->select('_addpayment.Date','_addpayment.Total_money','_addpayment.id')->get();

            $paymentReceive = DB::table('_addpayment')
            ->select(DB::raw('sum(Total_money) AS receives'))
            ->where('_addpayment.prodt_id','=',$id)->get();
         
            
       
            $data = compact('buyproduct','All_transaction','paymentReceive');    
    return view('payment.details_transition')->with($data);
}

}
