<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specification;
use DB;
class ProductSpecification extends Controller
{
    public function specification(){
        return view('Productspecification.add_product_specification');
    }
    public function add_specification(Request $request){
        $specification = new Specification;
        $specification->Product_specification = $request['Product_Specification'];
        $specification->Product_discription = $request['Product_disc'];
        $specification->Product_youtube_link = $request['Product_youtube'];
        $specification->save();
        return redirect()->route('all_speci');
    }
    public function all_speci(){
        $specification = Specification::all();
        $specification = DB::table('_specification')->orderBy('id','DESC')->paginate(10,['*'],'specification');
        $data = compact('specification');
        return view('Productspecification.all_specification')->with($data);
    }
    public function edit_speci($id){
        $specification = Specification::find($id);
        if(is_null($specification)){
            return redirect()->back();
        }else{
            $data = compact('specification');
            return view('Productspecification.edit_specification')->with($data);
        }
    }
    public function update_speci(Request $request){
        $specification = Specification::find($request->id);
        $specification->Product_specification = $request['Product_Specification'];
        $specification->Product_discription = $request['Product_disc'];
        $specification->Product_youtube_link = $request['Product_youtube'];
        $specification->save();
        return redirect()->route('all_speci')->with('message', 'Update Succussfully');
    }
    public function delete_specification($id){
        $specification = Specification::find($id);
        if(!is_null($specification)){
            $specification->delete();
        }
            return redirect()->back();

    }
}
