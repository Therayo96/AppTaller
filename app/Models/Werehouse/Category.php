<?php

namespace App\Models\Werehouse;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    protected $fillable = [
        'name',
        'description',
        'condition'
    ];
    
    protected $guarded = [];
}
