<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuplierProfile extends Model
{
    use HasFactory;
    protected $table = 'supplier_profiles';
    protected $fillable = [
        'user_id',
        'bussines_type_id',
        'owner_name',
        'owner_telephone',
        'bussines_name',
        'bussines_email',
        'bussines_telephone',
        'description',
        'photo_profile',
        'banner',
        'owner_email',
        'address',
        'city_id',

    ];
    
    protected $guarded = ['id'];

    public function fkUsers(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function fkProduct(){
        return $this->hasMany(Product::class, 'supplier_profile_id', 'id');

    }

    public function fkBussinesType(){
        return $this->belongsTo(BussinesType::class,'bussines_type_id','id');
    }

    public function fkRegency(){
        return $this->belongsTo(Regency::class,'city_id','id');
    }
}
