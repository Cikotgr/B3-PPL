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
        'description'
    ];
    
    protected $guarded = ['id'];

    public function fkUsers(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
