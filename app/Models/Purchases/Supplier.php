<?php

namespace App\Models\Purchases;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    
    protected $fillable = [
        'name',
        'type_document',
        'num_document',
        'address',
        'telephone',
        'email',
        'contact',
        'num_contact'
    ];
    
    protected $guarded = [];
}
