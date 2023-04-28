<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SuplierProfile;
use Illuminate\Http\Request;

class SupplierAllController extends Controller
{
    public function index(){
        $supplier_profiles = SuplierProfile::all();

        return view('suplier_all.index',compact('supplier_profiles'));
    }

    public function show(string $id){
        $supplier_id = $id;
        $supplier_products = null;
        if(Product::where('supplier_profile_id', '=', $supplier_id)->exists()){
            $supplier_products= (Product::where('supplier_profile_id', '=', $supplier_id)->get());
        }
        $supplier_profile = SuplierProfile::find($id);
        return view('suplier_all.view',compact('supplier_profile','supplier_products'));
    }

    public function product(string $id){
        $product = Product::find($id);
        return view('suplier_all.viewproduct',compact('product'));
    }

}
