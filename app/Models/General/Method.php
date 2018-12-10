<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    protected $table = 'method';
    
    protected $fillable = [
        'controller_id',
        'name',
        'verbName',
        'name_function',
        'url'
    ];
    
    protected $guarded = [];
    
    public function controller(){
        return $this->belongsTo(Controller::class, 'controller_id');
    }
    
    public function modules(){
        return $this->hasMany(Module::class, 'method_id');
    }
}
