<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    
    protected $fillable = [
        'name',
        'type_document',
        'num_document',
        'address',
        'telephone',
        'email'
    ];
    
    protected $guarded = [];
}
