<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinesType extends Model
{
    use HasFactory;
    protected $table = 'bussines_types';
    

    public function fkSupplierProfile(){
        return $this->hasMany(SuplierProfile::class, 'bussines_type_id', 'id');
    }
}
