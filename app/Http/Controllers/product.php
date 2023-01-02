<?php

namespace App\Http\Controllers;
use App\Models\Productmodel;

use Illuminate\Http\Request;
use DB;

class product extends Controller
{
    public function product(){
        return view('product.add_product');
    }
    public function add_product(Request $request){
        $product = new Productmodel;
        $product->Title = $request['title'];
        $product->Model = $request['model'];
        $product->Serial_NO = $request['serialno'];
        $product->Photo = $request->image->getClientOriginalName();
        $upload = $request->file('image')->move('product_image',$product->Photo);
        $product->Description = $request['description'];
        $product->save();
        return redirect()->route('all_prodt');
    }
    public function all_product(){
        $product = Productmodel::all();
        $product =  DB::table('_product')->orderBy('id','DESC')->paginate(10,['*'],'product');
        $data = compact('product');
        return view('product.all_product')->with($data);
    }
    public function edit_product($id){
        $product = Productmodel::find($id);
        if(is_null($product)){
            return redirect()->back();
        }else{
            $data = compact('product');
        return view('product.editproduct')->with($data);
        }
    }
    public function update_product(Request $request){
        $product = Productmodel::find($request->id);
        $product->Title = $request['title'];
        $product->Model = $request['model'];
        $product->Serial_NO = $request['serialno'];
        $product->Photo = $request->image->getClientOriginalName();
        $upload = $request->file('image')->move('product_image',$product->Photo);
        $product->Description = $request['description'];
        $product->save();
      return redirect()->route('all_prodt')->with('message','Update successfully');
    }
    public function delete_product($id){
        $product = Productmodel::find($id);
        if(!is_null($product)){
            $product->delete();
        }
        return redirect()->back();
    }


}
