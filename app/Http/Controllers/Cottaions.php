<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotationm;
use App\Models\Reg_customer;
use App\Models\moreQuotation;
use DB;
use Session;
use DateTime;
use Carbon\Carbon;
class Cottaions extends Controller
{
    public function quotation(){
        $customerid = Reg_customer::all();
        
        $data = compact('customerid');
        
        return view('cottation.quotation')->with($data);
    }
    public function addquotation(Request $request){
          $Quotation = new Quotationm;
          $Quotation->Cusomer_id = $request['customerid'];
          $Quotation->Tittle = $request['Quotation'];
          $Quotation->save();
          $Quid = $Quotation->id;
        $data = compact('Quid');
          return view('cottation.singlequotation')->with($data);
    }
    public function aallquotation(){
        $Quotation = Quotationm::all();
        $More = moreQuotation::all();
       $Quotation = DB::table('quotation')->orderBy('id','DESC')->paginate(10,['*'],'Quotation');

        $data = compact('Quotation','More');
        return view('cottation.allquotation')->with($data);
    }
    public function deletesingle($id){
        $Quotation =  Quotationm::find($id);
        if(!is_null($Quotation)){
            $Quotation->delete();
        }
        return redirect()->back();
    }
    public function AddmoreQuotation(Request $request){
        $moreQ = new moreQuotation;
        $moreQ->Quotaion_id = $request['quotatioid'];
        $moreQ->Title = $request['protitle'];
        $moreQ->Model = $request['promodel'];
        $moreQ->Serial = $request['proserial'];
        $moreQ->price = $request['proprice'];
        $moreQ->save();
        return redirect()->route('allquotation')->with('message','Add successfully');
    }
    

    // public function editQuotation($id){
    //     $moreQ = moreQuotation::find($id);
    //     $data = compact('moreQ');
    //     return view('cottation.editcottation')->with($data);
    // }
    // public function updateQuotation(Request $request){
    //     $moreQ =  moreQuotation::find($request->id);
    //     $moreQ->Quotaion_id = $request['quotatioid'];
    //     $moreQ->Title = $request['protitle'];
    //     $moreQ->Model = $request['promodel'];
    //     $moreQ->Serial = $request['proserial'];
    //     $moreQ->price = $request['proprice'];
    //     $moreQ->save();
    //     return redirect()->route('allquotation')->with('message','Update successfully');
    // }
    // public function deleteQuotation($id){
    //     $moreQ =  moreQuotation::find($id);
    //     if(!is_null($moreQ)){
    //         $moreQ->delete();
    //     }
    //     return redirect()->back();
    // }
    public function signleview($id){
      
        $Quotation = Quotationm::find($id);
        $data = compact('Quotation');
        
         return view('cottation.sinlgepagequ')->with($data);
      }

      public function viewsingle($id){
 
        $alldetails = DB::table('more_quotation')
                        ->join('quotation','quotation.id','=','more_quotation.Quotaion_id')
                        ->where('more_quotation.Quotaion_id','=',$id)
                        ->select('more_quotation.*','quotation.Tittle as tbheading')
                        ->get();
                       
        $data = compact('alldetails');

        return view('cottation.viewquotation')->with($data);
      }

      public function remainder(){
        // $ldate = new DateTime('d-m-Y H:i:s');
        // var_dump($ldate);
      
        // $mytime = Carbon::now();
        // echo $mytime->toDateTimeString();
        //   $r = DB::table('quotation')
        //  ->whereBetween('quotation.created_at',[$ldate])
        //  ->get();
        // $date = Carbon::parse($request['appoint_date'])->format('Y-m-d H');
        // $date = Carbon::now();
        // $startDate = Carbon::now()->subWeek();
        // $endDate = Carbon::now();

        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
        $end_week = strtotime("next sunday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);

        $result = DB::table('quotation')
         ->whereBetween('created_at',[$start_week,$end_week])
         
         ->get();
        
         $data = compact('result'); 
       
      

       
        return view('cottation.remainder')->with($data);
      }
}
