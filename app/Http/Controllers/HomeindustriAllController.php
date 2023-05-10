<?php

namespace App\Http\Controllers;

use App\Models\HomeindustriProfile;
use Illuminate\Http\Request;

class HomeindustriAllController extends Controller
{
    public function index(){
        $homeindustri_profiles = HomeindustriProfile::all();

        return view('homeindustri_all.index',compact('homeindustri_profiles'));
    }
    public function show(){
        
        return view('homeindustri_all.view');
    }
}
