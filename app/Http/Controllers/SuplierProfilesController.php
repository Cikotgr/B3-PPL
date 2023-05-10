<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileValidationRequest;
use App\Models\BussinesType;
use App\Models\Province;
use App\Models\Regency;
use App\Models\SuplierProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SuplierProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
    {
        $provinces = Province::all();
        $regences = Regency::all();

        $user_id = Auth::user()->id;
        $types = BussinesType::all();
        $supplierprofiles = null;
        if(SuplierProfile::where('user_id', '=', $user_id)->exists()){
            $supplierprofiles = SuplierProfile::where('user_id', '=', $user_id)->get();
        }
        // dd($supplierprofiles[0]->id);
        return view('supplier.profile.index',compact('supplierprofiles','types','provinces', 'regences'));
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
    public function store(ProfileValidationRequest $request)
    {
        $user_id = Auth::user()->id;

        $photoprofiles = $request->file('PhotoProfile');
        $filename = $user_id . '.' . $photoprofiles->getClientOriginalExtension();
        $pathphotoprofiles = $request->file('PhotoProfile')->storeAs('public/suplierprofile',$filename);
        $pathphotoprofiles = str_replace('public/','',$pathphotoprofiles);

        $banner = $request->file('Banner');
        $filename = $user_id . '.' . $banner->getClientOriginalExtension();
        $pathbanner = $request->file('Banner')->storeAs('public/suplierbanner',$filename);
        $pathbanner = str_replace('public/','',$pathbanner);
        
        // dd($pathbanner);
        
        $data = [
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
        ];

        try{
            SuplierProfile::create($data);
            Alert::successs('Berhasil','Profile berhasil ditambahkan');
            return redirect()->route('supplier.profile.index');
        } catch (\Throwable $th){
            Alert::error('Error', 'Profile gagal ditambahkan');
            return redirect()->route('supplier.profile.index');
        }

        // dd($request->OwnerName);

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
        $types = BussinesType::all();
        $provinces = Province::all();
        $regences = Regency::all();
        // dd($supplierprofiles[0]->owner_name)
        return view('supplier.profile.update',compact('item','types','regences','provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $file = $request->file('PhotoProfile');
        
        try{
        
        $file = $request->file('PhotoProfile');
        $filename =  $id. '.' . $file->getClientOriginalExtension();
        $pathphotoprofile = $request->file('PhotoProfile')->storeAs('suplierprofile',$filename);
        // $path = str_replace('public/','',$path);
        // $request->file('PhotoProfile')->storeAs($request->photo_profile);
        $file = $request->file('Banner');
        $filename =  $id. '.' . $file->getClientOriginalExtension();
        $pathbanner = $request->file('Banner')->storeAs('suplierbanner',$filename);
        
        
        $profiles = SuplierProfile::find($id);
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
            // SuplierProfile::create($data);
            Alert::success('Berhasil','Profile berhasil ditambahkan');
            return redirect()->route('supplier.profile.index');
        } catch (\Throwable $th){
            Alert::error('Error', 'Profile gagal ditambahkan');
            return redirect()->route('supplier.profile.index');
        }

        // return redirect()->route('supplier.profile.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
