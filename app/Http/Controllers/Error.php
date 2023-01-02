<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\error_prod;
use DB;
class Error extends Controller
{
    public function error_show(){
        return view('error.add_error');
    }
    public function add_error(Request $request){
        $error = new error_prod;
        $error->Err_title = $request['err_title'];
        $error->Err_photo = $request->err_image->getClientOriginalName();
        $upload = $request->file('err_image')->move('error',$error->Err_photo );
        $error->Err_discription = $request['err_discription'];
        $error->save();
        return redirect()->route('all_error');
    }
    public function all_error(){
        $error = error_prod::all();
        $error = DB::table('_error')->orderBy('id','DESC')->paginate(10,['*'],'error');
        $data = compact('error');
        return view('error.all_error')->with($data);
    }
    public function edit_error($id){
        $error = error_prod::find($id);
        if(is_null($error)){
            return redirect()->back();
        }else{
            $data = compact('error');
            return view('error.edit_error')->with($data);
        }
    }
    public function update_error(Request $request){
        $error = error_prod::find($request->id);
        $error->Err_title = $request['err_title'];
        $error->Err_photo = $request->err_image->getClientOriginalName();
        $upload = $request->file('err_image')->move('error',$error->Err_photo );
        $error->Err_discription = $request['err_discription'];
        $error->save();
        return redirect()->route('all_error')->with('error', 'Update Successfully');
    }
    public function del_error($id){
        $error = error_prod::find($id);
        if(!is_null($error)){
            $error->delete();
        }
        return redirect()->back();
    }
}
