<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcountsController extends Controller
{
    public function show(){
        $account = Auth::user();

        return view('auth.view', compact('account'));
    }
}
