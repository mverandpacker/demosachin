<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_login;
use Hash;
use Auth;
use Session;
use App\Models\Productmodel;
use DB;
class login_admin extends Controller
{
    public function login_admin(Request $request)
    {
      
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required'
           ]);
        //    $user = admin_login::where('Email' ,'=' , $request->email)->first();
        $admin = admin_login::where('Email' ,'=' ,$request->email)->first();
        
       
           if($admin){
            if(Hash::check($request->password, $admin->Password)){
                session_start();

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
               $idlogin = $request->session()->put('admin',$admin->id);
              
                return view('dashboard')->with($data);
           
           
    
            }else{
                return back()->with('failed','Password do not match'); 
            }
    
           }else{
            return back()->with('failed','This Email not register');
           }
    }
    // public function login_user(Request $request){
    //    $admin = new admin_login;
    //    $admin->Name = $request['name']; 
    //    $admin->Email = $request['email']; 
    //    $admin->Password = Hash::make($request['pass']); 
    //    $admin->save();
    //    echo "save "; 
    // }
    function logout(){
        Auth::logout();
        Session::flush();
       
        return redirect()->route('login_again');
    }
}
