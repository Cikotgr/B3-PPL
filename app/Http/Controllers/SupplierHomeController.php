<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierHomeController extends Controller
{
    public function index(){
        return view('supplier.home.index');
    }
}
