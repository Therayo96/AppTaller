<?php

namespace App\Models\Werehouse;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';


    protected $fillable = [
        'category_id',
        'code',
        'name',
        'price_sale',
        'stock',
        'description',
        'condition'
    ];

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
