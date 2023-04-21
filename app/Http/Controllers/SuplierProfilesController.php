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
        
        $supplierprofiles = null;
        if(SuplierProfile::where('user_id', '=', $user_id)->exists()){
            $supplierprofiles = SuplierProfile::where('user_id', '=', $user_id)->get();
        }
        // dd($supplierprofiles[0]->id);
        return view('supplier.profile.index',compact('supplierprofiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $file = $request->file('PhotoProfile');
        $filename = $user_id . '.' . $file->getClientOriginalExtension();
        $path = $request->file('PhotoProfile')->storeAs('public/suplierprofile',$filename);
        $path = str_replace('public/','',$path);
        // dd($path);
        SuplierProfile::create([
            'user_id'=> $user_id,
            'owner_name' => $request->OwnerName,
            'owner_telephone' => $request->OwnerTelephone,
            'bussines_name' => $request->BussinesName,
            'bussines_email' => $request->BussinesEmail,
            'bussines_telephone' => $request->BussinesTelephone,
            'bussines_type_id'=> $request->BussinesType,
            'description' => $request->Description,
            'photo_profile' => $path
        ]);

        // dd($request->OwnerName);

        return redirect()->route('supplier.profile.index');
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
    public function edit($id)
    {
        $item = SuplierProfile::find($id);
        // dd($supplierprofiles[0]->owner_name);
        return view('supplier.profile.update',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $file = $request->file('PhotoProfile');
        $request->file('PhotoProfile')->storeAs($request->photo_profile);

        $profiles = SuplierProfile::find($id);
        $profiles->user_id = $profiles->user_id;
        $profiles->owner_name = $request->OwnerName;
        $profiles->owner_telephone = $request->OwnerTelephone;
        $profiles->bussines_name =  $request->BussinesName;
        $profiles->bussines_email = $request->BussinesEmail;
        $profiles->bussines_telephone = $request->BussinesTelephone;
        $profiles->bussines_type_id = $request->BussinesType;
        $profiles->description = $request->Description;
        $profiles->photo_profile = $profiles->photo_profile;
        $profiles->save();

        return redirect()->route('supplier.profile.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
