<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'supplier_profile_id',
        'status_product_id',
        'product_type_id',
        'product_name',
        'stock',
        'description',
        'price',
        'photo'
    ];

    public function fkSupplier(){
        return $this->belongsTo(SuplierProfile::class,'supplier_profile_id','id');
    }
}
