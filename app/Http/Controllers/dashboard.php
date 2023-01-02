<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productmodel;
use DB;
class dashboard extends Controller
{
    public function dashboard(){
        $procount = DB::table('_product')
        ->select(DB::raw('count(_product.id) as Count'))
        ->get();
        $customer = DB::table('_customer')
        ->select(DB::raw('count(_customer.id) as Cuscount'))
        ->get();
        
        $vendorproduct = DB::table('vendor_product')
        ->select(DB::raw('count(vendor_product.id) as Vproduct'))
        ->get();
        $error = DB::table('_error')
        ->select(DB::raw('count(_error.id) as Ecount'))
        ->get();
        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);

        $result = DB::table('quotation')
        ->select(DB::raw('count(quotation.id) as remain'))
        ->whereBetween('created_at',[$start_week,$end_week])
        
        ->get();
 $data = compact('procount','customer','vendorproduct','error','result');     
        return view('dashboard')->with($data);
    }
    public function form(){
        return view('pages.basic-forms');
    }
  
  
    public function table(){
        return view('pages.basic-tables');
    }
  
   
}
