<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BussinesType;
use App\Models\HomeindustriProfile;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeindustriProfilesController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        $regences = Regency::all();

        $user_id = Auth::user()->id;
        $types = BussinesType::all();
        $homeindustriprofiles = null;
        if(HomeindustriProfile::where('user_id', '=', $user_id)->exists()){
            $homeindustriprofiles = HomeindustriProfile::where('user_id', '=', $user_id)->get();
        }
        // dd($supplierprofiles[0]->id);
        return view('homeindustri.profile.index',compact('homeindustriprofiles','types','provinces', 'regences'));
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

        $photoprofiles = $request->file('PhotoProfile');
        $filename = $user_id . '.' . $photoprofiles->getClientOriginalExtension();
        $pathphotoprofiles = $request->file('PhotoProfile')->storeAs('public/homeindustriprofile',$filename);
        $pathphotoprofiles = str_replace('public/','',$pathphotoprofiles);

        $banner = $request->file('Banner');
        $filename = $user_id . '.' . $banner->getClientOriginalExtension();
        $pathbanner = $request->file('Banner')->storeAs('public/homeindustribanner',$filename);
        $pathbanner = str_replace('public/','',$pathbanner);
        
        // dd($pathbanner);
        
        HomeindustriProfile::create([
            'user_id'=> $user_id,
            'owner_name' => $request->OwnerName,
            'owner_telephone' => $request->OwnerTelephone,
            'owner_email' => $request->OwnerEmail,
            'bussines_name' => $request->BussinesName,
            'bussines_email' => $request->BussinesEmail,
            'bussines_telephone' => $request->BussinesTelephone,
            'bussines_type_id'=> $request->BussinesType,
            'description' => $request->Description,
            'city_id' => $request->regency,
            'address' => $request->Address,
            'photo_profile' => $pathphotoprofiles,
            'banner' =>  $pathbanner,
        ]);

        // dd($request->OwnerName);

        return redirect()->route('homeindustri.profile.index');
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
        $item = HomeindustriProfile::find($id);
        $types = BussinesType::all();
        $provinces = Province::all();
        $regences = Regency::all();
        // dd($supplierprofiles[0]->owner_name)
        return view('homeindustri.profile.update',compact('item','types','regences','provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $file = $request->file('PhotoProfile');
        
        $file = $request->file('PhotoProfile');
        $filename =  $id. '.' . $file->getClientOriginalExtension();
        $pathphotoprofile = $request->file('PhotoProfile')->storeAs('homeindustriprofile',$filename);
        // $path = str_replace('public/','',$path);
        // $request->file('PhotoProfile')->storeAs($request->photo_profile);
        $file = $request->file('Banner');
        $filename =  $id. '.' . $file->getClientOriginalExtension();
        $pathbanner = $request->file('Banner')->storeAs('homeindustribanner',$filename);


        $profiles = HomeindustriProfile::find($id);
        // dd($profiles);
        $profiles->owner_name = $request->OwnerName;
        $profiles->owner_telephone = $request->OwnerTelephone;
        $profiles->owner_email = $request->OwnerEmail;
        $profiles->bussines_name =  $request->BussinesName;
        $profiles->bussines_email = $request->BussinesEmail;
        $profiles->bussines_telephone = $request->BussinesTelephone;
        $profiles->bussines_type_id = $request->BussinesType;
        $profiles->description = $request->Description;
        $profiles->photo_profile = $pathphotoprofile;
        $profiles->banner = $pathbanner;

        $profiles->save();

        return redirect()->route('homeindustri.profile.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
