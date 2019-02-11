<?php

namespace App\Models\Purchases;

use Illuminate\Database\Eloquent\Model;

class detail_income extends Model
{
    protected $table = 'detail_income';
    
    protected $fillable = [
        'idincome',
        'idarticles',
        'quantity',
        'quantity'
    ];
    
    protected $guarded = [];
}
