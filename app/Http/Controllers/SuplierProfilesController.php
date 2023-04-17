<?php

namespace App\Http\Controllers;

use App\Models\SuplierProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuplierProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
    {
        $user_id = Auth::user()->id;
        $supplierprofiles = SuplierProfile::where('user_id', '=', $user_id)->get();
        
        
        return view('supplier_profile.index',compact('supplierprofiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        
        // dd($user_
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        SuplierProfile::create([
            'user_id'=> $user_id,
            'owner_name' => $request->OwnerName,
            'owner_telephone' => $request->OwnerTelephone,
            'bussines_name' => $request->BussinesName,
            'bussines_email' => $request->BussinesEmail,
            'bussines_telephone' => $request->BussinesTelephone,
            'bussines_type_id'=> $request->BussinesType,
            'description' => $request->Description
        ]);

        // dd($request->OwnerName);

        return redirect()->route('supplier_profile.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
