<?php

namespace App\Models\Purchases;

use Illuminate\Database\Eloquent\Model;

class income extends Model
{
    protected $table = 'income';
    
    protected $fillable = [
        'idsupplier',
        'iduser',
        'type_voucher',
        'series_voucher',
        'num_voucher',
        'date_hour',
        'tax',
        'total',
        'state'
    ];
    
    protected $guarded = [];

    public function users(){
        return $this->belongsTo('App\User','iduser');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Purchases\Supplier','idsupplier');
    }
}
