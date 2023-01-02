<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Paginator;
class AllPayment extends Controller
{
    public function all_payment(){
        // $AllReceive = DB::table('_customer')
        //         ->join('_addpayment', '_addpayment.id_customer', '=', '_customer.id')
        //         ->select('_customer.id as id', DB::raw("sum(_addpayment.Total_money) as total"))
        //         ->groupBy('_customer.id')
        //         ->get();
      
        // // $pendingAmount = DB::table('_buy_product')
        // //                     ->join('_product','_product.id','=','_buy_product.Product_id')
        // //                     ->select('_buy_product.Product_id as id',DB::raw('sum(_buy_product.Total_price) as total'))
        // //                     ->groupBy('_buy_product.Product_id',)
        // //                     ->get();
        // $pending = DB::table('_product')
        //                 ->join('_buy_product','_buy_product.Product_id','=','_product.id')
        //                 ->select('_buy_product.Customer_id as id',DB::raw('sum(_buy_product.Total_price) as total'))
        //                 ->groupBy('_buy_product.Customer_id')
        //                 ->get();
        //  $customerpending = DB::table('_product')
        //                     ->join('_buy_product','_buy_product.Product_id','=','_product.id')
        //                     ->select('_product.Title','_product.Model','_product.Photo')
                            
        //                     ->get(); 
        // $All = DB::table('_customer')
        //             ->join('_addpayment','_addpayment.id_customer','=','_customer.id')
        //             ->select(DB::raw('sum(_addpayment.Total_money) as total'))
        //             ->groupBy('_customer.id')
        //             ->orderBy('total')
        //             ->get();

        //      dd($All);  
        
        // $all = DB::table('_customer')
        //             ->join('_buy_product','_buy_product.Customer_id','=','_customer.id')
        //             // ->join('_addpayment','_addpayment.id_customer','=','_customer.id')
        //             ->select(DB::raw('sum(_buy_product.Total_price as pending)'))
        //             ->groupBy('_customer.id')
        //             ->get();
                
            
    //    $all =  collect([$AllReceive, $pending]);   
     
    //     // $data = compact('AllReceive','pending');
    //     $data = compact('all');

// $customer = DB::table('_customer')
//                 ->join('_addpayment','_addpayment.id_customer','=','_customer.id')
//                 ->select('_customer.id','_customer.Name','_customer.Email','_customer.Phone','_customer.Address')
//                 ->DISTINCT ()
//                 ->orderBy('_customer.id')
//                 ->get();

    //------
    $AllReceive = DB::table('_customer')
    ->join('_addpayment', '_addpayment.id_customer', '=', '_customer.id')
    ->join('_buy_product','_buy_product.Customer_id','=','_customer.id')
    ->select('_customer.Phone','_customer.Name','_customer.Email','_customer.id as id', DB::raw("sum(_addpayment.Total_money) as Receive"),DB::raw("sum(_buy_product.Total_price) as productbuy"),DB::raw("(sum(_buy_product.Total_price) - sum(_addpayment.Total_money)) as Pending ") )
    ->groupBy('_customer.id','_customer.Name','_customer.Email','_customer.Phone')
    

    ->get();
    $AllReceive = DB::table('_customer')
    ->join('_addpayment', '_addpayment.id_customer', '=', '_customer.id')
    ->join('_buy_product','_buy_product.Customer_id','=','_customer.id')
    ->select('_customer.Phone','_customer.Name','_customer.Email','_customer.id as id', DB::raw("sum(_addpayment.Total_money) as Receive"),DB::raw("sum(_buy_product.Total_price) as productbuy"),DB::raw("(sum(_buy_product.Total_price) - sum(_addpayment.Total_money)) as Pending ") )
    ->groupBy('_customer.id','_customer.Name','_customer.Email','_customer.Phone')
    ->paginate(10);
   
    // $data = compact('AllReceive','customer');
    // $data['payment'] = collect($AllReceive)->merge($customer ?: collect());

//  $alldata = $AllReceive->concat($customer);
// $data = compact('alldata');


    // $all =  collect([$AllReceive,$customer])->toArray();

    // $info = $all->all();
    
    // $both_arrays = array_combine([$customer],[$AllReceive]);
    


        // $result = $AllReceive->map(function($item, $key) use($customer) {
        //     if($customer->has($key)){
        //         return $item-$customer[$key];
        //     }
        //     return $item;
        // });
    
    //  $array = json_decode(json_encode($data), true);       
     
        // $x = collect($AllReceive)->map(function($aItem, $index) use ($customer) {
        //     return $aItem - $customer[$index];
        //   });
        //   dd($x);
        // $combined = array_combine([$AllReceive], [$customer]);

        // dd($combine);
        // $tr = array_merge([$AllReceive,$customer]);
       
        // $data = compact('tr');
        // $fir = collect($AllReceive);
        // $sir = collect($customer);
        // $mer = $fir->merge($sir);
        // $data = compact('mer');
 

// $All = DB::table('_customer')
// ->leftjoin('_buy_product','_buy_product.Customer_id','=','_customer.id')
// ->leftjoin('_addpayment', '_addpayment.prodt_id', '=', '_buy_product.id')
// ->selectRaw(DB::raw("sum(_addpayment.Total_money) as Receive,_customer.id"))
// ->selectRaw(DB::raw("sum(_buy_product.Total_price) as productbuy"))
// ->selectRaw(DB::raw("sum(_buy_product.Total_price) - sum(_addpayment.Total_money) as Pending"))

// // ->select('_customer.id as id', DB::raw("sum(_addpayment.Total_money) as Receive"),DB::raw("sum(_buy_product.Total_price) as productbuy"),DB::raw("(sum(_buy_product.Total_price) - sum(_addpayment.Total_money)) as Pending ") )

// ->groupBy('_customer.id')
// ->orderBy('_customer.id')
 
// ->get();

// dd($All);

// $at = array_merge([$AllReceive],[$customer]);
// $o = json_encode($at);
// $i = compact('o');

$data = compact('AllReceive');
        return view('payment.allpayment')->with($data);
    }
    
    
}

